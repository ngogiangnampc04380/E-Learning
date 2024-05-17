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

        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->save();
        }
        Auth::login($user);
    }

    public function index()
    {
        
        if (auth()->check()) {
            return redirect()->route('Dashboard-client');
        }
        return view('client.auth.login');
    }
    // public function register(){
    //     return view('client.auth.register');
    // }
    // public function forgotpass(){
    //     return view('client.auth.forgotPassword');
    // }



    public function login(AuthRequest $request)
    {
        $request->validated();
        $findEmail = $request->email; // tìm mail người dùng nhập vào
        // Lấy bản ghi đầu tiên thỏa mãn điều kiện
        $result = User::where('email', $findEmail)->first();
        $ip_user = [];
        if ($result) {
            //lấy nhiều ip trong 1 tài khoản
            $ip_user = $result->ip;
        }
        if (!$ip_user) {
            $ip_user = [];
        }
        // Đếm số ip cử 1 tài khoản
        if (Auth::attempt($request->only('email', 'password'))) {
            session(['id' => Auth::user()->id]);
            // var_dump($request->only('email', 'password'));
            // die;
                return redirect()->route('Dashboard-client');                     
        } else {

            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'email' => 'Thông tin đăng nhập không chính xác.',
            ]);

        }
        return redirect()->route('Dashboard-client')->with('success', 'Logged in successfully');
    }
    
}

