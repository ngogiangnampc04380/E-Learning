@extends('client.layout.master')

@section('content')
    <style>
        .circles-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
            /* Khoảng cách giữa các mô tả màu sắc */
            margin-bottom: 20px;
            /* Khoảng cách giữa mô tả màu sắc và phần chi tiết câu trả lời */
        }

        .circle-description {
            display: flex;
            align-items: center;
            /* Đặt nội dung cùng hàng */
            font-size: 16px;
            /* Kích thước chữ của mô tả */
            margin-bottom: 10px;
            color: #333;
            /* Màu chữ cho dễ đọc */
        }

        .color-text {
            font-weight: bold;
            /* Đậm hơn để dễ phân biệt */
            display: inline;
        }

        .blue-text {
            color: #007BFF;
            /* Màu xanh dương tươi sáng */
        }

        .red-text {
            color: #DC3545;
            /* Màu đỏ tươi sáng */
        }

        .green-text {
            color: #28A745;
            /* Màu xanh lá cây tươi sáng */
        }

        .answer {
            margin-bottom: 10px;
            font-size: 16px;
            /* Kích thước chữ của câu trả lời */
        }

        <<<<<<< HEAD

        /* Định dạng văn bản đáp án đúng */
        .correct-answer {
            font-weight: bold;
            color: #333;

            /* Màu chữ cho dễ đọc */
            =======.answer-correct {
                color: #28A745;
                /* Màu xanh lá cây cho đáp án đúng */
            }

            .answer-incorrect {
                color: #DC3545;
                /* Màu đỏ cho đáp án sai */
            }

            .answer-user-selected {
                font-weight: bold;
            }

            .no-answer {
                color: #DC3545;
                /* Màu đỏ cho thông báo chưa chọn đáp án */
                font-weight: bold;
                >>>>>>>e904dfb ([Client] Cập nhật quiz lần thứ N)
            }

            .btn-back {
                display: inline-block;
                margin-top: 20px;
                text-align: center;
                padding: 10px 20px;
                border-radius: 5px;
                background-color: #007BFF;
                color: #fff;
                text-decoration: none;
                font-weight: bold;
            }

            .btn-back:hover {
                background-color: #0056b3;
            }

            .green-text {
                color: green;
                font-weight: bold;
            }

            .red-text {
                color: red;
                font-weight: bold;
            }

            .blue-text {
                color: blue;
                font-weight: bold;
            }

            .no-answer {
                color: grey;
                font-weight: normal;
            }

            .correct-answer {
                color: orange;
                font-weight: bold;
            }
    </style>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="quiz-widget p-5 bg-white shadow-sm rounded">
                    <h2>{{ $quizFinal->title }}</h2>
                    <p><strong>Khóa học:</strong> {{ $quizFinal->course->name }}</p>
                    <p><strong>Điểm số của bạn:</strong> {{ $result['score'] }} / 100</p>

                    <div class="circles-container">
                        <div class="circle-description">
                            <span class="color-text blue-text">-> Đáp án đúng của câu hỏi</span>
                        </div>
                        <div class="circle-description">
                            <span class="color-text red-text">-> Đáp án bạn đã chọn</span>
                        </div>
                        <div class="circle-description">
                            <span class="color-text green-text">-> Đáp án bạn chọn là đáp án đúng</span>
                        </div>
                    </div>
                    <hr>
                    <h3>Chi tiết câu trả lời:</h3>
                    @foreach ($quizFinal->questions as $question)
                        <div class="mb-4">
                            <h5>Câu hỏi {{ $loop->iteration }}: {{ $question->questions }}</h5>
                            <ul class="list-unstyled">
                                @foreach ($question->answers as $answer)
                                    @php
                                        $userSelected =
                                            isset($userAnswers['question_' . $question->id]) &&
                                            $userAnswers['question_' . $question->id] == $answer->id;
                                        $isCorrect = $answer->is_correct;
                                    @endphp
                                    <li
                                        class="answer
                                    {{ $userSelected && $isCorrect
                                        ? 'green-text answer-user-selected'
                                        : ($userSelected
                                            ? 'red-text'
                                            : ($isCorrect
                                                ? 'blue-text'
                                                : '')) }}">
                                        {{ $answer->answer_text }}
                                    </li>
                                @endforeach

                                {{-- Hiển thị thông báo nếu người dùng chưa chọn đáp án --}}
                                @php
                                    $selectedAnswer = $question->answers
                                        ->where('id', $userAnswers['question_' . $question->id] ?? null)
                                        ->first();
                                    $correctAnswer = $question->answers->where('is_correct', 1)->first();
                                    $userNotSelected = !isset($userAnswers['question_' . $question->id]);
                                @endphp
                                @if ($userNotSelected || (!$selectedAnswer && $correctAnswer))
                                    <li class="answer {{ $userNotSelected ? 'no-answer' : '' }}">
                                        @if ($userNotSelected)
                                            <span class="color-text red-text">Bạn chưa chọn đáp án cho câu hỏi này.</span>
                                        @endif
                                        @if ($correctAnswer && !$userNotSelected)
                                            <span class="color-text blue-text">Đáp án đúng:
                                                {{ $correctAnswer->answer_text }}</span>
                                        @endif
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endforeach

                    <a href="#" class="btn btn-primary btn-back">
                        Quay lại danh sách quiz
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
