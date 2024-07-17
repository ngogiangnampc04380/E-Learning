@extends('client.layout.master')
@section('content')
    <style>
        .course-sec {
            padding: 40px 0;
            background-color: #f8f9fa;
        }

        .student-widget {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .lesson-introduction h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .lesson-group {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .lesson-group h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .list-group-item {
            border: none;
            padding: 15px 20px;
            font-size: 1rem;
            border-bottom: 1px solid #e9ecef;
        }

        .list-group-item:last-child {
            border-bottom: none;
        }

        .ratio {
            border-radius: 8px;
            overflow: hidden;
        }

        .comment-sec {
            margin-top: 20px;
        }

        .comment-sec h5 {
            margin-bottom: 20px;
        }

        .input-block {
            margin-bottom: 20px;
        }
    </style>
    <section class="page-content course-sec course-lesson">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="student-widget lesson-introduction">
                        <div class="lesson-widget-group">
                            <h2 id="lesson-title">Bài 1: Từ vựng</h2>
                            <div class="ratio ratio-16x9">
                                <video id="lesson-video" controls> 
                                    <source src="{{ Storage::url('public/assets-client/Videos/Lessons/'. $firstLessonVideo )}}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="lesson-group">
                        <h2>Danh sách chương</h2>
                        @foreach ($chapters as $item)
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->chapterID }}" aria-expanded="true" aria-controls="collapse{{ $item->chapterID }}">
                                            {{ $item->chaptername }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $item->chapterID }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="list-group lesson-list">
                                                @if(isset($chapterLessons[$item->chapterID]))
                                                    @foreach ($chapterLessons[$item->chapterID] as $lesson)
                                                        <li class="list-group-item">
                                                            <a href="#" class="lesson-link" data-video="{{ Storage::url('public/assets-client/Videos/Lessons/'. $lesson->lessonvideo) }}" data-title="{{ $lesson->lessonname }}">
                                                                {{ $lesson->lessonname }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card comment-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Bình luận</h5>
                            <form>
                                <div class="input-block mb-3">
                                    <textarea rows="4" class="form-control" placeholder="Nhập bình luận"></textarea>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.lesson-link').forEach(function (element) {
                element.addEventListener('click', function (event) {
                    event.preventDefault();
                    var videoUrl = this.getAttribute('data-video');
                    var lessonTitle = this.getAttribute('data-title');
                    var videoElement = document.getElementById('lesson-video');
                    videoElement.querySelector('source').src =  videoUrl;
                    videoElement.load(); // Tải lại video với URL mới
                    document.getElementById('lesson-title').innerText = lessonTitle;
                });
            });
        });
    </script>

@endsection
