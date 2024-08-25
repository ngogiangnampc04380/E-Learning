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
use App\Models\Mentor;
use Illuminate\Support\Facades\Auth;


class InstructorController extends Controller
{
    public function list(Request $request)
    {
        $currentUserId = Auth::id();
        $query = $request->input('query');

        // Truy vấn danh sách giảng viên, trừ giảng viên hiện tại
        $mentors = User::where('role', 2)
            ->where('id', '!=', $currentUserId);

        if ($query) {
            $mentors = $mentors->where('name', 'LIKE', "%$query%");
        }

        // Phân trang với 10 giảng viên mỗi trang
        $mentors = $mentors->paginate(10);

        // Lấy danh sách tất cả các danh mục
        $categories = Course_category::all();

        // Thống kê số liệu cho từng giảng viên
        $mentorStatistics = [];
        foreach ($mentors as $mentor) {

            // Kiểm tra nếu giảng viên tồn tại
            if ($mentor) {
                // Truy vấn số khóa học của giảng viên
                $totalCourses = Course::where('mentor_id', $mentor->mentor->id)->count();
                // Truy vấn số chương của giảng viên
                $totalChapters = DB::table('chapters')
                    ->join('courses', 'chapters.course_id', '=', 'courses.id')
                    ->where('courses.mentor_id', $mentor->mentor->id)
                    ->count();

                // Truy vấn số bài học của giảng viên
                $totalLessons = DB::table('lessons')
                    ->join('chapters', 'lessons.chapter_id', '=', 'chapters.id')
                    ->join('courses', 'chapters.course_id', '=', 'courses.id')
                    ->where('courses.mentor_id', $mentor->mentor->id)
                    ->count();

                // Truy vấn số học viên của giảng viên
                $totalStudents = DB::table('course_users')
                    ->join('courses', 'course_users.course_id', '=', 'courses.id')
                    ->where('courses.mentor_id', $mentor->mentor->id)
                    ->count();

                $mentorStatistics[$mentor->id] = [
                    'totalCourses' => $totalCourses,
                    'totalChapters' => $totalChapters,
                    'totalLessons' => $totalLessons,
                    'totalStudents' => $totalStudents
                ];
            }
        }
        $categories = Course_Category::all();

        return view('client.instructor.instructor-list', [
            'data' => $mentors,
            'query' => $query,
            'categories' => $categories,
            'mentorStatistics' => $mentorStatistics

        ]);
    }

    public function profile()
    {
        // Lấy danh sách các categories
        $categories = Course_Category::all();
        return view('client.instructor.instructor-profile');
    }

    public function mentor_detail($id)
    {
        $mentor = Mentor::with('user')->findOrFail($id);

        $totalCourses = DB::table('courses')
            ->where('mentor_id', $id)
            ->count();

        $courses = DB::table('courses')
            ->where('mentor_id', $id)
            ->get();


        // Tính tổng số học viên đã đăng ký các khóa học của mentor
        $totalStudents = DB::table('course_users')
            ->join('courses', 'course_users.course_id', '=', 'courses.id')
            ->where('courses.mentor_id', $id)
            ->count('course_users.user_id');
        // Lấy danh sách các categories
        $categories = Course_Category::all();

        return view('client.instructor.instructor-profile', [
            'mentor' => $mentor,
            'categories' => $categories,
            'totalCourses' => $totalCourses,
            'totalStudents' => $totalStudents,
            'courses' => $courses,
        ]);
    }
}
