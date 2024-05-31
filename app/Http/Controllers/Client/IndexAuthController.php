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
    public function index()
    {
        
        if (auth()->check()) {
            // var_dump(auth());
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
        $findEmail = $request->email; 
        $result = User::where('id', $findEmail)->first();
        if (Auth::attempt($request->only('email', 'password'))) {
            session(['id' => Auth::user()->id]);
            // var_dump($request->only('email', 'password'));
            // die;
                return redirect()->route('Dashboard-client')->with('Đăng nhập thành công !');                     
        } else {    

            return redirect()->back()->withInput($request->only('email','password'))->withErrors([
                'email' => 'Thông tin đăng nhập không chính xác!!!',
                // 'password'=>'Mật khẩu không chính xác'
            ]);

        }
        return redirect()->route('Dashboard-client')->with('success', 'Logged in successfully');
    }
    
}

