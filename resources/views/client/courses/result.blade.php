@extends('client.layout.master')

@section('content')
    <style>
        .answer-correct {
            color: #28a745; /* Màu xanh cho đáp án đúng */
        }
        .answer-incorrect {
            color: #dc3545; /* Màu đỏ cho đáp án sai */
        }
        .answer-user-selected {
            font-weight: bold;
        }
    </style>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="quiz-widget p-5 bg-white shadow-sm rounded">
                    <h2>Kết quả bài quiz: {{ $quiz->name }}</h2>
                    <p class="mt-4">Điểm số của bạn: {{ $score }}</p>
                    <hr>
                    <h3>Chi tiết câu trả lời:</h3>
                    @foreach($questions as $question)
                        <div class="mb-4">
                            <h5>{{ $question->question }}</h5>
                            <ul class="list-unstyled">
                                @foreach($question->answers as $answer)
                                    @php
                                        $userSelected = isset($userAnswers[$question->id]) && $userAnswers[$question->id] == $answer->id;
                                        $isCorrect = $answer->is_correct;
                                    @endphp
                                    <li class="{{
                                        $userSelected ?
                                            ($isCorrect ? 'answer-correct answer-user-selected' : 'answer-incorrect') :
                                            ($isCorrect ? 'answer-correct' : '')
                                    }}">
                                        {{ $answer->answer }}
                                        @if($userSelected && !$isCorrect)
                                            <strong> (Bạn đã chọn - Sai)</strong>
                                        @elseif($userSelected && $isCorrect)
                                            <strong> (Bạn đã chọn - Đúng)</strong>
                                        @elseif($isCorrect)
                                            <strong> (Đúng)</strong>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
