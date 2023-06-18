<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use InvalidArgumentException;
use App\Models\User;
use App\Models\Scenario;
use Illuminate\Support\Facades\Auth;


class DeviceeventsController extends Controller
{
    
    //decoding of waterLevels payloads 
    function decodeWaterLevelPayload($payload) {
        // Parse the payload bytes into data fields
        $sensorType = hexdec(substr($payload, 0, 2));
        $frameType = hexdec(substr($payload, 2, 2));
        $batteryVoltage = hexdec(substr($payload, 4, 2));
        $waterLevel = (hexdec(substr($payload, 6, 2)) << 8) | hexdec(substr($payload, 8, 2));
    
        // Convert the water level to a float and return it
        return $waterLevel / 100.0;
    }

    //decoding of Temp/Humidity payloads 
    function decodeTempHumidityPayload($payload) {
        // Parse the payload bytes into data fields
        $deviceID = hexdec(substr($payload, 0, 2));
        $frameFormat = hexdec(substr($payload, 2, 2));
        $antiDismantle = (hexdec(substr($payload, 4, 2)) == 1) ? 'Dismantled' : 'Not Dismantled';
        $temperatureStatus = hexdec(substr($payload, 6, 2));
        $temperature = ((hexdec(substr($payload, 5, 2)) << 8) | hexdec(substr($payload, 6, 2))) / 10.0;
        $humidityStatus = hexdec(substr($payload, 7, 2));
        $humidity = ((hexdec(substr($payload, 8, 2)) << 8) | hexdec(substr($payload, 9, 2))) / 100.0;
        $power = ((hexdec(substr($payload, 10, 2)) << 8) | hexdec(substr($payload, 11, 2))) / 100.0;
        $powerStatus = (hexdec(substr($payload, 12, 2)) == 1) ? 'Low' : 'Normal';
        switch ($temperatureStatus) {
            case 0x00:
                $temperatureStatusStr = 'Normal';
                break;
            case 0x01:
                $temperatureStatusStr = 'High Temperature Threshold Alarm';
                break;
            case 0x02:
                $temperatureStatusStr = 'Low Temperature Threshold Alarm';
                break;
            default:
                $temperatureStatusStr = 'Unknown';
                break;
        }
    
        switch ($humidityStatus) {
            case 0x00:
                $humidityStatusStr = 'Normal';
                break;
            case 0x01:
                $humidityStatusStr = 'High';
                break;
            case 0x02:
                $humidityStatusStr = 'Low';
                break;
            default:
                $humidityStatusStr = 'Unknown';
                break;
        }
    
        return [
           // Convert the temperature to a float and return it
           'temperatureStatus' => $temperatureStatusStr,
           'power' => $power,
           'powerStatus' => $powerStatus,
           'humidityStatus' => $humidityStatusStr,
           'temperature' => number_format($temperature / 100.0, 1),
           'humidity' => number_format($humidity / 10.0, 2),
        ];
        
        
    }

    function decodeGPSPayload($payload) {
        // Parse the payload bytes into data fields
        $sensorType = hexdec(substr($payload, 0, 2));
        $protocolType = hexdec(substr($payload, 2, 2));
        $frameControlField = hexdec(substr($payload, 4, 2));
        $frameSequenceNumber = hexdec(substr($payload, 6, 2));
        $latitude = hexdec(substr($payload, 8, 6));
        $longitude = hexdec(substr($payload, 14, 6));
        $voltage = hexdec(substr($payload, 20, 2));
        $positioningTime = hexdec(substr($payload, 22, 2));
        $status = substr($payload, 24, 2);
    
        // Calculate the latitude and longitude values
        $latMultiplier = 90.0 / (pow(2, 23) - 1);
        $lonMultiplier = 180.0 / (pow(2, 23) - 1);
    
        // Convert the latitude and longitude to decimal degrees
        $latitude = ($latitude * $latMultiplier) - 90.0;
        $longitude = ($longitude * $lonMultiplier) - 180.0;
    
        // Create an associative array with the decoded data fields
        $decodedPayload = array(
            'latitude' => $latitude,
            'longitude' => $longitude,
            'voltage' => $voltage,
            'positioningTime' => $positioningTime
        );
    
        return [
            // Convert the temperature to a float and return it
            'latitude' => number_format($latitude / 10.0, 1),
            'longitude' => number_format($longitude / 10.0, 2),
            'voltage' => number_format($voltage / 10.0, 2),
            'positioningTime' => number_format($positioningTime / 10.0, 2),

        ];
        
    }
    private function getWaterLevelPayload($devEUI) {
        return DB::table('deviceevents')->where('devEUI', $devEUI)->get();
    }
    
