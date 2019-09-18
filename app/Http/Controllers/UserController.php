<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getNotif()
    {
        $notifications = new Notification;
        return view('notification', compact('notifications'));
    }
}
