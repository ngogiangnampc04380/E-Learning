<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Checkout;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\select;
use Illuminate\Support\Facades\Session;
use App\Models\Course;
use App\Models\Sale;

class CoursesController extends Controller
{
    public function list(Request $request)
    {
        $query = $request->input('query');

        $data = Course::orderBy('id', 'desc');

        if ($query) {
            $data->where('name', 'LIKE', "%$query%");
        }

        $data = $data->get();

        $categories = Course_category::all();

        return view('client.courses.courses-list', compact('data', 'query', 'categories'));
    }

    public function detail()
    {
        return view('client.courses.course-details');
    }
    public function lesson()
    {
        return view('client.courses.lesson');
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
        // Lấy thông tin khóa học dựa trên $id
        $course = Course::find($id);

        // Lấy dữ liệu giảm giá cho khóa học cụ thể
        $data = Sale::where('course_id', $id)->first();

        // Lấy thông tin phiên làm việc
        $sessionData = [
            'id' => $id,
            'fullname' => session('fullname'),
            'phone' => session('phone'),
            'email' => session('email'),
            'address' => session('address'),
            'course_id' => session('course_id'),
        ];

        // Kiểm tra xem khóa học có tồn tại hay không
        if (!$course) {
            return redirect()->route('client.courses');
        }

        // Trả về view với dữ liệu đã lấy được
        return view('client.courses.course-pricing', compact('sessionData', 'course', 'data'));
    }

}
