@extends('client.layout.master')

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 mt-3">
                    <h1 class="mb-4">Chi Tiết Quiz</h1>

                    <!-- Thông báo thành công -->
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- Thông tin quiz -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Tiêu đề: {{ $quizFinal->title }}</h5>
                            <p class="card-text"><strong>Khóa học:</strong> {{$course->name}}</p>
                        </div>
                    </div>
                    @if ($quizFinal->questions->isNotEmpty())
                        <div class="accordion" id="questionsAccordion">
                            @foreach ($quizFinal->questions as $index => $question)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="true" aria-controls="collapse{{ $index }}">
                                            Câu hỏi {{ $index + 1 }}: {{ $question->questions }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse show" aria-labelledby="heading{{ $index }}" data-bs-parent="#questionsAccordion">
                                        <div class="accordion-body">
                                            <ul class="list-group">
                                                @foreach ($question->answers as $answer)
                                                    <li class="list-group-item {{ $answer->is_correct ? 'list-group-item-success' : 'list-group-item-danger' }}">
                                                        {{ $answer->answer_text }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>Chưa có câu hỏi nào cho quiz này.</p>
                    @endif
                    <!-- Quay lại -->
                    <div class="mt-4">
                        <a href="{{ route('client.editCourse', $quizFinal->course_id) }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Quay lại danh sách quiz
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
