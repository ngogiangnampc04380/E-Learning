@extends('client.layout.master')

@section('content')
    <style>
        .quiz-sec {
            padding: 40px 0;
        }

        .page-content.quiz-sec .container {
            width: 100%;
            max-width: 1200px;
        }

        .page-content.quiz-sec .row {
            display: flex;
            flex-wrap: wrap;
        }

        .page-content.quiz-sec .col-lg-8,
        .page-content.quiz-sec .col-lg-4 {
            display: flex;
            flex-direction: column;
        }

        .page-content.quiz-sec .quiz-widget {
            width: 100%;
            height: 100%;
        }

        @media (max-width: 992px) {
            .page-content.quiz-sec .col-lg-4 {
                order: -1;
            }
        }
    </style>

    <section class="page-content quiz-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div id="quizContent" class="quiz-widget p-5 bg-white shadow-sm rounded">
                        <h2 id="quizName" class="mb-5">{{ $quiz->name }}</h2>
                        <form id="quizForm" action="{{ route('client.courses.submit', $quiz->id) }}" method="POST">
                            @csrf
                            @foreach($questions as $index => $question)
                                <div id="question{{ $index + 1 }}" class="mb-5 question position-relative"
                                     style="display: none;">
                                    <h4 class="mb-4">{{ $question->question }}</h4>
                                    <ul class="list-unstyled">
                                        @foreach($question->answers as $answer)
                                            <li class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                           name="question_{{ $question->id }}"
                                                           id="option_{{ $question->id }}_{{ $answer->id }}"
                                                           value="{{ $answer->id }}">
                                                    <label class="form-check-label"
                                                           for="option_{{ $question->id }}_{{ $answer->id }}">
                                                        {{ $answer->answer }}
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="d-flex justify-content-end">
                                        @if($index > 0)
                                            <button type="button" class="btn btn-primary btn-start prev-btn me-5">Quay
                                                lại
                                            </button>
                                        @endif
                                        @if($index < count($questions) - 1)
                                            <button type="button" class="btn btn-primary btn-end next-btn ml-auto">Tiếp
                                                theo
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-success">Nộp bài</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Các câu hỏi khác -->
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 mb-4"> <!-- Cột phải -->
                    <div class="quiz-widget p-5 bg-white shadow-sm rounded">
                        <h2 class="mb-5">Danh sách câu hỏi</h2>
                        <ul class="list-unstyled">
                            @foreach($questions as $index => $question)
                                <li class="mb-3"><a href="#" class="quiz-link" data-question="question{{ $index + 1 }}">Câu
                                        hỏi {{ $index + 1 }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-3" id="startQuizContainer">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="quiz-widget p-5 bg-white shadow-sm rounded text-center">
                    <button id="startQuizBtn" class="btn btn-primary">Bắt đầu làm bài</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const nextBtns = document.querySelectorAll('.next-btn');
            const prevBtns = document.querySelectorAll('.prev-btn');
            const questions = document.querySelectorAll('.question');

            let currentQuestion = 0;
            let fullscreenEnabled = false;

            function enableFullScreen() {
                if (!fullscreenEnabled) {
                    if (document.documentElement.requestFullscreen) {
                        document.documentElement.requestFullscreen();
                    } else if (document.documentElement.mozRequestFullScreen) {
                        document.documentElement.mozRequestFullScreen();
                    } else if (document.documentElement.webkitRequestFullscreen) {
                        document.documentElement.webkitRequestFullscreen();
                    } else if (document.documentElement.msRequestFullscreen) {
                        document.documentElement.msRequestFullscreen();
                    }
                    fullscreenEnabled = true;
                }
            }

            function disableFullScreen() {
                if (fullscreenEnabled) {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitExitFullscreen) {
                        document.webkitExitFullscreen();
                    } else if (document.msExitFullscreen) {
                        document.msExitFullscreen();
                    }
                    fullscreenEnabled = false;
                }
            }

            function hideOtherElements() {
                document.querySelectorAll('body > *').forEach(element => {
                    if (element !== quizSection) {
                        element.style.display = 'none';
                    }
                });
            }

            function showOtherElements() {
                document.querySelectorAll('body > *').forEach(element => {
                    if (element !== quizSection) {
                        element.style.display = '';
                    }
                });
            }

            startQuizBtn.addEventListener('click', function () {
                startQuizContainer.style.display = 'none';
                quizSection.style.display = 'block';
                quizSections[0].style.display = 'block';
                quizName.textContent = '{{ $quiz->name }}';
                enableFullScreen();
                hideOtherElements();
            });

            document.getElementById('quizForm').addEventListener('submit', function () {
                showOtherElements();
                disableFullScreen();
            });

            nextBtns.forEach((btn, index) => {
                btn.addEventListener('click', function () {
                    questions[currentQuestion].style.display = 'none';
                    currentQuestion++;
                    if (currentQuestion < questions.length) {
                        questions[currentQuestion].style.display = 'block';
                    }
                    if (currentQuestion === questions.length - 1) {
                        document.querySelector('.next-btn').style.display = 'none';
                        document.querySelector('.prev-btn').style.display = 'none';
                    } else {
                        document.querySelector('.prev-btn').style.display = 'block';
                        document.querySelector('.next-btn').style.display = 'block';
                    }
                });
            });

            prevBtns.forEach((btn, index) => {
                btn.addEventListener('click', function () {
                    questions[currentQuestion].style.display = 'none';
                    currentQuestion--;
                    if (currentQuestion >= 0) {
                        questions[currentQuestion].style.display = 'block';
                    }
                    if (currentQuestion === 0) {
                        document.querySelector('.prev-btn').style.display = 'none';
                    } else {
                        document.querySelector('.next-btn').style.display = 'block';
                        document.querySelector('.prev-btn').style.display = 'block';
                    }
                });
            }

            document.querySelectorAll('.quiz-link').forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const questionId = this.dataset.question;
                    quizSections.forEach(section => section.style.display = 'none');
                    document.getElementById(questionId).style.display = 'block';
                    currentQuestion = parseInt(questionId.replace('question', '')) - 1;
                    togglePrevButtonVisibility();
                });
            });

            document.addEventListener('keydown', function (e) {
                if (fullscreenEnabled && e.key === 'Escape') {
                    e.preventDefault();
                    enableFullScreen();
                }
            });
        });
    </script>
@endsection
