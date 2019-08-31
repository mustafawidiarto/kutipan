<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['profile']]);
    }

    public function index()
    {
        //return view('home');
        return redirect()->route('quotes.index');
    }

    public function profile($id = null)
    {
        if($id == null) $user = User::findOrFail(Auth::user()->id);
        else $user =  User::findOrFail($id);
        return view('profile', compact('user'));
    }
}
