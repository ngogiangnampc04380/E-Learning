@extends('client.layout.master')

@section('content')
    <style>
        /* Container giữ các mô tả màu sắc */
        .circles-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
            /* Khoảng cách giữa các mô tả màu sắc */
            margin-bottom: 20px;
            /* Khoảng cách giữa mô tả màu sắc và phần chi tiết câu trả lời */
        }

        /* Định dạng cho các mô tả màu sắc */
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

        /* Định dạng các màu sắc */
        .color-text {
            font-weight: bold;
            /* Đậm hơn để dễ phân biệt */
            display: inline;
        }

        /* Định dạng cho từng màu sắc */
        .blue-text {
            color: #007BFF;
            /* Màu xanh dương tươi sáng */
        }

        .red-text {
            color: #DC3545;
            /* Màu đỏ tươi sáng */
        }

        .green-text {
            color: #10f703;
            /* Màu xanh lá cây tươi sáng */
        }

        /* Định dạng câu trả lời */
        .answer {
            margin-bottom: 10px;
            font-size: 16px;
            /* Kích thước chữ của câu trả lời */
        }

        /* Định dạng văn bản đáp án đúng */
        .answer .correct-answer {
            font-weight: bold;
            color: #333;
            /* Màu chữ cho dễ đọc */
        }

        /* Nút quay lại danh sách quiz */
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
        <h2 style="font-size: 36px; font-weight: bold; color: #34495e; text-align: center; margin-bottom: 20px;">Kết quả làm bài</h2>

        <div class="row justify-content-center">
                    {{-- <a href="{{ route('client.lesson', ['id' => $course->id]) }}" class="btn btn-primary">Quay lại</a> --}}

            <div class="col-lg-8">

                <div class="quiz-widget p-5 bg-white shadow-sm rounded">
                <a href="{{ route('client.lesson', ['id' => $course->id]) }}" class="btn btn-primary mb-4">Quay lại</a>

                    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #ddd; padding-bottom: 10px; margin-bottom: 20px;">
                        <div>
                            <h3 style="font-size: 24px; font-weight: bold; color: #2c3e50; margin: 0;">Bài quiz: {{ $quiz->name }}</h3>
                        </div>
                        <div style="font-size: 32px; font-weight: bold; color: #e74c3c;">
                            {{ $result['score'] }} / 100
                        </div>
                    </div>
                    
                    <div class="circle-description">
                        <strong>Chú thích:</strong>
                    </div>
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
    
    background-color: green;
    text-align: center;
    line-height: 100px;
    font-weight: bold;
    margin-right: 3px;
">
   
</b><span class="color-text green-text">-> Đáp án bạn chọn là đáp án đúng</span>
                        </div>
                    </div>
                    <hr>
                    <h3 style="text-align: center;">Chi tiết câu trả lời:</h3>
                    <br>
                    @foreach ($quiz->questions as $question)
                        <div class="mb-4">
                            <h5>Câu hỏi {{ $loop->iteration }}: {{ $question->question }}</h5>
                            @php
                                $correctAnswer = $question->answers->where('is_correct', 1)->first();
                            @endphp
                            {{-- @if($correctAnswer)
                                <span class="color-text blue-text">Đáp án đúng: {{ $correctAnswer->answer_text }}</span>
                            @endif --}}
                            <ul class="list-unstyled">
                                @foreach ($question->answers as $answer)
                                    @php
                                        $userSelected =
                                            isset($userAnswers[$question->id]) &&
                                            $userAnswers[$question->id] == $answer->id;
                                        $isCorrect = $answer->is_correct;
                                    @endphp
                                    <li
                                        class="answer {{ $userSelected && $isCorrect ? 'green-text' : ($userSelected ? 'red-text' : ($isCorrect ? 'blue-text' : '')) }}">
                                        {{ $answer->answer }}
                                    </li>
                                @endforeach

                                {{-- Hiển thị đáp án đúng và thông báo nếu người dùng chưa chọn đáp án --}}
                                @php
                                    $selectedAnswer = $question->answers
                                        ->where('id', $userAnswers[$question->id] ?? null)
                                        ->first();
                                    $correctAnswer = $question->answers->where('is_correct', 1)->first();
                                    $userNotSelected = !isset($userAnswers[$question->id]);
                                @endphp
                                @if ($userNotSelected || (!$selectedAnswer && $correctAnswer))
                                    <li class="answer {{ $userNotSelected ? 'no-answer' : 'correct-answer' }}">
                                        @if ($userNotSelected)
                                            <span class="color-text red-text">Bạn chưa chọn đáp án cho câu hỏi này.</span>
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
@endsection
