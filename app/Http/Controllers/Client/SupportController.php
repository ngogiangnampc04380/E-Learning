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
use Laravel\Prompts\select;
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
use App\Mail\SupportRequestMail;
use Illuminate\Support\Facades\Mail;
class SupportController extends Controller
{
    public function contact() {
        $categories = Course_Category::all();
        return view('client.support-mail.support', compact('categories'));
    }
    
    public function submitSupportForm(Request $request)
    {
        $data = $request->validate([
            'firstName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        // Lấy danh sách các user có role = 1
        $adminUsers = User::where('role', 1)->get();
    
        // Gửi email đến từng admin user
        foreach ($adminUsers as $admin) {
            Mail::to($admin->email)->send(new SupportRequestMail($data));
        }
    
        $categories = Course_Category::all();
    
        return redirect()->back()->with('success', 'Support request has been sent successfully.');
    }
    
    

    
}
