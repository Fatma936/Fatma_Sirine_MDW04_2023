<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class NetDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $netdevices =DB::table('netdevices')->select('*')->get();
        return view ('netDevice.list-netdevices', compact('netdevices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('netDevice.add-netdevice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // Validate input
          $validatedData = $request->validate([
            'devEUI' => 'required|regex:/^[a-fA-F0-9]{16}$/|unique:netdevices',
            'activationMode' => 'nullable',
            'nwkSKey' => 'nullable|string|size:16',
            'devAddr' => 'nullable|numeric|digits_between:1,20' ,
            'devNonceBlackList' => 'nullable|string|size:16',
            'fCntUp' => 'nullable|string|size:16' ,
            'fCntDown' => 'nullable|string|size:16',
        
        ]);

        // convert the values before inserting into the database
        $nwkSKeyHash = hex2bin($validatedData['nwkSKey']);
        $devNonceBlackListHash = hex2bin($validatedData['devNonceBlackList']);        
        $fCntUpHash = hex2bin($validatedData['fCntUp']);
        $fCntDownHash = hex2bin($validatedData['fCntDown']);

        DB::table('netdevices')->insert([
            'devEUI' => $validatedData['devEUI'],
            'activationMode' => implode(',', $validatedData['activationMode']),
            'appSrvRef' => 1,
            'nwkSKey' => $nwkSKeyHash,
            'devAddr' => $validatedData['devAddr'],
            'devNonceBlackList' => $devNonceBlackListHash,
            'fCntUp' => $fCntUpHash,
            'fCntDown' => $fCntDownHash,
            'receiveDelay' => 2,
            'powerCode' => 0,
            'downRequest' =>0,
        ]);
        
        return redirect('list-NetDevice')->with('message',"New netdevice added Successfully");
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
        $netdevice = DB::table('netdevices')->where('devEUI', '=', $id)->first();
        $hexdevNonceBlackList = substr(bin2hex($netdevice->devNonceBlackList), 0, 16);
        $hexnwkSKey = substr(bin2hex($netdevice->nwkSKey), 0, 16);
        $hexfCntUp = substr(bin2hex($netdevice->fCntUp), 0, 16);
        $hexfCntDown = substr(bin2hex($netdevice->fCntDown), 0, 16);

        return view('netDevice.update-netdevice',compact('netdevice','hexdevNonceBlackList','hexnwkSKey','hexfCntUp','hexfCntDown'));
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
        // Validate input
        $validatedData = $request->validate([
            'activationMode' => 'nullable',
            'nwkSKey' => 'nullable|string|size:16',
            'devAddr' => 'nullable|numeric|digits_between:1,20' ,
            'devNonceBlackList' => 'nullable|string|size:16',
            'fCntUp' => 'nullable|string|size:16' ,
            'fCntDown' => 'nullable|string|size:16',
        
        ]);

        // convert the values before inserting into the database
        $nwkSKeyHash = hex2bin($validatedData['nwkSKey']);
        $devNonceBlackListHash = hex2bin($validatedData['devNonceBlackList']);        
        $fCntUpHash = hex2bin($validatedData['fCntUp']);
        $fCntDownHash = hex2bin($validatedData['fCntDown']);

        DB::table('netdevices')
        ->where('devEUI', $id)
        ->update([
            'activationMode' => implode(',', $validatedData['activationMode']),
            'nwkSKey' => $nwkSKeyHash,
            'devAddr' => $validatedData['devAddr'],
            'devNonceBlackList' => $devNonceBlackListHash,
            'fCntUp' => $fCntUpHash,
            'fCntDown' => $fCntDownHash,
        ]);
    
        return redirect('list-NetDevice')->with('success', 'NetDevice updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('netdevices')->where('devEUI', '=', $id)->delete();
        return back()->with('message',"netdevice deleted Successfully");
    
    }
}
