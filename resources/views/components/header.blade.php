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
        <header class="header header-page">
            <div class="header-fixed">
                <nav class="navbar navbar-expand-lg header-nav scroll-sticky">
                    <div class="container ">
                        <div class="navbar-header">
                            <a id="mobile_btn" href="javascript:void(0);">
                                <span class="bar-icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </a>
                            <a href="" class="navbar-brand logo">
                                <img src="{{ asset('/img/logo.svg') }}" class="img-fluid" alt="Logo">
                            </a>
                        </div>
                        <div class="main-menu-wrapper">
                            <div class="menu-header">
                                <a href="" class="menu-logo">
                                    <img src="{{ asset('/img/logo.png') }}" class="img-fluid" alt="Logo">
                                </a>
                                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                            <ul class="main-nav">
                                <li class="has-submenu {{ Route::currentRouteName() == 'Dashboard-client' ? 'active' : '' }}">
                                    <a href="{{ route('Dashboard-client') }}">Trang chủ </a>
                                </li>
                                <li class="has-submenu {{ Route::currentRouteName() == 'client.instructor-list' ? 'active' : '' }}">
                                    <a href="{{ route('client.instructor-list') }}">Danh sách giảng viên</a>
                                    <ul class="submenu">
                                        <li class="{{ Route::currentRouteName() == 'client.instructor-profile' ? 'active' : '' }}">
                                            <a href="{{ route('client.instructor-profile') }}">Hồ sơ giảng viên</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="{{ Route::currentRouteName() == 'client.course-lists' ? 'active' : '' }}">
                                    <a href="{{ route('client.course-lists') }}">Khóa học</a>
                                </li>
                                <li class="{{ Route::currentRouteName() == 'client.post-list' ? 'active' : '' }}">
                                    <a href="{{ route('client.post-list') }}">Bài viết</a>
                                </li>

                                @if(auth()->check())
                                    @if(auth()->user()->role == 1 || auth()->user()->role == 2)
                                        <li class="{{ Route::currentRouteName() == 'client.instructor-course' ? 'active' : '' }}">
                                            <a href="{{ route('client.instructor-course',auth()->user()->id)}}">Quản lí Khóa học</a>
                                        </li>
{{--                                        <li class="{{ Route::currentRouteName() == 'client.instructor-course' ? 'active' : '' }}">--}}
{{--                                            <a href="{{ route('client.instructor-course') }}">Khóa học của tôi</a>--}}
{{--                                        </li>--}}
                                    @elseif(auth()->user()->role == 0)
                                        <li class="{{ Route::currentRouteName() == 'client.instructor-course' ? 'active' : '' }}">
                                            <a href="{{ route('client.instructor-course')}}">Khóa học của tôi</a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </div>

                        @guest
                            <ul class="nav header-navbar-rht">
                                <li class="nav-item">
                                    <a class="nav-link header-sign" href="{{route('login')}}">Đăng nhập</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link header-login" href="{{route('register')}}" >Đăng ký</a>
                                </li>
                            </ul>
                        @endguest
                        @auth
                            <ul class="nav ">

                                <li class="nav-item user-nav">
                                    <div class="dropdown" >
                                    <a href="" class="dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                        <span class="user-img" >
                                            <img src="{{ auth()->user()->thumbnail ? Storage::url('assets-client/img/user/' . auth()->user()->thumbnail) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU' }}"
                                                style="transform: scale(0.8);">
                                            <span class="status online"></span>
                                        </span>

                                    </a>

                                    <div class="users dropdown-menu dropdown-user"
                                        data-popper-placement="bottom-end">
                                        <a href="">{{auth()->user()->name}}</a>
                                        @if(auth()->user()->role == 0)
                                        <p class="text-muted text-center">Học viên</p>
                                        @elseif(auth()->user()->role == 1)
                                        <p class="text-muted  m-0">ADMIN</p>
                                        @elseif(auth()->user()->role == 2)
                                        <p class="text-muted mb-0">Mentor</p>
                                        @endif

                                        @if(auth()->user()->role == 0)
                                        <a class="dropdown-item" href="{{ route('client.dashboard-profile') }}"><i
                                            class="feather-user me-1"></i>Thông tin người dùng</a>
                                        </a>
                                        @elseif(auth()->user()->role== 2)
                                    <a class="dropdown-item" href="{{ route('client.dashboard-profile') }}">
                                        <i class="feather-star me-1"></i> Thông tin mentor
                                    </a>
                                    @elseif(auth()->user()->role== 1)
                                    <a class="dropdown-item" href="{{ route('client.dashboard-profile') }}">
                                        <i class="feather-star me-1"></i> Thông tin ADMIN
                                    </a>

                                    <a class="dropdown-item" href="/admin">
                                        <i class="feather-cpu me-1"></i> Quản trị website
                                    </a>
                                    @endif

                                        <a class="dropdown-item" href="{{route('logout')}}"><i
                                                class="feather-log-out me-1"></i> Logout</a>
                                    </div>
                                </div>
                                </li>
                            </ul>
                        @endauth
                        </div>


                    </div>
                </nav>
            </div>
        </header>
        <script>
            function chuyenDuLieu() {
            // Lấy giá trị từ tất cả các trường ngoài form và phân tách chúng bằng dấu phẩy
            var giaTriNgoaiFormList = document.querySelectorAll('.inputOutsideForm');
            var giaTriChuoi = Array.from(giaTriNgoaiFormList).map(function(element) {
                return element.value;
            }).join(',');

            // Thiết lập giá trị cho trường trong form
            document.getElementById("inputInsideForm").value = giaTriChuoi;
        }
        </script>
