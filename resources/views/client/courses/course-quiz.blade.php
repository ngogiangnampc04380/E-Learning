@extends('client.layout.master')

@section('content')
    <section class="page-content quiz-sec" id="quizSection">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div id="quizContent" class="quiz-widget p-5 bg-white shadow-sm rounded">
                        <h2 id="quizName" class="mb-5">{{ $courseQuiz->name }}</h2>
                        <form id="quizForm" action="{{ route('courses.course-quiz.submit', $courseQuiz->id) }}" method="POST">
                            @csrf
                            @foreach($questions as $index => $question)
                                <div id="question{{ $index + 1 }}" class="mb-5 question position-relative">
                                    <h4 class="mb-4">{{ $question->question }}</h4>
                                    <ul class="list-unstyled">
                                        @foreach($question->answers as $answer)
                                            <li class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="option_{{ $question->id }}_{{ $answer->id }}" value="{{ $answer->id }}">
                                                    <label class="form-check-label" for="option_{{ $question->id }}_{{ $answer->id }}">
                                                        {{ $answer->answer }}
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-success">Nộp bài</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
