<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gateways = DB::table('gateways')
            ->orderByRaw('1')
            ->get();
            
        return view('Gateway.listGateway', compact('gateways'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Gateway.addGateway');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gatewayEUI' => [
                'required',
                'string',
                'unique:gateways,gatewayEUI', // ensure that the gatewayEUI is unique in the gateways table
            ],
            'ipAddr' => [
                'required',
                'string',
                'ip' // ensure that the ipAddr is a valid IP address
            ],
            'udpPort' => [
                'required',
                'numeric',
                'between:1,99999' // ensure that the udpPort is a number between 1 and 9999
            ],
            'photo' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048'
            ]
        ]);

        $file = $request->file('photo');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public', $filename);
        $url = Storage::url($filename);

        DB::table('gateways')->insert([
            'gatewayEUI' => $validatedData['gatewayEUI'],
            'ipAddr' => $validatedData['ipAddr'],
            'udpPort' => $validatedData['udpPort'],
            'photo' => $url,
        ]);

        return redirect('list-gateway')->with('message', "New gateway added successfully");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gateway = DB::table('gateways')->where('gatewayEUI', '=', $id)->first();
        return view('Gateway.edit-gateway', compact('gateway'));
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
        $validatedData = $request->validate([
            'ipAddr' => [
                'required',
                'string',
                'ip' // ensure that the ipAddr is a valid IP address
            ],
            'udpPort' => [
                'required',
                'numeric',
                'between:1,99999' // ensure that the udpPort is a number between 1 and 9999
            ],
            'photo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048'
            ]
        ]);
    
        $gateway = DB::table('gateways')->where('gatewayEUI', $id)->first();
    
        $ipAddr = $request->input('ipAddr');
        $udpPort = $request->input('udpPort');
    
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public', $filename);
            $url = Storage::url($filename);
    
            // Delete the old photo from the disk if it exists
            Storage::delete($gateway->photo);
    
            DB::table('gateways')
                ->where('gatewayEUI', $id)
                ->update([
                    'ipAddr' => $ipAddr,
                    'udpPort' => $udpPort,
                    'photo' => $url,
                ]);
        } else {
            DB::table('gateways')
                ->where('gatewayEUI', $id)
                ->update([
                    'ipAddr' => $ipAddr,
                    'udpPort' => $udpPort,
                ]);
        }
    
        return redirect('list-gateway')->with('message', "Gateway updated successfully");
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gateway = DB::table('gateways')->where('gatewayEUI', $id)->first();
        Storage::delete($gateway->photo);
        DB::table('gateways')->where('gatewayEUI', '=', $id)->delete();

        return back()->with('message', "Gateway deleted successfully");
    }
}