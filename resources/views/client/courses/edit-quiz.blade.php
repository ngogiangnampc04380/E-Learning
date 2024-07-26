@extends('client.layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12 py-5">
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
                                    <img
                                        src="{{ auth()->user()->thumbnail ? Storage::url('assets-client/img/user/' . auth()->user()->thumbnail) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU' }}"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <div class="profile-group">
                            <div class="profile-name text-center">
                                <h4><a href="">{{auth()->user()->name}}</a></h4>
                                @if(auth()->user()->role == 0)
                                    <p class="text-muted mb-0">Học viên</p>
                                @elseif(auth()->user()->role == 1)
                                    <p class="text-muted mb-0">ADMIN</p>
                                @elseif(auth()->user()->role == 2)
                                    <p class="text-muted mb-0">Mentor</p>
                                @endif
                            </div>
                            @if(auth()->user()->role == 2)
                                <div class="go-dashboard text-center mt-3">
                                    <a href="{{ route('client.create-course') }}" class="btn btn-primary">Tạo Khóa Học Mới</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="settings-menu mt-4">
                    <h3>Thông tin tài khoản</h3>
                    <ul class="nav flex-column">
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
                            <li class="nav-item {{ request()->is('instructor-student-grid.html') ? 'active' : '' }}">
                                <a href="instructor-student-grid.html" class="nav-link">
                                    <i class="feather-users"></i> Quản lí học viên
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('instructor-earnings.html') ? 'active' : '' }}">
                                <a href="instructor-earnings.html" class="nav-link">
                                    <i class="feather-pie-chart"></i> Doanh thu
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('instructor-orders.html') ? 'active' : '' }}">
                                <a href="instructor-orders.html" class="nav-link">
                                    <i class="feather-shopping-bag"></i> Đơn hàng
                                </a>
                            </li>
                        @endif
                        <div class="instructor-title mt-4">
                            <h3>CÀI ĐẶT TÀI KHOẢN</h3>
                        </div>
                        <li class="nav-item {{ request()->routeIs('client.user-profile') ? 'active' : '' }}">
                            <a href="{{ route('client.user-profile') }}" class="nav-link">
                                <i class="feather-settings"></i> Thông tin cá nhân
                            </a>
                        </li>
                        @if(auth()->user()->role == 1)
                            <div class="instructor-title mt-4">
                                <h3>ADMIN</h3>
                            </div>
                            <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                                <a href="/admin" class="nav-link">
                                    <i class="feather-cpu"></i> Quản trị website
                                </a>
                            </li>
                        @endif
                        <li class="nav-item mt-4">
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
            <div class="col-xl-9 col-lg-8 col-md-12 mx-auto mt-5">
                <h2 class="mb-4">Chỉnh sửa Quiz</h2>
                <form action="{{ route('client.courses.update-quiz', $quiz->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="form-label">Tiêu đề Quiz:</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $quiz->name }}" required>
                    </div>

                    <div id="questions-container">
                        @foreach ($quiz->questions as $index => $question)
                            <div class="question-block mb-4 p-3 border rounded" data-index="{{ $index }}">
                                <h5 class="mb-3">Câu hỏi {{ $index + 1 }}</h5>
                                <input type="hidden" name="questions[{{ $index }}][id]" value="{{ $question->id }}">

                                <div class="mb-3">
                                    <label for="question_{{ $index }}" class="form-label">Câu hỏi:</label>
                                    <input type="text" id="question_{{ $index }}"
                                           name="questions[{{ $index }}][question]"
                                           class="form-control" value="{{ $question->question }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="correct_answer_{{ $index }}" class="form-label">Đáp án đúng:</label>
                                    <input type="text" id="correct_answer_{{ $index }}"
                                           name="questions[{{ $index }}][correct_answer]" class="form-control"
                                           value="{{ $question->correctAnswer->answer }}" required>
                                </div>

                                @foreach ($question->wrongAnswers as $i => $wrongAnswer)
                                    <div class="mb-3">
                                        <label for="wrong_answer{{ $i + 1 }}_{{ $index }}" class="form-label">Đáp án
                                            sai {{ $i + 1 }}:</label>
                                        <input type="text" id="wrong_answer{{ $i + 1 }}_{{ $index }}"
                                               name="questions[{{ $index }}][wrong_answers][]" class="form-control"
                                               value="{{ $wrongAnswer->answer }}" required>
                                    </div>
                                @endforeach

                                <button type="button" class="btn btn-danger btn-sm remove-question">Xóa câu hỏi</button>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" class="btn btn-success btn-sm mb-3" id="add-question">Thêm câu hỏi</button>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <a href="{{ route('client.editCourse', $quiz->course_id) }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Quay lại danh sách quiz
                        </a>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <template id="question-template">
        <div class="question-block mb-4 p-3 border rounded">
            <h5 class="mb-3">Câu hỏi</h5>
            <input type="hidden" name="questions[INDEX][id]" value="">

            <div class="mb-3">
                <label for="question_INDEX" class="form-label">Câu hỏi:</label>
                <input type="text" id="question_INDEX" name="questions[INDEX][question]"
                       class="form-control" value="" required>
            </div>

            <div class="mb-3">
                <label for="correct_answer_INDEX" class="form-label">Đáp án đúng:</label>
                <input type="text" id="correct_answer_INDEX"
                       name="questions[INDEX][correct_answer]" class="form-control"
                       value="" required>
            </div>

            <div class="mb-3">
                <label for="wrong_answer1_INDEX" class="form-label">Đáp án sai 1:</label>
                <input type="text" id="wrong_answer1_INDEX"
                       name="questions[INDEX][wrong_answers][]" class="form-control"
                       value="" required>
            </div>
            <div class="mb-3">
                <label for="wrong_answer2_INDEX" class="form-label">Đáp án sai 2:</label>
                <input type="text" id="wrong_answer2_INDEX"
                       name="questions[INDEX][wrong_answers][]" class="form-control"
                       value="" required>
            </div>
            <div class="mb-3">
                <label for="wrong_answer3_INDEX" class="form-label">Đáp án sai 3:</label>
                <input type="text" id="wrong_answer3_INDEX"
                       name="questions[INDEX][wrong_answers][]" class="form-control"
                       value="" required>
            </div>

            <button type="button" class="btn btn-danger btn-sm remove-question">Xóa câu hỏi</button>
        </div>
    </template>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let questionIndex = {{ count($quiz->questions) }};

            document.getElementById('add-question').addEventListener('click', function () {
                const template = document.getElementById('question-template').content.cloneNode(true);
                template.querySelectorAll('input, label').forEach(el => {
                    if (el.htmlFor) {
                        el.htmlFor = el.htmlFor.replace(/INDEX/g, questionIndex);
                    }
                    if (el.id) {
                        el.id = el.id.replace(/INDEX/g, questionIndex);
                    }
                    if (el.name) {
                        el.name = el.name.replace(/INDEX/g, questionIndex);
                    }
                });
                template.querySelector('.question-block h5').textContent = `Câu hỏi ${questionIndex + 1}`;
                template.querySelector('.question-block').dataset.index = questionIndex;

                document.getElementById('questions-container').appendChild(template);
                questionIndex++;
            });

            document.getElementById('questions-container').addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-question')) {
                    e.target.closest('.question-block').remove();
                }
            });
        });
    </script>
@endsection
