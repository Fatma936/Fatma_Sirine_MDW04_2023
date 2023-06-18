<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\DeviceeventsController;


class DashboardAdminController extends Controller
{
    public function index()
    {
        // Récupérer l'id de l'admin connecté
        $adminId = Auth::id();

        // Récupérer tous les sites associés à l'admin
        $sites = DB::table('site_user')
        ->join('sites', 'site_user.site_id', '=', 'sites.id')
        ->where('site_user.user_id', $adminId)
        ->select('sites.id', 'sites.location')
        ->get();
        // Afficher la vue du dashboard
        return view('TestDashboard', compact('sites'));
    }

    public function showSiteData(Request $request)
    {
        // Récupérer l'id du site sélectionné
        $siteId = $request->input('site_id');

        // Récupérer les gateways associées à ce site
        $gateways = DB::table('site_gateway')->where('site_id', $siteId)->get();

        // Récupérer tous les devices associés à ces gateways
        $devices = DB::table('site_device')
            ->whereIn('site_id', $siteId)
            ->select('devEUI')
            ->get();

        // Initialiser un tableau pour stocker les données de chaque type de capteur
        $data = [
            'waterLevels' => [],
            'gps' => [],
            // Ajouter d'autres types de capteurs si nécessaire
        ];

        // Parcourir tous les devices et stocker les données en fonction de leur type
        foreach ($devices as $device) {
            if($device->devEUI == ffffff100000d135) {
                    $payloads = DB::table('deviceevents')->where('devEUI', 'ffffff100000d135' )->select('payload','time')->get();
                    
                    $DeviceeventsController = new DeviceeventsController();

                    //appler la fonction 
                    $waterLevels = $DeviceeventsController->showChart($payloads);


                }
        
        

        // Afficher la vue avec les données stockées dans $data
        return view('siteData', compact('data'));
    }

    // Fonction pour décoder la charge utile du capteur de niveau d'eau
}}
