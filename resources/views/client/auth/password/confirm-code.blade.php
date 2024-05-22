@extends('client.layout.authMaster')
@section('content')
@if(Session::get('wrong_code'))
@include('components.message', ['message' => session('wrong_code'),'type'=>'error'])
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
        @if (session('error'))
            <div class="alert alert-success">
                {{ session('error') }}
            </div>
        @endif
        <div class="loginbox">
            <div class="img-logo">
                <img src="{{ asset('assets/img/logo.svg') }}" class="img-fluid" alt="Logo">
                <div class="back-home">
                    {{-- <a href="index.html">Back to Home</a> --}}
                </div>
            </div>
            <h1>Enter your confirm code</h1>
            <div class="reset-password">
                <p>We've sent a code to your email to confirm</p>
            </div>
            <form action="{{ route('confirm-code') }}" method="post">
                @csrf
                <div class="form-group d-flex gap-2">
                    <input type="hidden" name="token_id" value="{{ $token_id }}">
                    <input type="number" class="form-control" name="confirmCode" id="send_code"
                        placeholder="Nhập mã xác nhận 6 số">
                </div>
                <div class="d-grid">
                    <button class="btn btn-start" type="submit">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
