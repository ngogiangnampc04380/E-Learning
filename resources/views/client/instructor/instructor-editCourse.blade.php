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
                                <h5 class="text-muted mb-0">Quảng trị viên</h5>
                                @elseif(auth()->user()->role == 2)
                                <h5 class="text-muted mb-0">Giảng viên</h5>
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
                                        <p class="text-muted mb-0">Quản trị viên</p>
                                        @elseif(auth()->user()->role == 2)
                                        <p class="text-muted mb-0">GIảng viên</p>
                                        @endif
                                </div>
                                @if(auth()->user()->role == 2)
                                <div class="go-dashboard text-center">
                                    <a href="{{ route('client.create-course') }}" class="btn btn-primary">THÊM KHÓA HỌC MỚI</a>
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
        @if(in_array(auth()->user()->role, [0, 2]))
        <li class="nav-item {{ request()->is('instructor-course') ? 'active' : '' }}">
            <a href="instructor-course.html" class="nav-link">
                <i class="feather-shopping-bag"></i> Khóa học của tôi
            </a>
        </li>
        @endif
        @if(auth()->user()->role == 2)
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
            <h3>Cài đặt tài khoản</h3>
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


                <div class="col-xl-9 col-lg-8 col-md-12 mx-auto" style="margin-top: 100px;">
                    <div class="row">

                        <div class="col-md-12">
                            <h2>Chỉnh sửa khóa học: {{ $course->name }}</h2>
                            <table class="table  table-hover">
                                <thead>
                                    <tr>
                                        <th
                                            style="color: black; background:    #f1c232;
