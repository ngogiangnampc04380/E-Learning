<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Checkout;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\select;
use Illuminate\Support\Facades\Session;


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
        $selectedCourse = Session::get('selected_course');

        // Lưu thông tin từ form vào section hoặc xử lý nó theo nhu cầu của bạn
        $fullname = $request->input('fullname');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $courseId = $request->input('course_id');
        return redirect()->route('client.courses.course-checkout');
    }
    public function pricing($id)
    {
        $data2 = DB::table('check_outs')
            ->select('fullname','email','phone','address','course_id')
            ->where('id', $id)
            ->first();
        $course_id = $data2->course_id;
        $data = DB::table('courses')
            ->select('id','thumbnail', 'name', 'price', 'description')
            ->where('id', $course_id)
            ->first();
        return view('client.courses.course-pricing', ['data2' => $data2, 'data' => $data]);
    }
}
