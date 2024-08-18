@extends('client.layout.master')

@section('content')
    <div class="container">
        <div class="row">
            @include('components.settingprofile')
            <div class="col-xl-9 col-lg-8 col-md-12 my-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center display-4 font-weight-bold">Chỉnh sửa Quiz:</h2>
                        <form action="{{ route('client.courses.update-quiz', $quiz->id) }}" method="POST" class="p-4 bg-light rounded shadow-sm">
                            @csrf
                            @method('PUT')
                            <div class="border border-primary border-4 rounded p-3 mb-2 shadow-sm">
                                <div class="mb-4">
                                    <label for="title" class="form-label fw-bold">Tiêu đề Quiz:</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $quiz->name }}" required>
                                </div>
                            </div>

                        
                            <div id="questions-container">
                                @foreach ($quiz->questions as $index => $question)
                                    <div class="question-block mb-4 p-4 border border-primary rounded" data-index="{{ $index }}">
                                        <h5 class="mb-3 question-title">Câu hỏi {{ $index + 1 }}</h5>
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
                                                <label for="wrong_answer{{ $i + 1 }}_{{ $index }}" class="form-label">Đáp án sai {{ $i + 1 }}:</label>
                                                <input type="text" id="wrong_answer{{ $i + 1 }}_{{ $index }}"
                                                       name="questions[{{ $index }}][wrong_answers][]" class="form-control"
                                                       value="{{ $wrongAnswer->answer }}" required>
                                            </div>
                                        @endforeach
                                        <button type="button" class="btn btn-outline-danger btn-sm remove-question mt-2">Xóa câu hỏi</button>
                                    </div>
                                @endforeach
                            </div>
                        
                            <button type="button" class="btn btn-outline-success mb-3" id="add-question">Thêm câu hỏi</button>
                        
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

            <button type="button" class="btn btn-outline-danger btn-sm remove-question">Xóa câu hỏi</button>
        </div>
    </template>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
                updateQuestionIndices();
            });

            document.getElementById('questions-container').addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-question')) {
                    e.target.closest('.question-block').remove();
                    updateQuestionIndices();
                }
            });
        });
    </script>
@endsection
