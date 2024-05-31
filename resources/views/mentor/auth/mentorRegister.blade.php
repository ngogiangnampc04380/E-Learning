@extends('client.layout.authMaster')
@section('content')
    <div class="main-wrapper log-wrap">
        <div class="row">

            <div class="col-md-6 login-bg">
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

            <div class="col-md-6 login-wrap-bg">

                <div class="login-wrapper">
                    <div class="loginbox">
                        <div class="w-100">
                            <div class="img-logo">
                                <img src="/assets-client/img/logo.svg" class="img-fluid" alt="Logo">
                                <div class="back-home">
                                    <a href="{{ route('Dashboard-client') }}">Back to Home</a>
                                </div>
                            </div>      
                            <h1>Đăng ký mentor</h1>
                            <form action="{{ route('client.mentor-register') }}" method="POST" >
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-start" type="submit">Tiếp Tục >></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
@endsection
