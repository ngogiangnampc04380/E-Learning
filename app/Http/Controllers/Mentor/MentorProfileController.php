<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MentorProfileController extends Controller
{
    public function profile(){
        return view('mentor.profile.profile');
    }

    public function comment(){
        $data = DB::table('comments')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->join('lessons', 'comments.lesson_id', '=', 'lessons.id')
        ->select('comments.*', 'users.name as user', 'lessons.name as lesson')
        ->orderBy('id','desc')
        ->get();
        return view('mentor.profile.comment', ['data' => $data]);
    }

    public function favorite(){
        $data = DB::table('favorites')
        ->join('courses', 'favorites.course_id', '=', 'courses.id')
        ->select('favorites.*', 'courses.name as course')
        ->orderBy('id','desc')
        ->get();
        return view('mentor.profile.favorite', ['data' => $data]);
    }
}
