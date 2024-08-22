<?php


namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $mentorId = auth()->user()->mentor->id;
        $students = DB::table('users')
            ->join('course_users', 'users.id', '=', 'course_users.user_id')
            ->join('courses', 'course_users.course_id', '=', 'courses.id')
            ->where('courses.mentor_id', $mentorId)
            ->select('users.id', 'users.name', 'users.email')
            ->distinct()
            ->get();

        $studentsCourses = [];
        foreach ($students as $student) {
            $studentsCourses[$student->id] = DB::table('courses')
                ->join('course_users', 'courses.id', '=', 'course_users.course_id')
                ->join('chapters', 'courses.id', '=', 'chapters.course_id')
                ->leftJoin('lessons', 'chapters.id', '=', 'lessons.chapter_id')
                ->select(
                    'courses.id',
                    'courses.name',
                    'courses.thumbnail',
                    DB::raw('COUNT(DISTINCT lessons.id) as lesson_count')
                )
                ->where('course_users.user_id', $student->id)
                ->where('courses.mentor_id', $mentorId)
                ->groupBy('courses.id', 'courses.name', 'courses.thumbnail')
                ->get()
                ->map(function ($course) use ($student) {
                    $course->completed_lessons = DB::table('video_done')
                        ->join('chapters', 'video_done.chapter_id', '=', 'chapters.id')
                        ->join('courses', 'chapters.course_id', '=', 'courses.id')
                        ->where('courses.id', '=', $course->id)
                        ->where('video_done.user_id', '=', $student->id)
                        ->count();

                    return $course;
                });
        }
        return view('mentor.student.list', compact('students', 'studentsCourses'));
    }



    public function getCoursesByStudent($userId)
    {
        // Lấy danh sách các khóa học mà học sinh đã đăng ký cùng với số lượng bài học
        $courses = DB::table('courses')
            ->join('course_user', 'courses.id', '=', 'course_user.course_id')
            ->leftJoin('lessons', 'courses.id', '=', 'lessons.course_id')
            ->where('course_user.user_id', $userId)
            ->select(
                'courses.id',
                'courses.name',
                'courses.thumbnail',
                DB::raw('COUNT(lessons.id) as lesson_count')
            )
            ->groupBy('courses.id', 'courses.name', 'courses.thumbnail')
            ->get();

        return response()->json($courses);
    }
}