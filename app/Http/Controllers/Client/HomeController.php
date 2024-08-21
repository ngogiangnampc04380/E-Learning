<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course_category;
use App\Models\Mentor;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;



class HomeController extends Controller
{
    public function getCourseCategories()
    {
        $categories = Course_Category::all();
        return view('partials.header', compact('categories'));
    }
    public function index()
    {
        // Lấy tất cả các khóa học có status bằng 2
        $courses = Course::where('status', 2)->get();

        // Đếm tổng số khóa học có status bằng 2
        $courseCount = Course::where('status', 2)->count();

        // Đếm tổng số người dùng có vai trò là 'mentor' (role = 2)
        $mentorCount = User::where('role', 2)->count();

        $mentorCounts = User::whereIn('role', [0, 2])->count();

        // Lấy tất cả các danh mục
        $categories = Course_category::all();

        // Lấy các khóa học theo danh mục
        $coursesByCategory = [];
        foreach ($categories as $category) {
            $coursesByCategory[$category->id] = Course::where('category_id', $category->id)->where('status', 2)->get();
        }

        // Trả về view với các dữ liệu đã chuẩn bị
        // Lấy danh sách các categories
        $categories = Course_Category::all();
        return view('client.home.home', compact('courses', 'courseCount', 'mentorCount', 'mentorCounts', 'categories', 'coursesByCategory'));
    }



    
}
