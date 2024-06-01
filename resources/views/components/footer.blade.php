<footer class="footer footer-three">

    <div class="footer-three-top" data-aos="fade-up">
        <div class="container">
            <div class="footer-three-top-content">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">

                        <div class="footer-widget-three footer-about">
                            <div class="footer-three-logo">
                                <img class="img-fluid" src="/img/logo.gif" width="200" alt="logo">
                            </div>
                            <div class="footer-three-about">
                                <p>Web này bán khóa học</p>
                            </div>
                            <div class="newsletter-title">
                                <h6>Nhận thông tin cập nhật</h6>
                            </div>
                            <div class="box-form-newsletter">
                                <form class="form-newsletter">
                                    <input class="input-newsletter" type="text" placeholder="Email của bạn">
                                    <button class="btn btn-default font-heading icon-send-letter">Đăng ký ngay bây giò</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-3 col-12">

                        <div class="footer-widget-three footer-menu-three footer-three-right">
                            <h6 class="footer-three-title">Giành cho giảng viên</h6>
                            <ul>
                                <li><a href="{{ route('Dashboard-client') }}">Trang chủ </a></li>
                                {{-- <li><a href="{{ route('client.mentor-register') }}">Đăng ký làm giảng viên</a></li> --}}
                                {{-- <li><a href="{{ route('client.instructor-profile', ['id' => $mentor->id]) }}">">Hồ sơ giảng viên</a></li> --}}
                                <li><a href="{{ route('client.instructor-list') }}">Danh sách giảng viên</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-3 col-12">

                        <div class="footer-widget-three footer-menu-three">
                            <h6 class="footer-three-title">Giành cho học sinh</h6>
                            <ul>
                                {{-- <li><a href="{{ route('client.Login') }}">Đăng nhập người dùng</a></li> --}}
                                {{-- <li><a href="{{ route('client.Register') }}">Đăng ký người dùng</a></li> --}}
                                
                                <li><a href="{{ route('client.course-lists') }}">Danh sách khóa học</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer-three-bottom" data-aos="fade-up">
        <div class="container">

            <div class="copyright-three">
                <div class="row">
                    <div class="col-md-12">
                        <div class="social-icon-three">
                            <h6>Kết nối với cộng đồng của chúng tôi</h6>
                            <ul>
                                <li>
                                    <a href="#" target="_blank" class="feather-facebook-icon">
                                        <i class="feather-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" class="feather-twitter-icon">
                                        <i class="feather-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" class="feather-linkedin-icon">
                                        <i class="feather-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" class="feather-youtube-icon">
                                        <i class="feather-youtube"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="privacy-policy-three">
                            <ul>
                                <li><a href="term-condition.html">Điều khoản và thỏa thuận</a></li>
                                <li><a href="privacy-policy.html">Chính sách pháp lý</a></li>
                                <li><a href="support.html">Liên hệ với chúng tôi</a></li>
                            </ul>
                        </div>
                        <div class="copyright-text-three">
                            <p class="mb-0">&copy; 2024 EnglishTour. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</footer>

</div>
<script src="/assets-client/js/jquery-3.7.1.min.js" ></script>

<script src="/assets-client/js/bootstrap.bundle.min.js" ></script>

<script src="/assets-client/js/owl.carousel.min.js" ></script>

<script src="/assets-client/plugins/aos/aos.js" ></script>

<script src="/assets-client/js/jquery.waypoints.js" ></script>
<script src="/assets-client/js/jquery.counterup.min.js" ></script>

<script src="/assets-client/plugins/select2/js/select2.min.js" ></script>

<script src="/assets-client/plugins/slick/slick.js"></script>

<script src="/assets-client/plugins/swiper/js/swiper.min.js" ></script>

<script src="/assets-client/js/script.js"></script>
{{-- <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
    data-cf-settings="a24f51fa5374e90d6aa7f4a1-|49" defer></script> --}}
<script src="/assets-client/js/add.js"></script>
<script>
    $(function(){
        setTimeout(()=>{
            $('#loader').fadeOut(1000);
        },1000)
    })
</script>
</body>

<!-- Mirrored from dreamslms.dreamstechnologies.com/html/index-three.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Mar 2024 13:56:46 GMT -->

</html>
