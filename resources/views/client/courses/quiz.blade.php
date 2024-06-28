@extends('client.layout.master')

@section('content')
    <style>
        .quiz-sec {
            padding: 40px 0;
        }
        .quiz-widget {
            padding: 30px;
            font-size: 16px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .quiz-widget h2 {
            margin-bottom: 30px;
            font-size: 24px;
        }
        .question {
            margin-bottom: 40px;
        }
        .form-check-label {
            font-size: 16px;
        }
        .btn-start,
        .btn-end {
            padding: 12px 24px;
            font-size: 16px;
            margin-right: 10px;
            margin-left: 10px;
        }
        .btn-start {
            margin-right: 10px;
        }
        .btn-end {
            margin-left: 10px;
        }
    </style>

    <section class="page-content quiz-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4"> <!-- Cột trái -->
                    <div class="quiz-widget p-5 bg-white shadow-sm rounded">
                        <h2 class="mb-5">Tên bài quiz</h2>
                        <form id="quizForm">
                            <div id="question1" class="mb-5 question position-relative">
                                <h4 class="mb-4">Câu hỏi 1?</h4>
                                <ul class="list-unstyled">
                                    <li class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_1" id="option_1_1" value="option_1_1">
                                            <label class="form-check-label" for="option_1_1">
                                                Lựa chọn 1
                                            </label>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_1" id="option_1_2" value="option_1_2">
                                            <label class="form-check-label" for="option_1_2">
                                                Lựa chọn 2
                                            </label>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_1" id="option_1_3" value="option_1_3">
                                            <label class="form-check-label" for="option_1_3">
                                                Lựa chọn 3
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary btn-end next-btn">Tiếp theo</button>
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
                            <li class="mb-3"><a href="#" class="quiz-link" data-question="question1">Câu hỏi 1</a></li>
                            <li class="mb-3"><a href="#" class="quiz-link" data-question="question2">Câu hỏi 2</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const nextBtns = document.querySelectorAll('.next-btn');
            const prevBtns = document.querySelectorAll('.prev-btn');
            const questions = document.querySelectorAll('.question');

            let currentQuestion = 0;

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
            });
        });
    </script>
@endsection
