@extends('client.layout.master')
@section('content')
    <style>
        .quiz-sec {
            padding: 40px 0;
        }

        .page-content.quiz-sec .container {
            max-width: 1200px;
        }

        .quiz-container {
            display: flex;
            gap: 20px;
        }

        .quiz-content {
            flex: 3;
        }

        .quiz-sidebar {
            flex: 1;
            background: #f8f9fa;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .quiz-widget {
            padding: 20px;
            background: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .question-number {
            font-weight: bold;
            color: #007bff;
        }

        .question {
            margin-bottom: 30px;
        }

        .quiz-widget .question {
            display: none;
        }

        .quiz-widget .question:first-child {
            display: block;
        }

        .btn {
            border-radius: 5px;
            padding: 10px 20px;
        }

        .btn-start {
            background-color: #007bff;
            color: white;
        }

        .btn-end {
            background-color: #28a745;
            color: white;
        }

        .btn-prev {
            background-color: #6c757d;
            color: white;
        }

        .quiz-summary {
            margin-top: 40px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .quiz-sidebar ul {
            list-style: none;
            padding: 0;
        }

        .quiz-sidebar ul li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
        }

        .quiz-sidebar ul li.active {
            background: #007bff;
            color: white;
        }

        .question-controls {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .question-controls .btn {
            margin: 0 5px;
        }

        .question-controls .btn-next {
            margin-left: auto;
        }

        .question-controls .btn-prev {
            margin-right: auto;
        }

    </style>

    <div class="container quiz-sec">
        <div id="quizIntro" class="text-center">
            <p class="lead">Hãy nhấp vào nút bên dưới để bắt đầu làm bài quiz của bạn.</p>
            <button id="startQuizBtn" class="btn btn-primary btn-start">Bắt đầu làm bài</button>
        </div>

        <div id="quizSection" class="d-none quiz-container">
            <div class="quiz-content">
                <form id="quizForm" action="{{ route('client.quiz.submit-quiz-final', $quizFinal->id) }}" method="POST">
                    @csrf
                    <div class="quiz-widget">
                        @foreach($questions as $question)
                            <div class="question" data-question-index="{{ $loop->index }}">
                                <h4 class="question-number">Câu hỏi {{ $loop->index + 1 }}:</h4>
                                <p>{{ $question->questions }}</p>
                                <ul class="list-unstyled">
                                    @foreach($question->answers as $answer)
                                        <li class="mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                       name="question_{{ $question->id }}"
                                                       id="option_{{ $question->id }}_{{ $answer->id }}"
                                                       value="{{ $answer->id }}">
                                                <label class="form-check-label"
                                                       for="option_{{ $question->id }}_{{ $answer->id }}">
                                                    {{ $answer->answer_text }}
                                                </label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="question-controls">
                                    @if($loop->index > 0)
                                        <button type="button" class="btn btn-secondary btn-prev">Quay lại</button>
                                    @endif
                                    @if($loop->index < count($questions) - 1)
                                        <button type="button" class="btn btn-primary btn-next">Tiếp theo</button>
                                    @else
                                        <button type="submit" class="btn btn-success btn-end">Nộp bài</button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>

            <div class="quiz-sidebar">
                <h4 class="text-center">Danh sách câu hỏi</h4>
                <ul id="questionList">
                    @foreach($questions as $question)
                        <li data-question-index="{{ $loop->index }}">
                            Câu hỏi {{ $loop->index + 1 }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const startQuizBtn = document.getElementById('startQuizBtn');
            const quizIntro = document.getElementById('quizIntro');
            const quizSection = document.getElementById('quizSection');
            const questions = document.querySelectorAll('.question');
            const questionListItems = document.querySelectorAll('#questionList li');
            let currentQuestionIndex = 0;

            startQuizBtn.addEventListener('click', function () {
                quizIntro.classList.add('d-none');
                quizSection.classList.remove('d-none');
            });

            function showQuestion(index) {
                questions[currentQuestionIndex].style.display = 'none';
                questions[index].style.display = 'block';
                currentQuestionIndex = index;
                updateSidebar();
                updateButtons();
            }

            document.querySelectorAll('.btn-next').forEach(button => {
                button.addEventListener('click', function () {
                    if (currentQuestionIndex < questions.length - 1) {
                        showQuestion(currentQuestionIndex + 1);
                    }
                });
            });

            document.querySelectorAll('.btn-prev').forEach(button => {
                button.addEventListener('click', function () {
                    if (currentQuestionIndex > 0) {
                        showQuestion(currentQuestionIndex - 1);
                    }
                });
            });

            questionListItems.forEach(item => {
                item.addEventListener('click', function () {
                    const index = parseInt(item.getAttribute('data-question-index'));
                    showQuestion(index);
                });
            });

            function updateSidebar() {
                questionListItems.forEach((item, index) => {
                    item.classList.toggle('active', index === currentQuestionIndex);
                });
            }

            function updateButtons() {
                document.querySelectorAll('.btn-prev').forEach(button => {
                    button.style.display = currentQuestionIndex > 0 ? 'inline-block' : 'none';
                });

                document.querySelectorAll('.btn-next').forEach(button => {
                    button.style.display = currentQuestionIndex < questions.length - 1 ? 'inline-block' : 'none';
                });

                document.querySelectorAll('.btn-end').forEach(button => {
                    button.style.display = currentQuestionIndex === questions.length - 1 ? 'inline-block' : 'none';
                });
            }

            // document.getElementById('quizForm').addEventListener('submit', function () {
            //     alert('Quiz của bạn đã được nộp!');
            // });

            updateButtons(); // Initial button state
        });
    </script>
@endsection
