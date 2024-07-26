<!-- resources/views/client/courses/quiz-result.blade.php -->
@extends('client.layout.master')
@section('content')
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
                                    <li class="{{ $userSelected ? ($isCorrect ? 'text-success' : 'text-danger') : '' }}">
                                        {{ $answer->answer }}
                                        @if($userSelected)
                                            <strong>
                                                @if($isCorrect)
                                                    (Bạn đã chọn - Đúng)
                                                @else
                                                    (Bạn đã chọn - Sai)
                                                @endif
                                            </strong>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach

                    <a href="#" class="btn btn-primary mt-3">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