    private function getTempHumidityPayload($devEUI) {
        return DB::table('deviceevents')->where('devEUI', $devEUI)->get();
    }
    
    public function getGPSPayload($devEUI) {
        return DB::table('deviceevents')->where('devEUI', $devEUI)->get();
    }

    public function processWaterLevelEventData($payloadWaterLevel) {
        $labels = [];
        $data = [];
        $monthlyPayloads = [];
        $dailyAverages = [];
    
        // Obtenir la date actuelle
        $currentDate = date('Y-m-d');
    
        foreach ($payloadWaterLevel as $payload) {
            $scenario=Scenario::where('device_id', 'ffffff100000d135')->first();
            $payloadBinary = bin2hex($payload->payload);
            $waterLevel = $this->decodeWaterLevelPayload($payloadBinary);
            $timestampSeconds = (int) $payload->time;
            $carbon = Carbon::createFromTimestamp($timestampSeconds)->addMilliseconds(($payload->time - $timestampSeconds) * 1000);
            $date = date('Y-m-d', $carbon->timestamp);
            $labels[] = $date;
            $data[] = $waterLevel;
    
        
            //notifications
            // Check if the water level exceeds the threshold
            if ($scenario) {
                $min = $scenario->min;
                $max = $scenario->max;
                $normal = $scenario->normal;
            
                if ($waterLevel > $max) {
                    $title = "High Water Level Alert";
                    $body = "The water level has exceeded the maximum threshold at " . $date;
                } elseif ($waterLevel < $min) {
                    $title = "Low Water Level Alert";
                    $body = "The water level has dropped below the minimum threshold at " . $date;
                } elseif ($waterLevel > $normal) {
                    $title = "Elevated Water Level Alert";
                    $body = "The water level is above the normal range at " . $date;
                }
            
                if (isset($title) && isset($body)) {
                    // Check if a notification with the same title and body already exists
                    $existingNotification = Notification::where('title', $title)
                                                        ->where('body', $body)
                                                        ->first();
            
                    if (!$existingNotification) {
                        // Create a new notification
                        $notification = new Notification();
                        $notification->title = $title;
                        $notification->body = $body;
                        $notification->device_id = "ffffff100000d135";
                        $notification->save();
                    }
                }
            }
            // Group payloads by month
            $month = date('F', $carbon->timestamp);
    
            if (!isset($monthlyPayloads[$month])) {
                $monthlyPayloads[$month] = [];
            }
    
            $monthlyPayloads[$month][] = [
                'date' => $date,
                'waterLevel' => $waterLevel
            ];
    
            if (!isset($dailyAverages[$date])) {
                $dailyAverages[$date] = [
                    'sum' => 0,
                    'count' => 0,
                    'average' => 0
                ];
            }
            $dailyAverages[$date]['sum'] += $waterLevel;
            $dailyAverages[$date]['count']++;
            $dailyAverages[$date]['average'] = $dailyAverages[$date]['sum'] / $dailyAverages[$date]['count'];
        }
        // Filtrer les données pour la date actuelle
        $todaysAverage = isset($dailyAverages[$currentDate]) ? $dailyAverages[$currentDate]['average'] : 0;
    
        return [
            'labels' => $labels,
            'data' => $data,
            'monthlyPayloads' => $monthlyPayloads,
            'dailyAverages' => $dailyAverages,
            'todaysAverage' => $todaysAverage
        ];
    }
    
    

