<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function list(){
        return view('client.courses.courses-list');
    }
    public function detail(){
        return view('client.courses.course-details');
    }
}
