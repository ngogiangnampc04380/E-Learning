<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;


class HomeController extends Controller
{
    public function index(){
        $courses = Course::all();
        $courseCount = Course::count();
        $mentorCount = User::where('role', 2)->count();
        return view('client.home.home',compact('courses','courseCount','mentorCount'));
    }
}
