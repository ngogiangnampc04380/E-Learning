<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamslms.dreamstechnologies.com/html/index-three.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Mar 2024 13:56:07 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Dreams LMS</title>

    <link rel="shortcut icon" type="image/x-icon" href="/assets-client/img/favicon.svg">

    <link rel="stylesheet" href="/assets-client/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets-client/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets-client/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="/assets-client/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets-client/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/assets-client/plugins/feather/feather.css">

    <link rel="stylesheet" href="/assets-client/plugins/slick/slick.css">
    <link rel="stylesheet" href="/assets-client/plugins/slick/slick-theme.css">

    <link rel="stylesheet" href="/assets-client/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="/assets-client/plugins/swiper/css/swiper.min.css">
    <!--
<link rel="stylesheet" href="/assets-client/plugins/aos/aos.css"> -->

    <link rel="stylesheet" href="/assets-client/css/style.css">
</head>

<body class="home-three">

    <div class="main-wrapper">

        <header class="header-three">
            <div class="header-fixed-three header-fixed">
                <nav class="navbar navbar-expand-lg header-nav-three scroll-sticky">
                    <div class="container">
                        <div class="navbar-header">
                            <a id="mobile_btn" href="javascript:void(0);">
                                <span class="bar-icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </a>
                            <a href="{{ route('Dashboard-client') }}" class="navbar-brand logo">
                                <img src="/assets-client/img/logo/logo.png" class="img-fluid" alt="Logo">
                            </a>
                        </div>
                        <div class="main-menu-wrapper">
                            <div class="menu-header">
                                <a href="{{ route('Dashboard-client') }}" class="menu-logo">
                                    <img src="/assets-client/img/logo/logo.svg" class="img-fluid" alt="Logo">
                                </a>
                                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                            <ul class="main-nav">
                                <li class="has-submenu active">
                                    <a href="{{ route('Dashboard-client') }}">Trang chủ </a>
                                </li>
                                <li class="has-submenu">
                                    <a href>Giảng viên <i class="fas fa-chevron-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('client.instructor-list') }}">Danh sách giảng viên</a>
                                        </li>
                                        <li><a href="{{ route('client.instructor-profile') }}">Hồ sơ giảng viên</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('client.course-lists') }}">Danh sách khóa học</a></li>
                                <li><a href="{{ route('client.post-list') }}">Danh sách bài viết</a></li>
                                <li><a href="{{ route('client.instructor-course') }}">My Course</a></li>
                            </ul>
                        </div>
                        <ul class="nav header-navbar-rht align-items-center">
                            <li class="nav-item">
                                <a class="nav-link login-three-head button"
                                    href="{{ route('client.Login') }}"><span>Đăng nhập</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link signin-three-head" href="{{ route('client.Register') }}">Đăng ký</a>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="nav-item user-nav">
                                <div class="dropdown">
                                    <a href="#">
                                        <span class="user-img dropdown-toggle">
                                            <img src="/assets-client/img/instructor/profile-avatar.jpg" alt />
                                        </span>
                                    </a>
                                    <div class="users dropdown-menu" data-popper-placement="bottom-end">
                                        <div class="user-header">
                                            <div class="avatar avatar-sm">
                                                <img src="/assets-client/img/instructor/profile-avatar.jpg"
                                                    alt="User Image" class="avatar-img rounded-circle" />
                                            </div>
                                            <div class="user-text">
                                                <h6>Nam Béo</h6>
                                                <p class="text-muted mb-0">Giảng viên</p>
                                            </div>
                                        </div>
                                        <a class="dropdown-item" href="{{ route('client.user-profile') }}"><i
                                                class="feather-star me-1"></i> Thông tin người dùng</a>
                                        <a class="dropdown-item" href="{{ route('client.mentor-profile') }}"><i
                                                class="feather-star me-1"></i> Thông tin giảng viên</a>
                                        <a class="dropdown-item" href="{{ route('client.mentor-register') }}"><i
                                                class="feather-log-out me-1"></i> Đăng ký giảng viên</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
