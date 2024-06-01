@extends('client.layout.authMaster')
@section('content')
@if ($message = Session::get('success'))
@include('components.message', ['message' => $message, 'type' => 'success'])
@endif
@if ($message = Session::get('need_login'))
@include('components.message', ['message' => $message, 'type' => 'fail'])
@endif
    
    <div class="row">
        <div class="col-md-6 login-bg">
            <div class="login-wrapper">
            <div class="owl-carousel login-slide owl-theme owl-loaded owl-drag">

                

                <div class="owl-stage-outer">
                    <div class="owl-stage"
                        style="transform: translate3d(-3798px, 0px, 0px); transition: all 0.25s ease 0s; width: 5318px;">
                        <div class="owl-item cloned" style="width: 735.6px; margin-right: 24px;">
                            <div class="welcome-login">
                                <div class="login-banner">
                                    <img src="/assets-client/img/login-img.png" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h2>Welcome to <br>DreamsLMS Courses.</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item cloned" style="width: 735.6px; margin-right: 24px;">
                            <div class="welcome-login">
                                <div class="login-banner">
                                    <img src="/assets-client/img/login-img.png" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h2>Welcome to <br>DreamsLMS Courses.</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 735.6px; margin-right: 24px;">
                            <div class="welcome-login">
                                <div class="login-banner">
                                    <img src="/assets-client/img/login-img.png" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h2>Welcome to <br>DreamsLMS Courses.</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 735.6px; margin-right: 24px;">
                            <div class="welcome-login">
                                <div class="login-banner">
                                    <img src="/assets-client/img/login-img.png" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h2>Welcome to <br>DreamsLMS Courses.</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 735.6px; margin-right: 24px;">
                            <div class="welcome-login">
                                <div class="login-banner">
                                    <img src="/assets-client/img/login-img.png" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h2>Welcome to <br>DreamsLMS Courses.</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item cloned active" style="width: 735.6px; margin-right: 24px;">
                            <div class="welcome-login">
                                <div class="login-banner">
                                    <img src="/assets-client/img/login-img.png" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h2>Welcome to <br>DreamsLMS Courses.</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item cloned" style="width: 735.6px; margin-right: 24px;">
                            <div class="welcome-login">
                                <div class="login-banner">
                                    <img src="/assets-client/img/login-img.png" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h2>Welcome to <br>DreamsLMS Courses.</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span
                            aria-label="Previous">‹</span></button><button type="button" role="presentation"
                        class="owl-next"><span aria-label="Next">›</span></button></div>
                <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                        role="button" class="owl-dot"><span></span></button><button role="button"
                        class="owl-dot"><span></span></button></div>
            </div>
        </div>
    </div>
        <div class="col-md-6 login-wrap-bg" >
            <div class="login-wrapper">
                <div class="loginbox">
            <div class="w-100" >
                <div class="img-logo">
                    <img src="{{ asset('/img/logo.gif') }}" class="img-fluid" alt="Logo">
                    <div class="back-home">
                        <a href="{{ route('Dashboard-client') }}">Go back to Home</a>
                    </div>
                </div>
                <h1>Login </h1>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="Enter your email address" oninput="enter_data()">
                        <div class="error_message">
                            @error('email')
                                <span style="color: red;font-weight:lighter">{{ $message }}</span>
                                <br>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Password</label>
                        <div class="pass-group">
                            <input type="password" name="password" id="password" class="form-control pass-input"
                                placeholder="Enter your passsword" oninput="enter_data()">
                            <span class="feather-eye toggle-password"></span>
                            <div class="error_message">
                                @error('password')
                                    <span style="color: red;font-weight:lighter">{{ $message }}</span>
                                    <br>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="forgot">
                        <span><a class="forgot-link" href="{{ route('enter-email') }}">Forgot password ?</a></span>
                    </div>
                    {{-- <div class="remember-me"> --}}
                    {{-- <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Ghi nhớ tài khoản --}}
                    {{-- <input type="checkbox" name="radio"> --}}
                    {{-- <span class="checkmark"></span> --}}
                    {{-- </label> --}}
                    {{-- </div> --}}
                    <div class="d-grid">
                        <button class="btn btn-primary btn-start" type="submit" disabled>Login</button>
                    </div>
                </form>
            </div>
            
        </div>
        <div class="google-bg text-center">
            <span><a href="#">Or log in with</a></span>
            <div class="sign-google">
                <ul>
                    <li><a style="border-right: none !important;" href=""><img
                                src="{{ asset('/assets-client/img/net-icon-01.png') }}" class="img-fluid" alt="Logo"> Login
                            using Google</a></li>
                    {{-- <li><a href="#"><img src="{{asset('assets/img/net-icon-02.png')}}" class="img-fluid" alt="Logo">Sign In using Facebook</a></li> --}}
                </ul>
            </div>
            <p class="mb-0">New user ? <a href="">Register here</a></p>
        </div>
        </div>
    </div>
        
    
    </div>
    <script>
        var btn_login = document.querySelector('.btn-start');
        var inputs = (document.querySelectorAll('input[oninput="enter_data()"]'))
        var inputs_length = inputs.length

        function enter_data() {
            let check_ = true
            for (let i = 0; i < inputs_length; i++) {
                if (inputs[i].value.length < 5) {
                    btn_login.setAttribute('disabled', true);
                    return;
                }
            }
            if (check_) btn_login.removeAttribute('disabled');

        }
    </script>
@endsection