    public function processTempHumidityEventData($payloadTemp)
    {
        $labels = [];
        $dataTemp = [];
        $dataHumidity = [];
        $dailyAverages = [];
        $currentMonth = date('F');
        $monthlyData = [];
        $currentDay = [];
    
        foreach ($payloadTemp as $payload) {
            $scenario=Scenario::where('device_id', 'ffffff100000b745')->first();
            $payloadBinary = bin2hex($payload->payload);
            $tempHumidity = $this->decodeTempHumidityPayload($payloadBinary);
            $timestampSeconds = (int) $payload->time;
            $carbon = Carbon::createFromTimestamp($timestampSeconds)->addMilliseconds(($payload->time - $timestampSeconds) * 1000);
            $date = date('Y-m-d', $carbon->timestamp);
            $month = date('F', $carbon->timestamp);
            
            $labels[] = $date;
            $dataTemp[] = $tempHumidity['temperature'];
            $dataHumidity[] = $tempHumidity['humidity'];
    
            //notifications 
            // Check if the temperature level exceeds the threshold
            if ($scenario) {
                $min = $scenario->min;
                $max = $scenario->max;
                $normal = $scenario->normal;
            
                if ($tempHumidity['temperature'] > $max) {
                    $title = "High temperature Alert";
                    $body = "The temperature has exceeded the maximum threshold at " . $date;
                } elseif ($tempHumidity['temperature'] < $min) {
                    $title = "Low Water Level Alert";
                    $body = "The temperature has dropped below the minimum threshold at " . $date;
                } elseif ($tempHumidity['temperature'] > $normal) {
                    $title = "Elevated temperature Alert";
                    $body = "The temperature is above the normal range at " . $date;
                }
            
                if (isset($title) && isset($body)) {
                    // Check if a notification with the same title and body already exists
                    $existingNotification = Notification::where('title', $title)
                                                        ->where('body', $body)
                                                        ->first();
            
                    if (!$existingNotification) {
                        // Create a new notification
                        $notification = new Notification();
                        $notification->title = $title;
                        $notification->body = $body;
                        $notification->device_id = "ffffff100000b745";
                        $notification->save();
                    }
                }
            }
            //notification power level 
            // Check if the power level 
            if ($tempHumidity['powerStatus'] == 'High') {
                $title = "High power Alert";
                $body = "Power Surge Warning";
                
                // Check if a notification with the same title and body already exists
                $existingNotification = Notification::where('title', $title)
                                                     ->where('body', $body)
                                                     ->first();
                if (!$existingNotification) {
                    // Create a new notification
                    $notification = new Notification();
                    $notification->title = $title;
                    $notification->body = $body;
                    $notification->save();
                }
            }elseif ($tempHumidity['powerStatus'] == 'Low') {
                $title = "Low power Alert";
                $body = "Low Power Supply Detected.";
                
                // Check if a notification with the same title and body already exists
                $existingNotification = Notification::where('title', $title)
                                                     ->where('body', $body)
                                                     ->first();
                if (!$existingNotification) {
                    // Create a new notification
                    $notification = new Notification();
                    $notification->title = $title;
                    $notification->body = $body;
                    $notification->save();
                }
            }
            // Ajouter les informations de statut à dailyAverages
            $dailyAverages[$date] = [
                'averageTemp' => $tempHumidity['temperature'],
                'averageHumidity' => $tempHumidity['humidity'],
                'temperatureStatus' => $tempHumidity['temperatureStatus'],
                'humidityStatus' => $tempHumidity['humidityStatus'],
                'powerStatus' => $tempHumidity['powerStatus']
            ];
    
            // Calculer la moyenne quotidienne actuelle
            if ($date === date('Y-m-d')) {
                $currentDay = [
                    'averageTemp' => array_sum($dataTemp) / count($dataTemp),
                    'averageHumidity' => array_sum($dataHumidity) / count($dataHumidity)
                ];
            }
    
            // Stocker les données mensuelles
            if (!isset($monthlyData[$month])) {
                $monthlyData[$month] = [
                    'payloads' => []
                ];
            }
    
            $monthlyData[$month]['payloads'][] = [
                'date' => $date,
                'temp' => $tempHumidity['temperature'],
                'humidity' => $tempHumidity['humidity']
            ];
        }

        foreach ($monthlyData as $month => $data) {
            $temps = [];
            $humidities = [];
            foreach ($data['payloads'] as $payload) {
                $temps[] = $payload['temp'];
                $humidities[] = $payload['humidity'];
            }
            $monthlyData[$month]['averageTemp'] = array_sum($temps) / count($temps);
            $monthlyData[$month]['averageHumidity'] = array_sum($humidities) / count($humidities);
        }
      
    
        return [
            'labels' => $labels,
            'temp' => $dataTemp,
            'humidity' => $dataHumidity,
            'dailyAverages' => $dailyAverages,
            'currentDay' => $currentDay,
            'monthlyData' => $monthlyData
        ];
    }
    
    
    

