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
                                <img src="/assets-client/img/instructor-profile-bg.jpg" alt="">
                                <div class="profile-img">
                                    <a href="instructor-profile.html"><img src="/assets-client/img/user/user15.jpg"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="profile-group">
                                <div class="profile-name text-center">
                                    <h4><a href="instructor-profile.html">Nam Béo</a></h4>
                                    <p>Giảng viên</p>
                                </div>
                                <div class="go-dashboard text-center">
                                    <a href="add-course.html" class="btn btn-primary">Tạo khóa học mới</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="settings-widget account-settings">
                        <div class="settings-menu">
                            <h3>Thông tin giảng viên</h3>
                            <ul>
                                <li class="nav-item active">
                                    <a href="{{route('client.mentor-profile')}}" class="nav-link">
                                        <i class="feather-home"></i> Hồ sơ
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="instructor-course.html" class="nav-link">
                                        <i class="feather-shopping-bag"></i> Khóa học của tôi
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('client.mentor-comment')}}" class="nav-link">
                                        <i class="feather-star"></i> Quản lý bình luận
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('client.mentor-favorite')}}" class="nav-link">
                                        <i class="feather-star"></i> Quản lý lượt thích
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Right -->
                <div class="col-xl-9 col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-md-4 d-flex">
                            <div class="card instructor-card w-100">
                                <div class="card-body">
                                    <div class="instructor-inner">
                                        <h6>Doanh thu</h6>
                                        <h4 class="instructor-text-success">$467.34</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="card instructor-card w-100">
                                <div class="card-body">
                                    <div class="instructor-inner">
                                        <h6>Số học viên đăng ký</h6>
                                        <h4 class="instructor-text-info">12,000</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="card instructor-card w-100">
                                <div class="card-body">
                                    <div class="instructor-inner">
                                        <h6>Đánh giá chất lượng khóa học</h6>
                                        <h4 class="instructor-text-warning">4.8 sao</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card instructor-card">
                                <div class="card-header">
                                    <h4>Thông tin mentor</h4>
                                </div>
                                <div class="card-body">
                                    <form class="container">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Tên</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Số Điện thoại</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="xxxxxxxxxxxx">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="Tam giác quỷ bemuda">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Tên</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Số Điện thoại</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="xxxxxxxxxxxx">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="Tam giác quỷ bemuda">
                                                </div>
                                            </div>
                                        </div>
                                    <a class="btn btn-primary" type="submit">Sửa thông tin</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
