<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function list(){
        return view('client.instructor.instructor-list');
    }
    
    public function profile(){
        return view('client.instructor.instructor-profile');
    }
}
