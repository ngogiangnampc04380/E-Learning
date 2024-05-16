<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function index()
    {
        return view('client.auth.logout');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('Dashboard-client');
    }
}