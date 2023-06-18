<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteController;
<<<<<<< HEAD
use App\Http\Controllers\GatewayController;
use App\Http\Controllers\AppDeviceController;
use App\Http\Controllers\NetDeviceController;
use App\Http\Controllers\DeviceeventsController;
use App\Http\Controllers\GatewaySiteController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\SiteDeviceController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ScenarioController;
use App\Http\Controllers\ApiFlutterController;

=======
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home');
Route::view('login', 'auth.login');

Route::middleware(['auth'])->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Set a unique name for the logout route
    Route::get('logout', function () {
        auth()->logout();
        Session()->flush();

<<<<<<< HEAD
        return redirect('/');
    })->name('custom-logout');

    // profile setting
    Route::post('updatePhoto', [ProfileController::class, 'updatePhoto']);
    Route::put('update-profile-user', [ProfileController::class, 'update_profile']);
    Route::get('profile-user', [ProfileController::class, 'show']);
=======
Route::view('/', 'auth.login');
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5

});

<<<<<<< HEAD
//Scenario
Route::get('add_scenario', [ScenarioController::class, 'create']);
Route::post('store_scenario', [ScenarioController::class, 'store']);
Route::get('list-scenarios', [ScenarioController::class, 'index']);
Route::get('edit-scenario/{id}', [ScenarioController::class, 'edit']);
Route::put('update-scenario/{id}', [ScenarioController::class, 'update']);
Route::delete('delete_scenario/{id}', [ScenarioController::class, 'destroy']);


Route::get('notifications', [NotificationController::class, 'index']);
Route::get('notifications/{id}', [NotificationController::class, 'show']);
Route::get('view-all-notifications', [NotificationController::class, 'View_All_Notifications']);


Route::get('dashboard', [DeviceeventsController::class, 'index'], function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('updateWater', [DeviceEventsController::class, 'updateWater'])->name('updateWater');

Route::get('api/dataa', [DeviceeventsController::class, 'getTempHumidityDataByDateRange']);

Route::get('api/data', [DeviceeventsController::class, 'showChart']);
=======
Route::get('logout', function ()
{
 auth()->logout();
 Session()->flush();

 return Redirect::to('/');
})->name('logout');
Route::group(['middleware' => 'auth'], function () {
    
    Route::get('add-site', [SiteController::class, 'create']);
    Route::post('store_site', [SiteController::class, 'store']);
    Route::get('list-site', [SiteController::class, 'index']);
    Route::get('edit-site/{id}', [SiteController::class, 'edit']);
    Route::put('update-site/{id}', [SiteController::class, 'update']);
    Route::delete('destroy-site/{id}', [SiteController::class, 'destroy']);
    Route::get('affect_site', [SiteController::class, 'getSiteAdmin']);
    Route::post('assign-site', [SiteController::class, 'assignAdmin']);
    Route::delete('/admin/{admin}/site/{site}', [UserController::class, 'deleteSiteFromAdmin']);
    Route::get('list-site-admin/{id}', [UserController::class, 'showAdminSites']);
    Route::get('assigned-site', [SiteController::class, 'getAssignedSite']);
    Route::get('edit-site-admin/{id}', [SiteController::class, 'editAdminSite']);
    Route::put('update-site-admin/{id}', [SiteController::class, 'updateAdminSites']);
    Route::delete('destroy-record/{id}', [SiteController::class, 'deleterecord']);

    
    

    

});


>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5

require __DIR__.'/auth.php';

Route::middleware(['auth' , 'role:admin'])->group(function () {
<<<<<<< HEAD
    //admin site
        Route::get('list-admin', [UserController::class, 'index']);
        Route::get('list-site-admin', [SiteController::class, 'get_Admin_Sites']);
        Route::get('affect_site_user', [SiteController::class, 'get_Site_User']);
        Route::get('assigned-site-user', [SiteController::class, 'get_Assigned_Site_to_user']);
        Route::post('assign-site-user', [SiteController::class, 'assign_User']);
        Route::delete('destroy-record-user/{id}', [SiteController::class, 'deleteRecordFromaSite_admin']);
    
        //user 
        Route::get('add-user', [UserController::class, 'createUser']);
        Route::post('store_user', [UserController::class, 'storeUser']);
        Route::get('list-user', [UserController::class, 'indexUser']);
        Route::get('edit-user/{id}', [UserController::class, 'edituser']);
        Route::put('update-user/{id}', [UserController::class, 'updateuser']);
        Route::delete('destroy-user/{id}', [UserController::class, 'destroy']);
    
    

    });
=======
    Route::get('add-admin', [UserController::class, 'create']);
    Route::post('store_admin', [UserController::class, 'store']);
    Route::get('list-admin', [UserController::class, 'index']);
    Route::get('edit-admin/{id}', [UserController::class, 'edit']);
    Route::put('update-admin/{id}', [UserController::class, 'update']);
    Route::delete('destroy-admin/{id}', [UserController::class, 'destroy']);

});
Route::get('/custom403', function () {
    return view('403');
})->name('custom403');
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5