background:    linear-gradient(#f1c232, #ffff00);">
                                            Hình ảnh</th>
                                        <th
                                            style=" color: black; background:    #f1c232;
background:    linear-gradient(#f1c232, #ffff00);">
                                            Video demo</th>
                                        <th
                                            style="color: black; background:    #f1c232;
background:    linear-gradient(#f1c232, #ffff00);">
                                            Tên khóa học</th>
                                        <th
                                            style="color: black; background:    #f1c232;
background:    linear-gradient(#f1c232, #ffff00);">
                                            Giá</th>
                                        <th
                                            style="color: black; background:    #f1c232;
background:    linear-gradient(#f1c232, #ffff00);">
                                            Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <a href="#">
                                                <img src="{{ Storage::url('' . $course->thumbnail) }}"
                                                    alt="Thumbnail" class="img-fluid" style="max-width: 100px;">
                                            </a>
                                        </td>
                                        <td>
                                            @if ($course->video_demo)
                                                <video controls class="img-fluid" style="max-width: 150px;">
                                                    <source
                                                        src="{{ Storage::url('assets-client/videos/Courses/' . $course->video_demo) }}"
                                                        type="video/mp4">
                                                    Trình duyệt của bạn không hỗ trợ thẻ video.
                                                </video>
                                            @else
                                                Không có video demo
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="sell-tabel-info">
                                                    <p>

                                                        {{ $course->name }}

                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ number_format($course->price) }} VNĐ</td>

                                        <td>

                                            <form action="{{ route('client.deleteCourse', $course->id) }}" method="POST"
                                                class="mr-2 delete-course-form">
                                                @csrf
                                                <button type="button" class="btn-outline-danger btn delete-course-btn">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>


                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                            <button type="button" class="btn btn-primary mt-3" id="backBtn" style="display: none;">Quay
                                lại</button>

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Nút chỉnh sửa thông tin khóa học -->
                            <button type="button" class="btn  btn-outline-warning mt-3 mb-3" id="editCourseBtn">Chỉnh sửa
                                thông tin khóa học</button>

                            <!-- Form cập nhật thông tin khóa học -->
                            <form id="editCourseForm" action="{{ route('client.updateCourse', $course->id) }}"
                                style="display: none" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Tên khóa học</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ $course->name }}" required>
                                    <span id="name_error" class="text-danger"></span>
                                </div>

                                <div class="form-group">
                                    <label for="description">Mô tả khóa học</label>
                                    <textarea id="description" name="description" class="form-control" rows="3" required>{{ $course->description }}</textarea>
                                    <span id="description_error" class="text-danger"></span>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">Hình ảnh khóa học</label>
                                    <input type="file" id="thumbnail" name="thumbnail" class="form-control">
                                    @if ($course->thumbnail)
                                        <img src="{{ Storage::url($course->thumbnail) }}" alt="Thumbnail"
                                            class="img-fluid" style="max-width: 100px; margin-top: 10px;">
                                    @endif
                                    <span id="thumbnail_error" class="text-danger"></span>
                                </div>

                                <div class="form-group">
                                    <label for="video_demo">Video demo</label>
                                    <input type="file" id="video_demo" name="video_demo" class="form-control">
                                    @if ($course->video_demo)
                                        <video controls class="img-fluid" style="max-width: 150px; margin-top: 10px;">
                                            <source src="{{ Storage::url($course->video_demo) }}" type="video/mp4">
                                            Trình duyệt của bạn không hỗ trợ thẻ video.
                                        </video>
                                    @endif
                                    <span id="video_demo_error" class="text-danger"></span>
                                </div>

                                <div class="form-group">
                                    <label for="price">Giá</label>
                                    <div class="input-group">
                                        <input type="text" id="price" name="price" class="form-control"
                                            value="{{ $course->price }}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">VNĐ</span>
                                        </div>
                                    </div>
                                    <span id="price_error" class="text-danger"></span>
                                </div>


                                <div class="form-group">
                                    <label for="category_id">Danh mục khóa học</label>
                                    <select id="category_id" name="category_id" class="form-control custom-select"
                                        required>
                                        <option value="">Chọn danh mục</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $course->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span id="category_id_error" class="text-danger"></span>
                                </div>


                                <button type="button" class="btn btn-primary" onclick="updateCourse()">Cập nhật khóa
                                    học</button>
                            </form>


                            <!-- Danh sách chương -->
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="mt-5">Danh sách chương</h3>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th
                                                    style="color: black; background:    #f1c232; background:    linear-gradient(#f1c232, #ffff00);">
                                                    Tên chương</th>
                                                <th
                                                    style="color: black; background:    #f1c232; background:    linear-gradient(#f1c232, #ffff00);">
                                                    Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($course->chapters as $chapter)
                                                <tr>
                                                    <td>{{ $chapter->name }}</td>

                                                    <td>
                                                        <div class="d-flex">
                                                            <form
                                                                action="{{ route('client.deleteChapter', $chapter->id) }}"
                                                                method="POST" class="delete-chapter-form mr-2">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button"
                                                                    class="btn btn-outline-danger delete-chapter-btn "
                                                                    data-chapter-id="{{ $chapter->id }}">Xóa</button>
                                                            </form>
                                                            <button type="button"
                                                                class="btn btn-outline-warning ml-2 edit-chapter-btn ms-2 me-2"
                                                                data-chapter-id="{{ $chapter->id }}">Sửa chương</button>

                                                            <button type="button"
                                                                class="btn btn-outline-primary  ml-2 toggle-lesson-list"
                                                                data-chapter-id="{{ $chapter->id }}">Ẩn bài học</button>
                                                            

                                                            <button type="button"
                                                                class="btn btn-outline-primary  ml-2 toggle-quiz-list"
                                                                data-chapter-id="{{ $chapter->id }}">Ẩn bài quiz
                                                            </button>

                                                        </div>
                                                        <div id="quiz-form" style="display: none;">
                                                            <form action="{{ route('client.courses.storequiz') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" id="course_id" name="course_id">
                                                                <input type="hidden" id="chapter_id" name="chapter_id">
                                                                <div class="mb-3">
                                                                    <label for="title" class="form-label">Tiêu đề
                                                                        Quiz:</label>
                                                                    <input type="text" id="title" name="title"
                                                                        class="form-control" required>
                                                                    @error('title')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div id="questions-container"></div>
                                                                <div class="d-flex justify-content-between mb-4">
                                                                    <button type="button" id="add-question1"
                                                                        class="btn btn-primary">Thêm câu hỏi
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary">Lưu
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="quiz-list mt-2" data-chapter-id="{{ $chapter->id }}"
                                                            style="display: block; border: 1px solid #ccc; padding: 10px;">
                                                            <h4  style="margin-bottom: 10px;">Danh sách bài quiz</h4>
                                                            
                                                            <a href="{{ route('client.courses.add-quiz', ['course_id' => $course->id, 'chapter_id' => $chapter->id]) }}"
                                                                class="btn btn-outline-primary m-2 edit-chapter-btn " id="add-quiz-link">
                                                                 Thêm bài quiz
                                                             </a>
                                                            <ul class="list-group">
                                                                @forelse($chapter->quizzes as $quiz)
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <span>{{ $quiz->name }}</span>
                                                                        <div class="d-inline">
                                                                            <a href="{{ route('client.courses.show', $quiz->id) }}"
                                                                                class="btn btn-sm btn-outline-dark  mr-2">Xem chi
                                                                                tiết</a>
                                                                            <a href="{{ route('client.courses.edit-quiz', $quiz->id) }}"
                                                                                class="btn btn-sm btn-outline-warning mr-2">Sửa</a>
                                                                            <form
                                                                                action="{{ route('client.courses.delete-quiz', $quiz->id) }}"
                                                                                method="POST" class="d-inline"
                                                                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="btn btn-sm btn-outline-danger">Xóa</button>
                                                                            </form>
                                                                            <a href="{{ route('client.courses.quiz-chapter', $quiz->id) }}"
                                                                                class="btn btn-sm btn-success">Làm bài</a>
                                                                        </div>

                                                                    </li>
                                                                @empty
                                                                    <li class="list-group-item">Không có bài quiz nào.</li>
                                                                @endforelse
                                                            </ul>
                                                        </div>

                                                        <div class="modal fade" id="editQuizModal" tabindex="-1"
                                                            aria-labelledby="editQuizModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form id="editQuizForm" method="POST">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="editQuizModalLabel">
                                                                                Sửa Quiz</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="quizName">Tên Quiz</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="quizName" name="name"
                                                                                    required>
                                                                            </div>
                                                                            <!-- Add other fields as necessary -->
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-primary"
                                                                                data-bs-dismiss="modal">Hủy
                                                                            </button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">
                                                                                Lưu
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="lesson-list mt-2"
                                                            data-chapter-id="{{ $chapter->id }}"
                                                            style="display: block; border: 1px solid #ccc; padding: 10px;">
                                                            <h4 style="margin-bottom: 10px;">Danh sách bài học </h4>

                                                            @if ($chapter->lessons->isEmpty())
                                                                <p>Hiện chưa có bài học nào</p>
                                                                <button type="button"
                                                                class="btn btn-outline-primary m-2 toggle-lesson-form "
                                                                data-chapter-id="{{ $chapter->id }}">Thêm bài học</button>
                                                            @else
                                                            <button type="button"
                                                                class="btn btn-outline-primary m-2 toggle-lesson-form "
                                                                data-chapter-id="{{ $chapter->id }}">Thêm bài học</button>
                                                                <ul class="list-group">
                                                                    @foreach ($chapter->lessons as $lesson)
                                                                        <li
                                                                            class="list-group-item d-flex justify-content-between align-items-center">
                                                                            <span>{{ $lesson->name }}</span>
                                                                            <div>
                                                                                @php
                                                                                        $bucketName = 'entweb01';
                                                                                        $path_prefix ='ENT01';
                                                                                        $filePath = 'folder-name';
                                                                                        $namefile= $lesson->path_video;
                                                                                        $url = "https://storage.googleapis.com/{$bucketName}/{$path_prefix}/{$filePath}/{$namefile}";
                                                                                @endphp
                                                                                <a href="{{$url}}"
                                                                                    target="_blank"
                                                                                    class="btn btn-sm btn-outline-dark  mr-2">Xem
                                                                                    video</a>
                                                                                <button type="button"
                                                                                    class="btn btn-sm btn-outline-warning edit-lesson-btn"
                                                                                    data-lesson-id="{{ $lesson->id }}">Sửa</button>
                                                                                <button type="button"
                                                                                    class="btn btn-sm btn-outline-danger delete-lesson-btn"
                                                                                    data-lesson-id="{{ $lesson->id }}">Xóa</button>

                                                                            </div>
                                                                        </li>
                                                                        <div class="edit-lesson-form mt-2"
                                                                            data-lesson-id="{{ $lesson->id }}"
                                                                            style="display: none;">
                                                                            <form
                                                                                action="{{ route('client.updateLesson', $lesson->id) }}"
                                                                                method="POST" class="lesson-update-form"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('post')
                                                                                <div class="form-group">
                                                                                    <label for="edit_lesson_name">Tên bài
                                                                                        học</label>
                                                                                    <input type="text"
                                                                                        id="edit_lesson_name"
                                                                                        name="name"
                                                                                        class="form-control"
                                                                                        value="{{ $lesson->name }}"
                                                                                        required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="edit_lesson_video">Video
                                                                                        bài học</label>
                                                                                    <input type="file"
                                                                                        id="edit_lesson_video"
                                                                                        name="video"
                                                                                        class="form-control-file">
                                                                                </div>
                                                                                <button type="submit"
                                                                                    class="btn btn-success save-lesson-btn m-2">Lưu</button>
                                                                                <button type="button"
                                                                                    class="btn btn-primary cancel-edit-lesson-btn m-2"
                                                                                    data-lesson-id="{{ $lesson->id }}">Hủy</button>
                                                                                <hr>
                                                                            </form>
                                                                        </div>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </div>

                                                        <div class="add-lesson-form mt-2"
                                                            data-chapter-id="{{ $chapter->id }}" style="display: none;">
                                                            <button type="button"
                                                                class="btn btn-outline-primary mr-2 mt-2 mb-2  toggle-lesson-form "
                                                                onclick="addSection(1, {{ $chapter->id }})">Thêm bài
                                                                học</button>
                                                            <form action="{{ route('client.addLesson') }}" method="POST"
                                                                class="lesson-form" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="chapter_videos"
                                                                    data-chapter-id="{{ $chapter->id }}">
                                                                </div>
                                                                <button type="submit" class="btn btn-success">Lưu bài
                                                                    học</button>
                                                            </form>

                                                        </div>
                                                        <div class="edit-chapter-form mt-2"
                                                            data-chapter-id="{{ $chapter->id }}" style="display: none;">
                                                            <form
                                                                action="{{ route('client.updateChapter', $chapter->id) }}"
                                                                method="POST" class="update-chapter-form">
                                                                @csrf
                                                                @method('POST')
                                                                <div class="form-group">
                                                                    <label for="edit_chapter_name">Tên chương</label>
                                                                    <input type="text" id="edit_chapter_name"
                                                                        name="name" class="form-control"
                                                                        value="{{ $chapter->name }}" required>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-success">Lưu</button>
                                                                <button type="button"
                                                                    class="btn btn-primary cancel-edit-chapter-btn"
                                                                    data-chapter-id="{{ $chapter->id }}">Hủy</button>
                                                            </form>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Nút thêm chương mới -->
                                    <div class="mt-4">

                                        <button type="button" class="btn btn-outline-info" id="addChapterBtn">Thêm
                                            chương mới</button>
                                    </div>

                                    <!-- Form thêm chương mới (ẩn mặc định) -->
                                    <div id="addChapterForm" style="display: none;">
                                        <h3 class="mt-4">Thêm chương mới</h3>
                                        <form action="{{ route('client.addChapter', $course->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="chapter_name">Tên chương</label>
                                                <input type="text" id="chapter_name" name="name"
                                                    class="form-control @error('name') is-invalid @enderror" required
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-success">Thêm chương</button>
                                        </form>

                                        @if (session('success'))
                                            <div class="alert alert-success mt-3">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <form action="{{ route('client.submitCourse', $course->id) }}" method="POST"
                                class="submit-course-form">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-lg  btn-success rounded-pill">
                                    Gửi duyệt <i class="bi bi-arrow-right"></i>
                                </button>
                            </form>
                        </div>
                        <div id="confirmDeleteModal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <p>Bạn có chắc chắn muốn xóa khóa học này không?</p>
                                <div class="modal-buttons">
                                    <button type="button" class="btn btn-primary" id="cancelDeleteBtn">Hủy</button>
                                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Xóa</button>
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
            const editCourseBtn = document.getElementById('editCourseBtn');
            const editCourseForm = document.getElementById('editCourseForm');
            const backBtn = document.getElementById('backBtn');

            editCourseBtn.addEventListener('click', function() {
                // Ẩn nút chỉnh sửa thông tin khóa học
                editCourseBtn.style.display = 'none';

                // Hiển thị form chỉnh sửa thông tin khóa học
                editCourseForm.style.display = 'block';

                // Hiển thị nút quay lại
                backBtn.style.display = 'block';
            });

            backBtn.addEventListener('click', function() {
                // Ẩn form cập nhật thông tin khóa học
                editCourseForm.style.display = 'none';

                // Hiển thị nút chỉnh sửa thông tin khóa học
                editCourseBtn.style.display = 'block';

                // Ẩn nút quay lại
                backBtn.style.display = 'none';
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let formToSubmit;
            const modal = document.getElementById("confirmDeleteModal");
            const closeModal = document.getElementsByClassName("close")[0];
            const cancelDeleteBtn = document.getElementById("cancelDeleteBtn");
            const confirmDeleteBtn = document.getElementById("confirmDeleteBtn");

            document.querySelectorAll('.delete-course-btn').forEach(button => {
                button.addEventListener('click', function() {
                    formToSubmit = this.closest('form');
                    modal.style.display = "block";
                });
            });

            closeModal.onclick = function() {
                modal.style.display = "none";
            }

            cancelDeleteBtn.onclick = function() {
                modal.style.display = "none";
            }

            confirmDeleteBtn.onclick = function() {
                formToSubmit.submit();
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
    </script>
    <script>
        // Script để hiển thị form thêm chương mới khi click vào nút
        document.getElementById('addChapterBtn').addEventListener('click', function() {
            document.getElementById('addChapterForm').style.display = 'block';
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-chapter-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault(); // Ngăn chặn hành động mặc định của button

                    // Hiển thị thông báo xác nhận
                    if (confirm('Bạn có chắc chắn muốn xóa chương này không?')) {
                        // Nếu xác nhận, submit form để xóa chương
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleLessonForms = document.querySelectorAll('.toggle-lesson-form');

            toggleLessonForms.forEach(button => {
                button.addEventListener('click', function() {
                    const chapterId = this.getAttribute('data-chapter-id');
                    const addLessonForm = document.querySelector(
                        `.add-lesson-form[data-chapter-id="${chapterId}"]`);
                    addLessonForm.style.display = addLessonForm.style.display === 'none' ? 'block' :
                        'none';
                    this.innerText = addLessonForm.style.display === 'none' ? 'Thêm bài học' : 'Ẩn';
                });
            });
        });
    </script>
    <script>
        document.querySelectorAll('.toggle-lesson-list').forEach(button => {
            button.addEventListener('click', function() {
                const chapterId = this.getAttribute('data-chapter-id');
                const lessonList = document.querySelector(`.lesson-list[data-chapter-id="${chapterId}"]`);
                lessonList.style.display = lessonList.style.display === 'block' ? 'none' : 'block';

                // Đổi nút Xem bài học thành nút Ẩn khi hiển thị danh sách
                if (lessonList.style.display === 'block') {
                    this.textContent = 'Ẩn bài học';
                } else {
                    this.textContent = 'Xem bài học';
                }
            });
        });
    </script>
    <script>
        document.querySelectorAll('.edit-lesson-btn').forEach(button => {
            button.addEventListener('click', function() {
                const lessonId = this.dataset.lessonId;
                const editForm = document.querySelector(`.edit-lesson-form[data-lesson-id="${lessonId}"]`);
                if (editForm.style.display === 'none') {
                    editForm.style.display = 'block';
                    this.textContent = 'Ẩn';
                } else {
                    editForm.style.display = 'none';
                    this.textContent = 'Sửa';
                }
            });
        });

        // Cancel edit lesson form
        document.querySelectorAll('.cancel-edit-lesson-btn').forEach(button => {
            button.addEventListener('click', function() {
                const lessonId = this.dataset.lessonId;
                const editForm = document.querySelector(`.edit-lesson-form[data-lesson-id="${lessonId}"]`);
                editForm.style.display = 'none';
                document.querySelector(`.edit-lesson-btn[data-lesson-id="${lessonId}"]`).textContent =
                    'Sửa';
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Xử lý sự kiện click nút xóa bài học
            document.querySelectorAll('.delete-lesson-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const lessonId = this.getAttribute('data-lesson-id');
                    if (confirm('Bạn có chắc chắn muốn xóa bài học này không?')) {
                        fetch(`{{ route('client.deleteLesson', '') }}/${lessonId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Xóa thành công, cập nhật giao diện
                                    this.closest('li').remove();
                                    alert('Đã xóa bài học thành công.');
                                } else {
                                    alert('Đã xảy ra lỗi khi xóa bài học.');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Đã xảy ra lỗi khi xóa bài học.');
                            });
                    }
                });
            });
        });
        document.querySelectorAll('.edit-chapter-btn').forEach(button => {
            button.addEventListener('click', function() {
                const chapterId = this.getAttribute('data-chapter-id');
                const editForm = document.querySelector(
                    `.edit-chapter-form[data-chapter-id="${chapterId}"]`);
                editForm.style.display = editForm.style.display === 'none' ? 'block' : 'none';
            });
        });

        // Ẩn form sửa chương
        document.querySelectorAll('.cancel-edit-chapter-btn').forEach(button => {
            button.addEventListener('click', function() {
                const chapterId = this.getAttribute('data-chapter-id');
                const editForm = document.querySelector(
                    `.edit-chapter-form[data-chapter-id="${chapterId}"]`);
                editForm.style.display = 'none';
            });
        });


        var index = 0;

        function addSection(count, chapterId) {
            for (var i = 0; i < count; i++) {
                document.querySelector(`.chapter_videos[data-chapter-id="${chapterId}"]`).innerHTML += `
        <div class="curriculum-grid mt-4 chapter_video chapter_${index}">
            <input type="hidden" name="lessons[${index}][chapter_id]" value="${chapterId}">
            <div class="form-group">
                <label for="lesson_name_${index}">Tên bài học</label>
                <input type="text" id="lesson_name_${index}" name="lessons[${index}][name]" class="form-control" required>
            </div>
            <div class="form-group custom-file">
                <label class="custom-file-label" for="lesson_video_${index}">Chọn video bài học</label>
                <input type="file" class="custom-file-input" id="lesson_video_${index}" name="lessons[${index}][video]" required accept="video/*">
            </div>
            <a href="javascript:void(0);" class="btn btn-outline-danger m-2 " onclick="removeSection('chapter_${index}')">xóa</a>
        </div>
        `;
                index++;
            }
            var el = document.querySelector(`.chapter_${index - 1}`);
            if (el) {
                el.scrollIntoView(true);
            }
        }

        function removeSection(sectionClass) {
            var section = document.querySelector(`.${sectionClass}`);
            if (section) {
                section.remove();
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateCourse() {
            var formData = new FormData(document.getElementById('editCourseForm'));

            $.ajax({
                url: $('#editCourseForm').attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.redirect_url) {
                        window.location.href = response.redirect_url;
                    }
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        // Xóa thông báo lỗi và lớp lỗi hiện tại
                        $('.text-danger').text('');
                        $('.form-control').removeClass('is-invalid');
                        $('select').removeClass('is-invalid');

                        // Hiển thị thông báo lỗi mới
                        $.each(errors, function(key, errorMessages) {
                            var errorElement = $('#' + key + '_error');
                            var inputElement = $('#' + key);
                            if (errorMessages.length > 0) {
                                errorElement.text(errorMessages[0]);
                                inputElement.addClass('is-invalid');
                            }
                        });

                        // Cuộn đến lỗi đầu tiên
                        var firstErrorElement = $('.is-invalid').first();
                        if (firstErrorElement.length) {
                            $('html, body').animate({
                                scrollTop: firstErrorElement.offset().top -
                                    300 // Offset cho thanh header, margin, etc.
                            }, 500);
                        }
                    }
                }
            });
        }
    </script>
{{--    <script>--}}
{{--        document.getElementById('show-quiz-form').addEventListener('click', function() {--}}
{{--            var courseId = this.getAttribute('data-course-id');--}}
{{--            var chapterId = this.getAttribute('data-chapter-id');--}}
{{--            document.getElementById('course_id').value = courseId;--}}
{{--            document.getElementById('chapter_id').value = chapterId;--}}
{{--            document.getElementById('quiz-form').style.display = 'block';--}}
{{--            this.style.display = 'none';--}}
{{--        });--}}

{{--        document.getElementById('add-question1').addEventListener('click', function() {--}}
{{--            const questionsContainer = document.getElementById('questions-container');--}}
{{--            const questionCount = questionsContainer.children.length + 1;--}}

{{--            const questionHtml = `--}}
{{--        <div class="question-block mb-3">--}}
{{--            <h5>Câu hỏi ${questionCount}</h5>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="question_${questionCount}" class="form-label">Câu hỏi:</label>--}}
{{--                <input type="text" id="question_${questionCount}" name="questions[${questionCount}][question]"--}}
{{--                    class="form-control" required>--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="answer_${questionCount}_0" class="form-label">Đáp án đúng:</label>--}}
{{--                <input type="text" id="answer_${questionCount}_0" name="questions[${questionCount}][answers][0][answer]"--}}
{{--                    class="form-control" required>--}}
{{--                <input type="hidden" name="questions[${questionCount}][answers][0][is_correct]" value="1">--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="answer_${questionCount}_1" class="form-label">Đáp án sai:</label>--}}
{{--                <input type="text" id="answer_${questionCount}_1" name="questions[${questionCount}][answers][1][answer]"--}}
{{--                    class="form-control" required>--}}
{{--                <input type="hidden" name="questions[${questionCount}][answers][1][is_correct]" value="0">--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="answer_${questionCount}_2" class="form-label">Đáp án sai:</label>--}}
{{--                <input type="text" id="answer_${questionCount}_2" name="questions[${questionCount}][answers][2][answer]"--}}
{{--                    class="form-control" required>--}}
{{--                <input type="hidden" name="questions[${questionCount}][answers][2][is_correct]" value="0">--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="answer_${questionCount}_3" class="form-label">Đáp án sai:</label>--}}
{{--                <input type="text" id="answer_${questionCount}_3" name="questions[${questionCount}][answers][3][answer]"--}}
{{--                    class="form-control" required>--}}
{{--                <input type="hidden" name="questions[${questionCount}][answers][3][is_correct]" value="0">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        `;--}}

{{--            questionsContainer.insertAdjacentHTML('beforeend', questionHtml);--}}
{{--        });--}}
{{--    </script>--}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.toggle-quiz-list').forEach(button => {
                button.addEventListener('click', function() {
                    const chapterId = this.getAttribute('data-chapter-id');
                    const quizList = document.querySelector(
                        `.quiz-list[data-chapter-id="${chapterId}"]`);

                    if (quizList) {
                        if (quizList.style.display === 'none') {
                            quizList.style.display = 'block';
                            this.textContent = 'Ẩn bài quiz'; // Cập nhật nút thành 'Ẩn bài quiz'
                        } else {
                            quizList.style.display = 'none';
                            this.textContent =
                            'Hiện bài quiz'; // Cập nhật nút thành 'Hiện bài quiz'
                        }
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-quiz-btn');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const quizId = this.getAttribute('data-quiz-id');

                    // Fetch quiz data using AJAX or fill the form directly if data is available in the view
                    fetch(`/quizzes/${quizId}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('quizName').value = data.name;
                            // Fill other fields as necessary

                            // Set form action
                            document.getElementById('editQuizForm').action =
                                `/quizzes/${quizId}`;

                            // Show the modal
                            const editQuizModal = new bootstrap.Modal(document.getElementById(
                                'editQuizModal'));
                            editQuizModal.show();
                        });
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-quiz-btn').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    if (!confirm('Bạn có chắc chắn muốn xóa không?')) return;

                    let form = this.closest('form');
                    let formData = new FormData(form);
                    let url = form.action;
                    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content');

                    fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(Object.fromEntries(formData))
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                form.closest('tr').remove(); // Xóa dòng khỏi bảng
                            } else {
                                alert('Có lỗi xảy ra.');
                            }
                        });
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addQuizFinalBtn = document.getElementById('addQuizFinal');
            const finalQuizForm = document.getElementById('finalQuizForm');
            const cancelAddQuizBtn = document.getElementById('cancelAddQuiz');

            // Khi nhấn nút "Thêm quiz final", hiển thị form
            addQuizFinalBtn.addEventListener('click', function() {
                finalQuizForm.style.display = 'block';
            });

            // Khi nhấn nút "Hủy", ẩn form
            cancelAddQuizBtn.addEventListener('click', function() {
                finalQuizForm.style.display = 'none';
            });
        });
    </script>
@endsection
