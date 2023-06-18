<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewUserNotification;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =User::where('role', 'admin')->get();
        return view ('admin.list_admin', compact('users'));
<<<<<<< HEAD

    }

    public function indexUser()
    {
        $admin = Auth::user();
        $users =User::where('added_by', $admin->id)->get();
        return view ('User.List_users', compact('users'));
=======
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
        return view('admin.add-new-admin');
    }

    public function createUser()
    {
        return view('User.Add_new_user');
=======
        return view('admin.form-input-group');
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
        $sup_admin = Auth::user();
    
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->role = "admin";
        $user->added_by = $sup_admin->id;
        $user->save();
    
        $password = $request->input('password');
        $user->email = $request->input('email');
    
        $mail = new NewUserNotification($user, $password);
        Mail::to($user->email)->send($mail);
    
        return redirect('list-admin')->with('message', "New admin added successfully");
    }
    

    public function storeUser(Request $request)
    {
        $admin = Auth::user();

        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|email|unique:users',
        ], [
            'email.dns' => 'Please enter a valid email address.',
        ]);
        
            $user=new User;
<<<<<<< HEAD
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->password=bcrypt($request->input('password'));
            $user->role=$request->role="User";
            $user->added_by=$admin->id;
            $user->save();
            
            return redirect('list-user')->with('message',"New user added Successfully");
=======
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$request->password;
            $user->role=$request->role='admin';
            $user->save();
            
            return back()->with('message',"New admin added Successfully");
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
      
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
<<<<<<< HEAD
        return view('admin.update-admin',compact('user'));
=======
        return view('admin.form-file-upload',compact('user'));
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
    }

    public function edituser($id)
    {
        $user=User::find($id);
        return view('User.Update_user',compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        // Validate the input fields
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        // Get the user by ID
        $user = User::find($id);

        // Update the user with the new data
        $user->name= $request->input('name');
=======

        $user= User::find($id);
            $user->name= $request->input('name');
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
            $user->email=$request->input('email');
            $user->password=$request->input('password');
            $user->role=$request->input('role');
            $user->update();
<<<<<<< HEAD
            
            // Redirect to the user's profile page with a success message
            return Redirect('list-admin')->with('message',"user updated Successfully");
    }

    public function updateuser(Request $request, $id)
    {
        // Validate the input fields
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        // Get the user by ID
        $user = User::find($id);

        // Update the user with the new data
        $user->name= $request->input('name');
            $user->email=$request->input('email');
            $user->password=$request->input('password');
            $user->role=$request->input('role');
            $user->update();
            
            // Redirect to the user's profile page with a success message
            return Redirect('list-user')->with('message',"user updated Successfully");
=======
                        
            return back()->with('message',"user updated Successfully");
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
<<<<<<< HEAD
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('message',"user deleted Successfully");
=======
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('message',"user deleted Successfully");
    }
    
    public function deleteSiteFromAdmin($adminId, $siteId)
    {
        $admin = User::findOrFail($adminId-1);
        $admin->sites()->detach($siteId);
        return redirect()->back()->with('message', 'Site removed from admin successfully');
    }

    public function showAdminSites($adminId)
    {
        $admin = User::findOrFail($adminId);
        $sites = $admin->sites;
        return view('admin.liste_site_admin', compact('admin', 'sites'));
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
    }
}
