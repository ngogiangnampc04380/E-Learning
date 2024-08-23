<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuizFinal;
use App\Models\AnswerFinal;
use App\Models\QuestionFinal;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreQuizFinalRequest;
use App\Models\Course;
use App\Models\ResultFinal;

class QuizCourseController extends Controller
{

    public function index($course_id)
    {
        $quizFinals = QuizFinal::where('course_id', $course_id)->get();
        return view('client.quiz.list-quiz-final', compact('course_id', 'quizFinals'));
    }


    public function show($quiz_id)
    {
        $quizFinal = QuizFinal::with('questions.answers')->findOrFail($quiz_id);
        $course = Course::findOrFail($quizFinal->course_id);
        return view('client.quiz.show-quiz-final', compact('quizFinal', 'course'));
    }

    // Hiển thị form thêm quiz
    public function create($course_id)
    {
        return view('client.quiz.add-quiz-final', compact('course_id'));
    }

    // Lưu quiz mới
    public function store(Request  $request, $course_id)
    {
        // Lấy số thứ tự lớn nhất hiện tại
        $maxNumber = QuizFinal::where('course_id', $course_id)->max('number');

        $quizFinal = new QuizFinal();
        $quizFinal->course_id = $course_id;
        $quizFinal->mentor_id = Auth::user()->mentor->id;
        $quizFinal->title = $request->title;
        $quizFinal->number = $maxNumber + 1; // Số thứ tự mới
        $quizFinal->save();

        // Thêm câu hỏi và câu trả lời (như cũ)
        foreach ($request->questions as $questionData) {
            $question = new QuestionFinal();
            $question->quiz_final_id = $quizFinal->id;
            $question->questions = $questionData['question'];
            $question->save();

            foreach ($questionData['answers'] as $answerData) {
                $answer = new AnswerFinal();
                $answer->question_id = $question->id;
                $answer->answer_text = $answerData['answer'];
                $answer->is_correct = $answerData['is_correct'];
                $answer->save();
            }
        }
        return redirect()->route('client.editCourse', ['id' => $course_id])
            ->with('success', 'Quiz đã được tạo thành công!');
    }
    public function updateOrderQuizFinal(Request $request, $course_id)
    {
        $quizIds = $request->input('quiz_ids');

        foreach ($quizIds as $index => $id) {
            $quiz = QuizFinal::find($id);
            if ($quiz) {
                $quiz->number = $index + 1;
                $quiz->save();
            }
        }

        return response()->json(['success' => true]);
    }



    public function edit($quiz_id)
    {
        $quizFinal = QuizFinal::with('questions.answers')->findOrFail($quiz_id);
        return view('client.quiz.edit-quiz-final', compact('quizFinal'));
    }

    // Cập nhật quiz
    public function update(Request $request, $quiz_id)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'title' => 'required|string|max:255',
            'questions.*.question' => 'required|string|max:255',
            'questions.*.answers.*.answer' => 'required|string|max:255',
            'questions.*.answers.*.is_correct' => 'required|boolean'
        ]);

        // Tìm quiz dựa trên quiz_id
        $quizFinal = QuizFinal::findOrFail($quiz_id);

        // Cập nhật tiêu đề quiz
        $quizFinal->title = $request->input('title');
        $quizFinal->save();
        // Xóa các câu hỏi cũ
        $quizFinal->questions()->delete();

        // Thêm các câu hỏi và đáp án mới
        foreach ($request->input('questions') as $questionIndex => $questionData) {
            // Tạo câu hỏi mới
            $question = new QuestionFinal();
            $question->quiz_final_id = $quizFinal->id;
            $question->questions = $questionData['question'];
            $question->save();

            foreach ($questionData['answers'] as $answerIndex => $answerData) {
                // Tạo đáp án mới
                $answer = new AnswerFinal();
                $answer->question_id = $question->id;
                $answer->answer_text = $answerData['answer'];
                $answer->is_correct = $answerData['is_correct'];
                $answer->save();
            }
        }
        return redirect()->route('client.quiz.edit-quiz-final', ['quiz_id' => $quiz_id])
            ->with('success', 'Quiz đã được cập nhật thành công.');
    }
    public function destroy($quiz_id)
    {
        $quizFinal = QuizFinal::findOrFail($quiz_id);
        $course_id = $quizFinal->course_id;
        $quizFinal->delete();

        // Điều hướng đến trang chỉnh sửa khóa học với ID của khóa học
        return redirect()->route('client.editCourse', ['id' => $course_id])
            ->with('success', 'Quiz đã được xóa thành công.');
    }

    public function quiz($quiz_id)
    {
        $quizFinal = QuizFinal::with('questions.answers')->findOrFail($quiz_id);
        $questions = $quizFinal->questions;

        // Xáo trộn đáp án của mỗi câu hỏi
        foreach ($questions as $question) {
            $question->answers = $question->answers->shuffle();
        }

        $course = Course::findOrFail($quizFinal->course_id);
        return view('client.quiz.quiz-final', compact('quizFinal', 'course', 'questions'));
    }




    public function submitQuiz(Request $request, $quiz_id)
    {
        // Lấy quiz và các câu hỏi liên quan
        $quizFinal = QuizFinal::with('questions.answers')->findOrFail($quiz_id);

        $score = 0;
        $totalQuestions = $quizFinal->questions->count();
        $userAnswers = $request->except('_token'); // Lấy tất cả các câu trả lời của người dùng

        foreach ($quizFinal->questions as $question) {
            $selectedAnswerId = $request->input('question_' . $question->id);

            // Kiểm tra câu trả lời đúng
            if ($question->answers()->where('id', $selectedAnswerId)->where('is_correct', true)->exists()) {
                $score++;
            }
        }

        // Tính điểm theo thang điểm 100 và làm tròn đến 2 chữ số thập phân
        $scaledScore = number_format(($score / $totalQuestions) * 100, 2);

        // Tạo mảng kết quả để truyền vào view
        $result = [
            'score' => $scaledScore,
            'totalQuestions' => $totalQuestions,
            'percentage' => $scaledScore
        ];

        // Tìm kết quả hiện tại của người dùng cho bài kiểm tra này
        $existingResult = ResultFinal::where('user_id', Auth::id())
            ->where('quiz_final_id', $quiz_id)
            ->first();

        if ($existingResult) {
            // Nếu đã có kết quả, cập nhật điểm số nếu điểm mới cao hơn
            if ($scaledScore > $existingResult->score) {
                $existingResult->update([
                    'score' => $scaledScore,
                ]);
            }
        } else {
            // Nếu chưa có kết quả, tạo mới bản ghi
            ResultFinal::create([
                'user_id' => Auth::id(),
                'quiz_final_id' => $quiz_id,
                'course_id' => $quizFinal->course_id,
                'score' => $scaledScore,
            ]);
        }

        // Lưu câu trả lời của người dùng vào session
        session()->put('user_answers', $userAnswers);

        // Trả về view với kết quả và câu trả lời
        return view('client.quiz.quiz-result', compact('quizFinal', 'result', 'userAnswers'));
    }

    public function quizResult($id, $score)
    {
        $quizFinal = QuizFinal::with(['questions.answers', 'course'])->findOrFail($id);
        $questions = $quizFinal->questions;
        $userAnswers = session()->get('user_answers', []);

        return view('client.quiz.quiz-result', compact('quizFinal', 'score', 'questions', 'userAnswers'));
    }
}
