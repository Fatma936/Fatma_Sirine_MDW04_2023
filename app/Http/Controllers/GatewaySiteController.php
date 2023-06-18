<?php

namespace App\Http\Controllers;
use App\Models\Site;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GatewaySiteController extends Controller
{
    public function get_Site_Gateway()
    {
        $sites =Site::All();
        $gateways = DB::table('gateways')->get();
        return view ('gateway_site.assigne_sito_to_gateways', compact('sites','gateways'));
    }

    public function assign_Gateway(Request $request)
    {
        $site_id = $request->input('site_id');
        $user_ids = $request->input('gateway_ids');
        
        foreach ($user_ids as $gateway_id) {
            DB::table('site_gateway')->insert([
                'site_id' => $site_id,
                'gateway_id' => $gateway_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        return redirect('assigned-site-gateway')->with('message', 'Site assigned to admins successfully');
    }

    public function get_Assigned_Site_to_gateway()
    {
        $sites = DB::table('site_gateway')
        ->join('sites', 'site_gateway.site_id', '=', 'sites.id')
        ->join('gateways', 'site_gateway.gateway_id', '=', 'gateways.gatewayEUI')
        ->select('sites.location','gateways.gatewayEUI','site_gateway.created_at','site_gateway.updated_at','site_gateway.site_id','site_gateway.id','site_gateway.gateway_id')
        ->get();

        return view ('gateway_site.list_affectation_of_site_gateways', compact('sites'));
    }

    public function deleteRecordFromaSite_gateway($id)
    {
        DB::table('site_gateway')
        ->where('id', $id)
        ->delete();
        return redirect()->back()->with('message', 'gateway removed from site successfully');

    }

}
