<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function show()
    {
        $user_id = auth()->user()->id;
        $user = Auth::user();
        $profile = User::where('id', $user->id)->first();
        $admins = [];
        $users = [];
        $site_admin = null; // Initialize the variable

        if ($user->role == 'super-admin') {
            $admins = User::where('role', 'admin')->get();
            $users = User::where('role', 'user')->get();
             
        } elseif ($user->role == 'admin') {
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
                       
        }

          
                

        $tab = ($profile->role == 'super-admin') ? 'admins' : 'users';
        return view('profile.user-profile', compact('profile', 'admins', 'users', 'tab'));
    }




    public function update_profile(Request $request)
    {
        $user = Auth::user();

        $user->name = $user->name; 
        $user->email = $user->email; 
    
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        
        $user->save(); 
    
        return redirect()->back()->with('success', 'Profile updated successfully');
    }


    public function updatePhoto(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public', $imageName);

            $user = auth()->user();
            $user->image = $imageName;
            $user->save();

            return redirect()->back()->with('success', 'Image uploaded successfully.');
        }

        return redirect()->back()->with('error', 'Failed to upload image.');
    }
}