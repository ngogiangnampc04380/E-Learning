<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
class UserProfileController extends Controller
{
    public function userprofile(){
        $userId = Session::get('id');
        $data = User::find($userId);
        return view('client.profile.profile',['data' => $data]);
    }
    
    public function profile_edit( Request $request) {
        $data = [];
        $request->name ? $data['name'] = $request->name : '';
        $request->username ? $data['username'] = $request->username : '';
        $request->phone ? $data['phone'] = $request->phone : '';
        $request->email ? $data['email'] = $request->email : '';



        $user = User::find(Auth::id());
        if ($request->hasFile('thumbnail')) {
            $destination = storage_path('app/public/assets-client/img/user/'.$user->thumbnail);
            if(File::exists($destination)){
                File::delete($destination);
            }
                $thumbnail = $request->file('thumbnail');
                $thumbnailName = $thumbnail->getClientOriginalName();
                $thumbnail->storeAs('/public/assets-client/img/user', $thumbnailName); // Lưu vào thư mục storage/app/public/images
                $user->thumbnail = $thumbnailName;
        }
        $user->update($data);
        return redirect()->route('client.user-profile',$data);
            
}
}