Route::middleware(['auth' , 'role:super-admin'])->group(function () {
     //Manage_Admin
     Route::get('add-admin', [UserController::class, 'create']);
     Route::post('store_admin', [UserController::class, 'store']);
     Route::get('list-admin', [UserController::class, 'index']);
     Route::get('edit-admin/{id}', [UserController::class, 'edit']);
     Route::put('update-admin/{id}', [UserController::class, 'update']);
     Route::delete('destroy-admin/{id}', [UserController::class, 'destroy']);
     //Manage_Site
     Route::get('add-site', [SiteController::class, 'create']);
     Route::post('store_site', [SiteController::class, 'store']);
     Route::get('list-site', [SiteController::class, 'index']);
     Route::get('edit-site/{id}', [SiteController::class, 'edit']);
     Route::put('update-site/{id}', [SiteController::class, 'update']);
     Route::delete('destroy-site/{id}', [SiteController::class, 'destroy']);
     //Manage Site_user
  
     Route::get('affect_site', [SiteController::class, 'get_Site_Admin']);
     Route::post('assign-site', [SiteController::class, 'assign_Admin']);
     Route::get('assigned-site', [SiteController::class, 'get_Assigned_Site']);
     Route::get('edit-site-admin/{id}', [SiteController::class, 'editAdminSite']);
     Route::put('update-site-admin/{id}', [SiteController::class, 'updateAdminSites']);
     Route::delete('destroy-record/{id}', [SiteController::class, 'deleterecord']);

     //Gateway
     Route::get('add-Gateway', [GatewayController::class, 'create']);
     Route::post('store-Gateway', [GatewayController::class, 'store']);
     Route::get('list-gateway', [GatewayController::class, 'index']);
     Route::get('edit-gateway/{id}', [GatewayController::class, 'edit']);
     Route::put('update-gateway/{id}', [GatewayController::class, 'update']);
     Route::delete('destroy-gateway/{id}', [GatewayController::class, 'destroy']);

     

     //AppDevice
     Route::get('add-AppDevice', [AppDeviceController::class, 'create']);
     Route::post('store-AppDevice', [AppDeviceController::class, 'store']);
     Route::get('list-AppDevice', [AppDeviceController::class, 'index']);
     Route::delete('destroy-AppDevice/{id}', [AppDeviceController::class, 'destroy']);
     Route::get('edit-AppDevice/{id}', [AppDeviceController::class, 'edit']);
     Route::put('update-AppDevice/{id}', [AppDeviceController::class, 'update']);

      //NetDevice
      Route::get('add-NetDevice', [NetDeviceController::class, 'create']);
      Route::post('store-NetDevice', [NetDeviceController::class, 'store']);
      Route::get('list-NetDevice', [NetDeviceController::class, 'index']);
      Route::delete('destroy-NetDevice/{id}', [NetDeviceController::class, 'destroy']);
      Route::get('edit-NetDevice/{id}', [NetDeviceController::class, 'edit']);
      Route::put('update-NetDevice/{id}', [NetDeviceController::class, 'update']);
      
      

      //affect gateway to a site:
      Route::get('affect_site_gateway', [GatewaySiteController::class, 'get_Site_Gateway']);
      Route::get('assigned-site-gateway', [GatewaySiteController::class, 'get_Assigned_Site_to_gateway']);
      Route::post('assign-site-gateway', [GatewaySiteController::class, 'assign_Gateway']);
      Route::delete('destroy-record-gateway/{id}', [GatewaySiteController::class, 'deleteRecordFromaSite_gateway']);
  
      //affect device to a site:
      Route::get('affect_site_device', [SiteDeviceController::class, 'get_Site_Device']);
      Route::get('assigned-site-device', [SiteDeviceController::class, 'get_Assigned_Site_to_device']);
      Route::post('assign-site-device', [SiteDeviceController::class, 'assign_Device']);
      Route::delete('destroy-record-device/{id}', [SiteDeviceController::class, 'deleteRecordFromaSite_device']);
  

    });
    Route::get('/custom404', function () {
    return view('errors.404');
    })->name('custom404');



    
