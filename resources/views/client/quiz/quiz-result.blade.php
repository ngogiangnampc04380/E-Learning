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
        .btn-back {
            margin-top: 20px;
        }
    </style>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="quiz-widget p-5 bg-white shadow-sm rounded">
                    <h2>{{ $quizFinal->title }}</h2>
                    <p><strong>Khóa học:</strong> {{ $quizFinal->course->name }}</p>
                    <p><strong>Điểm số của bạn:</strong> {{ $result['score'] }} / {{ $result['totalQuestions'] }}</p>
                    <hr>
                    <h3>Chi tiết câu trả lời:</h3>
                    @foreach($quizFinal->questions as $question)
                        <div class="mb-4">
                            <h5>{{ $question->questions }}</h5>
                            <ul class="list-unstyled">
                                @foreach($question->answers as $answer)
                                    @php
                                        $userSelected = isset($userAnswers['question_' . $question->id]) && $userAnswers['question_' . $question->id] == $answer->id;
                                        $isCorrect = $answer->is_correct;
                                    @endphp
                                    <li class="{{
                                        $userSelected ?
                                            ($isCorrect ? 'answer-correct answer-user-selected' : 'answer-incorrect') :
                                            ($isCorrect ? 'answer-correct' : '')
                                    }}">
                                        {{ $answer->answer_text }}
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
                    <a href="{{ route('client.editCourse', $quizFinal->course_id) }}" class="btn btn-primary btn-back">
                        Quay lại danh sách quiz
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
