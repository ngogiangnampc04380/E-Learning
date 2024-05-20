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
                            <li class="nav-item active">
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
                            <li class="nav-item active">
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


                <div class="col-xl-9 col-lg-8 col-md-12 mx-auto" style="margin-top: 100px;">
                    <div class="row">
                        <div class="col-md-5">
                            <form id="multiStepForm" action="{{route('client.saveChapter') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="add-course-info">
                                    <div class="add-course-form">
                                        <div class="table">
                                            <div class="add-course-inner-header">
                                                <h4>THÊM CHƯƠNG</h4>
                                                <div class="form-group mt-3">
                                                    <label for="chapter_name">Tên chương</label>
                                                    <input type="text" id="chapter_name" name="chapter_name" class="form-control">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="course_id ">Danh mục khóa học</label><br>
                                                    <select id="course_id " name="course_id" class="form-control">
                                                        <option value="">ID khóa học</option>
                                                       @foreach($getCourse as $chapter)
                                                            <option value="{{$chapter->id}}">{{$chapter->name}}</option>
                                                       @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-btn form-group"> <!-- Sử dụng form-group để tạo kích thước cho nút -->
                                            <button type="submit" class="btn btn-info-light btn-block" id="submit">Hoàn tất</button>
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
                                                @foreach($data as $post)
                                                    <tr>
                                                        <td>
                                                            <div class="sell-table-group d-flex align-items-center">
                                                                <div class="sell-tabel-info">
                                                                    <a href="{{route('client.instructor-lesson',$post->id)}}">
                                                                        <p> {{ $post->name }}</p> </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('client.editChapter', $post->id)}}" class="btn btn-danger">
                                                                Sửa
                                                            </a>
                                                            <form id="deleteForm" action="{{ route('client.deleteChapter', $post->id) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">
                                                                    Xóa
                                                                </button>
                                                            </form>
            
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
