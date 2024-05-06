<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MentorRegisterController extends Controller
{
    public function mentorRegister(){
        return view('mentor.auth.mentorRegister');
    }
}
