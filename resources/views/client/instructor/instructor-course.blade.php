@extends('client.layout.master')
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">


                {{-- left --}}
                <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                    <div class="settings-widget dash-profile">
                        <div class="settings-menu p-0">
                            <div class="profile-bg">
                                @if(auth()->user()->role == 0)
                                <h5 class="text-muted mb-0">Học viên</h5>
                                @elseif(auth()->user()->role == 1)
                                <h5 class="text-muted mb-0">ADMIN</h5>
                                @elseif(auth()->user()->role == 2)
                                <h5 class="text-muted mb-0">Mentor</h5>
                                @endif
                                <img src="/assets-client/img/instructor-profile-bg.jpg" alt="">
                                <div class="profile-img">
                                    <a href="">
                                        <img src="{{ auth()->user()->thumbnail ? Storage::url('assets-client/img/user/' . auth()->user()->thumbnail) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU' }}"  alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="profile-group">
                                <div class="profile-name text-center">
                                    <h4><a href="">{{auth()->user()-> name}}</a></h4>
                                    @if(auth()->user()->role == 0)
                                        <p class="text-muted mb-0">Học viên</p>
                                        @elseif(auth()->user()->role == 1)
                                        <p class="text-muted mb-0">ADMIN</p>
                                        @elseif(auth()->user()->role == 2)
                                        <p class="text-muted mb-0">Mentor</p>
                                        @endif
                                </div>
                                <div class="go-dashboard text-center">
                                    <a href="{{ route('client.instructor-addcourse') }}" class="btn btn-primary">Create New Course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="settings-menu">
                        <h3>Thông tin tài khoản</h3>
                        <ul>

                            <li class="nav-item  ">
                                <a href="{{ route('client.dashboard-profile') }}" class="nav-link">
                                    <i class="feather-home"></i> My Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="instructor-course.html" class="nav-link">
                                    <i class="feather-shopping-bag"></i> Khóa học của tôi
                                </a>
                            </li>
                            @if(auth()->user()->role == 2)
                            <li class="nav-item active">
                                <a href="{{route('client.instructor-course',auth()->user()->id)}}" class="nav-link">
                                    <i class="feather-book"></i> Quản lí khóa học
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="instructor-student-grid.html" class="nav-link">
                                    <i class="feather-users"></i> Quản lí học viên
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="instructor-earnings.html" class="nav-link">
                                    <i class="feather-pie-chart"></i> Nam Béo
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="instructor-orders.html" class="nav-link">
                                    <i class="feather-shopping-bag"></i> Nam Béo
                                </a>
                            </li>
                            @elseif(auth()->user()->role == 1)
                            <li class="nav-item active">
                                <a href="{{route('client.instructor-course',auth()->user()->id)}}" class="nav-link">
                                    <i class="feather-book"></i> Quản lí khóa học
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="instructor-student-grid.html" class="nav-link">
                                    <i class="feather-users"></i> Quản lí học viên
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="instructor-earnings.html" class="nav-link">
                                    <i class="feather-pie-chart"></i> Nam Béo
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="instructor-orders.html" class="nav-link">
                                    <i class="feather-shopping-bag"></i> Nam Béo
                                </a>
                            </li>


                            @endif
                            <div class="instructor-title">
                                <h3>ACCOUNT SETTINGS</h3>
                            </div>
                            <li class="nav-item  ">
                                <a href="{{ route('client.user-profile') }}" class="nav-link">
                                    <i class="feather-settings"></i> Thông tin cá nhân
                                </a>
                            </li>
                            @if(auth()->user()->role== 1)
                            <div class="instructor-title">
                                <h3>ADMIN</h3>
                            </div>
                            <li class="nav-item">
                                <a href="/admin" class="nav-link">
                                    <i class="feather-cpu"></i> Quảng trị website
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>


                <div class="col-xl-9 col-lg-8 col-md-12 mt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="settings-widget">
                                <div class="settings-inner-blk p-0">
                                    <div class="sell-course-head comman-space">
                                        <h3>Courses</h3>
                                        <p>Manage your courses and its update like live, draft and insight.</p>
                                    </div>
                                    <div class="comman-space pb-0">
                                        <div class="instruct-search-blk">
                                            <div class="show-filter choose-search-blk">
                                                <form action="#">
                                                    <div class="row gx-2 align-items-center">
                                                        <div class="col-md-6 col-item">
                                                            <div class=" search-group">
                                                                <i class="feather-search"></i>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Search our courses">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 col-item">
                                                            <div class="input-block select-form mb-0">
                                                                <select class="form-select select" name="sellist1">
                                                                    <option>Choose</option>
                                                                    <option>Angular</option>
                                                                    <option>React</option>
                                                                    <option>Node</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="settings-tickets-blk course-instruct-blk table-responsive">

                                            <table class="table table-nowrap mb-2">
                                                <thead>
                                                <tr>
                                                    <th>Khóa học </th>
                                                    <th>Giá</th>
                                                    <th>Trạng thái</th>
                                                    <th colspan="2" class="text-center">Thao tác</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data as $post)
                                                    <tr>
                                                        <td>
                                                            <div class="sell-table-group d-flex align-items-center">
                                                                <div class="sell-group-img">
                                                                    <a href="#">
                                                                        <img src="{{ Storage::url(''. $post->thumbnail) }}" alt="Thumbnail" class="img-fluid" style="max-width: 150px;">
                                                                    </a>
                                                                </div>
                                                                <div class="sell-tabel-info">
                                                                    <p><a href="{{ route('client.instructor-coursedetails', $post->id) }}">{{ $post->name }}</a></p>
                                                                    <div class="course-info d-flex align-items-center border-bottom-0 pb-0">
                                                                        <div class="rating-img d-flex align-items-center">
                                                                            <!-- Thêm mã HTML cho đánh giá nếu cần -->
                                                                        </div>
                                                                        <div class="course-view d-flex align-items-center">
                                                                            <!-- Thêm mã HTML cho số lượt xem nếu cần -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        <td>{{ number_format($post->price) }} VNĐ</td>
                                                        <td><span class="badge info-low">Live</span></td>
                                                        <td>
                                                            <form id="deleteForm" action="{{ route('client.deleteCourse', $post->id) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">
                                                                    Xóa
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('client.editCourse', $post->id)}}" class="btn btn-danger">
                                                                Sửa
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
