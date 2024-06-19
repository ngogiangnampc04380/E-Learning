<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class InstructorController extends Controller
{
    public function list(Request $request)
{
    $currentUserId = Auth::id();
    $query = $request->input('query');

    $mentors = User::where('role', 2)
    ->where('id', '!=', $currentUserId);

    if ($query) {
        $mentors = $mentors->where('name', 'LIKE', "%$query%");
    }
    $mentors = $mentors->get();

    $categories = Course_category::all();
    return view('client.instructor.instructor-list', ['data' => $mentors, 'query' => $query,'categories'=>$categories]);
}


    public function profile()
    {
        return view('client.instructor.instructor-profile');
    }
    public function mentor_detail($id)
    {
        $mentor = User::with('educations')->where('role', 2)->findOrFail($id) ;
        return view('client.instructor.instructor-profile', ['mentor' => $mentor]);
    }

    

}
