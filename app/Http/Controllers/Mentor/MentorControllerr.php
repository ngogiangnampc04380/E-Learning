<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\idCard;
use App\Models\Mentor;
use Illuminate\Support\Facades\Storage;
class MentorControllerr extends Controller
{
    public function mentorRegister(){
        return view('mentor.auth.mentorRegister');
    }
    public function handleRegister(Request $request)
{
    // Tạo mentor mới
    $mentor = new Mentor();
    $mentor->user_id = auth()->id();
    $mentor->save();

    return redirect()->route('mentor-upload-id-card');
}
    public function profile(){
        return view('mentor.profile.profile');
    }
    public function upload_ID_Card(Request $request){
        
        $mentor_check = Mentor::where('user_id', auth()->id())->first();
        
        if ($mentor_check) {
            if ($mentor_check->image['front_card'] && $mentor_check->image['back_card']) {
                return redirect()->route('mentor-face-verify');
            }
        }
        return view('mentor.auth.upload-id-card');
    }

    public function handleUploadIdCard(Request $request)
    {
        $front_card_name = uniqid() . '.' . $request->file('front_card')->getClientOriginalExtension();
        $back_card_name = uniqid() . '.' . $request->file('back_card')->getClientOriginalExtension();
        $request->front_card->move(storage_path('app/mentor/cccd'), $front_card_name);
        $request->back_card->move(storage_path('app/mentor/cccd'), $back_card_name);
        Mentor::where('user_id', auth()->id())->first()->update([
            'image.front_card' => $front_card_name,
            'image.back_card' => $back_card_name,
        ]);
        return redirect()->route('mentor-face-verify');
    }

    public function handleFaceVerify(Request $request)
    {

        if ($request->user_face) {
            $fileName = uniqid() . '.' . $request->file('user_face')->getClientOriginalExtension();
            auth()->user()->mentor->update([
                'image.user_face' => $fileName,
            ]);
            $this->upload_file($fileName, storage_path('app/mentor/face'), $request->file('user_face')
            );
        }
        return 1;
    }
    public function saveIdCardData(Request $request)
    {
        if (IdCard::where('id', $request->id)->exists()) {
            return response()->json([
                'status' => '0',
            ]);
        }

        IdCard::create(array_merge(['mentor_id' => auth()->user()->mentor->id], $request->all()));
        return response()->json([
            'status' => '1',
        ]);

    }
}
