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
                                        <img
                                            src="{{ auth()->user()->thumbnail ? Storage::url('assets-client/img/user/' . auth()->user()->thumbnail) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU' }}"
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
                                @if (auth()->user()->role == 2)
                                    <div class="go-dashboard text-center">
                                        <a href="{{ route('client.create-course') }}" class="btn btn-primary">Create
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
                                    <i class="feather-home"></i> My Dashboard
                                </a>
                            </li>
                            @if (in_array(auth()->user()->role, [0, 2]))
                                <li class="nav-item {{ request()->is('instructor-course') ? 'active' : '' }}">
                                    <a href="instructor-course.html" class="nav-link">
                                        <i class="feather-shopping-bag"></i> Khóa học của tôi
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->role == 2)
                                <li class="nav-item {{ request()->routeIs('client.instructor-course') ? 'active' : '' }}">
                                    <a href="{{ route('client.instructor-course',auth()->user()->id) }}"
                                       class="nav-link">
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
                            @if (auth()->user()->role == 1)
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

                <div class="col-xl-9 col-lg-8 col-md-12 mt-3">
                    <h1 class="mb-4 text-center bg-primary text-white py-3">Thêm Quiz Mới</h1>


{{--                @if (session('success'))--}}
{{--                        <div class="alert alert-success">{{ session('success') }}</div>--}}
{{--                    @endif--}}
                    <button id="show-quiz-form" class="btn btn-success mb-4">Thêm bài quiz</button>

                    <div id="quiz-form" style="display: none;">
                        <form action="{{ route('client.courses.storequiz') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Tiêu đề Quiz:</label>
                                <input type="text" id="title" name="title" class="form-control" required>
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="course_id" class="form-label">Khóa học:</label>
                                <select id="course_id" name="course_id" class="form-control" required>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="chapter_id" class="form-label">Chương:</label>
                                <select id="chapter_id" name="chapter_id" class="form-control" required>
                                    <!-- Chapters will be loaded dynamically here -->
                                </select>
                                @error('chapter_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="questions-container"></div>
                            <div class="d-flex justify-content-between mb-4">
                                <button type="button" id="add-question" class="btn btn-primary">Thêm câu hỏi</button>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('show-quiz-form').addEventListener('click', function () {
            document.getElementById('quiz-form').style.display = 'block';
            this.style.display = 'none';
        });

        // Function to populate chapters based on selected course
        document.getElementById('course_id').addEventListener('change', function () {
            var courseId = this.value;
            var chapterSelect = document.getElementById('chapter_id');

            // Clear existing options
            chapterSelect.innerHTML = '';

            // Fetch chapters based on selected course
            @foreach ($courses as $course)
            if (courseId == {{ $course->id }}) {
                @foreach ($chapters as $chapter)
                if ({{ $chapter->course_id }} == courseId) {
                    var option = document.createElement('option');
                    option.value = '{{ $chapter->id }}';
                    option.textContent = '{{ $chapter->name }}';
                    chapterSelect.appendChild(option);
                }
                @endforeach
            }
            @endforeach
        });

        // Function to add new question fields
        document.getElementById('add-question').addEventListener('click', function () {
            const questionsContainer = document.getElementById('questions-container');
            const questionCount = questionsContainer.children.length + 1;

            const questionHtml = `
                <div class="question-block mb-3">
                    <h5>Câu hỏi ${questionCount}</h5>
                    <div class="mb-3">
                        <label for="question_${questionCount}" class="form-label">Câu hỏi:</label>
                        <input type="text" id="question_${questionCount}" name="questions[${questionCount}][question]" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="correct_answer_${questionCount}" class="form-label">Đáp án đúng:</label>
                        <input type="text" id="correct_answer_${questionCount}" name="questions[${questionCount}][correct_answer]" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="wrong_answer1_${questionCount}" class="form-label">Đáp án sai:</label>
                        <input type="text" id="wrong_answer1_${questionCount}" name="questions[${questionCount}][wrong_answer1]" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="wrong_answer2_${questionCount}" class="form-label">Đáp án sai:</label>
                        <input type="text" id="wrong_answer2_${questionCount}" name="questions[${questionCount}][wrong_answer2]" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="wrong_answer3_${questionCount}" class="form-label">Đáp án sai:</label>
                        <input type="text" id="wrong_answer3_${questionCount}" name="questions[${questionCount}][wrong_answer3]" class="form-control" required>
                    </div>
                </div>
            `;

            questionsContainer.insertAdjacentHTML('beforeend', questionHtml);
        });
    </script>
@endsection
