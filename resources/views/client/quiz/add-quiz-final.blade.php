@extends('client.layout.master')

@section('content')
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
                                    <p class="text-muted mb-0">Giảng viên</p>
                                @endif
                            </div>
                            @if (auth()->user()->role == 2)
                                <div class="go-dashboard text-center">
                                    <a href="{{ route('client.create-course') }}" class="btn btn-primary">THÊM KHÓA HỌC
                                        MỚI</a>
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
                                <a href="instructor-course.html" class="nav-link">
                                    <i class="feather-shopping-bag"></i> Khóa học của tôi
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->role == 2)
                            <li class="nav-item {{ request()->routeIs('client.instructor-course') ? 'active' : '' }}">
                                <a href="{{ route('client.instructor-course', auth()->user()->id) }}" class="nav-link">
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
            <div class="col-xl-9 col-lg-8 col-md-12 my-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center display-4 font-weight-bold">Quiz Final</h2>


                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('client.quiz-final.store', $course_id) }}" method="POST"
                            class="p-4 bg-light rounded shadow-sm">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course_id }}">

                            <!-- Viền bao quanh tiêu đề và thanh nhập liệu -->
                            <div class="border border-primary border-4 rounded p-3 mb-2 shadow-sm">
                                <div class="mb-4">
                                    <label for="title" class="form-label fw-bold">Tiêu đề Quiz:</label>
                                    <input type="text" id="title" name="title" class="form-control">
                                </div>
                            </div>

                            <div id="questions-container">
                                <div class="question-block mb-4 p-4 border border-primary rounded">
                                    <h5 class="mb-3 question-title">Câu hỏi 1</h5>
                                    <div class="mb-3">
                                        <label for="question_1" class="form-label">Câu hỏi:</label>
                                        <input type="text" id="question_1" name="questions[1][question]"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="answer_1_0" class="form-label">Đáp án đúng:</label>
                                        <input type="text" id="answer_1_0" name="questions[1][answers][0][answer]"
                                            class="form-control">
                                        <input type="hidden" name="questions[1][answers][0][is_correct]" value="1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="answer_1_1" class="form-label">Đáp án sai:</label>
                                        <input type="text" id="answer_1_1" name="questions[1][answers][1][answer]"
                                            class="form-control">
                                        <input type="hidden" name="questions[1][answers][1][is_correct]" value="0">
                                    </div>
                                    <div class="mb-3">
                                        <label for="answer_1_2" class="form-label">Đáp án sai:</label>
                                        <input type="text" id="answer_1_2" name="questions[1][answers][2][answer]"
                                            class="form-control">
                                        <input type="hidden" name="questions[1][answers][2][is_correct]" value="0">
                                    </div>
                                    <div class="mb-3">
                                        <label for="answer_1_3" class="form-label">Đáp án sai:</label>
                                        <input type="text" id="answer_1_3" name="questions[1][answers][3][answer]"
                                            class="form-control">
                                        <input type="hidden" name="questions[1][answers][3][is_correct]" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mb-4">
                                <button type="button" id="add-question" class="btn btn-outline-primary">Thêm câu
                                    hỏi</button>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <a href="{{ route('client.editCourse', $course_id) }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left"></i> Quay lại
                                </a>

                                <button type="submit" class="btn btn-success">Lưu</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let questionCount = 1;

        document.getElementById('add-question').addEventListener('click', function() {
            questionCount++;
            const questionsContainer = document.getElementById('questions-container');

            const questionHtml = `
        <div class="question-block mb-4 p-4 border border-primary rounded">
            <h5 class="mb-3 question-title">Câu hỏi ${questionCount}</h5>
            <div class="mb-3">
                <label for="question_${questionCount}" class="form-label">Câu hỏi:</label>
                <input type="text" id="question_${questionCount}" name="questions[${questionCount}][question]" class="form-control">
            </div>
            <div class="mb-3">
                <label for="answer_${questionCount}_0" class="form-label">Đáp án đúng:</label>
                <input type="text" id="answer_${questionCount}_0" name="questions[${questionCount}][answers][0][answer]" class="form-control">
                <input type="hidden" name="questions[${questionCount}][answers][0][is_correct]" value="1">
            </div>
            <div class="mb-3">
                <label for="answer_${questionCount}_1" class="form-label">Đáp án sai:</label>
                <input type="text" id="answer_${questionCount}_1" name="questions[${questionCount}][answers][1][answer]" class="form-control">
                <input type="hidden" name="questions[${questionCount}][answers][1][is_correct]" value="0">
            </div>
            <div class="mb-3">
                <label for="answer_${questionCount}_2" class="form-label">Đáp án sai:</label>
                <input type="text" id="answer_${questionCount}_2" name="questions[${questionCount}][answers][2][answer]" class="form-control">
                <input type="hidden" name="questions[${questionCount}][answers][2][is_correct]" value="0">
            </div>
            <div class="mb-3">
                <label for="answer_${questionCount}_3" class="form-label">Đáp án sai:</label>
                <input type="text" id="answer_${questionCount}_3" name="questions[${questionCount}][answers][3][answer]" class="form-control">
                <input type="hidden" name="questions[${questionCount}][answers][3][is_correct]" value="0">
            </div>
            <button type="button" class="btn btn-outline-danger btn-sm delete-question">Xóa câu hỏi</button>
        </div>
    `;

            questionsContainer.insertAdjacentHTML('beforeend', questionHtml);
        });

        document.addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('delete-question')) {
                const questionBlock = event.target.closest('.question-block');
                questionBlock.remove();
                updateQuestionNumbers();
            }
        });

        function updateQuestionNumbers() {
            const questionBlocks = document.querySelectorAll('.question-block');
            questionCount = questionBlocks.length;
            questionBlocks.forEach((block, index) => {
                const questionNumber = index + 1;
                block.querySelector('h5').textContent = `Câu hỏi ${questionNumber}`;
                block.querySelector('label[for^="question_"]').setAttribute('for', `question_${questionNumber}`);
                block.querySelector('input[name^="questions["]').setAttribute('name',
                    `questions[${questionNumber}][question]`);
                block.querySelector('input[id^="question_"]').setAttribute('id', `question_${questionNumber}`);

                const answers = block.querySelectorAll('div[class="mb-3"]');
                answers.forEach((answer, answerIndex) => {
                    const answerLabel = answer.querySelector('label');
                    const answerInput = answer.querySelector('input[type="text"]');
                    const answerHiddenInput = answer.querySelector('input[type="hidden"]');

                    answerLabel.setAttribute('for', `answer_${questionNumber}_${answerIndex}`);
                    answerInput.setAttribute('id', `answer_${questionNumber}_${answerIndex}`);
                    answerInput.setAttribute('name',
                        `questions[${questionNumber}][answers][${answerIndex}][answer]`);
                    answerHiddenInput.setAttribute('name',
                        `questions[${questionNumber}][answers][${answerIndex}][is_correct]`);
                });
            });
        }

        document.querySelector('form').addEventListener('submit', function(event) {
            let isValid = true;

            // Xóa tất cả thông báo lỗi cũ
            document.querySelectorAll('.text-danger').forEach(element => element.remove());

            // Kiểm tra tiêu đề quiz
            const titleField = document.getElementById('title');
            const title = titleField.value.trim();
            if (title === '') {
                isValid = false;
                showError(titleField, 'Tiêu đề không được để trống.');
            } else if (title.length > 200) {
                isValid = false;
                showError(titleField, 'Tiêu đề không được quá 200 ký tự.');
            }

            // Kiểm tra các câu hỏi và đáp án
            document.querySelectorAll('.question-block').forEach((block, index) => {
                const questionField = block.querySelector('input[name^="questions["][name$="[question]"]');
                const question = questionField.value.trim();
                if (question === '') {
                    isValid = false;
                    showError(questionField, 'Câu hỏi không được để trống.');
                } else if (question.length > 200) {
                    isValid = false;
                    showError(questionField, 'Câu hỏi không được quá 200 ký tự.');

                }

                const answers = [];
                block.querySelectorAll('input[name$="[answer]"]').forEach(answerField => {
                    const answer = answerField.value.trim();
                    if (answer === '') {
                        isValid = false;
                        showError(answerField, 'Đáp án không được để trống.');
                    } else if (answer.length > 200) {
                        isValid = false;
                        showError(answerField, 'Đáp án không được quá 200 ký tự.');
                    } else {
                        answers.push(answer);
                    }
                });

                // Kiểm tra đáp án trùng lặp
                if (!checkDuplicateAnswers(answers)) {
                    isValid = false;
                    showError(questionField, 'Đáp án không được trùng lặp.');
                }
            });

            if (!isValid) {
                event.preventDefault();
            }
        });

        function checkDuplicateAnswers(answers) {
            return new Set(answers).size === answers.length;
        }

        function showError(field, message) {
            const error = document.createElement('div');
            error.className = 'text-danger mt-2';
            error.textContent = message;
            field.classList.add('is-invalid');

            // Thêm thông báo lỗi ngay dưới trường nhập liệu
            if (!field.nextElementSibling || !field.nextElementSibling.classList.contains('text-danger')) {
                field.parentNode.insertBefore(error, field.nextSibling);
            }
        }

        // Đảm bảo xóa class lỗi khi người dùng nhập lại
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('is-invalid');
                if (this.nextElementSibling && this.nextElementSibling.classList.contains('text-danger')) {
                    this.nextElementSibling.remove();
                }
            });
        });
    </script>
@endsection
