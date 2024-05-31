<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Checkout;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\select;
use Illuminate\Support\Facades\Session;
use App\Models\Course;


class CoursesController extends Controller
{
    public function list()
    {
        $data = DB::table('courses')
            ->orderBy('id', 'desc')
            ->get();
        return view('client.courses.courses-list', ['data' => $data]);
    }

    public function detail()
    {
        return view('client.courses.course-details');
    }

    public function checkout($id)
    {
        $data = DB::table('courses')
            ->select('id','thumbnail', 'name', 'price', 'description')
            ->where('id', $id)
            ->first();

        return view('client.courses.course-checkout', ['data' => $data]);
    }
    public function checkoutSubmit(Request $request)
    {
        $fullname = $request->input('fullname');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $courseId = $request->input('course_id');

        session([
            'fullname' => $fullname,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'course_id' => $courseId,
        ]);
        return redirect()->route('client.course-pricing', ['id' => $courseId]);
    }
    public function pricing($id)
    {
        $sessionData = [
            'fullname' => session('fullname'),
            'phone' => session('phone'),
            'email' => session('email'),
            'address' => session('address'),
            'course_id' => session('course_id'),
        ];
        $course = Course::find($id);
        if (!$course) {
            return redirect()->route('client.courses')->with('error', 'Khóa học không tồn tại.');
        }
        return view('client.courses.course-pricing', compact('sessionData', 'course'));
    }


}
