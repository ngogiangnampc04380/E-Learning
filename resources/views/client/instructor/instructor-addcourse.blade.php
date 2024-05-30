@extends('client.layout.master')
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                    <div class="settings-widget dash-profile">
                        <div class="settings-menu p-0">
                            <div class="profile-bg">
                                @if (auth()->user()->role == 0)
                                    <h5 class="text-muted mb-0">Học viên</h5>
                                @elseif(auth()->user()->role == 1)
                                    <h5 class="text-muted mb-0">ADMIN</h5>
                                @elseif(auth()->user()->role == 2)
                                    <h5 class="text-muted mb-0">Mentor</h5>
                                @endif
                                <img src="/assets-client/img/instructor-profile-bg.jpg" alt="">
                                <div class="profile-img">
                                    <a href="">
                                        <img src="{{ auth()->user()->thumbnail ? Storage::url('assets-client/img/user/' . auth()->user()->thumbnail) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU' }}"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="profile-group">
                                <div class="profile-name text-center">
                                    <h4><a href="">{{ auth()->user()->name }}</a></h4>
                                    @if (auth()->user()->role == 0)
                                        <p class="text-muted mb-0">Học viên</p>
                                    @elseif(auth()->user()->role == 1)
                                        <p class="text-muted mb-0">ADMIN</p>
                                    @elseif(auth()->user()->role == 2)
                                        <p class="text-muted mb-0">Mentor</p>
                                    @endif
                                </div>
                                <div class="go-dashboard text-center">
                                    <a href="{{ route('client.instructor-addcourse') }}" class="btn btn-primary">Create
                                        New Course</a>
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
                            @if (auth()->user()->role == 2)
                                <li class="nav-item active">
                                    <a href="{{ route('client.instructor-course', auth()->user()->id) }}" class="nav-link">
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
                                    <a href="{{ route('client.instructor-course', auth()->user()->id) }}" class="nav-link">
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
                            @if (auth()->user()->role == 1)
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
                                    <section class="page-content course-sec">
                                        <div class="container">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <div class="add-course-header mt-3">
                                                        <h2>THÊM KHÓA HỌC MỚI</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="widget-set">
                                                            <div class="widget-content multistep-form">
                                                                <form id="multiStepForm"
                                                                    action="{{ route('client.saveCourse') }}" method="post"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="add-course-info">
                                                                        <div class="add-course-form">
                                                                            <div class="form-group mt-3">
                                                                                <label for="course_name">Tên khóa
                                                                                    học</label>
                                                                                <input type="text" id="course_name"
                                                                                    name="course_name"
                                                                                    class="form-control">
                                                                                <!-- Thêm thẻ span để hiển thị thông báo lỗi -->
                                                                                <span id="course_name_error"
                                                                                    class="error-message"
                                                                                    style="display: none; color:red">Vui
                                                                                    lòng nhập tên khóa học</span>
                                                                            </div>
                                                                            <div class="form-group mt-3">
                                                                                <label for="description">Mô tả khóa
                                                                                    học</label>
                                                                                <textarea id="description" name="description" class="form-control" rows="2"></textarea>
                                                                                <span id="description_error"
                                                                                    class="error-message"
                                                                                    style="display: none; color:red">Vui
                                                                                    lòng nhập mô tả khóa học</span>
                                                                            </div>
                                                                            <div class="form-group mt-3">
                                                                                <label for="thumbnail">Hình ảnh</label>
                                                                                <input type="file" id="thumbnail"
                                                                                    name="thumbnail" class="form-control">
                                                                                <span id="thumbnail_error"
                                                                                    class="error-message"
                                                                                    style="display: none; color:red">Vui
                                                                                    lòng chọn hình ảnh</span>
                                                                            </div>
                                                                            <div class="form-group mt-3">
                                                                                <label for="price">Giá</label>
                                                                                <input type="number" id="price"
                                                                                    name="price" class="form-control"
                                                                                    min="0">
                                                                                <span id="price_error"
                                                                                    class="error-message"
                                                                                    style="display: none; color:red">Vui
                                                                                    lòng nhập giá</span>
                                                                            </div>
                                                                            <div class="form-group mt-3">
                                                                                <label for="category_id">Danh mục khóa
                                                                                    học</label><br>
                                                                                <select id="category_id"
                                                                                    name="category_id"
                                                                                    class="form-control">
                                                                                    <option value="">Chọn danh mục
                                                                                    </option>
                                                                                    @foreach ($getCategorie as $Categorie)
                                                                                        <option
                                                                                            value="{{ $Categorie->id }}">
                                                                                            {{ $Categorie->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <span id="price_error"
                                                                                    class="error-message"
                                                                                    style="display: none; color:red">Vui
                                                                                    lòng chọn danh mục khóa học</span>
                                                                            </div>
                                                                            <!-- Các trường nhập khác -->
                                                                            <div class="widget-btn">
                                                                                <a
                                                                                    href="{{ route('client.instructor-course', auth()->user()->id) }}">
                                                                                    <button type="button"
                                                                                        class="btn btn-info-light prev">Quay
                                                                                        lại</button>
                                                                                </a>
                                                                                <button type="button"
                                                                                    class="btn btn-info-light next">Tiếp
                                                                                    theo</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Bước 3: Thêm chương -->
                                                                    <div class="add-course-info">
                                                                        <div class="add-course-form">
                                                                            <div class="table">
                                                                                <div class="add-course-inner-header my-3">
                                                                                    <h4>Thêm chương</h4>
                                                                                    <div class="form-group mt-3">
                                                                                        <label for="chapter_name">Tên
                                                                                            chương</label>
                                                                                        <input type="text"
                                                                                            id="chapter_name"
                                                                                            name="chapter_name"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                    <div class="form-group mt-3">
                                                                                        <label for="course_id ">Danh mục
                                                                                            khóa học</label><br>
                                                                                        <select id="course_id "
                                                                                            name="course_id"
                                                                                            class="form-control">
                                                                                            <option value="">ID khóa
                                                                                                học
                                                                                            </option>
                                                                                            @foreach ($getCourse as $Course)
                                                                                                <option
                                                                                                    value="{{ $Course->id }}">
                                                                                                    {{ $Course->name }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="widget-btn form-group">
                                                                                <!-- Sử dụng form-group để tạo kích thước cho nút -->
                                                                                <button type="button"
                                                                                    class="btn btn-info-light prev">
                                                                                    Quay lại
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="btn btn-info-light next">
                                                                                    Tiếp theo
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Bước 4: Thêm bài học -->
                                                                    <div class="add-course-info">
                                                                        <div class="add-course-form">
                                                                            <div class="add-course-inner-header my-3">
                                                                                <h4>Thêm bài viết</h4>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="lesson_name">Tên bài
                                                                                    học</label>
                                                                                <input type="text" id="lesson_name"
                                                                                    name="lesson_name"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group mt-3">
                                                                                <label for="path_video"> Video</label>
                                                                                <input type="file" id="path_video"
                                                                                    name="path_video"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group mt-3">
                                                                                <label for="chapter_id">ID
                                                                                    Chương</label><br>
                                                                                <select id="chapter_id" name="chapter_id"
                                                                                    class="form-control">
                                                                                    <option value="">Chọn ID</option>
                                                                                    @foreach ($getChapter as $Chapter)
                                                                                        <option
                                                                                            value="{{ $Chapter->id }}">
                                                                                            {{ $Chapter->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <input type="hidden"
                                                                                value="{{ auth()->user()->id }}"
                                                                                name="mentor_id" class="form-control">
                                                                            <div class="widget-btn">
                                                                                <button type="button"
                                                                                    class="btn btn-info-light prev">
                                                                                    Quay lại
                                                                                </button>
                                                                                <button type="submit"
                                                                                    class="btn btn-info-light"
                                                                                    id="submit">Hoàn tất
                                                                                </button>
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
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
