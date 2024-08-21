@extends('client.layout.master')
@section('content')
    <div class="page-content">
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
                                        <p class="text-muted mb-0">GIảng viên</p>
                                    @endif
                                </div>
                                @if (auth()->user()->role == 2)
                                    <div class="go-dashboard text-center">
                                        <a href="{{ route('client.instructor-addcourse') }}" class="btn btn-primary">Create
                                            New Course</a>
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
                            @if (in_array(auth()->user()->role, [0, 2]))
                                <li class="nav-item {{ request()->is('instructor-course') ? 'active' : '' }}">
                                    <a href="#" class="nav-link">
                                        <i class="feather-shopping-bag"></i> Khóa học của tôi
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->role == 2)
                                <li class="nav-item {{ request()->routeIs('client.instructor-course') ? 'active' : '' }}">
                                    <a href="{{ route('client.instructor-course',auth()->user()->id) }}" class="nav-link">
                                        <i class="feather-book"></i> Quản lí khóa học
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('instructor-student-grid.html') ? 'active' : '' }}">
                                    <a href="instructor-student-grid.html" class="nav-link">
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
                            <form id="multiStepForm" action="{{ route('client.saveChapter') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="add-course-info">
                                    <div class="add-course-form">
                                        <div class="table">
                                            <div class="add-course-inner-header">
                                                <h4>THÊM CHƯƠNG</h4>
                                                <div class="form-group mt-3">
                                                    <label for="chapter_name">Tên chương</label>
                                                    <input type="text" id="chapter_name" name="chapter_name"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="course_id ">Danh mục khóa học</label><br>
                                                    <select id="course_id " name="course_id" class="form-control">
                                                        <option value="">ID khóa học</option>
                                                        @foreach ($getCourse as $chapter)
                                                            <option value="{{ $chapter->id }}">{{ $chapter->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-btn form-group">
                                            <!-- Sử dụng form-group để tạo kích thước cho nút -->
                                            <button type="submit" class="btn btn-info-light btn-block" id="submit">Hoàn
                                                tất
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-md-7">
                            <div class="settings-widget">
                                <div class="settings-inner-blk p-0">
                                    <div class="comman-space pb-0">
                                        <div class="settings-tickets-blk course-instruct-blk table-responsive">
                                            <table class="table table-nowrap mb-2">
                                                <tbody>
                                                    @foreach ($data as $post)
                                                        <tr>
                                                            <td>
                                                                <div class="sell-table-group d-flex align-items-center">
                                                                    <div class="sell-tabel-info">
                                                                        <a
                                                                            href="{{ route('client.instructor-lesson', $post->id) }}">
                                                                            <p>{{ $post->name }}</p>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="btn-group-equal">
                                                                    <form id="deleteForm"
                                                                        action="{{ route('client.deleteChapter', $post->id) }}"
                                                                        method="POST" style="display:inline;">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-danger btn-custom">
                                                                            Xóa
                                                                        </button>
                                                                    </form>
                                                                    <a href="{{ route('client.editChapter', $post->id) }}"
                                                                        class="btn btn-danger btn-custom">
                                                                        Sửa
                                                                    </a>
                                                                </div>
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
