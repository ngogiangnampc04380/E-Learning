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
use App\Models\Sale;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Course_category;

use Illuminate\Support\Facades\Auth;
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

    public function course($id)
    {
        $mentorId = auth()->user()->mentor->id;

        $data = DB::table('courses')
            ->where('mentor_id', $mentorId)
            ->orderBy('id', 'desc')
            ->get();
    
        return view('client.instructor.instructor-course', ['data' => $data]);
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
       
        $mentorId = auth()->user()->mentor->id;
        // Xử lý lưu dữ liệu khóa học
        $course = new Course();
        $course->name = $request->input('course_name');
        $course->description = $request->input('description');
        $course->price = $request->input('price');
        $course->category_id = $request->input('category_id');
        $course->mentor_id =  $mentorId;
        $course['status'] = 0;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = $thumbnail->getClientOriginalName();
            $thumbnail->storeAs('public/assets-client/img/Courses', $thumbnailName); // Lưu vào thư mục storage/app/public/images
            $course->thumbnail = $thumbnailName;

        }
        if ($request->hasFile('video_demo')) {
            $video_demo = $request->file('video_demo');
            $video_demoName = $video_demo->getClientOriginalName();
            $video_demo->storeAs('public/assets-client/videos/Courses', $video_demoName); // Lưu vào thư mục storage/app/public/images
            $course->video_demo = $video_demoName;

        }
        $course->save();

        // Lưu dữ liệu chương
        
        return redirect()->route('client.editCourse', $course->id)->with('success', 'Khóa học đã được tạo thành công!');
    }

// sửa khóa học
public function editCourse($id)
{
    $course = Course::with('chapters')->findOrFail($id);
    $categories = Course_category::all();
    
    return view('client.instructor.instructor-editCourse', compact('course', 'categories'));
}
public function deleteChapter($id)
{
    $chapter = Chapter::findOrFail($id);
    $chapter->delete();

    return redirect()->back()->with('success', 'Đã xóa chương thành công!');
}
public function autoAddChapter($course_id)
{
    // Lấy số lượng chương hiện tại của khóa học
    $chapterCount = Chapter::where('course_id', $course_id)->count();

    // Tạo chương mới với tên "Chương {số thứ tự tiếp theo}"
    $chapter = new Chapter();
    $chapter->name = "Chương " . ($chapterCount + 1);
    $chapter->course_id = $course_id; // Gán id của khóa học cho chương mới
    $chapter->save();

    return redirect()->back()->with('success', 'Đã thêm chương mới tự động!');
}
public function addChapter(Request $request, $course_id)
{
    // Xử lý logic thêm chương ở đây
    $chapter = new Chapter();
    $chapter->name = $request->input('name');
    $chapter->course_id = $course_id;
    $chapter->save();

    // Trả về JSON response với chapter_id để sử dụng trong form thêm bài học
    return redirect()->back()->with('success', 'Đã thêm chương mới tự động!');

}

public function addLesson(Request $request)
{
    // Validate request data
    $request->validate([
        'name' => 'required|string|max:255',
        'video' => 'required|file|mimes:mp4,mov,avi,wmv|max:204800', // max 200MB
        'chapter_id' => 'required|exists:chapters,id',
    ]);

    // Lưu video vào storage
    if ($request->hasFile('video')) {
        $video = $request->file('video');
        $videoName = $video->getClientOriginalName();
        $video->storeAs('public/assets-client/Videos/Lessons', $videoName); // Lưu vào thư mục storage/app/public/assets-client/videos
    } else {
        // Xử lí nếu không có file được tải lên
        return redirect()->back()->with('error', 'Vui lòng chọn video để tải lên.');
    }

    // Tạo mới bài học
    $lesson = new Lesson();
    $lesson->name = $request->input('name');
    $lesson->path_video = $videoName;
    $lesson->chapter_id = $request->input('chapter_id');
    $lesson->save();

    return redirect()->back()->with('success', 'Đã thêm bài học thành công.');
}
public function getLessonsByChapterId($chapterId)
{
    $chapter = Chapter::findOrFail($chapterId);
    $lessons = $chapter->lessons()->get();
    return response()->json(['lessons' => $lessons]);
}
public function destroy(Lesson $lesson)
    {
        try {
            $lesson->delete();
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Không thể xóa bài học.'], 500);
        }
    }
    public function updateLesson(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->name = $request->input('name');
    
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = $video->getClientOriginalName();
            $video->storeAs('public/assets-client/Videos/Lessons', $videoName);
            $lesson->path_video = $videoName;
        }
    
        $lesson->save();
    
        return redirect()->back()->with('success', 'Đã cập nhật bài học!');
    }
    public function updateChapters(Request $request, Chapter $chapter)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $chapter->name = $request->input('name');
        $chapter->save();

        return redirect()->back()->with('success', 'Chương đã được cập nhật thành công!');
    }   
public function updateCourse(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:50',
        'description' => 'required|string',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'video_demo' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',
        'price' => 'required|string|max:50',
        'category_id' => 'required|exists:course_categories,id',
    ]);

    $course = Course::findOrFail($id);
    $data = $request->only(['name', 'description', 'price', 'category_id']);

    if ($request->hasFile('thumbnail')) {
        $thumbnail = $request->file('thumbnail');
        $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
        $thumbnail->storeAs('public/assets-client/img/Courses', $thumbnailName);
        $data['thumbnail'] = $thumbnailName;
    }

    if ($request->hasFile('video_demo')) {
        $videoDemo = $request->file('video_demo');
        $videoDemoName = time() . '_' . $videoDemo->getClientOriginalName();
        $videoDemo->storeAs('public/assets-client/Videos/Courses', $videoDemoName);
        $data['video_demo'] = $videoDemoName;
    }

    $course->update($data);

    return redirect()->route('client.editCourse', $id)->with('success', 'Khóa học đã được cập nhật thành công!');
}
    

    public function deleteCourse($id)
    {
        DB::table('courses')
            ->where('id', $id)
            ->delete();
        return redirect()->back();

    }
    public function submitCourse(Request $request, $id)
    {
        // Xử lý logic gửi duyệt khóa học ở đây
        // Ví dụ:
        $course = Course::findOrFail($id);
        $course->status = 1;
        $course->save();

        // Redirect về route instructor-course với ID của khóa học
        return redirect()->route('client.instructor-course', ['id' => $id]);
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

