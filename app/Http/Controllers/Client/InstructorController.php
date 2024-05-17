<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Lesson;


class InstructorController extends Controller
{
    public function list()
    {
        return view('client.instructor.instructor-list');
    }

    public function profile()
    {
        return view('client.instructor.instructor-profile');
    }

    public function course()
    {
        $data = DB::table('courses')
            ->orderBy('id', 'desc')
            ->get();

        return view('client.instructor.instructor-course', ['data' => $data]);
    }

    public function chapter($id)
    {
        $data = DB::table('chapters')
            ->where('course_id', $id)
            ->orderBy('id', 'asc')
            ->get();
        $getCourse = DB::table('courses')
            ->get();

        return view('client.instructor.instructor-coursedetails', ['data' => $data], ['getCourse' => $getCourse]);
    }

    public function lesson($id)
    {
        $data = DB::table('lessons')
            ->where('chapter_id', $id)
            ->orderBy('id', 'asc')
            ->get();
        $getLesson = DB::table('chapters')
            ->get();
        return view('client.instructor.instructor-lesson', ['data' => $data, 'getLesson' => $getLesson]);
    }

    public function addcourse()
    {
        $getCategorie = DB::table('course_categories')
            ->get();
        $getCourse = DB::table('courses')
            ->get();
        $getChapter = DB::table('chapters')
            ->get();
        return view('client.instructor.instructor-addcourse',
            ['getCategorie' => $getCategorie, 'getCourse' => $getCourse, 'getChapter' => $getChapter]);
    }


    /*add khóa học*/
    public function saveCourse(Request $request)
    {
        // Xử lý lưu dữ liệu khóa học
        $course = new Course();
        $course->name = $request->input('course_name');
        $course->description = $request->input('description');
        $course->price = $request->input('price');
        $course->category_id = $request->input('category_id');

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = $thumbnail->getClientOriginalName();
            $thumbnail->storeAs('public/', $thumbnailName); // Lưu vào thư mục storage/app/public/images
            $course->thumbnail = $thumbnailName;
        }
        $course->save();

        // Lưu dữ liệu chương
        $chapter = new Chapter();
        $chapter->name = $request->input('chapter_name');
        $chapter->course_id = $course->id; // Lấy id của khóa học vừa được lưu
        $chapter->save();

        // Lưu dữ liệu bài học
        $lesson = new Lesson();
        $lesson->name = $request->input('lesson_name');
        $lesson->chapter_id = $chapter->id; // Lấy id của chương vừa được lưu
        $lesson->save();

        return redirect()->back()->with('success', 'Dữ liệu đã được lưu thành công!');
    }

    /*add Chương*/

    public function saveChapter(Request $request)
    {

        // Lấy id của khóa học từ request
        $courseId = $request->input('course_id');

        $chapter = new Chapter();
        $chapter->name = $request->input('chapter_name');
        $chapter->course_id = $courseId; // Sử dụng id của khóa học từ request
        $chapter->save();
        return redirect()->back();
    }


    public function saveLesson(Request $request)
    {

        // Xử lý tệp video
        if ($request->hasFile('path_video')) {
            $videoPath = $request->file('path_video')->store('videos'); // Lưu trữ video trong thư mục 'videos'
        }
        $chapter = $request->input('chapter_id');
        // Lưu dữ liệu bài học
        $lesson = new Lesson();
        $lesson->name = $request->input('lesson_name');
        $lesson->path_video = $videoPath;
        $lesson->chapter_id = $chapter;
        $lesson->save();

        // Điều hướng hoặc trả về một thông báo thành công
        return redirect()->back()->with('success', 'Bài học đã được thêm thành công!');
    }

    public function deleteCourse($id)
    {
        DB::table('courses')
            ->where('id', $id)
            ->delete();
        return redirect()->back();

    }

    public function deleteChapter($id)
    {
        DB::table('chapters')
            ->where('id', $id)
            ->delete();
        return redirect()->back();

    }

    public function deleteLesson($id)
    {
        DB::table('lessons')
            ->where('id', $id)
            ->delete();
        return redirect()->back();

    }


    public function editCourse($id)
    {
        $data = DB::table('courses')
            ->select('id', 'name', 'description', 'thumbnail', 'price', 'category_id')
            ->where('id', $id)
            ->first();
        $categories = DB::table('course_categories')->get();
        return view('client.instructor.instructor-editCourse', ['data' => $data, 'course_categories' => $categories]);
    }
    public function saveEditCourse(Request $request, $id)
    {
        // Xác thực dữ liệu yêu cầu
        $validatedData = $request->validate([
            'course_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'category_id' => 'required|integer'
        ]);

        // Xử lý ảnh thumbnail nếu có
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnailPath = $thumbnail->storeAs('public/', $thumbnailName); // Lưu vào thư mục storage/app/public/images
        }

        // Cập nhật cơ sở dữ liệu
        DB::table('courses')
            ->where('id', $id)
            ->update([
                'name' => $request->course_name,
                'description' => $request->description,
                'thumbnail' => isset($thumbnailPath) ? basename($thumbnailPath) : null,
                'price' => $request->price,
                'category_id' => $request->category_id
            ]);

        // Điều hướng lại trang danh sách khóa học của giảng viên
        return redirect()->route('client.instructor-course', ['id' => $id]);
    }





    public function editChapter($id)
    {
        $data = DB::table('chapters')
            ->select('id', 'name', 'course_id')
            ->where('id', $id)
            ->first();
        $courses = DB::table('courses')->get();
        return view('client.instructor.instructor-editChapter', ['data' => $data, 'course' => $courses]);
    }
    public function saveEditChapter(Request $request, $id)
    {
        // Updating the chapter in the database
        DB::table('chapters')
            ->where('id', $id)
            ->update([
                'name' => $request->chapter_name,
                'course_id' => $request->course_id
            ]);

        // Redirecting to the course details page with the correct course_id
        return redirect()->route('client.instructor-coursedetails', ['id' => $request->course_id]);
    }




    public function editLesson($id)
    {
        $data = DB::table('lessons')
            ->select('id', 'name', 'path_video', 'chapter_id')
            ->where('id', $id)
            ->first();
        $chapter = DB::table('chapters')
            ->get();
        return view('client.instructor.instructor-editLesson', ['data' => $data, 'chapter' => $chapter]);
    }

    public function saveEditLesson(Request $request, $id)
    {
        $data = [
            'name' => $request->lesson_name,
            'chapter_id' => $request->chapter_id
        ];

        if ($request->hasFile('path_video')) {
            $videoPath = $request->file('path_video')->store('videos'); // Store video in 'videos' directory
            $data['path_video'] = $videoPath; // Add video path to the data array
        }

        DB::table('lessons')
            ->where('id', $id)
            ->update($data);
        return redirect()->route('client.instructor-lesson', ['id' => $request->chapter_id]);
    }



//    public function coursedetails()
//    {
//        return view('client.instructor.instructor-coursedetails');
//    }

    public function dashboard()
    {
        return view('client.instructor.instructor-dashboard');
    }

}
