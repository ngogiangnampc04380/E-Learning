@extends('client.layout.master')
@section('content')
    <div class="breadcrumb-bar">
        <div class="container">
        </div>
    </div>
    <div class="page-content instructor-page-content">
        <div class="container">
            <div class="row">
                <!-- Left -->
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
                            @if(auth()->user()->role== 2)
                            <li class="nav-item ">
                                <a href="{{route('client.instructor-course')}}" class="nav-link">
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
                            <li class="nav-item ">
                                <a href="{{route('client.instructor-course')}}" class="nav-link">
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
                            <li class="nav-item active ">
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

                <!-- Right -->
                <div class="col-xl-9 col-lg-8 col-md-12">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card instructor-card">
                                <div class="card-header">
                                    <h4>Thông tin người dùng</h4>
                                </div>
                                <div class="card-body">

                                    <form enctype="multipart/form-data" class="container"
                                        action="{{ route('client.user-profile-edit') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">


                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Tên</label>
                                                    <input value="{{ auth()->user()->name }}"name="name" type="text"
                                                        class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Số Điện thoại</label>
                                                    <input value="{{ auth()->user()->phone }} "type="text" name="phone"
                                                        class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                                    <input value="{{ auth()->user()->email }}"type="text" name="email"
                                                        class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                                                    <input value="{{ auth()->user()->address }}"type="text" name="address"
                                                        class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="Tam giác quỷ bemuda">
                                                </div>

                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                <div class="settings-widget dash-profile">
                                                    <div class="settings-menu p-0">

                                                        <div class="profile-bg">
                                                            <img src="/assets-client/img/instructor-profile-bg.jpg"
                                                                alt="">
                                                            <div class="profile-imgs">
                                                                <!-- Hiển thị hình ảnh đã lưu sẵn -->
                                                                <img class="trigger-element"
                                                                src="{{ auth()->user()->thumbnail ? Storage::url('assets-client/img/user/' . auth()->user()->thumbnail) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU' }}" 
                                                                <!-- Đặt input type="file" để cho phép người dùng chọn hình ảnh từ ổ cứng -->
                                                                <input type="file" id="thumbnail" name="thumbnail"
                                                                    accept="image/*" style="display: none;">
                                                                <!-- Nút "Chọn file" -->
                                                                <label class="target-element custom-file-upload"
                                                                    for="thumbnail">Chọn Ảnh</label>
                                                            </div>
                                                        </div>

                                                        <div class="profile-group">
                                                            <div class="profile-name text-center">
                                                                <h4><a href="">{{ auth()->user()->name }}</a></h4>
                                                            </div>
                                                            <div class="go-dashboard text-center">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <button type="button" class="d-none btn btn-primary position-absolute top-0 start-0 m-5" onclick="submitForm()" id="saveAvt">Lưu ảnh</button> --}}
                                            <button class="btn btn-primary" type="submit">Sửa thông tin</button>

                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chọn các phần tử
            var triggerElement = document.querySelector('.trigger-element');
            var targetElement = document.querySelector('.target-element');

            // Thêm sự kiện khi rê chuột vào phần tử trigger hoặc target
            triggerElement.addEventListener('mouseenter', function() {
                // Hiển thị phần tử target khi rê chuột vào trigger hoặc target
                targetElement.style.display = 'block';
            });

            targetElement.addEventListener('mouseenter', function() {
                // Hiển thị phần tử target khi rê chuột vào trigger hoặc target
                targetElement.style.display = 'block';
            });

            // Thêm sự kiện khi rời chuột khỏi phần tử trigger
            triggerElement.addEventListener('mouseleave', function() {
                // Ẩn phần tử target khi rời chuột khỏi trigger
                targetElement.style.display = 'none';
            });

            targetElement.addEventListener('mouseleave', function() {
                // Ẩn phần tử target khi rời chuột khỏi trigger
                targetElement.style.display = 'none';
            });

            // Lắng nghe sự kiện khi người dùng chọn hình ảnh
            document.getElementById('thumbnail').addEventListener('change', function(event) {
                // Kiểm tra xem có hình ảnh nào được chọn hay không
                if (event.target.files && event.target.files[0]) {
                    // Đọc hình ảnh từ file
                    var reader = new FileReader();

                    // Đọc dữ liệu hình ảnh
                    reader.onload = function(e) {
                        // Hiển thị hình ảnh trong phần tử img
                        triggerElement.setAttribute('src', e.target.result);
                    }

                    // Đọc dữ liệu của file được chọn
                    reader.readAsDataURL(event.target.files[0]);
                }
            });
        });
    </script>
@endsection