    public function processGPSEventData($payloadGPS) {
        $dataLatitude = [];
        $dataLongitude = [];
        $dataPositioningTime = [];
    
        foreach ($payloadGPS as $payload) {
            $scenario=Scenario::where('device_id', 'ffffff100000c836')->first();
            $payloadBinary = bin2hex($payload->payload);
            $GPS = $this->decodeGPSPayload($payloadBinary);
            $dataLatitude[] = $GPS['latitude'];
            $dataLongitude[] = $GPS['longitude'];
            $dataPositioningTime[] = $GPS['positioningTime'];

            // Check if the gps exceeds the threshold
            if ($scenario) {
                $min = $scenario->min;
                $max = $scenario->max;
                $normal = $scenario->normal;
            
                if ($GPS['latitude'] > $max) {
                    $title = "High latitude Alert";
                    $body = "The latitude has exceeded the maximum threshold  " ;
                } elseif ($GPS['latitude'] < $min) {
                    $title = "Low latitude Alert";
                    $body = "The latitude has dropped below the minimum threshold  " ;
                } elseif ($GPS['latitude'] > $normal) {
                    $title = "Elevated latitude Alert";
                    $body = "The latitude is above the normal range  " ;
                }

                if ($GPS['longitude'] > $max) {
                    $title = "High longitude Alert";
                    $body = "The longitude has exceeded the maximum threshold  " ;
                } elseif ($GPS['longitude'] < $min) {
                    $title = "Low longitude Alert";
                    $body = "The longitude has dropped below the minimum threshold  " ;
                } elseif ($GPS['longitude'] > $normal) {
                    $title = "Elevated longitude Alert";
                    $body = "The longitude is above the normal range  " ;
                }

            
                if (isset($title) && isset($body)) {
                    // Check if a notification with the same title and body already exists
                    $existingNotification = Notification::where('title', $title)
                                                        ->where('body', $body)
                                                        ->first();
            
                    if (!$existingNotification) {
                        // Create a new notification
                        $notification = new Notification();
                        $notification->title = $title;
                        $notification->body = $body;
                        $notification->device_id = "ffffff100000c836";

                        $notification->save();
                    }
                }
            }
        }
    
        return [
            'latitude' => $dataLatitude,
            'longitude' => $dataLongitude,
            'positioningTime' => $dataPositioningTime
        ];
    }

