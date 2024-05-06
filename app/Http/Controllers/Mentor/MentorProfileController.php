<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MentorProfileController extends Controller
{
    public function profile(){
        return view('mentor.profile.profile');
    }
}
