<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\File;
class UserProfileController extends Controller
{
    public function userprofile() {
        $userId = Session::get('id');
        $data = User::with('educations')->find($userId); // Load cả quan hệ educations
        return view('client.profile.profile', ['data' => $data]);
    }

    public function profile_edit(Request $request) {
        $data = [];
        $request->name ? $data['name'] = $request->name : '';
        $request->username ? $data['username'] = $request->username : '';
        $request->phone ? $data['phone'] = $request->phone : '';
        $request->email ? $data['email'] = $request->email : '';
        $request->address ? $data['address'] = $request->address : '';
        $request->introduce ? $data['introduce'] = $request->introduce : '';


        $user = User::find(Auth::id());
        if ($request->hasFile('thumbnail')) {
            $destination = storage_path('app/public/assets-client/img/user/'.$user->thumbnail);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = $thumbnail->getClientOriginalName();
            $thumbnail->storeAs('/public/assets-client/img/user', $thumbnailName);
            $user->thumbnail = $thumbnailName;
        }
        $user->update($data);
        return redirect()->route('client.user-profile');
    }

    public function storeEducation(Request $request) {
        $request->validate([
            'academic_level' => 'nullable|string|max:255',
            'school' => 'nullable|string|max:255',
            'describe' => 'nullable|string|max:500',
            'time' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('academic_level', 'school', 'describe', 'time');
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnail->storeAs('public/assets-client/img/educations', $thumbnailName);
            $data['thumbnail'] = $thumbnailName;
        }
        $data['user_id'] = Auth::id();
        Education::create($data);

        return redirect()->route('client.user-profile');
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
            $destination = storage_path('app/public/assets-client/img/educations/'.$education->thumbnail);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnail->storeAs('public/assets-client/img/educations', $thumbnailName);
            $data['thumbnail'] = $thumbnailName;
        }
        $education->update($data);

        return redirect()->route('client.user-profile');
    }

    public function deleteEducation($id) {
        $education = Education::findOrFail($id);
        $destination = storage_path('app/public/assets-client/img/educations/'.$education->thumbnail);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $education->delete();

        return redirect()->route('client.user-profile');
    }
    public function getEducation($id) {
        $education = Education::findOrFail($id);
        return response()->json($education);
    }
}
