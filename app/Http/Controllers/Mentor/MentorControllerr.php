<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\idCard;
use App\Models\Mentor;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MentorControllerr extends Controller
{

    public function mentorRegister()
    {

        $mentor_check = Mentor::where('user_id', auth()->id())->first();
        if ($mentor_check) {
            if ($mentor_check->user_id) {
                return redirect()->route('upload-id-card');
            }
        }
        return view('mentor.auth.mentorRegister');
    }
    public function handleRegister(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'min:2', 'max:40', 'regex:/[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/'],
            ],
            [
                'name.required' => 'Vui lòng nhập tên.',
                'name.min' => 'Tên ít nhất phải :min ký tự!',
                'name.max' => 'Tên không được vượt quá :max ký tự!',
                'name.regex' => 'Tên không được chứa ký tự đặc biệt!',

            ]
        );

        Mentor::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
        ]);

        return redirect()->route('upload-id-card');
    }
    public function profile()
    {
        // dd(auth()->user()->mentor->id);
        $user = Auth::user();
        return view('mentor.profile.profile');
    }



    public function upload_ID_Card(Request $request)
    {

        $mentor_check = Mentor::where('user_id', auth()->id())->first();

        if ($mentor_check) {
            if ($mentor_check->front_card && $mentor_check->back_card) {
                return redirect()->route('error');
            }
        }


        return view('mentor.auth.upload-id-card', ['is_already' => $request->already ? 1 : 0]);
    }
    public function handleUploadIdCard(Request $request)
    {
        $front_card_name = uniqid() . '.' . $request->file('front_card')->getClientOriginalExtension();
        $back_card_name = uniqid() . '.' . $request->file('back_card')->getClientOriginalExtension();
        $request->front_card->move(storage_path('app/mentor/cccd'), $front_card_name);
        $request->back_card->move(storage_path('app/mentor/cccd'), $back_card_name);
        $mentror = Mentor::where('user_id', auth()->id())->first();
        // dd($mentror);
        // die;
        if ($mentror) {
            $mentror->update([
                'front_card' => $front_card_name,
                'back_card' => $back_card_name,
            ]);

            //chuyển role sang 3 khi đăng ký mentor
            $userid = Auth::user()->id;
            $user = User::where('id', $userid);
            $user->update(['role' => 3]);


            return redirect()->route('error');
        }
    }

    public function saveIdCardData(Request $request)
    {

        if (IdCard::where('id', $request->id)->exists()) {
            return response()->json([
                'status' => '0',
                'message' => 'ID already exists'
            ]);
        }


        // $user = auth()->user();


        // if (!$user) {
        //     return response()->json([
        //         'status' => '0',
        //         'message' => 'User not authenticated'
        //     ]);
        // }

        // $mentor = Mentor::where('user_id', $user->id)->first();

        // if (!$mentor) {
        //     return response()->json([
        //         'status' => '0',
        //         'message' => 'Mentor not found for the current user',
        //     ]);
        // }

        // $mentorId = $mentor->id;

        IdCard::create([
            // 'id_mentor' => $mentorId,
            'id' => $request->id,
            'id_prob' => $request->id_prob,
            'name' => $request->name,
            'name_prob' => $request->name_prob,
            'dob' => $request->dob,
            'dob_prob' => $request->dob_prob,
            'sex' => $request->sex,
            'sex_prob' => $request->sex_prob,
            'nationality' => $request->nationality,
            'nationality_prob' => $request->nationality_prob,
            'home' => $request->home,
            'home_prob' => $request->home_prob,
            'address' => $request->address,
            'address_prob' => $request->address_prob,
            'doe' => $request->doe,
            'doe_prob' => $request->doe_prob,
            'overall_score' => $request->overall_score,
            'number_of_name_lines' => $request->number_of_name_lines,
            'features' => $request->features,
            'features_prob' => $request->features_prob,
            'issue_date' => $request->issue_date,
            'issue_date_prob' => $request->issue_date_prob,
            'mrz' => $request->mrz,
            'mrz_prob' => $request->mrz_prob,
            'issue_loc' => $request->issue_loc,
            'issue_loc_prob' => $request->issue_loc_prob,
            'type_new' => $request->type_new,
            'type' => $request->type,
            'mrz_details' => $request->mrz_details,
        ]);

        return response()->json([
            'status' => '1',
            'message' => 'ID Card data saved successfully',
            // 'user' => $user,
            // 'mentor' => $mentor
        ]);
    }
    public function error()
    {
        $check = Mentor::where('user_id', auth()->id())->first();

        if (!$check) {
            return redirect()->route('Dashboard-client');
        } else {
            // Lấy danh sách các categories
            // $categories = Course_Category::all();
            return view('components.under-construction');
        }
    }
}
