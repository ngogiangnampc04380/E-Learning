<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course_user;
use App\Models\Video_done;
use App\Models\ReplyCommentCourse;

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
use App\Models\QuizFinal;
use App\Models\SalePivot;
use App\Models\CommentCourse;
class CommentController  extends Controller
{


    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'content' => 'required|string|max:1000',
            'stars' => 'required|integer|between:1,5', // Đảm bảo đánh giá từ 1 đến 5 sao
            'course_id' => 'required|exists:courses,id', // Kiểm tra khóa học có tồn tại
        ]);

        // Lưu bình luận và đánh giá vào cơ sở dữ liệu
        $comment = new CommentCourse();
        $comment->user_id = Auth::id(); // Lưu ID của người dùng hiện tại
        $comment->course_id = $request->input('course_id');
        $comment->content = $request->input('content');
        $comment->stars = $request->input('stars');
        $comment->status = '1'; // Hoặc giá trị mặc định khác nếu cần
        $comment->save();

        return redirect()->back()->with('success', 'Bình luận và đánh giá đã được gửi.');
    }
   
    
    // CommentController.php
public function update(Request $request, $id)
{
    $comment = CommentCourse::findOrFail($id);
    $comment->content = $request->input('content');
    $comment->stars = $request->input('stars');
    $comment->save();

    return redirect()->back()->with('success', 'Bình luận đã được cập nhật.');
}
public function destroy($id)
{
    $comment = CommentCourse::findOrFail($id);
    
    // Kiểm tra quyền của người dùng (tùy thuộc vào yêu cầu)
    if (auth()->user()->id !== $comment->user_id) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }
    
    $comment->delete();
    
    return response()->json(['message' => 'Comment deleted successfully']);
}
public function reply(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Kiểm tra xem bình luận gốc có tồn tại không
        $originalComment = CommentCourse::findOrFail($id);

        // Tạo một phản hồi mới
        $reply = new ReplyCommentCourse();
        $reply->comment_course_id = $originalComment->id;
        $reply->user_id = auth()->id(); // Assuming the user is authenticated
        $reply->content = $request->input('content');
        $reply->status = '1'; // Set status if needed
        $reply->save();

        return redirect()->back()->with('success', 'Trả lời bình luận đã được gửi.');
    }
    public function updaterep(Request $request, $id)
    {
        $reply = ReplyCommentCourse::findOrFail($id);

        // Kiểm tra quyền của người dùng
        if (auth()->check() && auth()->user()->id == $reply->user_id) {
            $reply->content = $request->input('content');
            $reply->save();

            return redirect()->back()->with('success', 'Cập nhật trả lời thành công.');
        }

        return redirect()->back()->with('error', 'Bạn không có quyền chỉnh sửa trả lời này.');
    }
    public function destroyReply($id)
    {
        // Tìm trả lời dựa trên ID
        $reply = ReplyCommentCourse::findOrFail($id);
    
        // Kiểm tra nếu người dùng hiện tại là chủ sở hữu của trả lời
        if (auth()->check() && auth()->user()->id == $reply->user_id) {
            $reply->delete();
            return redirect()->back()->with('success', 'Trả lời đã được xóa thành công.');
        }
    
        return redirect()->back()->with('error', 'Bạn không có quyền xóa trả lời này.');
    }
    
    

}
