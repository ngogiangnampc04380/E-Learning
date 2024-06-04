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

