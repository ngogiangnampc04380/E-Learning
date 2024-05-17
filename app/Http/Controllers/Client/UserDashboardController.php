<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class UserDashboardController extends Controller
{
    public function dashboard(){
        $userId = Session::get('id');
        $data = User::find($userId);
        // return view('client.profile.profile',['data' => $data]);
        return view('client.profile.dashboard',['data' => $data]);
    }
    

}
