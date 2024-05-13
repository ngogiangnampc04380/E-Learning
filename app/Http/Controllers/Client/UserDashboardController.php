<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserDashboardController extends Controller
{
    public function dashboard($id){
        $data = User::find($id);
        return view('client.profile.dashboard',['data' => $data]);
    }
    

}
