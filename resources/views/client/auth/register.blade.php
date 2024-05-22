@extends('client.layout.authMaster')
@section('content')
   
        
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
            <div class="img-logo">
                <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
                <div class="back-home">
                    <a href="{{ route('Dashboard-client') }}">Go back to home</a>
                </div>
            </div>
            <h1>Register</h1>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-control-label">Họ Và Tên</label>
                  <input type="text" name="name" value=""
                        class="form-control" placeholder="Họ Và Tên" oninput="enter_data()">
                        <div class="error_message">
                            @error('name')
                                <span style="color: red;font-weight:lighter">{{ $message }}</span>
                                <br>
                            @enderror
                        </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Số Điện Thoại</label>
                    <input type="text" pattern="[0-9]{10}" required name="phone" value=""
                        class="form-control" placeholder="Số Điện Thoại" oninput="enter_data()">
                    <div class="error_message">
                        @error('phone')
                            <span style="color: red;font-weight:lighter">{{ $message }}</span>
                            <br>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Email</label>
                    <input type="email" name="email" value="" class="form-control"
                        placeholder="Enter your email" oninput="enter_data()">
                    <div class="error_message">
                        @error('email')
                            <span style="color: red;font-weight:lighter">{{ $message }}</span>
                            <br>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Mật Khẩu</label>
                    <div class="pass-group" id="passwordInput">
                        <input type="password" name="password" class="form-control pass-input"
                            placeholder="Enter your Mật Khẩu" oninput="enter_data()">
                        <span class="toggle-password feather-eye"></span>
                        <span class="pass-checked"><i class="feather-check"></i></span>
                    </div>
                    <div class="password-strength" id="passwordStrength">
                        <span id="poor"></span>
                        <span id="strong"></span>
                        <span id="heavy"></span>
                        <span id="weak"></span>                       
                        
                    </div>
                    <div id="passwordInfo"></div>
                    <div class="error_message">
                        @error('password')
                            <span style="color: red;font-weight:lighter">{{ $message }}</span>
                            <br>
                        @enderror
                    </div>
                </div>
                <div class="form-check remember-me">
                    <label class="form-check-label mb-0 d-flex align-items-center">
                        <input class="form-check-input me-2" onchange="enter_data()" id="remember" type="checkbox"
                            name="remember" />
                        <span>I agree to the terms</span>
                        <button type="button" class="btn btn-transparent text-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            service
                        </button>
                       
                        <span>and </span>
                        <button type="button" class="btn btn-transparent text-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal2">
                            privacy police
                        </button>
                        <div class="error_message">
                            @error('remember')
                                <span style="color: red;font-weight:lighter"></span>
                                <br>
                            @enderror
                        </div>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-start" id="registerButton" disabled
                        type="submit">Register</button>
                </div>
            </form>
        
   
        <div class="google-bg text-center">
            <span><a href="#">Or log in with</a></span>
            <div class="sign-google">
                <ul>
                    <li><a style="border-right: none !important" href=""><img
                                src="{{ asset('assets/img/net-icon-01.png') }}" class="img-fluid" alt="Logo"> Sign In using Google</a></li>
                    {{-- <li><a href="#"><img src="{{asset('assets/img/net-icon-02.png')}}" class="img-fluid" alt="Logo">Sign In using Facebook</a></li> --}}
                </ul>
            </div>
            <p class="mb-0">Are you ready to create an account?<a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
    </div>
    <script>
        var btn_login = document.querySelector('#registerButton');
        var accept_term_checkbox = document.querySelector('#remember');
        var inputs = (document.querySelectorAll('input[oninput="enter_data()"]'))
        var inputs_length = inputs.length
        var poor = document.getElementById('poor');
        var weak = document.getElementById('weak');
        var strong = document.getElementById('strong');
        var heavy = document.getElementById('heavy');
        var password_input = inputs[inputs_length - 1]

        function enter_data() {
          
         
            if (!(password_input.value.includes(inputs[inputs_length - 2].value)) && inputs[inputs_length - 2].value
                .length > 3 && password_input.value.length > 5) {
                strong.style.backgroundColor = '#ff725e';
            } else {
                strong.style.backgroundColor = '#e3e3e3';
            }
            if ((/[^a-zA-Z0-9\s]/.test(password_input.value)) && password_input.value.length > 5) {
                heavy.style.backgroundColor = '#ff725e';
            } else {
                heavy.style.backgroundColor = '#e3e3e3';
            }
            if (password_input.value.length > 5) {
                poor.style.backgroundColor = '#ff725e';
            } else {
                poor.style.backgroundColor = '#e3e3e3';
            }
            if (/\d/.test(password_input.value)) {
                weak.style.backgroundColor = '#ff725e';
            } else {
                weak.style.backgroundColor = '#e3e3e3';
            }
           
            let check_ = true
            for (let i = 0; i < inputs_length; i++) {
                if (inputs[i].value.length < 5 || !accept_term_checkbox.checked) {
                    btn_login.setAttribute('disabled', true);
                    return;
                }
            }
            if (check_) btn_login.removeAttribute('disabled');

        }
    </script>
@endsection
