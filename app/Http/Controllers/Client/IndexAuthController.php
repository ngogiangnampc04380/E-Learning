<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class IndexAuthController extends Controller
{
    protected function _registerOrLoginUser($data)
    {

        $user = User::where('email', '=', $data->email)->first();
        // dd($user);
        if (!$user) {
            $user = new User();
            $user->auth = $data->id;
            $user->name = $data->name;
            $user->email = $data->email;
            $user->thumbnail = $data->avatar;
            $user->save();
        }
        Auth::login($user);
    }
    public function index()
    {
        
        if (auth()->check()) {
            // var_dump(auth());
            return redirect()->route('Dashboard-client');
        }
        return view('client.auth.login');
    }

    public function handleGoogleCallback()
    {
        // try {
        //     $user = Socialite::driver('google')->user();
        //     $finduser = User::where('auth', $user->id)->first();
        //     if($finduser)
        //     {
        //         Auth::login($finduser);
        //         return redirect()->intended('Dashboard-client');
        //     }
        //     else
        //     {
        //         $newUser = User::create([
        //             'name' => $user->name,
        //             'email' => $user->email,
        //             'auth'=> $user->id,
        //             
        //         ]);
      
        //         Auth::login($newUser);
      
        //         return redirect()->intended('Dashboard-client');
        //     }
      
        // } catch (Exception $e) {
        //     dd($e->getMessage());
        // }


        $user = Socialite::driver('google')->stateless()->user();
// dd($user->avatar);
        $this->_registerOrLoginUser($user);

        return redirect()->route('Dashboard-client');
    }

    public function redirectToGoogle()
    {

        return Socialite::driver('google')->redirect();
    }
    public function login(AuthRequest $request)
{
    $request->validated();
    
    // Tìm người dùng theo email
    $user = User::where('email', $request->email)->first();
    
    // Kiểm tra nếu người dùng không tồn tại hoặc bị vô hiệu hóa
    if ($user && $user->is_active == 0) {
        return redirect()->back()->withInput($request->only('email', 'password'))
            ->withErrors(['account_disabled' => 'Tài khoản của bạn đã bị vô hiệu hóa! Hãy liên hệ đến mail: chithiencs195@gmail.com để gửi yêu cầu hỗ trợ!']);
    }

    // Thực hiện đăng nhập nếu tài khoản hợp lệ và hoạt động
    if (Auth::attempt($request->only('email', 'password'))) {
        session(['id' => Auth::user()->id]);
        return redirect()->route('Dashboard-client');
    } else {
        // Chỉ thông báo lỗi nếu không phải tài khoản bị vô hiệu hóa
        return redirect()->back()->withInput($request->only('email', 'password'))
            ->withErrors(['email' => 'Thông tin đăng nhập không chính xác!']);
    }
}


    
}

