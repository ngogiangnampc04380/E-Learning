@extends('client.layout.master')
@section('content')

    <div class="breadcrumb-bar">
        <div class="container">
        </div>
    </div>
    
    <section class="course-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                    <div class="settings-widget dash-profile">
                        <div class="settings-menu p-0">
                            <div class="profile-bg">
                                @if (in_array(auth()->user()->role, [0, 3]))
                                    <h5 class="text-muted mb-0">Học viên</h5>
                                @elseif(auth()->user()->role == 1)
                                    <h5 class="text-muted mb-0">Quản trị viên</h5>
                                @elseif(auth()->user()->role == 2)
                                    <h5 class="text-muted mb-0">Giảng viên</h5>
                                @endif
                                <img src="/assets-client/img/instructor-profile-bg.jpg" alt="">
                                <div class="profile-img">
                                    <a href="">
                                        <img src="{{ auth()->user()->thumbnail ? Storage::url('public/' . auth()->user()->thumbnail) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU' }}"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="profile-group">
                                <div class="profile-name text-center">
                                    <h4><a href="">{{ auth()->user()->name }}</a></h4>
                                    @if (in_array(auth()->user()->role, [0, 3]))
                                        <p class="text-muted mb-0">Học viên</p>
                                    @elseif(auth()->user()->role == 1)
                                        <p class="text-muted mb-0">Quản trị viên</p>
                                    @elseif(auth()->user()->role == 2)
                                        <p class="text-muted mb-0">Giảng viên</p>
                                    @endif
                                </div>
                                @if (auth()->user()->role == 2)
                                    <div class="go-dashboard text-center">
                                        <a href="{{ route('client.create-course') }}" class="btn btn-primary">THÊM KHÓA HỌC
                                            MỚI</a>
                                    </div>
                                @endif
    
                            </div>
                        </div>
                    </div>
                    <div class="settings-menu">
                        <h3>Thông tin tài khoản</h3>
                        <ul>
                            <li class="nav-item {{ request()->routeIs('client.dashboard-profile') ? 'active' : '' }}">
                                <a href="{{ route('client.dashboard-profile') }}" class="nav-link">
                                    <i class="feather-home"></i> Dữ liệu và thống kê
                                </a>
                            </li>
                            @if (in_array(auth()->user()->role, [0,2,3]))
                                <li class="nav-item {{ request()->is('instructor-course') ? 'active' : '' }}">
                                    <a href="{{ route('client.my-course', auth()->user()->id) }}" class="nav-link">
                                        <i class="feather-shopping-bag"></i> Khóa học của tôi
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->role == 2)
                                <li class="nav-item {{ request()->routeIs('client.instructor-course') ? 'active' : '' }}">
                                    <a href="{{ route('client.instructor-course', auth()->user()->id) }}" class="nav-link">
                                        <i class="feather-book"></i> Quản lí khóa học
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('instructor-student-grid.html') ? 'active' : '' }}">
                                    <a href="{{ route('client.my-student') }}" class="nav-link">
                                        <i class="feather-users"></i> Quản lí học viên
                                    </a>
                                </li>
                            @endif
                            <div class="instructor-title">
                                <h3>Cài đặt tài khoản</h3>
                            </div>
                            <li class="nav-item {{ request()->routeIs('client.user-profile') ? 'active' : '' }}">
                                <a href="{{ route('client.user-profile') }}" class="nav-link">
                                    <i class="feather-settings"></i> Thông tin cá nhân
                                </a>
                            </li>
                            @if (auth()->user()->role == 1)
                                <div class="instructor-title">
                                    <h3>Quản trị viên</h3>
                                </div>
                                <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                                    <a href="/admin" class="nav-link">
                                        <i class="feather-cpu"></i> Quản trị website
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{ route('client.reset-password') }}" class="nav-link">
                                    <i class="feather-log-out"></i> Đổi mật Khẩu
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link">
                                    <i class="feather-log-out"></i> Đăng xuất
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('client.disable-account-form') }}" class="nav-link">
                                    <i class="feather-user-x"></i> Vô hiệu hóa tài khoản
                                </a>
                            </li>
                        </ul>
                    </div>
    
                </div>
                <div class="col-lg-9">
                    
                    @if($myCourses->isEmpty())
                    
        <div class="no-courses" style="text-align: center">
            <p class="h4 font-weight-normal">bạn chưa có khóa học nào.</p>
            <a href="{{ route('client.course-lists') }}" class="btn btn-primary">Mua khóa học -></a>
            
        </div>
    @else
                    <div class="row">
@foreach ($myCourses as $courseUser)
    @php
        $course = $courseUser->course;
        $mentor = $course->mentor->user;
    @endphp
    <div class="col-lg-12 col-md-12 d-flex">
        <div class="course-box course-design list-course d-flex">
            <div class="product">
                <div class="product-img">
                    <a href="{{ route('client.course-details', $course->id) }}">
                        <img src="{{ Storage::url('public/'.$course->thumbnail) }}" alt="Thumbnail" style="width: 250px; height: 150px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    </a>
                </div>
                <div class="product-content">
                    <div class="head-course-title">
                        <h2 class="title">
                            <a href="{{ route('client.course-details', $course->id) }}">{{ $course->name }}</a>
                        </h2>
                        <div class="all-btn all-category d-flex align-items-center">
                            <a href="{{ route('client.lesson', ['id' => $course->id]) }}" class="btn btn-primary">Học</a>
                        </div>
                    </div>
                    <div class="course-group d-flex mb-0">
                        <div class="course-group-img d-flex">
                            <a href="{{ route('client.mentor_detail', $mentor->id) }}">
                                <img src="{{ $mentor->thumbnail ? Storage::url('public/' . $mentor->thumbnail) : 'https://cdn-icons-png.flaticon.com/128/9721/9721084.png' }}"
                                     class="img-fluid rounded-circle">
                            </a>
                            <div class="course-name">
                                <h4>
                                    <a href="{{ route('client.mentor_detail', $mentor->id) }}">{{ $mentor->name }}</a>
                                </h4>
                                <p>Giảng viên</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>

</div>
@endif
                   
                </div>
            </div>
        </div>
    </section>
@endsection
