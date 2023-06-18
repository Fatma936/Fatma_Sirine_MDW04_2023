<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\ImageDevice;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
class AppDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $devices = DB::table('appdevices')
        ->leftJoin('images_device', 'appdevices.devEUI', '=', 'images_device.device_id')
        ->select('appdevices.*', 'images_device.image_path')
        ->get();

   

    $appdevices = DB::table('appdevices')->select('*')->get();;
    return view('appDevice.list-appdevices', compact('appdevices', 'devices'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appDevice.add-appdevice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     
     public function store(Request $request)
     {
        $url = null ;
        
         // Get the uploaded file
         $file = $request->file('image');
         // Generate a unique filename for the image
         if ($file != null) {
             $filename = uniqid() . '.' . $file->getClientOriginalExtension();
             // Move the uploaded file to the "storage/app/public" directory
             $path = $file->storeAs('public', $filename);
             // Get the full URL of the stored image
             $url = Storage::url($filename);
         }
     
                // Validation des champs
            $validator = Validator::make($request->all(), [
                'devEUI' => ['required', 'regex:/^[a-fA-F0-9]{16}$/', 'unique:appdevices'],
                'activationMode' => ['required', 'array'],
                'activationMode.*' => ['in:otaa,abp'],
                'devAddr' => ['nullable', 'integer', 'digits_between:1,20'],
                'appKey' => ['nullable', 'size:32'],
                'appSKey' => ['nullable', 'size:16'],
                'image' => ['nullable', 'file']
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
        
     
         $appDeviceId = DB::table('appdevices')->insertGetId([
             'devEUI' => $request->devEUI,
             'activationMode' => implode(',', $request->activationMode),
             'appEUI' => 1,
             'devAddr' => $request->devAddr,
             'appKey' => $request->appKey ? hex2bin($request->appKey) : null,
             'appSKey' => $request->appSKey ? hex2bin($request->appSKey) : null,
             'serverId' => 1
         ]);
     
         if ($url != null) {
             DB::table('images_device')->insert([
                 'device_id' => $request->devEUI,
                 'image_path' => $url,
                 'created_at' => now(),
                 'updated_at' => now()
             ]);
         }
     
         return redirect('appDevice.list-appdevices')->with('success', 'Nouvel appdevice ajouté avec succès.');
     }
     


     

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appdevice =DB::table('appdevices')->where('devEUI', '=', $id)->first();
        $appKey = substr(bin2hex($appdevice->appKey), 0, 32);
        $appSKey = substr(bin2hex($appdevice->appSKey), 0, 16);

        return view('appDevice.edit-appdevice',compact('appdevice','appKey','appSKey'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // Validate input fields
        $validatedData = $request->validate([
            'activationMode' => 'nullable',
            'devAddr' => 'nullable|numeric|digits_between:1,20',
            'appKey' => 'nullable|string|size:32',
            'appSKey' => 'nullable|string|size:16',
        ]);
         // convert the appKey and appSKey before inserting into the database
         $appKeyHash = hex2bin($validatedData['appKey']);
         $appSKeyHash = hex2bin($validatedData['appSKey']);        
         
        
        // Update device data in the database
        DB::table('appdevices')
        ->where('devEUI', '=', $id)
        ->update([
            'activationMode' => implode(',', $validatedData['activationMode']),
            'devAddr' => $validatedData['devAddr'],
            'appKey' => $appKeyHash,
            'appSKey' => $appSKeyHash,
        ]);
        
        return redirect('list-AppDevice')->with('message', 'appdevice updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('appdevices')->where('devEUI', '=', $id)->delete();
        return back()->with('message',"appdevice deleted Successfully");
    
    }
}
