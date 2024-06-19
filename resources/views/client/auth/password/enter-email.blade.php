@extends('client.layout.authMaster')
@section('content')
@if(Session::get('no_confirm_code'))
@include('components.message', ['message' => session('no_confirm_code'),'type'=>'error'])
@endif
@if(Session::get('no_user'))
@include('components.message', ['message' => session('no_user'),'type'=>'error'])
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
            <div class="img-logo">
                <img src="{{ asset('assets/img/logo.svg') }}" class="img-fluid" alt="Logo">
                <div class="back-home">
                    <a href="index.html">Back to Home</a>
                </div>
            </div>
            <h1>Forgot Password ?</h1>
            <div class="reset-password">
                <p>Enter your email to reset your password.</p>
            </div>
            @if (session('error'))
                <div class="alert alert-success">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('enter-email') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-control-label">Email</label>
                    <input type="email" class="form-control" placeholder="Enter your email address" name="email">
                </div>
                <div class="d-grid">
                    <button class="btn btn-start" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
