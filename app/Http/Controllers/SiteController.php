<?php

namespace App\Http\Controllers;
use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\DB;

<<<<<<< HEAD
=======

>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites =Site::All();
        return view ('Site.list_site', compact('sites'));
<<<<<<< HEAD

    }
    /**
     *list of users
     * 
     * 
     */
    public function indexuser()
    {
        $user_id = auth()->user()->id;
       
        $sites =Site::All();
        return view ('Site.list_site', compact('sites'));

    }
  
     /**
     *list of admin && list of site
     * 
     * 
     */
    public function get_Site_Admin()
    {
        $sites =Site::All();
        $users =User::where('role', 'admin')->get();
        return view ('Site-user.affect_site_to_admin', compact('sites','users'));
    }

    /**
     *list of admin && list of site
     * 
     * 
     */
    public function get_Site_User()
    {
        $user_id = auth()->user()->id;

        $sites = DB::table('site_user')
        ->where('user_id',$user_id)
        ->join('sites', 'site_user.site_id', '=', 'sites.id')
        ->select('sites.location','sites.created_at','sites.updated_at','sites.id')
        ->groupBy('sites.id')
        ->get();

        $users = User::where('added_by', $user_id)->get();
        return view ('Sites-to-admin.affect_site_to_user', compact('sites','users'));
    }
    
     /**
    *create record in site_admin:
    *
    *
    */
    public function assign_User(Request $request)
    {
        $site_id = $request->input('site_id');
        $user_ids = $request->input('admin_ids');
        
        foreach ($user_ids as $user_id) {
            DB::table('site_admin')->insert([
                'site_id' => $site_id,
                'user_id' => $user_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        return redirect('assigned-site-user')->with('message', 'Site assigned to admins successfully');
    }

    /**
     *list of sites attached with admin in session
     * 
     * 
     */
    public function get_Admin_Sites()
{
    $user_id = auth()->user()->id;

    $users = User::where('added_by', $user_id)->get();

    foreach ($users as $user) {
        $site = DB::table('site_admin')
            ->where('user_id', $user->id)
            ->join('sites', 'site_admin.site_id', '=', 'sites.id')
            ->select('sites.location', 'sites.created_at', 'sites.updated_at', 'sites.id')
            ->groupBy('sites.id')
            ->first();

        $user->site = $site;
    }

    return view('Sites-to-admin.list_site_of_admin', compact('users'));
}


    
     /**
    *create record in site_user:
    *
    *
    */
    public function assign_Admin(Request $request)
    {
        $site_id = $request->input('site_id');
        $admin_ids = $request->input('admin_ids');
        
        $site = Site::find($site_id);
        $site->users()->attach($admin_ids, ['created_at' => now(), 'updated_at' => now()]);
        return redirect('assigned-site')->with('message', 'Site assigned to admins successfully');
    }
    /**
    *Display a list of site_user:
    *
    *
    */
    public function get_Assigned_Site()
    {
        $sites = DB::table('site_user')
         ->join('sites', 'site_user.site_id', '=', 'sites.id')
         ->join('users', 'site_user.user_id', '=', 'users.id')
         ->select('sites.location', DB::raw('GROUP_CONCAT(users.name SEPARATOR ", ") as admin_names'), 'site_user.created_at', 'site_user.updated_at','site_user.id','site_user.site_id')
         ->orderBy('site_user.created_at')
         ->groupBy('sites.id')
         ->get();

        return view ('Site-user.list_affectation', compact('sites'));
    }
    /**
    *Display a list of site_admin:
    *
    *
    */
    public function get_Assigned_Site_to_user()
    {
        $sites = DB::table('site_admin')
        ->join('sites', 'site_admin.site_id', '=', 'sites.id')
        ->join('users', 'site_admin.user_id', '=', 'users.id')
        ->select('sites.location','users.name','site_admin.created_at','site_admin.updated_at','site_admin.site_id','site_admin.id','site_admin.user_id')
        ->get();

        return view ('Sites-to-admin.list_affectation_of_users_site', compact('sites'));
    }


     /**
    *edit a list of site_user:
    *
    *
    */
    public function editAdminSite($id)
    {
        // Get the site_user association by ID
        $site_user = DB::table('site_user')->find($id);
        // Get the site associated with the site_user
        $selected_site = Site::find($site_user->site_id);
        // Get all users who are not already associated with the site
        $admins = User::where('role', 'admin')->get();
        // Get all users who are associated with the selected site
        $selected_admins = $selected_site->users;
        // Get all sites except for the selected one
        $sites = Site::where('id', '<>', $selected_site->id)->get();  
    
        return view('Site-user.update_Site_Admin', compact('selected_site', 'selected_admins','sites','admins','site_user'));
    }
    
    /**
    *update a list of site_user:
    *
    *
    */
    public function updateAdminSites(Request $request, $id)
    {
        $site_id = $request->input('site_id');
        $admin_ids = $request->input('admins');
        $created_at = DB::table('site_user')->where('site_id', $site_id)->value('created_at');
        
        DB::beginTransaction();
        DB::table('site_user')->where('site_id', $site_id)->delete();
        
        foreach($admin_ids as $admin_id) {
            DB::table('site_user')->insert([
                'site_id' => $site_id,
                'user_id' => $admin_id,
                'created_at' => $created_at,
                'updated_at' => now()
            ]);
        }
        
        DB::commit();
        return redirect('assigned-site')->with('message', 'Updated assigned site to admins successfully');
    }

     /**
    *delit a record of site_user:
    *
    *
    */
    public function deleterecord($id)
    {
        $site = Site::find($id);
        $site->users()->detach();

        return redirect()->back()->with('message', 'Site removed from admin successfully');
    

    }

     /**
    *delit a record of admin_user:
    *
    *
    */
    public function deleteRecordFromaSite_admin($id)
    {
        DB::table('site_user')
        ->where('id', $id)
        ->delete();
        return redirect()->back()->with('message', 'Site removed from user successfully');
    

=======
    }

    public function getSiteAdmin()
    {
        $sites =Site::All();
        $users =User::where('role', 'admin')->get();
        return view ('Site.affectation_site', compact('sites','users'));
    }

    public function getAssignedSite()
    {
        
        $sites = Site::has('users')->get();

        return view ('Site.list_affectation', compact('sites'));
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        return view('Site.add-new-site');

=======
        return view('Site.form-input-group');
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $site=new Site;
        $site->location=$request->location;
        $site->longitude=$request->longitude;
        $site->latitude=$request->latitude;
        $site->save();
        
        return redirect('list-site')->with('message',"New Site weee added Successfully");
  
    }

=======
       
        $site=new Site;
        $site->location=$request->location;
        $site->save();
        
        return back()->with('message',"New Site weee added Successfully");
  
    }

    public function assignAdmin(Request $request)
    {
        $site_id = $request->input('site_id');
        $admin_ids = $request->input('admin_ids');
        $site = Site::findOrFail($site_id);
        $site->users()->sync($admin_ids);
        return redirect('assigned-site')->with('message', 'Site assigned to admins successfully');
    }
    
    public function updateAdminSites(Request $request, $id)
    {

        $siteId = $request->input('site_id');
        $admin_ids = $request->input('admins');
        $site = Site::findOrFail($siteId);
        $site->users()->sync($admin_ids);
        return redirect('assigned-site')->with('message', 'Updated assigned site to admins successfully');

    }

    public function editAdminSite($id)
    {
    
        $selected_site = Site::findOrFail($id);
        $selected_admins = $selected_site->users()->get();
        $sites = Site::all();
        $admins = User::where('role', 'admin')->get();
    
        return view('Site.updateSiteAdmin', compact('selected_site', 'selected_admins','sites','admins'));
    }


>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
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
        $site=Site::find($id);
<<<<<<< HEAD
        return view('Site.update-site',compact('site'));
=======
        return view('Site.form-file-upload',compact('site'));
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
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
        $site= Site::find($id);
            $site->location= $request->input('location');
<<<<<<< HEAD
            $site->longitude=$request->input('longitude');
            $site->latitude=$request->input('latitude');
            $site->update();
                        
            return redirect('Site.list-site')->with('message',"site updated Successfully");
   
    }

=======
            $site->update();
                        
            return back()->with('message',"site updated Successfully");
   
    }

    public function deleterecord($id)
    {
        $site = Site::find($id);
        $site->users()->detach();
        return redirect()->back()->with('message', 'Site removed from admin successfully');
    

    }

>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site = Site::findOrFail($id);
        $site->delete();
        return back()->with('message',"site deleted Successfully");
   
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
