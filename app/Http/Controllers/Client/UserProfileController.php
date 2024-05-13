<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
class UserProfileController extends Controller
{
    public function userprofile($id){
        $data = User::find($id);
        return view('client.profile.profile',['data' => $data]);
    }
    public function profile_edit( Request $request,$id) {
        $data = User::find($id);
        $data -> name = $request-> input('name');
        $data -> phone = $request->input('phone');
        $data -> address = $request->input('address');
        $data -> email = $request->input('email');
        if ($request->hasFile('thumbnail')) {
            $destination = storage_path('app/public/assets-client/img/user/'.$data->thumbnail);
            if(File::exists($destination)){
                File::delete($destination);
            }
                $thumbnail = $request->file('thumbnail');
                $thumbnailName = $thumbnail->getClientOriginalName();
                $thumbnail->storeAs('/public/assets-client/img/user', $thumbnailName); // Lưu vào thư mục storage/app/public/images
                $data->thumbnail = $thumbnailName;
        }
        $data->update();
        return redirect()->route('client.user-profile', ['id' => $id]);
            
}
}
