@extends('client.layout.authMaster')
@section('content')
<style>
.product:hover {
    background: white
}
    .product:hover :is(a,button) {
        color: black !important;
    }
</style>
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
<div class="col-md-6 login-wrap" style="margin-left:200px">
<a href="course-details.html">
<img class="img-fluid" alt src="assets/img/course/course-11.jpg">
</a>



<div class="head-course-title" >
<h3 class=""><a href="course-details.html">Are you sure to logout?</a></h3>
<div class="all-btn all-category d-flex align-items-center">
    <form method="POST">
        @csrf

<button class="btn btn-primary" id="submitButton">Yes</button>
    </form>
</div>

</div>
</div>
</div>
<script>
    const submitButton = document.getElementById('submitButton');
        submitButton.addEventListener('click', function() {
            document.cookie = 'requestCount=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            document.cookie = 'start_time=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        });
</script>
@endsection