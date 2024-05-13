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
        
        $validatedData = $request->validated();

        // Tạo tài khoản người dùng
        $user = User::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            
        ]);
        if (!$user) {
            return redirect('login')->withSuccess('Sign Up Success!');
        } else {
            return redirect('register')->with(['error' => 'Registration failed!']);
        }
        
    }
}
