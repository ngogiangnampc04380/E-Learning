@extends('client.layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                <div class="settings-widget dash-profile">
                    <div class="settings-menu p-0">
                        <div class="profile-bg">
                            @if(auth()->user()->role == 0)
                                <h5 class="text-muted mb-0">Học viên</h5>
                            @elseif(auth()->user()->role == 1)
                                <h5 class="text-muted mb-0">Quản trị viên</h5>
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
                                    <p class="text-muted mb-0">Giảng viên</p>
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
                        <h2 class="text-center display-4 font-weight-bold">Chỉnh sửa Quiz Final</h2>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('client.quiz.update-quiz-final', ['quiz_id' => $quizFinal->id]) }}" method="POST" class="p-4 bg-light rounded shadow-sm">
                            @csrf
                            @method('PUT')
                            <div class="border border-primary border-4 mb-2 rounded p-3 shadow-sm">
                                <div class="mb-4">
                                    <label for="title" class="form-label fw-bold ">Tiêu đề Quiz:</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $quizFinal->title) }}" >
                                </div>
                            </div>


                            <div id="questions-container">
                                @foreach($quizFinal->questions as $index => $question)
                                    <div class="question-block mb-4 p-4 border border-primary rounded">
                                        <h5 class="mb-3 question-title">Câu hỏi {{ $index + 1 }}</h5>
                                        <div class="mb-3">
                                            <label for="question_{{ $index + 1 }}" class="form-label">Câu hỏi:</label>
                                            <input type="text" id="question_{{ $index + 1 }}" name="questions[{{ $index + 1 }}][question]" class="form-control" value="{{ old('questions.' . ($index + 1) . '.question', $question->questions) }}" >
                                        </div>
                                        @foreach($question->answers as $answerIndex => $answer)
                                            <div class="mb-3">
                                                <label for="answer_{{ $index + 1 }}_{{ $answerIndex }}" class="form-label">Đáp án {{ $answerIndex + 1 }}:</label>
                                                <input type="text" id="answer_{{ $index + 1 }}_{{ $answerIndex }}" name="questions[{{ $index + 1 }}][answers][{{ $answerIndex }}][answer]" class="form-control" value="{{ old('questions.' . ($index + 1) . '.answers.' . $answerIndex . '.answer', $answer->answer_text) }}" >
                                                <input type="hidden" name="questions[{{ $index + 1 }}][answers][{{ $answerIndex }}][is_correct]" value="{{ $answer->is_correct }}">
                                            </div>
                                        @endforeach
                                        <button type="button" class="btn btn-outline-danger btn-sm delete-question">Xóa câu hỏi</button>
                                    </div>
                                @endforeach
                            </div>

                            <div class="d-flex justify-content-between mb-4">
                                <button type="button" id="add-question" class="btn btn-outline-primary">Thêm câu hỏi</button>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <a href="{{ route('client.editCourse', $quizFinal->course_id) }}" class="btn btn-outline-secondary">
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
        document.addEventListener('DOMContentLoaded', function() {
            let questionCount = {{ $quizFinal->questions->count() }};
    
            function updateQuestionNumbers() {
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
                questionCount = document.querySelectorAll('.question-block').length;
            }
    
            document.getElementById('add-question').addEventListener('click', function() {
                const template = `
                <div class="question-block mb-4 p-4 border border-primary rounded" data-index="${questionCount}">
                    <h5 class="mb-3 question-title">Câu hỏi ${questionCount + 1}</h5>
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
    
                const questionsContainer = document.getElementById('questions-container');
                questionsContainer.insertAdjacentHTML('beforeend', template);
    
                // Scroll to the new question block
                const newQuestionBlock = questionsContainer.lastElementChild;
                newQuestionBlock.scrollIntoView({ behavior: 'smooth', block: 'center' });
    
                questionCount++;
            });
    
            document.getElementById('questions-container').addEventListener('click', function(event) {
                if (event.target.classList.contains('delete-question')) {
                    event.target.closest('.question-block').remove();
                    updateQuestionNumbers();
                }
            });
    
            document.querySelector('form').addEventListener('submit', function(event) {
                let isValid = true;
                let firstErrorField = null;
                clearErrors();
    
                const titleField = document.getElementById('title');
                const title = titleField.value.trim();
                if (title === '') {
                    isValid = false;
                    showError(titleField, 'Tiêu đề không được để trống.');
                    if (!firstErrorField) firstErrorField = titleField;
                } else if (title.length > 250) {
                    isValid = false;
                    showError(titleField, 'Tiêu đề không được quá 250 ký tự.');
                    if (!firstErrorField) firstErrorField = titleField;
                }
    
                const questionBlocks = document.querySelectorAll('.question-block');
                questionBlocks.forEach((block, index) => {
                    const questionField = block.querySelector(`input[name="questions[${index}][question]"]`);
                    const questionText = questionField.value.trim();
    
                    if (questionText === '') {
                        isValid = false;
                        showError(questionField, `Câu hỏi ${index + 1} không được để trống.`);
                        if (!firstErrorField) firstErrorField = questionField;
                    } else if (questionText.length > 250) {
                        isValid = false;
                        showError(questionField, `Câu hỏi ${index + 1} không được quá 250 ký tự.`);
                        if (!firstErrorField) firstErrorField = questionField;
                    }
    
                    const answerFields = block.querySelectorAll('input[name^="questions["][name$="][answer]"]');
                    const answers = [];
                    answerFields.forEach((answerField, answerIndex) => {
    const answerText = answerField.value.trim();
                        if (answerText === '') {
                            isValid = false;
                            showError(answerField, `Đáp án ${answerIndex + 1} của câu hỏi ${index + 1} không được để trống.`);
                            if (!firstErrorField) firstErrorField = answerField;
                        } else if (answerText.length > 250) {
                            isValid = false;
                            showError(answerField, `Đáp án ${answerIndex + 1} của câu hỏi ${index + 1} không được quá 250 ký tự.`);
                            if (!firstErrorField) firstErrorField = answerField;
                        } else {
                            answers.push(answerText);
                        }
                    });
    
                    const uniqueAnswers = new Set(answers);
                    if (uniqueAnswers.size !== answers.length) {
                        isValid = false;
                        answers.forEach((answer, answerIndex) => {
                            showError(answerFields[answerIndex], `Đáp án ${answerIndex + 1} của câu hỏi ${index + 1} không được trùng lặp.`);
                            if (!firstErrorField) firstErrorField = answerFields[answerIndex];
                        });
                    }
                });
    
                if (!isValid) {
                    event.preventDefault();
                    if (firstErrorField) {
                        firstErrorField.scrollIntoView({ behavior: 'smooth', block: 'center' });
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
    
                if (!field.nextElementSibling || !field.nextElementSibling.classList.contains('text-danger')) {
                    field.parentNode.insertBefore(error, field.nextSibling);
                }
            }
        });
    </script>
@endsection
