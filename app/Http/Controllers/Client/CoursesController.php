<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course_user;
use App\Models\Video_done;
use App\Models\Video_not_done;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Checkout;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\select;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Query\JoinClause;
use App\Models\Course;
use App\Models\Sale;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Course_category;
use Illuminate\Support\Facades\Storage;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\QuizResult;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function list(Request $request)
    {
        $query = $request->input('query');

        // Khởi tạo truy vấn để lấy danh sách các khóa học có status bằng 2
        $data = Course::where('status', 2)
            ->orderBy('id', 'desc')
            ->with('mentor'); // Load thông tin của mentor

        // Nếu có tham số truy vấn, thêm điều kiện tìm kiếm theo tên khóa học
        if ($query) {
            $data->where('name', 'LIKE', "%$query%");
        }

        // Thực hiện truy vấn và lấy danh sách khóa học
        $data = $data->get();

        // Lấy tất cả các danh mục khóa học
        $categories = Course_category::all();

        // Trả về view với dữ liệu các khóa học, truy vấn tìm kiếm và danh sách các danh mục
        return view('client.courses.courses-list', compact('data', 'query', 'categories'));
    }




    public function myCourse($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $user = DB::table('users')
            ->select('id', 'thumbnail', 'name')
            ->where('id', $id)
            ->first();
        $myCourses = Course_user::where('user_id', $id)
            ->with(['course' => function ($query) {
                $query->select('id', 'thumbnail', 'name', 'description', 'mentor_id')
                    ->with(['mentor' => function ($query) {
                        $query->select('id', 'user_id')
                            ->with('user:id,thumbnail,name');
                    }]);
            }])
            ->get();
        return view('client.courses.my-course', compact('myCourses', 'user'));
    }

    public function lesson($id, $lesson_id = null)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $data = DB::table('courses')
            ->select('id', 'thumbnail', 'name', 'description')
            ->where('id', $id)
            ->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Khóa học không tồn tại.');
        }

        $chapters = DB::table('chapters')
            ->join('lessons', 'chapters.id', '=', 'lessons.chapter_id')
            ->where('chapters.course_id', $data->id)
            ->select('chapters.name as chaptername', 'chapters.id as chapterID')
            ->distinct()
            ->get();

        $chapterLessons = [];
        $firstLessonVideo = null;

        foreach ($chapters as $chapter) {
            $lessons = DB::table('lessons')
                ->where('chapter_id', $chapter->chapterID)
                ->select('lessons.name as lessonname', 'lessons.path_video as lessonvideo', 'lessons.id as lessonID')
                ->get();

            $chapterLessons[$chapter->chapterID] = $lessons;

            if (is_null($firstLessonVideo) && $lessons->isNotEmpty()) {
                $firstLessonVideo = asset('assets-client/Videos/Lessons/' . $lessons->first()->lessonvideo);
            }
        }

        $selectedLesson = null;
        if ($lesson_id) {
            $selectedLesson = DB::table('lessons')
                ->where('id', $lesson_id)
                ->first();
        }

        $user = Auth::user();
        $checklesson = [];

        if ($user) {
            $checklesson = DB::table('video_done')
                ->where('user_id', $user->id)
                ->where('course_id', $data->id)
                ->pluck('lesson_id')
                ->toArray();
        }

        return view('client.courses.lesson', compact('data', 'checklesson', 'chapters', 'chapterLessons', 'firstLessonVideo', 'selectedLesson'));
    }



    public function quizChapter($id)
    {
        $quiz = Quiz::findOrFail($id);

        $questions = Question::with(['answers' => function ($query) {
            $query->inRandomOrder();
        }])->where('quiz_id', $id)->get();

        return view('client.courses.quiz', compact('questions', 'quiz'));
    }

    public function submitQuiz(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);
        $questions = Question::where('quiz_id', $id)->get();

        $score = 0;
        $userAnswers = [];

        foreach ($questions as $question) {
            $correctAnswer = $question->answers()->where('is_correct', 1)->first();
            $selectedAnswerId = $request->input('question_' . $question->id);

            $userAnswers[$question->id] = $selectedAnswerId;

            if ($correctAnswer && $selectedAnswerId == $correctAnswer->id) {
                $score++;
            }
        }

        session(['user_answers' => $userAnswers]);
        QuizResult::create([
            'quiz_id' => $quiz->id,
            'user_id' => auth()->id(),
            'score' => $score,
            'chapter_id' => $quiz->chapter_id ?? null,
            'course_id' => $quiz->course_id ?? null,
        ]);

        return view('client.courses.result', [
            'id' => $id,
            'score' => $score,
            'quiz' => $quiz,
            'questions' => $questions
        ]);
    }

    public function quizResult($id, $score)
    {
        $quiz = Quiz::findOrFail($id);
        $questions = Question::with('answers')->where('quiz_id', $id)->get();

        $userAnswers = session()->get('user_answers', []);

        return view('client.courses.quiz-result', compact('quiz', 'score', 'questions', 'userAnswers'));
    }

    public function store(Request $request)
    {
       
        // Create a new quiz
        $quiz = new Quiz();
        $quiz->course_id = $request->course_id;
        $quiz->chapter_id = $request->chapter_id;
        $quiz->mentor_id = Auth::user()->mentor->id;
        $quiz->name = $request->title;
        $quiz->save();

        // Process questions and answers
        foreach ($request->input('questions') as $questionData) {
            $question = new Question();
            $question->quiz_id = $quiz->id;
            $question->question = $questionData['question'];
            $question->save();

            foreach ($questionData['answers'] as $answerData) {
                $answer = new Answer();
                $answer->question_id = $question->id;
                $answer->answer = $answerData['answer'];
                $answer->is_correct = $answerData['is_correct'];
                $answer->save();
            }
        }

        return redirect()->back()->with('success', 'Bài quiz đã được lưu thành công.');
    }

    public function show($id)
    {
        $quiz = Quiz::with(['course', 'chapter', 'questions.answers'])->findOrFail($id);

        return view('client.courses.show', compact('quiz'));
    }

    public function editQuiz($id)
    {
        $quiz = Quiz::with(['questions.correctAnswer', 'questions.wrongAnswers'])->findOrFail($id);
        return view('client.courses.edit-quiz', compact('quiz'));
    }

    public function updateQuiz(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->name = $request->input('name');
        $quiz->save();

        $questionIds = [];
        foreach ($request->input('questions') as $questionData) {
            if (isset($questionData['id'])) {
                $question = Question::findOrFail($questionData['id']);
            } else {
                $question = new Question();
                $question->quiz_id = $quiz->id;
            }

            $question->question = $questionData['question'];
            $question->save();

            $correctAnswer = $question->correctAnswer ?? new Answer();
            $correctAnswer->question_id = $question->id;
            $correctAnswer->answer = $questionData['correct_answer'];
            $correctAnswer->is_correct = true;
            $correctAnswer->save();

            // Update or create wrong answers
            foreach ($questionData['wrong_answers'] as $index => $wrongAnswerText) {
                $wrongAnswer = $question->wrongAnswers[$index] ?? new Answer();
                $wrongAnswer->question_id = $question->id;
                $wrongAnswer->answer = $wrongAnswerText;
                $wrongAnswer->is_correct = false;
                $wrongAnswer->save();
            }

            $questionIds[] = $question->id;
        }

        // Delete questions not in the updated list
        $quiz->questions()->whereNotIn('id', $questionIds)->delete();

        return redirect()->route('client.editCourse', ['id' => $quiz->course_id]);
    }

    public function deleteQuiz($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('client.editCourse', ['id' => $quiz->course_id]);
    }

    public function checkout($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $data = DB::table('courses')
            ->select('id', 'thumbnail', 'name', 'price', 'description')
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
            'price' => session('price'),
        ];

        // Kiểm tra xem khóa học có tồn tại hay không
        if (!$course) {
            return redirect()->route('client.courses');
        }

        // Trả về view với dữ liệu đã lấy được
        return view('client.courses.course-pricing', compact('sessionData', 'course', 'data'));
    }

    public function course()
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
        return view(
            'client.instructor.instructor-addcourse',
            ['getCategorie' => $getCategorie, 'getCourse' => $getCourse, 'getChapter' => $getChapter]
        );
    }


    /*add khóa học*/
    public function saveCourse(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_demo' => 'nullable|mimes:mp4,avi,mov,wmv|max:20480',
            'price' => 'required|numeric|min:10000',
            'category_id' => 'required|exists:course_categories,id',
        ], [
            'course_name.required' => 'Vui lòng nhập tên khóa học.',
            'course_name.string' => 'Tên khóa học phải là chuỗi.',
            'course_name.max' => 'Tên khóa học không được vượt quá 100 ký tự.',
            'description.required' => 'Vui lòng nhập mô tả khóa học.',
            'description.string' => 'Mô tả khóa học phải là chuỗi.',
            'description.max' => 'Tên khóa học không được vượt quá 255 ký tự.',

            'thumbnail.required' => 'Vui lòng chọn hình ảnh cho khóa học.',
            'thumbnail.image' => 'File bạn chọn không phải là hình ảnh hợp lệ.',
            'thumbnail.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'thumbnail.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
            'video_demo.mimes' => 'Video demo phải có định dạng mp4, avi, mov, wmv.',
            'video_demo.max' => 'Kích thước video demo không được vượt quá 20MB.',
            'price.required' => 'Vui lòng nhập giá khóa học.',
            'price.numeric' => 'Giá khóa học phải là số.',
            'price.min' => 'Giá khóa học phải lớn hơn hoặc bằng 10.000VNĐ.',
            'category_id.required' => 'Vui lòng chọn danh mục khóa học.',
            'category_id.exists' => 'Danh mục khóa học bạn chọn không tồn tại.',
        ]);
        $course = $request->only('course_name', 'description', 'price', 'category_id');

        $mentorId = auth()->user()->mentor->id;
        // Xử lý lưu dữ liệu khóa học
        $course = new Course();
        $course->name = $request->input('course_name');
        $course->description = $request->input('description');
        $course->price = $request->input('price');
        $course->category_id = $request->input('category_id');
        $course->mentor_id = $mentorId;
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
        return response()->json(['redirect_url' => route('client.editCourse', $course->id)]);

        // return redirect()->route->with('success', 'Khóa học đã được tạo thành công!');
    }

    // sửa khóa học
    public function editCourse($id)
    {
        $course = Course::with('chapters')->findOrFail($id);
        $categories = Course_category::all();
        $mentorId = auth()->user()->mentor->id;
        $courses = Course::where('mentor_id', $mentorId)->get();
        $chapters = Chapter::whereIn('course_id', $courses->pluck('id'))->get();
        return view('client.instructor.instructor-editCourse', compact('course', 'courses', 'chapters', 'categories'));
    }

    public function deleteChapter($id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->delete();

        return redirect()->back()->with('success', 'Đã xóa chương thành công!');
    }
    public function addChapter(Request $request, $course_id)
    {
        $chapter = new Chapter();
        $chapter->name = $request->input('name');
        $chapter->course_id = $course_id;
        $chapter->save();

        return redirect()->back()->with('success', 'Đã thêm chương mới tự động!');
    }
    public function addLesson(Request $request)
    {
        // Validate request data
        $request->validate([
            'lessons.*.name' => 'required|string|max:255',
            'lessons.*.video' => 'required|file|mimes:mp4,mov,avi,wmv|max:204800', // max 200MB
            'lessons.*.chapter_id' => 'required|exists:chapters,id',
        ]);

        $lessons = $request->input('lessons');

        if (empty($lessons)) {
            return redirect()->back()->with('error', 'Vui lòng thêm ít nhất một bài học.');
        }

        foreach ($lessons as $index => $lessonData) {
            if ($request->hasFile("lessons.{$index}.video")) {
                $video = $request->file("lessons.{$index}.video");
                $videoName = $video->getClientOriginalName();
                $video->storeAs('public/assets-client/videos/Lessons', $videoName);

                $lesson = new Lesson();
                $lesson->name = $lessonData['name'];
                $lesson->path_video = $videoName;
                $lesson->chapter_id = $lessonData['chapter_id'];
                $lesson->save();
            } else {
                return redirect()->back()->with('error', 'Vui lòng chọn video để tải lên cho bài học ' . ($index + 1));
            }
        }

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_demo' => 'nullable|mimes:mp4,avi,mov,wmv|max:20480',
            'price' => 'required|numeric|min:10000',
            'category_id' => 'required|exists:course_categories,id',
        ], [
            'name.required' => 'Vui lòng nhập tên khóa học.',
            'name.string' => 'Tên khóa học phải là chuỗi.',
            'name.max' => 'Tên khóa học không được vượt quá 100 ký tự.',
            'description.required' => 'Vui lòng nhập mô tả khóa học.',
            'description.string' => 'Mô tả khóa học phải là chuỗi.',
            'description.max' => 'Mô tả khóa học không được vượt quá 255 ký tự.',
            'thumbnail.image' => 'File bạn chọn không phải là hình ảnh hợp lệ.',
            'thumbnail.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'thumbnail.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
            'video_demo.mimes' => 'Video demo phải có định dạng mp4, avi, mov, wmv.',
            'video_demo.max' => 'Kích thước video demo không được vượt quá 20MB.',
            'price.required' => 'Vui lòng nhập giá khóa học.',
            'price.numeric' => 'Giá khóa học phải là số.',
            'price.min' => 'Giá khóa học phải lớn hơn hoặc bằng 10.000VNĐ.',
            'category_id.required' => 'Vui lòng chọn danh mục khóa học.',
            'category_id.exists' => 'Danh mục khóa học bạn chọn không tồn tại.',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
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
        return response()->json(['redirect_url' => route('client.editCourse', $id)]);
    }
    public function deleteCourse($id)
    {
        DB::table('courses')
            ->where('id', $id)
            ->delete();
        return redirect()->route('client.instructor-course', ['id' => $id]);
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

    public function recallCourse(Request $request, $id)
    {
        // Xử lý logic thu hồi khóa học
        $course = Course::findOrFail($id);
        $course->status = 0; // Đặt status của khóa học thành 0 (hoặc giá trị tương ứng cho trạng thái thu hồi)
        $course->save();

        // Redirect về route instructor-course với ID của khóa học
        return redirect()->route('client.instructor-course', ['id' => $id])->with('success', 'Đã thu hồi khóa học thành công.');
    }


    //    public function coursedetails()
    //    {
    //        return view('client.instructor.instructor-coursedetails');
    //    }

    public function dashboard()
    {
        return view('client.instructor.instructor-dashboard');
    }
    public function saveProgress(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $videoProgress = Video_not_done::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'course_id' => $request->course_id,
                    'chapter_id' => $request->chapter_id,
                    'lesson_id' => $request->lesson_id
                ],
                [
                    'percent' => $request->percent
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Video progress updated successfully!',
                'data' => $videoProgress,
            ]);
        }

        return response()->json(['status' => 'error'], 403);
    }
    public function completeProgress(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            Video_not_done::where([
                'user_id' => $user->id,
                'course_id' => $request->course_id,
                'chapter_id' => $request->chapter_id,
                'lesson_id' => $request->lesson_id
            ])->delete();
            Video_done::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'course_id' => $request->course_id,
                    'chapter_id' => $request->chapter_id,
                    'lesson_id' => $request->lesson_id
                ],
                [
                    'percent' => 1
                ]
            );
            return response()->json([
                'status' => 'success',
                'message' => 'Video progress completed and data removed successfully!',
            ]);
        }

        return response()->json(['status' => 'error'], 403);
    }
}
