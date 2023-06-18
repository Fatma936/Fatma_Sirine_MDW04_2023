<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class SiteDeviceController extends Controller
{
    public function get_Site_Device()
    {
        $deviceTypes = [];
    
        $sites =Site::All();
        $devices = DB::table('appdevices')->get();
         // Loop through all devices and retrieve data for each type of device
         
         foreach ($devices as $device) {
            // Determine the type of the current device based on its devEUI
            if ($device->devEUI == 'ffffff100000d135') {
                $deviceTypes[1] = 'AN-203A Water Level Monitor';
            } elseif ($device->devEUI == 'ffffff100000b745') {
                $deviceTypes[2] = 'AN-103A Temp/Humidity Sensor';
            } else {
                $deviceTypes[3] = 'AN-122-A03 GPS Tracker';
            }
        }
            
        return view ('device_site.assigne_sito_to_devices', compact('sites','devices','deviceTypes'));
    }
            

    public function assign_Device(Request $request)
    {
        $site_id = $request->input('site_id');
        $device_ids = $request->input('device_ids');
        
        foreach ($device_ids as $device_type) {
        // Look up the device ID based on the device type
        if ($device_type === 'waterLevel') {
            $device_id = DB::table('appdevices')
                ->where('devEUI', 'ffffff100000d135')
                ->value('devEUI');
        } elseif ($device_type === 'gps') {
            $device_id = DB::table('appdevices')
                ->where('devEUI', 'ffffff100000b745')
                ->value('devEUI');
        } else {
            $device_id = DB::table('appdevices')
                ->where('devEUI', 'ffffff100000c836')
                ->value('devEUI');
        }
        
        // If a device ID was found for the current device type, save the relationship in the database
        if ($device_id !== null) {
            DB::table('site_device')->insert([
                'site_id' => $site_id,
                'device_id' => $device_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
    
    return redirect('assigned-site-device')->with('message', 'Devices assigned to site successfully');
}


    public function get_Assigned_Site_to_device()
    {
        $sites = DB::table('site_device')
        ->join('sites', 'site_device.site_id', '=', 'sites.id')
        ->join('appdevices', 'site_device.device_id', '=', 'appdevices.devEUI')
        ->select('sites.location','appdevices.devEUI','site_device.created_at','site_device.updated_at','site_device.site_id','site_device.id','site_device.device_id')
        ->get();

        return view ('device_site.list_affectation_of_site_devices', compact('sites'));
    }

    public function deleteRecordFromaSite_device($id)
    {
        DB::table('site_device')
        ->where('id', $id)
        ->delete();
        return redirect()->back()->with('message', 'device removed from site successfully');

    }

}