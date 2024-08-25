<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Course_user;
use App\Models\Mentor;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class UserDashboardController extends Controller
{


    public function dashboard()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $userId = Session::get('id');
        $data = User::find($userId);
        $mentor = Mentor::where('user_id', $userId)->first();
        $course = Course::where('mentor_id', $mentor->id)->get();

        $reneuve = 0;
        $profit = 0; 
        $eroll = 0;

        foreach ($course as $cou) {
            $reneuve += Order::where('course_id', $cou->id)->sum('price_paid');
           
            $profit =  $reneuve * 0.9;
            $eroll += Course_user::where('course_id', $cou->id)->count();
        }
        

        // Lấy dữ liệu số người đăng ký trong tháng 8 (giả sử bạn muốn đếm theo ngày)
        $startDate = Carbon::create(Carbon::now()->year, 8, 1); // Ngày bắt đầu là 1/8
        $endDate = Carbon::create(Carbon::now()->year, 8, 31); // Ngày kết thúc là 31/8

        $labels = [];
        $enrollments = [];

        for ($i = 0; $i < $endDate->diffInDays($startDate) + 1; $i++) {
            $date = $startDate->copy()->addDays($i);
            $labels[] = $date->format('d/m');

            $dailyEnrollments = Course_user::where('created_at', '>=', $date->startOfDay())
                ->where('created_at', '<=', $date->endOfDay())
                ->whereIn('course_id', $course->pluck('id'))
                ->count();

            $enrollments[] = $dailyEnrollments;
        }

        return view('client.profile.dashboard', compact('data', 'reneuve', 'profit', 'eroll', 'labels', 'enrollments'));
    }
}
