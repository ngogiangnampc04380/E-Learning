@extends('client.layout.master')

@section('content')
    <div class="container">
        <div class="row">
            @include('components.settingprofile')
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
                <input type="text" id="correct_answer_INDEX" name="questions[INDEX][correct_answer]" class="form-control"
                    value="">
            </div>

            <div class="mb-3">
                <label for="wrong_answer1_INDEX" class="form-label">Đáp án sai 1:</label>
                <input type="text" id="wrong_answer1_INDEX" name="questions[INDEX][wrong_answers][]" class="form-control"
                    value="">
            </div>
            <div class="mb-3">
                <label for="wrong_answer2_INDEX" class="form-label">Đáp án sai 2:</label>
                <input type="text" id="wrong_answer2_INDEX" name="questions[INDEX][wrong_answers][]" class="form-control"
                    value="">
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
