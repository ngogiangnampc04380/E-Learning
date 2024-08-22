<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Course_user;
use Illuminate\Http\Request;
use PDF; // Facade cho DOMPDF
use App\Models\User; // Model User
use App\Mail\CertificateMail;
use Illuminate\Support\Facades\Mail;
class CertificateController extends Controller
{
    public function generate($userId, $courseID)
    {
        if(auth()->check()){
            $user = User::find($userId);
            if(auth()->user()->id ==  $user->id){
            $courses = Course::find($courseID);
            if (!$user) {
                abort(404, 'User not found');
            }
    
            $data = [
                'name' => $user->name,
                'course' =>$courses->name,
                'date' => date('d/m/Y'),
            ];
            // Tải view và tạo PDF
            $pdf = PDF::loadView('client.courses.certificate', $data);
            $pdf->download('certificate.pdf');
    
            // Trả về file PDF tải xuống hoặc hiển thị trong trình duyệt
            // return 
            return view('client.courses.certificate', $data);
        }else{
            abort(403, 'forbiden');
        }
        }
       
    }
    public function sendCertificateEmail(Request $request)
{
    $user = User::find($request->user_id);
    $course = Course::find($request->course_id);

    // Gửi email chứng chỉ
    Mail::to($user->email)->send(new CertificateMail($user->name, $course));

    return response()->json(['message' => 'Email chứng chỉ đã được gửi thành công!']);
}

   }
