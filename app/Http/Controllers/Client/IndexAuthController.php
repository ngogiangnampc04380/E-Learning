<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexAuthController extends Controller
{
    public function login(){
        return view('client.auth.login');
    }
    public function register(){
        return view('client.auth.register');
    }
    public function forgotpass(){
        return view('client.auth.forgotPassword');
    }
}
