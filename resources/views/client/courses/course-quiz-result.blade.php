@extends('client.layout.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="quiz-widget p-5 bg-white shadow-sm rounded">
                    <h2>Kết quả bài quiz: {{ $courseQuiz->name }}</h2>
                    <p class="mt-4">Điểm số của bạn: {{ $score }}</p>
                    <hr>
                    <h3>Chi tiết câu trả lời:</h3>
                    @foreach($questions as $question)
                        <div class="mb-4">
                            <h5>{{ $question->question }}</h5>
                            <ul class="list-unstyled">
                                @foreach($question->answers as $answer)
                                    <li class="{{ $answer->is_correct ? 'text-success' : '' }}">
                                        {{ $answer->answer }}
                                        @if(isset($userAnswers[$question->id]) && $userAnswers[$question->id] == $answer->id)
                                            <strong>(Bạn đã chọn)</strong>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                    <a href="{{ route('courses.index') }}" class="btn btn-primary mt-3">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
