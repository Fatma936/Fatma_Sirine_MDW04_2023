<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;




class NotificationController extends Controller
{
    public function index(){
        $role=auth()->user()->role;
        $notifications = [];
        $unreadCount = 0; // Initialize the variable

        if ($role == "super-admin") {
            $notifications = Notification::all();
            $unreadCount = $notifications->whereNull('read_at')->count();
        }elseif($role == "admin"){
            $site_ids = DB::table('site_user')->where('user_id', auth()->user()->id)->pluck('site_id')->toArray();
            $device_ids = DB::table('site_device')->whereIn('site_id', $site_ids)->pluck('device_id')->toArray();
            $notifications = Notification::whereIn('device_id', $device_ids)->get();
            $unreadCount = $notifications->whereNull('read_at')->count();
        }elseif($role == "user"){
            $site_ids = DB::table('site_admin')->where('user_id', auth()->user()->id)->pluck('site_id')->toArray();
            $device_ids = DB::table('site_device')->whereIn('site_id', $site_ids)->pluck('device_id')->toArray();
            $notifications = Notification::whereIn('device_id', $device_ids)->get();
            $unreadCount = $notifications->whereNull('read_at')->count();
        }
    
        
        return response()->json([
        'notifications' => $notifications,
        'unread_count' => $unreadCount,

    ]);
    }

    public function show($id)
    {
        $notification = Notification::findOrFail($id);
    
        if ($notification->read_at === null) {
            $notification->read_at = Carbon::now();
            $notification->save();
        }
        
        return view('notifications.show', compact('notification'));
    }

    public function View_All_Notifications (){
        $notifications = Notification::all();

        return view('notifications.all_notifications', compact('notifications'));


    }

    public function markAllAsRead()
    {
        $notifications = Notification::all();

        foreach ($notifications as $notification) {
            $notification->read_at = Carbon::now();
            $notification->save();
        }
        return redirect()->route('dashboard')->with('success', 'All notifications marked as read');

    }


    
}