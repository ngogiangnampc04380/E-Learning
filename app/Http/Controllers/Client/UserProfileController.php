<?php

namespace App\Http\Controllers\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    use HasFactory, Notifiable, SoftDeletes;
    public function userprofile() {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $userId = Session::get('id');
        $data = User::with('educations')->find($userId); // Load cả quan hệ educations
        return view('client.profile.profile', ['data' => $data]);
    }

    public function profile_edit(Request $request)
{
    // Xác thực dữ liệu
    $validatedData = $request->validate([
        'name' => 'required|string|max:50|regex:/^[\pL\s\d]+$/u',
        'phone' => [
            'required',
            'regex:/^(0)[0-9]{9}$/',
        ],
        'email' => [
            'required',
            'email',
            Rule::unique('users')->ignore(auth()->id()),
        ],
        'address' => 'required|string|max:200',
        'introduce' => 'nullable|string|max:1000',
        'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'link_mail' => 'nullable|string|max:255',
        'link_face' => 'nullable|string|max:255',
        'link_youtube' => 'nullable|string|max:255',
    ], [
        'name.required' => 'Tên không được để trống.',
        'name.string' => 'Tên phải là chuỗi.',
        'name.max' => 'Tên không được vượt quá 50 kí tự.',
        'name.regex' => 'Tên chỉ được nhập chữ cái, chữ số và khoảng trắng.',
        'phone.required' => 'Số điện thoại không được để trống.',
        'phone.regex' => 'Số điện thoại không hợp lệ, phải bắt đầu bằng 0 và đúng 10 số.',
        'email.required' => 'Email không được để trống.',
        'email.email' => 'Địa chỉ email không hợp lệ.',
        'email.unique' => 'Email đã tồn tại.',
        'address.required' => 'Địa chỉ không được để trống.',
        'address.string' => 'Địa chỉ phải là chuỗi.',
        'address.max' => 'Địa chỉ không được vượt quá 200 kí tự.',
        'introduce.max' => 'Giới thiệu không được vượt quá 1000 kí tự.',
        'thumbnail.image' => 'Tệp được chọn phải là hình ảnh.',
        'thumbnail.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif.',
        'thumbnail.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        'link_mail.max' => 'Email liên hệ không được vượt quá 255 kí tự.',
        'link_face.max' => 'Link Facebook không được vượt quá 255 kí tự.',
        'link_youtube.max' => 'Link YouTube không được vượt quá 255 kí tự.',
    ]);

    // Kiểm tra link FaceBook
    if ($request->link_face && (strpos($request->link_face, 'https://www.facebook.com') !== 0)) {
        return response()->json(['errors' => ['link_face' => ['Đường dẫn không phải là đường dẫn Facebook hợp lệ.']]], 422);
    }

    // Kiểm tra link YouTube
    if ($request->link_youtube && (strpos($request->link_youtube, 'https://www.youtube.com') !== 0)) {
        return response()->json(['errors' => ['link_youtube' => ['Đường dẫn không phải là đường dẫn YouTube hợp lệ.']]], 422);
    }

    // Cập nhật thông tin người dùng
    $user = User::find(auth()->id());
    $data = $request->only([
        'name', 'username', 'phone', 'email', 'address', 'introduce', 'link_face', 'link_mail', 'link_youtube'
    ]);

    if ($request->hasFile('thumbnail')) {
        $destination = storage_path('public/' . $user->thumbnail);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $thumbnail = $request->file('thumbnail');
        $thumbnailName = $thumbnail->getClientOriginalName();
        $thumbnail->storeAs('public/', $thumbnailName);
        $data['thumbnail'] = $thumbnailName;
    }

    $user->update($data);

    return response()->json(['redirect_url' => route('client.user-profile')]);
}


    public function storeEducation(Request $request)
    {
        $request->validate([
            'academic_level' => 'required|string|max:255',
            'school' => 'required|string|max:255',
            'describe' => 'required|string|max:500',
            'time' => 'required|string|max:25|regex:/^[\d\s\/\.-]+$/',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'academic_level.required' => 'Bạn không được bỏ trống trường Trình độ.',
            'school.required' => 'Bạn không được bỏ trống trường Trường.',
            'describe.required' => 'Bạn không được bỏ trống trường Mô tả.',
            'time.required' => 'Bạn không được bỏ trống trường Thời gian.',
            'time.regex' => 'Thời gian nhập đúng theo định dạng sau 13/01/2001 - 13/01/2001 hoặc 2001 - 2001 hoặc 13.01.2001 - 13.01.2001',
            'thumbnail.image' => 'Ảnh minh họa phải là một tệp hình ảnh.',
            'thumbnail.mimes' => 'Ảnh minh họa phải có định dạng jpeg, png, jpg, gif hoặc svg.',
            'thumbnail.max' => 'Ảnh minh họa không được vượt quá 2MB.',
        ]);
    
        $data = $request->only('academic_level', 'school', 'describe', 'time');
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnail->storeAs('public/', $thumbnailName);
            $data['thumbnail'] = $thumbnailName;
        }
        $data['user_id'] = Auth::id();
        Education::create($data);
    
        return response()->json(['success' => true, 'redirect_url' => route('client.user-profile')]);
    }
    


    public function updateEducation(Request $request, $id) {
        $request->validate([
            'academic_level' => 'nullable|string|max:255',
            'school' => 'nullable|string|max:255',
            'describe' => 'nullable|string|max:500',
            'time' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $education = Education::findOrFail($id);
        $data = $request->only('academic_level', 'school', 'describe', 'time');
        if ($request->hasFile('thumbnail')) {
            $destination = storage_path('public/'.$education->thumbnail);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnail->storeAs('public/', $thumbnailName);
            $data['thumbnail'] = $thumbnailName;
        }
        $education->update($data);

        return response()->json(['redirect_url' => route('client.user-profile')]);
    }

    public function deleteEducation($id) {
        $education = Education::findOrFail($id);
        $destination = storage_path('public/'.$education->thumbnail);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $education->delete();

        return response()->json(['redirect_url' => route('client.user-profile')]);
    }
    public function getEducation($id) {
        $education = Education::findOrFail($id);
        return response()->json($education);
    }

    public function showDisableAccountForm()
    {
        return view('client.profile.disable-account');
    }

    // Xử lý yêu cầu vô hiệu hóa tài khoản
    public function disableAccount(Request $request)
    {
        $user = Auth::user();

        Auth::logout(); // Đăng xuất người dùng

        // Xóa tài khoản
        DB::table('users')->where('id', $user->id)->delete();

        return redirect('/')->with('status', 'Tài khoản của bạn đã được vô hiệu hóa.');
    }
}
