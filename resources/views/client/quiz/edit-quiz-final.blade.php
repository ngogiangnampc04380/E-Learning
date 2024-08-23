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
                        @if (in_array(auth()->user()->role, [0, 2, 3]))
                            <li class="nav-item {{ request()->is('instructor-course') ? 'active' : '' }}">
                                <a href="{{ route('client.my-course', auth()->user()->id) }}" class="nav-link">
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
                                <a href="{{ route('client.my-student') }}" class="nav-link">
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
                        <h2 class="text-center display-4 font-weight-bold">Chỉnh sửa Quiz:</h2>
                        <form action="{{ route('client.courses.update-quiz', $quiz->id) }}" method="POST"
                            class="p-4 bg-light rounded shadow-sm">
                            @csrf

                            <div class="border border-primary border-4 rounded p-3 mb-2 shadow-sm">
                                <div class="mb-4">
                                    <label for="title" class="form-label fw-bold">Tiêu đề Quiz:</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ $quiz->name }}">
                                </div>
                            </div>


                            <div id="questions-container">
                                @foreach ($quiz->questions as $index => $question)
                                    <div class="question-block mb-4 p-4 border border-primary rounded"
                                        data-index="{{ $index }}">
                                        <h5 class="mb-3 question-title">Câu hỏi {{ $index + 1 }}</h5>
                                        <input type="hidden" name="questions[{{ $index }}][id]"
                                            value="{{ $question->id }}">

                                        <div class="mb-3">
                                            <label for="question_{{ $index }}" class="form-label">Câu hỏi:</label>
                                            <input type="text" id="question_{{ $index }}"
                                                name="questions[{{ $index }}][question]" class="form-control"
                                                value="{{ $question->question }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="correct_answer_{{ $index }}" class="form-label">Đáp án
                                                đúng:</label>
                                            <input type="text" id="correct_answer_{{ $index }}"
                                                name="questions[{{ $index }}][correct_answer]" class="form-control"
                                                value="{{ $question->correctAnswer->answer }}">
                                        </div>

                                        @foreach ($question->wrongAnswers as $i => $wrongAnswer)
                                            <div class="mb-3">
                                                <label for="wrong_answer{{ $i + 1 }}_{{ $index }}"
                                                    class="form-label">Đáp án sai {{ $i + 1 }}:</label>
                                                <input type="text"
                                                    id="wrong_answer{{ $i + 1 }}_{{ $index }}"
                                                    name="questions[{{ $index }}][wrong_answers][]"
                                                    class="form-control" value="{{ $wrongAnswer->answer }}">
                                            </div>
                                        @endforeach
                                        <button type="button"
                                            class="btn btn-outline-danger btn-sm remove-question mt-2">Xóa câu hỏi</button>
                                    </div>
                                @endforeach
                            </div>

                            <button type="button" class="btn btn-outline-success mb-3" id="add-question">Thêm câu
                                hỏi</button>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <a href="{{ route('client.editCourse', $quiz->course_id) }}" class="btn btn-secondary">
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

    <template id="question-template">
        <div class="question-block mb-4 p-3 rounded">
            <h5 class="mb-3">Câu hỏi</h5>
            <input type="hidden" name="questions[INDEX][id]" value="">

            <div class="mb-3">
                <label for="question_INDEX" class="form-label">Câu hỏi:</label>
                <input type="text" id="question_INDEX" name="questions[INDEX][question]" class="form-control"
                    value="">
            </div>

            <div class="mb-3">
                <label for="correct_answer_INDEX" class="form-label">Đáp án đúng:</label>
                <input type="text" id="correct_answer_INDEX" name="questions[INDEX][correct_answer]"
                    class="form-control" value="">
            </div>

            <div class="mb-3">
                <label for="wrong_answer1_INDEX" class="form-label">Đáp án sai 1:</label>
                <input type="text" id="wrong_answer1_INDEX" name="questions[INDEX][wrong_answers][]"
                    class="form-control" value="">
            </div>
            <div class="mb-3">
                <label for="wrong_answer2_INDEX" class="form-label">Đáp án sai 2:</label>
                <input type="text" id="wrong_answer2_INDEX" name="questions[INDEX][wrong_answers][]"
                    class="form-control" value="">
            </div>
            <div class="mb-3">
                <label for="wrong_answer3_INDEX" class="form-label">Đáp án sai 3:</label>
                <input type="text" id="wrong_answer3_INDEX" name="questions[INDEX][wrong_answers][]"
                    class="form-control" value="">
            </div>

            <button type="button" class="btn btn-outline-danger btn-sm remove-question">Xóa câu hỏi</button>
        </div>
    </template>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let questionIndex = {{ count($quiz->questions) }};

            function updateQuestionIndices() {
                document.querySelectorAll('.question-block').forEach((block, index) => {
                    block.querySelector('h5').textContent = `Câu hỏi ${index + 1}`;
                    block.dataset.index = index;
                    block.querySelectorAll('input, label').forEach(el => {
                        if (el.htmlFor) {
                            el.htmlFor = el.htmlFor.replace(/\d+/, index);
                        }
                        if (el.id) {
                            el.id = el.id.replace(/\d+/, index);
                        }
                        if (el.name) {
                            el.name = el.name.replace(/\d+/, index);
                        }
                    });
                });
                questionIndex = document.querySelectorAll('.question-block').length;
            }

            document.getElementById('add-question').addEventListener('click', function() {
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
                updateQuestionIndices();
            });

            document.getElementById('questions-container').addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-question')) {
                    e.target.closest('.question-block').remove();
                    updateQuestionIndices();
                }
            });

            document.querySelector('form').addEventListener('submit', function(event) {
                let isValid = true;
                let firstErrorField = null;
                clearErrors();

                // Kiểm tra tiêu đề Quiz
                const titleField = document.getElementById('name');
                const title = titleField.value.trim();
                if (title === '') {
                    isValid = false;
                    showError(titleField, 'Tiêu đề không được để trống.');
                    if (!firstErrorField) firstErrorField = titleField;
                } else if (title.length > 200) {
                    isValid = false;
                    showError(titleField, 'Tiêu đề không được quá 200 ký tự.');
                    if (!firstErrorField) firstErrorField = titleField;
                }

                // Kiểm tra từng câu hỏi
                const questionBlocks = document.querySelectorAll('.question-block');
                questionBlocks.forEach((block, index) => {
                    const questionField = block.querySelector(
                        `input[name="questions[${index}][question]"]`);
                    const questionText = questionField.value.trim();

                    if (questionText === '') {
                        isValid = false;
                        showError(questionField, `Câu hỏi ${index + 1} không được để trống.`);
                        if (!firstErrorField) firstErrorField = questionField;
                    } else if (questionText.length > 200) {
                        isValid = false;
                        showError(questionField, `Câu hỏi ${index + 1} không được quá 200 ký tự.`);
                        if (!firstErrorField) firstErrorField = questionField;
                    }

                    // Kiểm tra đáp án
                    const answerFields = block.querySelectorAll('input[name^="questions[' + index +
                        '][wrong_answers]"], input[name^="questions[' + index +
                        '][correct_answer]"]');
                    const answers = [];
                    answerFields.forEach((answerField, answerIndex) => {
                        const answerText = answerField.value.trim();
                        if (answerText === '') {
                            isValid = false;
                            showError(answerField,
                                `Đáp án ${answerIndex + 1} của câu hỏi ${index + 1} không được để trống.`
                            );
                            if (!firstErrorField) firstErrorField = answerField;
                        } else if (answerText.length > 200) {
                            isValid = false;
                            showError(answerField,
                                `Đáp án ${answerIndex + 1} của câu hỏi ${index + 1} không được quá 200 ký tự.`
                            );
                            if (!firstErrorField) firstErrorField = answerField;
                        } else {
                            answers.push(answerText);
                        }
                    });

                    // Kiểm tra đáp án trùng lặp
                    const uniqueAnswers = new Set(answers);
                    if (uniqueAnswers.size !== answers.length) {
                        isValid = false;
                        answers.forEach((answer, answerIndex) => {
                            showError(answerFields[answerIndex],
                                `Đáp án ${answerIndex + 1} của câu hỏi ${index + 1} không được trùng lặp.`
                            );
                            if (!firstErrorField) firstErrorField = answerFields[
                                answerIndex];
                        });
                    }
                });

                if (!isValid) {
                    event.preventDefault();
                    if (firstErrorField) {
                        firstErrorField.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        firstErrorField.focus();
                    }
                }
            });

            function clearErrors() {
                document.querySelectorAll('.text-danger').forEach(element => element.remove());
                document.querySelectorAll('.is-invalid').forEach(element => element.classList.remove('is-invalid'));
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
        });
    </script>
@endsection
