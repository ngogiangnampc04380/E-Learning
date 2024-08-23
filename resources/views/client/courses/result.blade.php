@extends('client.layout.master')

@section('content')
    <style>
        .answer-correct {
            color: #28a745;
            /* Màu xanh cho đáp án đúng */
        }

        .answer-incorrect {
            color: #dc3545;
            /* Màu đỏ cho đáp án sai */
        }

        .answer-user-selected {
            font-weight: bold;
        }

        .btn-back {
            margin-top: 20px;
        }
    </style>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="quiz-widget p-5 bg-white shadow-sm rounded">
                    <h2>{{ $quiz->name }}</h2>
                    <p><strong>Điểm số của bạn:</strong> {{ $result['score'] }} / 100</p>
                    <hr>
                    <h3>Chi tiết câu trả lời:</h3>
                    @foreach ($quiz->questions as $question)
                        <div class="mb-4">
                            <h5>{{ $question->question }}</h5>
                            <ul class="list-unstyled">
                                @foreach ($question->answers as $answer)
                                    @php
                                        // Kiểm tra câu trả lời của người dùng và câu trả lời đúng
                                        $userSelected =
                                            isset($userAnswers[$question->id]) &&
                                            $userAnswers[$question->id] == $answer->id;
                                        $isCorrect = $answer->is_correct;
                                    @endphp
                                    <li
                                        class="{{ $userSelected
                                            ? ($isCorrect
                                                ? 'answer-correct answer-user-selected'
                                                : 'answer-incorrect')
                                            : ($isCorrect
                                                ? 'answer-correct'
                                                : '') }}">
                                        {{ $answer->answer }}
                                        @if ($userSelected && !$isCorrect)
                                            <strong> (Bạn đã chọn - Sai)</strong>
                                        @elseif($userSelected && $isCorrect)
                                            <strong> (Bạn đã chọn - Đúng)</strong>
                                        @elseif($isCorrect)
                                            <strong> (Đúng)</strong>
                                        @endif
                                    </li>
                                @endforeach

                                {{-- Hiển thị đáp án đúng nếu người dùng chọn sai --}}
                                @php
                                    $selectedAnswer = $question->answers
                                        ->where('id', $userAnswers[$question->id] ?? null)
                                        ->first();
                                    $correctAnswer = $question->answers->where('is_correct', 1)->first();
                                @endphp
                                @if ($selectedAnswer && !$selectedAnswer->is_correct && $correctAnswer)
                                    <li class="answer-correct">
                                        <strong>Đáp án đúng: {{ $correctAnswer->answer }}</strong>
                                    </li>
                                @elseif(!$selectedAnswer && $correctAnswer)
                                    <li class="answer-correct">
                                        <strong>Đáp án đúng: {{ $correctAnswer->answer }}</strong>
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
