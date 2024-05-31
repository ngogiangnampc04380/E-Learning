@extends('client.layout.master')
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">

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
                                @if(auth()->user()->role == 2)
                                <div class="go-dashboard text-center">
                                    <a href="{{ route('client.instructor-addcourse') }}" class="btn btn-primary">Create New Course</a>
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
                <i class="feather-home"></i> My Dashboard
            </a>
        </li>
        @if(in_array(auth()->user()->role, [0, 2]))
        <li class="nav-item {{ request()->is('instructor-course') ? 'active' : '' }}">
            <a href="instructor-course.html" class="nav-link">
                <i class="feather-shopping-bag"></i> Khóa học của tôi
            </a>
        </li>
        @endif
        @if(auth()->user()->role == 2)
        <li class="nav-item {{ request()->routeIs('client.instructor-course') ? 'active' : '' }}">
            <a href="{{ route('client.instructor-course') }}" class="nav-link">
                <i class="feather-book"></i> Quản lí khóa học
            </a>
        </li>
        <li class="nav-item {{ request()->is('instructor-student-grid.html') ? 'active' : '' }}">
            <a href="instructor-student-grid.html" class="nav-link">
                <i class="feather-users"></i> Quản lí học viên
            </a>
        </li>
        <li class="nav-item {{ request()->is('instructor-earnings.html') ? 'active' : '' }}">
            <a href="instructor-earnings.html" class="nav-link">
                <i class="feather-pie-chart"></i> Nam Béo
            </a>
        </li>
        <li class="nav-item {{ request()->is('instructor-orders.html') ? 'active' : '' }}">
            <a href="instructor-orders.html" class="nav-link">
                <i class="feather-shopping-bag"></i> Nam Béo
            </a>
        </li>
        @endif
        <div class="instructor-title">
            <h3>ACCOUNT SETTINGS</h3>
        </div>
        <li class="nav-item {{ request()->routeIs('client.user-profile') ? 'active' : '' }}">
            <a href="{{ route('client.user-profile') }}" class="nav-link">
                <i class="feather-settings"></i> Thông tin cá nhân
            </a>
        </li>
        @if(auth()->user()->role == 1)
        <div class="instructor-title">
            <h3>ADMIN</h3>
        </div>
        <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
            <a href="/admin" class="nav-link">
                <i class="feather-cpu"></i> Quảng trị website
            </a>
        </li>
        @endif
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


                <div class="col-xl-9 col-lg-8 col-md-12 mx-auto" style="margin-top: 100px;">
                    <div class="row">
                        <div class="col-md-5">
                            <form id="multiStepForm" action="{{route('client.saveEditCourse',$data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="add-course-info">
                                    <div class="add-course-form">
                                        <div class="add-course-inner-header">
                                            <h4>SỬA KHÓA HỌC</h4>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="course_name">Tên khóa học</label>
                                            <input type="text" id="course_name" name="course_name" class="form-control" value="{{$data->name}}">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="description">Mô tả khóa học</label>
                                            <textarea id="description" name="description" class="form-control" rows="2">{{$data->description}}</textarea>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="thumbnail">Hình ảnh</label>
                                            <input type="file" id="thumbnail" name="thumbnail" class="form-control" >
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="price">Giá</label>
                                            <input type="number" id="price" name="price" class="form-control" min="0" value="{{$data->price}}">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="category_id">Danh mục khóa học</label><br>
                                            <select id="category_id" name="category_id" class="form-control">
                                                <option value="">Chọn danh mục</option>
                                                @foreach($course_categories as $category)
                                                    @if($category->id == $data->category_id)
                                                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                                                    @else
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Các trường nhập khóa học -->
                                        <div class="widget-btn">
                                            <button type="submit" class="btn btn-info-light btn-block" id="submit">Hoàn tất</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
            
            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
