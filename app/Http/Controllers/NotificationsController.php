<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //Auth::user()->notifications->markAsRead();
        //markAsRead(); moze oznaczac notifikacji wszystkie lub wybrane jak w metodzie update
        return view('notifications.index');
    }
    
    public function update($id)
    {
        DatabaseNotification::where([
            'id' => $id,
            'notifiable_id' => Auth::id()
        ])->firstOrFail()->markAsRead();
        
        return back();
    }
}
