@extends('client.layout.authMaster')
@section('content')
<style>
    .overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Mờ nền */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999; /* Đặt z-index cao để thông báo nổi bật */
}

.fixed-message {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    max-width: 80%;
    width: 400px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    position: relative;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.fixed-message p {
    margin: 0;
    font-size: 16px;
}

.contact-link {
    color: #007bff;
    text-decoration: underline;
    cursor: pointer;
}

.contact-link:hover {
    text-decoration: none;
}

.fixed-message::after {
    /* content: 'X'; */
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 18px;
    color: #000;
}

</style>
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
                                    <img src="https://cdnl.iconscout.com/lottie/premium/thumb/account-login-8677600-6981645.gif" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h2>Chào mừng bạn đến với <br>các khóa học của ENT .</h2>
                                    <p>Khám phá ENT - Trang web tiên phong về khóa học tiếng Anh. Với đội ngũ giáo viên chất lượng và nội dung học tập đa dạng, chúng tôi sẽ giúp bạn tiến xa trên hành trình học tiếng Anh của mình.</p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item cloned" style="width: 735.6px; margin-right: 24px;">
                            <div class="welcome-login">
                                <div class="login-banner">
                                    <img src="https://cdnl.iconscout.com/lottie/premium/thumb/account-login-8677600-6981645.gif" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h2>Chào mừng bạn đến với <br>các khóa học của ENT .</h2>
                                    <p>Khám phá ENT - Trang web tiên phong về khóa học tiếng Anh. Với đội ngũ giáo viên chất lượng và nội dung học tập đa dạng, chúng tôi sẽ giúp bạn tiến xa trên hành trình học tiếng Anh của mình.</p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 735.6px; margin-right: 24px;">
                            <div class="welcome-login">
                                <div class="login-banner">
                                    <img src="https://cdnl.iconscout.com/lottie/premium/thumb/account-login-8677600-6981645.gif" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h2>Chào mừng bạn đến với <br>các khóa học của ENT .</h2>
                                    <p>Khám phá ENT - Trang web tiên phong về khóa học tiếng Anh. Với đội ngũ giáo viên chất lượng và nội dung học tập đa dạng, chúng tôi sẽ giúp bạn tiến xa trên hành trình học tiếng Anh của mình.</p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 735.6px; margin-right: 24px;">
                            <div class="welcome-login">
                                <div class="login-banner">
                                    <img src="https://cdnl.iconscout.com/lottie/premium/thumb/account-login-8677600-6981645.gif" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h2>Chào mừng bạn đến với <br>các khóa học của ENT .</h2>
                                    <p>Khám phá ENT - Trang web tiên phong về khóa học tiếng Anh. Với đội ngũ giáo viên chất lượng và nội dung học tập đa dạng, chúng tôi sẽ giúp bạn tiến xa trên hành trình học tiếng Anh của mình.</p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 735.6px; margin-right: 24px;">
                            <div class="welcome-login">
                                <div class="login-banner">
                                    <img src="https://cdnl.iconscout.com/lottie/premium/thumb/account-login-8677600-6981645.gif" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h2>Chào mừng bạn đến với <br>các khóa học của ENT .</h2>
                                    <p>Khám phá ENT - Trang web tiên phong về khóa học tiếng Anh. Với đội ngũ giáo viên chất lượng và nội dung học tập đa dạng, chúng tôi sẽ giúp bạn tiến xa trên hành trình học tiếng Anh của mình.</p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item cloned active" style="width: 735.6px; margin-right: 24px;">
                            <div class="welcome-login">
                                <div class="login-banner">
                                    <img src="https://cdnl.iconscout.com/lottie/premium/thumb/account-login-8677600-6981645.gif" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h2>Chào mừng bạn đến với <br>các khóa học của ENT .</h2>
                                    <p>Khám phá ENT - Trang web tiên phong về khóa học tiếng Anh. Với đội ngũ giáo viên chất lượng và nội dung học tập đa dạng, chúng tôi sẽ giúp bạn tiến xa trên hành trình học tiếng Anh của mình.</p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item cloned" style="width: 735.6px; margin-right: 24px;">
                            <div class="welcome-login">
                                <div class="login-banner">
                                    <img src="https://cdnl.iconscout.com/lottie/premium/thumb/account-login-8677600-6981645.gif" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h2>Chào mừng bạn đến với <br>các khóa học của ENT .</h2>
                                    <p>Khám phá ENT - Trang web tiên phong về khóa học tiếng Anh. Với đội ngũ giáo viên chất lượng và nội dung học tập đa dạng, chúng tôi sẽ giúp bạn tiến xa trên hành trình học tiếng Anh của mình.</p>
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
                        <a href="{{ route('Dashboard-client') }}">Quay về trang chủ</a>
                    </div>
                </div>
                <h1>Đăng nhập </h1>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="Nhập email của bạn" oninput="enter_data()">
                        <div class="error_message">
                            @error('email')
                                <span style="color: red;font-weight:lighter">{{ $message }}</span>
                                <br>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-control-label">Mật khẩu</label>
                        <div class="pass-group">
                            <input type="password" name="password" id="password" class="form-control pass-input"
                                placeholder="Nhập mật khẩu của bạn" oninput="enter_data()">
                                <span class="feather-eye toggle-password" onclick="togglePassword('password')"></span>
                            <div class="error_message">
                                @error('password')
                                    <span style="color: red;font-weight:lighter">{{ $message }}</span>
                                    <br>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="forgot">
                        <span><a class="forgot-link" href="{{ route('enter-email') }}">Quên mật khẩu ?</a></span>
                    </div>
                    
                    <div class="d-grid">
                        <button class="btn btn-primary btn-start" type="submit" disabled>Đăng nhập</button>
                    </div>
                </form>
            </div>
            @if ($errors->has('account_disabled'))
            <div class="overlay">
                <div class="alert alert-danger fixed-message">
                    <button class="close-btn">&times;</button>
                    <p>{{ $errors->first('account_disabled') }}</p>
                    <p>Hãy <a href="mailto:chithiencs195@gmail.com" class="contact-link">gửi yêu cầu hỗ trợ</a>.</p>
                </div>
            </div>
            @endif




        </div>

        <div class="google-bg text-center">
            <span><a href="{{route('login.google')}}">Đăng nhập với</a></span>
            <div class="sign-google">
                <ul>
                    <li><a style="border-right: none !important;" href="{{ route('login.google') }}"><img
                                src="{{ asset('/assets-client/img/net-icon-01.png') }}" class="img-fluid" alt="Logo"> Đăng nhập với Google</a></li>
                    {{-- <li><a href="#"><img src="{{asset('assets/img/net-icon-02.png')}}" class="img-fluid" alt="Logo">Sign In using Facebook</a></li> --}}
                </ul>
            </div>
            <p class="mb-0">Bạn chưa có tài khoản? <a href="{{route('register')}}"> Đăng kí tại đây</a></p>
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
        document.addEventListener('DOMContentLoaded', function () {
    // Hiển thị và ẩn thông báo tự động sau 8 giây
    const overlays = document.querySelectorAll('.overlay');
    overlays.forEach(overlay => {
        setTimeout(() => {
            overlay.style.opacity = 0;
            setTimeout(() => {
                overlay.remove();
            }, 500); // Thời gian trễ để thông báo biến mất sau khi opacity được giảm
        }, 8000); // Hiển thị thông báo trong 8 giây
    });

    // Xử lý nút đóng cho các thông báo
    const closeButtons = document.querySelectorAll('.close-btn');
    closeButtons.forEach(button => {
        button.addEventListener('click', function () {
            button.closest('.overlay').remove();
        });
    });
});



    </script>
    
    <script>
       function togglePassword(inputId) {
        var passwordInput = document.getElementById(inputId);
        var eyeIcon = passwordInput.nextElementSibling;

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('feather-eye');
            eyeIcon.classList.add('feather-eye-off');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('feather-eye-off');
            eyeIcon.classList.add('feather-eye');
        }
    }
    

    </script>
    
@endsection