<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('Dashboard-client');
        }
        return view('client.auth.register');

    }
    public function register(AuthRequest $request)
    {
        //Lấy IP từ mấy người dùng
        // $request->validated();
        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('login')->withSuccess('Đăng ký thành công !');
    }
    
}