    public function index(Request $request)
    {
            $admin = auth()->user();
    
            $sites_admin = null;
            $sites_count = null;
    
            if ($admin->role == 'super-admin'){
                $sites_admin = Site::all();
                $sites_count = $sites_admin->count();
            }else{
                $sites_admin = DB::table('site_user')
                 ->where('user_id', $admin->id)
                 ->join('sites', 'site_user.site_id', '=', 'sites.id')
                 ->select('sites.*')
                 ->get();
                $sites_count = $sites_admin->count();
            }
          
            
          
    
            // Récupérer les passerelles associées aux sites de l'admin
            $gateways_admin = DB::table('site_user')
            ->where('user_id', $admin->id)
            ->join('site_gateway', 'site_user.site_id', '=', 'site_gateway.site_id')
            ->join('gateways', 'site_gateway.gateway_id', '=', 'gateways.gatewayEUI')
            ->select('gateways.*')
            ->get();
            $gateways_count = $gateways_admin->count();
    
            // Récupérer les appareils associés aux sites de l'admin
            $devices_admin = DB::table('site_user')
            ->where('user_id', $admin->id)
            ->join('site_device', 'site_user.site_id', '=', 'site_device.site_id')
            ->join('appdevices', 'site_device.device_id', '=', 'appdevices.devEUI')
            ->select('appdevices.*')
            ->get();
    
            $devices_count = $devices_admin->count();
    
            // Récupérer les utilisateurs ajoutés par l'admin
            $admin = auth()->user();
            $users_admin = User::where('added_by', $admin->id)->get();
            foreach ($users_admin as $user) {
                $site = DB::table('site_admin')
                    ->where('user_id', $user->id)
                    ->join('sites', 'site_admin.site_id', '=', 'sites.id')
                    ->select('sites.location', 'sites.created_at', 'sites.updated_at', 'sites.id')
                    ->groupBy('sites.id')
                    ->first();
        
                $user->site = $site;
                }  
            $users_super_admin = User::whereIn('users.role', ['admin', 'user'])
            ->join('users as admin', 'users.added_by', '=', 'admin.id')
            ->leftJoin('site_admin', 'users.id', '=', 'site_admin.user_id')
            ->leftJoin('sites', 'site_admin.site_id', '=', 'sites.id')
            ->select('users.*', 'admin.name as added_by_name', 'sites.location as site_name')
            ->get();
            
            $users_count = $users_admin->count();
        
        // Vérifier si une sélection de site a été effectuée
        $selectedSiteId = $request->input('selectedSiteId');
        $selectedSite = null ;
        $users_select = null ;
        $users_select_count = null ;
        $gateways_select = null ;
        $gateways_select_count = null ;
        $devices_select = null ;
        $devices_select_count = null ; 
        $latitude = null ; 
        $longitude = null ; 
        $waterLevels[] = null ;
        $temperatureData[] = null ;
        $gpsData[] = null ;
    
        if ($selectedSiteId) {
            
            // Rechercher le site sélectionné dans la liste des sites de l'admin
            $selectedSite = $sites_admin->firstWhere('id', $selectedSiteId);
            $latitude = $selectedSite->latitude;
            $longitude = $selectedSite->longitude;
            $users_select = DB::table('site_user')
                ->where('site_id', $selectedSite->id)
                ->join('users', 'site_user.user_id', '=', 'users.id')
                ->select('users.*')
                ->get();
            $users_select_count = $users_select->count();
    
            $gateways_select = DB::table('site_gateway')
                ->where('site_id', $selectedSite->id)
                ->join('gateways', 'site_gateway.gateway_id', '=', 'gateways.gatewayEUI')
                ->select('gateways.*')
                ->get();
            $gateways_select_count = $gateways_select->count();
    
            $devices_select = DB::table('site_device')
                ->where('site_id', $selectedSite->id)
                ->join('appdevices', 'site_device.device_id', '=', 'appdevices.devEUI')
                ->select('appdevices.*')
                ->get();
            $devices_select_count = $devices_select->count();
            foreach( $devices_select as $device){
    
                if ($device->devEUI == 'ffffff100000d135'){
                    $waterLevels = $this->processWaterLevelEventData($this->getWaterLevelPayload('ffffff100000d135'));
                }
                elseif ($device->devEUI == 'ffffff100000b745'){
                    $temperatureData = $this->processTempHumidityEventData($this->getTempHumidityPayload('ffffff100000b745'));
                }
                elseif ($device->devEUI == 'ffffff100000c836'){
                    $gpsData = $this->processGPSEventData($this->getGPSPayload('ffffff100000c836'));
    
                }
            }
           
    
            return view('dashboard', compact( 'waterLevels', 'longitude','latitude','gateways_select_count','gateways_select','devices_select_count','devices_select','users_select','users_select_count','selectedSite', 'selectedSiteId', 'temperatureData', 'gpsData','users_super_admin' , 'users_admin' ,'users_count', 'sites_admin' ,'sites_count', 'gateways_admin','gateways_count', 'devices_admin' , 'devices_count'));
    
        
        } 
        
       
       
    
        if($admin->role == 'super-admin'){
        $waterLevels = $this->processWaterLevelEventData($this->getWaterLevelPayload('ffffff100000d135'));
        $temperatureData = $this->processTempHumidityEventData($this->getTempHumidityPayload('ffffff100000b745'));
        $gpsData = $this->processGPSEventData($this->getGPSPayload('ffffff100000c836'));
    }
        else{
            foreach( $devices_admin as $device){
    
                if ($device->devEUI == 'ffffff100000d135'){
                    $waterLevels = $this->processWaterLevelEventData($this->getWaterLevelPayload('ffffff100000d135'));
                }
                elseif ($device->devEUI == 'ffffff100000b745'){
                    $temperatureData = $this->processTempHumidityEventData($this->getTempHumidityPayload('ffffff100000b745'));
                }
                elseif ($device->devEUI == 'ffffff100000c836'){
                    $gpsData = $this->processGPSEventData($this->getGPSPayload('ffffff100000c836'));
    
                }
            }
        }
    
        return view('dashboard', compact( 'waterLevels', 'longitude','latitude','gateways_select_count','gateways_select','devices_select_count','devices_select','users_select','users_select_count','selectedSite', 'selectedSiteId', 'temperatureData', 'gpsData','users_super_admin' , 'users_admin' ,'users_count', 'sites_admin' ,'sites_count', 'gateways_admin','gateways_count', 'devices_admin' , 'devices_count'));
    
        }

    
        
    
    public function showChart()
    {
        $waterLevels = $this->processWaterLevelEventData($this->getWaterLevelPayload('ffffff100000d135'));
        $temperatureData = $this->processTempHumidityEventData($this->getTempHumidityPayload('ffffff100000b745'));
        $gpsData = $this->processGPSEventData($this->getGPSPayload('ffffff100000c836'));
        
        return response()->json([
            
            'waterLevels' => $waterLevels,
            'temperatureData' => $temperatureData,
            'gpsData' => $gpsData,
            
            
        ]);
    }

}

