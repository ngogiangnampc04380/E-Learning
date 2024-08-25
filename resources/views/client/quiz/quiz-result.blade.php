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
            font-weight: bold;
            /* Màu xanh dương tươi sáng */
        }

        .red-text {
            color: #DC3545;
            font-weight: bold;
            /* Màu đỏ tươi sáng */
        }

        .green-text {
            color: #04f614;
            
            font-weight: bold;
        }

        .answer {
            margin-bottom: 10px;
            font-size: 16px;
            /* Kích thước chữ của câu trả lời */
        }


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
    <div class="breadcrumb-bar">
        <div class="container">
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <h2 style="font-size: 36px; font-weight: bold; color: #34495e; text-align: center; margin-bottom: 20px;">Kết quả làm bài</h2>

                        <div class="col-lg-8">
                            <div class="quiz-widget p-5 bg-white shadow-sm rounded">
                                <a href="{{ route('client.lesson', ['id' => $course->id]) }}" class="btn btn-primary mb-4">Quay lại</a>
                                
                                <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #ddd; padding-bottom: 10px; margin-bottom: 20px;">
                                    <div>
                                        <h2 style="font-size: 24px; font-weight: bold; color: #2c3e50; margin: 0;">Quizfinal: {{ $quizFinal->title }}</h2>
                                        <p style="font-size: 18px; margin: 5px 0;"><strong>Khóa học:</strong> {{ $quizFinal->course->name }}</p>
                                    </div>
                                    <div style="font-size: 32px; font-weight: bold; color: #e74c3c;">
                                        {{ $result['score'] }} / 100
                                    </div>
                                </div>
                                
            <hr>
                                <div class="circles-container">
                                    <div class="circle-description">
                                        <b style="
                display: inline-block;
                width: 15px;
                height: 15px;
                
                background-color: blue;
                text-align: center;
                line-height: 100px;
                font-weight: bold;
                margin-right: 3px;
            ">
               
            </b><span class="color-text blue-text">-> Đáp án đúng của câu hỏi</span>
                                    </div>
                                    <div class="circle-description">
                                        <b style="
                display: inline-block;
                width: 15px;
                height: 15px;
                
                background-color: red;
                text-align: center;
                line-height: 100px;
                font-weight: bold;
                margin-right: 3px;
            ">
               
            </b><span class="color-text red-text">-> Đáp án bạn đã chọn</span>
                                    </div>
                                    <div class="circle-description">
                                        <b style="
                display: inline-block;
                width: 15px;
                height: 15px;
                
                background-color: #04f614;
                text-align: center;
                line-height: 100px;
                font-weight: bold;
                margin-right: 3px;
            ">
               
            </b><span class="color-text green-text">-> Đáp án bạn chọn là đáp án đúng</span>
                                    </div>
                                <hr>
                                <h3 style="text-align: center;">Chi tiết câu trả lời:</h3>
                                <br>
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
                                    <hr>
                                @endforeach
            
                                <a href="{{ route('client.lesson', ['id' => $course->id]) }}" class="btn btn-primary">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
