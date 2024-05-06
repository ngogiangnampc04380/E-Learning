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
                                    <a href="{{ route('Dashboard-client') }}">Dashboard </a>
                                </li>
                                <li class="has-submenu">
                                    <a href>Instructor <i class="fas fa-chevron-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="instructor-dashboard.html">Dashboard</a></li>
                                        <li><a href="{{ route('client.instructor-list') }}">Instructor</a></li>
                                        <li><a href="{{ route('client.instructor-profile') }}">Instructor-Profile</a>
                                        </li>
                                        <li><a href="instructor-course.html">My Course</a></li>
                                        <li><a href="instructor-reviews.html">Reviews</a></li>
                                        <li><a href="instructor-earnings.html">Earnings</a></li>
                                        <li><a href="instructor-orders.html">Orders</a></li>

                                    </ul>
                                </li>
                                <li><a href="{{ route('client.course-lists') }}">Course</a></li>
                                <li class="has-submenu">
                                    <a href>Student <i class="fas fa-chevron-down"></i></a>
                                    <ul class="submenu first-submenu">
                                        <li class="has-submenu ">
                                            <a href="students-list.html">Student</a>
                                            <ul class="submenu">
                                                <li><a href="students-list.html">List</a></li>
                                                <li><a href="students-grid.html">Grid</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="setting-edit-profile.html">Student Profile</a></li>

                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href>Pages <i class="fas fa-chevron-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="notifications.html">Notification</a></li>
                                        <li><a href="pricing-plan.html">Pricing Plan</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li class="has-submenu">
                                            <a href="course-list.html">Course</a>
                                            <ul class="submenu">
                                                <li><a href="add-course.html">Add Course</a></li>
                                                <li><a href="course-list.html">Course List</a></li>
                                                <li><a href="course-grid.html">Course Grid</a></li>
                                                <li><a href="course-details.html">Course Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="come-soon.html">Error</a>
                                            <ul class="submenu">
                                                <li><a href="come-soon.html">Comeing soon</a></li>
                                                <li><a href="error-404.html">404</a></li>
                                                <li><a href="error-500.html">500</a></li>
                                                <li><a href="under-construction.html">Under Construction</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        
                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href>Blog <i class="fas fa-chevron-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="blog-list.html">Blog List</a></li>
                                        <li><a href="blog-grid.html">Blog Grid</a></li>
                                        <li><a href="blog-masonry.html">Blog Masonry</a></li>
                                        <li><a href="blog-modern.html">Blog Modern</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li class="login-link">
                                    <a href="login.html">Login / Signup</a>
                                </li>
                            </ul>
                        </div>
                        <ul class="nav header-navbar-rht align-items-center">
                            <li class="nav-item">
                                <a class="nav-link login-three-head button" href="{{ route('client.Login') }}"><span>Login</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link signin-three-head" href="{{ route('client.Register') }}">Register</a>
                            </li>
                        </ul>
                        <ul class="nav ">
                            <li class="nav-item user-nav">
                              <div class="dropdown">
                                <a href="#" >
                                    <span class="user-img dropdown-toggle">
                                      <img src="/assets-client/img/instructor/profile-avatar.jpg" alt />
                                    </span>
                                  </a>
                                  <div
                                    class="users dropdown-menu"
                                    data-popper-placement="bottom-end"
                                  >
                                    <div class="user-header">
                                      <div class="avatar avatar-sm">
                                        <img
                                          src="/assets-client/img/instructor/profile-avatar.jpg"
                                          alt="User Image"
                                          class="avatar-img rounded-circle"
                                        />
                                      </div>
                                      <div class="user-text">
                                        <h6>Jenny Wilson</h6>
                                        <p class="text-muted mb-0">Instructor</p>
                                      </div>
                                    </div>
                                    <a class="dropdown-item" href="{{ route('client.user-profile') }}"
                                      ><i class="feather-star me-1"></i> Thông tin người dùng</a
                                    >
                                    <a class="dropdown-item" href="{{ route('client.mentor-profile') }}"
                                      ><i class="feather-star me-1"></i> Thông tin mentor</a
                                    >
                                    <a class="dropdown-item" href="{{ route('client.mentor-register') }}"
                                      ><i class="feather-log-out me-1"></i> Đăng ký mentor</a
                                    >
                                  </div>
                              </div>
                            </li>
                          </ul>
                    </div>
                </nav>
            </div>
        </header>
