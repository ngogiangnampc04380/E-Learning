<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Course_user;
use Illuminate\Http\Request;
use PDF; // Facade cho DOMPDF
use App\Models\User; // Model User
use App\Mail\CertificateMail;
use App\Models\Certificate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CertificateController extends Controller
{
    public function generate($userId, $courseID)
    {
        if (auth()->check()) {
            $user = User::find($userId);
            if (auth()->user()->id == $user->id) {

                $courses = Course::find($courseID);
                $quizzresultforfinal = DB::table('results_final')
                    // ->where('score', '>=', 60)
                    ->where('user_id', $userId)
                    ->where('course_id', $courseID)
                    ->count();

                $quizzforfinal = DB::table('quiz_finals')
                    ->where('course_id', $courseID)
                    ->count();
                if ($quizzresultforfinal == $quizzforfinal) {

                    if (!$user) {
                        abort(404, 'User not found');
                    }

                    $data = [
                        'name' => $user->name,
                        'course' => $courses->name,
                        'date' => date('d/m/Y'),
                    ];
                    // Tải view và tạo PDF
                    $pdf = PDF::loadView('client.courses.certificate', $data);
                    $pdf->download('certificate.pdf');

                    // Trả về file PDF tải xuống hoặc hiển thị trong trình duyệt
                    // return 
                    return view('client.courses.certificate', $data);
                } else {
                    abort(403, 'khóa học chưa hoàn thành');
                }
            } else {
                abort(403, 'forbiden');
            }
        }
    }
    public function sendCertificateEmail(Request $request)
    {
        $certificate = Certificate::firstOrCreate(
            [
                'user_id' => $request->user_id,
                'course_id' => $request->course_id,
            ],
            ['email_sent' => false] // Giá trị mặc định nếu chưa tồn tại
        );

        // Kiểm tra nếu email chưa được gửi
        if (!$certificate->email_sent) {
            $user = $certificate->user;
            $course = $certificate->course;

            // Gửi email chứng chỉ
            Mail::to($user->email)->send(new CertificateMail($user->name, $course));

            // Cập nhật trạng thái đã gửi email
            $certificate->email_sent = true;
            $certificate->save();

            return response()->json(['message' => 'Email chứng chỉ đã được gửi thành công!']);
        }

        return response()->json(['message' => 'Email chứng chỉ đã được gửi trước đó!']);
    }
}
