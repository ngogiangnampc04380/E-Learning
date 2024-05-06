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
                            <h1>Register New Account</h1>
                            <form action="instructor-dashboard.html">
                                <div class="input-block">
                                    <label class="form-control-label">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your Full Name" />
                                </div>
                                <div class="input-block">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Enter your email address">
                                </div>
                                <div class="input-block">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" class="form-control pass-input"
                                            placeholder="Enter your password">
                                        <span class="feather-eye toggle-password"></span>
                                    </div>
                                    <div class="password-strength" id="passwordStrength">
                                        <span id="poor"></span>
                                        <span id="weak"></span>
                                        <span id="strong"></span>
                                        <span id="heavy"></span>
                                    </div>
                                    <div id="passwordInfo"></div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-start" type="submit">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="google-bg text-center">
                        <span><a href="#">Or sign in with</a></span>
                        <div class="sign-google">
                            <ul>
                                <li><a href="#"><img src="/assets-client/img/net-icon-01.png" class="img-fluid"
                                            alt="Logo"> Sign In using Google</a></li>
                                <li><a href="#"><img src="/assets-client/img/net-icon-02.png" class="img-fluid"
                                            alt="Logo">Sign In using Facebook</a></li>
                            </ul>
                        </div>
                        <p class="mb-0">Already have an account? <a href="{{ route('client.Login') }}">Sign In</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
