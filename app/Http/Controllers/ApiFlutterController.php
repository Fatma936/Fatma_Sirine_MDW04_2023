<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;

class ApiFlutterController extends Controller
{
    public function User()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function login(Request $R)
{
    $user = User::where('email', $R->email)->first();

    if ($user != null && Hash::check($R->password, $user->password)) {
        $token = $user->createToken('Personal Access Token')->plainTextToken;

        $waterLevels[] = null ;
        $temperatureData[] = null ;
        $gpsData[] = null ;
        $sites_admin = DB::table('site_user')
            ->where('user_id', $user->id)
            ->join('sites', 'site_user.site_id', '=', 'sites.id')
            ->select('sites.*')
            ->get();
        $sites_count = $sites_admin->count();

        // Récupérer les passerelles associées aux sites de l'admin
        $gateways_admin = DB::table('site_user')
            ->where('user_id', $user->id)
            ->join('site_gateway', 'site_user.site_id', '=', 'site_gateway.site_id')
            ->join('gateways', 'site_gateway.gateway_id', '=', 'gateways.gatewayEUI')
            ->select('gateways.*')
            ->get();
        $gateways_count = $gateways_admin->count();

        // Récupérer les appareils associés aux sites de l'admin
        $devices_admin = DB::table('site_user')
            ->where('user_id', $user->id)
            ->join('site_device', 'site_user.site_id', '=', 'site_device.site_id')
            ->join('appdevices', 'site_device.device_id', '=', 'appdevices.devEUI')
            ->select('appdevices.*')
            ->get();
        $devices_count = $devices_admin->count();

        // Charger les notifications liées à l'utilisateur
        $deviceIds = $devices_admin->pluck('devEUI');
        $notifications = Notification::whereIn('device_id', $deviceIds)->get();

        $DeviceeventsController = new DeviceeventsController();
        foreach( $devices_admin as $device){

            if ($device->devEUI == 'ffffff100000d135'){
                $waterLevels = $DeviceeventsController->processWaterLevelEventData($DeviceeventsController->getWaterLevelPayload('ffffff100000d135'));
            }
            elseif ($device->devEUI == 'ffffff100000b745'){
                
                $temperatureData = $DeviceeventsController->processTempHumidityEventData($DeviceeventsController->getTempHumidityPayload('ffffff100000b745'));
            }
            elseif ($device->devEUI == 'ffffff100000c836'){
                $gpsData = $DeviceeventsController->processGPSEventData($DeviceeventsController->getGPSPayload('ffffff100000c836'));

            }
        } 
        $response = [
            'status' => 200,
            'token' => $token,
            'user' => $user,
            'sites' => $sites_count,
            'gateways' => $gateways_count,
            'devices' => $devices_count,
            'notifications' => $notifications,
            'waterLevels'=>$waterLevels,
            'teperatureData'=>$temperatureData,
            'gpsData'=>$gpsData,
            'message' => 'Successfully Login! Welcome Back'
        ];

        return response()->json($response);
    } else if ($user == null) {
        $response = ['status' => 500, 'message' => 'No account found with this email'];
        return response()->json($response);
    } else {
        $response = ['status' => 500, 'message' => 'Wrong email or password! Please try again'];
        return response()->json($response);
    }
}


}
