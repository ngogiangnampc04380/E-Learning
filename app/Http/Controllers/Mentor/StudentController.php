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
            $courses = DB::table('courses')
                ->join('course_users', 'courses.id', '=', 'course_users.course_id')
                ->join('chapters', 'courses.id', '=', 'chapters.course_id')
                ->leftJoin('lessons', 'chapters.id', '=', 'lessons.chapter_id')
                ->leftJoin('quizzes', 'courses.id', '=', 'quizzes.course_id')
                ->leftJoin('quiz_finals', 'courses.id', '=', 'quiz_finals.course_id')
                ->leftJoin('video_done', 'lessons.chapter_id', '=', 'video_done.chapter_id')
                ->leftJoin('results_final', 'courses.id', '=', 'results_final.course_id')
                ->leftJoin('quiz_results', 'courses.id', '=', 'quiz_results.course_id')
                ->where('course_users.user_id', $student->id)
                ->where('courses.mentor_id', $mentorId)
                ->select(
                    'courses.id',
                    'courses.name',
                    'courses.thumbnail',
                    DB::raw('COUNT(DISTINCT lessons.id) as lesson_count'),
                    DB::raw('COUNT(DISTINCT quizzes.id) as quiz_count'),
                    DB::raw('COUNT(DISTINCT quiz_finals.id) as quiz_final_count')
                )
                ->groupBy('courses.id', 'courses.name', 'courses.thumbnail')
                ->get()
                ->map(function ($course) use ($student) {
                    $video_done_count = DB::table('video_done')
                        ->where('user_id', $student->id)
                        ->whereExists(function($query) use ($course) {
                            $query->select(DB::raw(1))
                                ->from('lessons')
                                ->join('chapters', 'lessons.chapter_id', '=', 'chapters.id')
                                ->where('chapters.course_id', $course->id)
                                ->whereColumn('video_done.chapter_id', 'chapters.id');
                        })
                        ->count();
                    $final_results_count = DB::table('results_final')
                        ->where('user_id', $student->id)
                        ->where('course_id', $course->id)
                        ->count();
                    $quiz_results_count = DB::table('quiz_results')
                        ->where('user_id', $student->id)
                        ->where('course_id', $course->id)
                        ->count();
                    $course->total_ketqua = $video_done_count + $final_results_count + $quiz_results_count;
                    return $course;
                });
            $studentsCourses[$student->id] = $courses;
        }
        return view('mentor.student.list', compact('students', 'studentsCourses'));
    }
   public function getCoursesByStudent($userId)
{
    $courses = DB::table('courses')
        ->join('course_users', 'courses.id', '=', 'course_users.course_id')
        ->leftJoin('lessons', 'courses.id', '=', 'lessons.course_id')
        ->leftJoin('quizzes', 'courses.id', '=', 'quizzes.course_id')
        ->leftJoin('quiz_finals', 'courses.id', '=', 'quiz_finals.course_id')
        ->where('course_users.user_id', $userId)
        ->select(
            'courses.id',
            'courses.name',
            'courses.thumbnail',
            DB::raw('COUNT(DISTINCT lessons.id) as lesson_count'),
            DB::raw('COUNT(DISTINCT quizzes.id) as quiz_count'),
            DB::raw('COUNT(DISTINCT quiz_finals.id) as quiz_final_count')
        )
        ->groupBy('courses.id', 'courses.name', 'courses.thumbnail')
        ->get();

    return response()->json($courses);
}
}