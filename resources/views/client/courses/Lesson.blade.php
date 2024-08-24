@extends('client.layout.master')
@section('content')
    <style>
        .hidden-check {
            display: none;
        }

        .completed-check {
            display: inline-block;
        }

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

        body {
            background: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .student-widget {
            background: linear-gradient(135deg, #ffffff, #f1f3f4);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .lesson-group {
            background: linear-gradient(135deg, #e3f2fd, #ffffff);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .accordion-button {
            font-weight: bold;
            color: #0056b3;
            background-color: #e3f2fd;
            border: none;
            border-radius: 10px;
            margin-bottom: 5px;
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
        }

        .accordion-button:not(.collapsed) {
            color: #ffffff;
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .accordion-button:hover {
            color: #ffffff;
            background-color: #007bff;
        }

        .lesson-list a {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
            transition: color 0.3s, font-weight 0.3s;
        }

        .lesson-list a:hover {
            text-decoration: none;
            color: #0056b3;
            font-weight: bold;
        }

        .ratio-16x9 {
            position: relative;
            width: 100%;

            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .ratio-16x9 video {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }

        h2 {
            font-size: 26px;
            color: #333;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .list-group-item {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            margin-bottom: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .list-group-item:hover {
            background-color: #e3f2fd;
            transform: translateY(-3px);
        }
    </style>
    <section class="page-content course-sec course-lesson">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mb-4">
                    <div class="student-widget lesson-introduction">
                        <div class="lesson-widget-group">
                            <h2 id="lesson-title"></h2>
                            <input type="hidden" id="courseID" name="courseID" value="">
                            <input type="hidden" id="chapterID" name="chapterID" value="">
                            <input type="hidden" id="lessonID" name="lessonID" value="">
                            {{-- <input type="hidden" id="completed" name ="completed" value="1"> --}}
                            <div class="ratio ratio-16x9">
                                <img id="lesson-thumbnail" src="{{ Storage::url('public/' . $data->thumbnail) }}"
                                    alt="Course Thumbnail" style="width: 100%; border-radius: 15px; display: block;">
                                <video id="lesson-video" controls style="display: none;">
                                    <source src="{{ $firstLessonVideo }}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="lesson-group">

                        @php
                            $les = DB::table('lessons')
                                ->join('chapters', 'lessons.chapter_id', '=', 'chapters.id') // Join bảng lessons và chapters dựa trên chapter_id
                                ->join('courses', 'chapters.course_id', '=', 'courses.id') // Join bảng chapters và courses dựa trên course_id
                                ->select('lessons.*') // Chọn tất cả các cột từ bảng lessons
                                ->where('courses.id', '=', $data->id) // Điều kiện chỉ lấy những bản ghi có courses.id bằng $data->id
                                ->count(); // Lấy dữ liệu

                            // lấy dữ liệu của video đã hoàn thành
                            $les2 = DB::table('video_done')
                                ->join('chapters', 'video_done.chapter_id', '=', 'chapters.id') // Join bảng lessons và chapters dựa trên chapter_id
                                ->where('user_id', auth()->user()->id)
                                ->join('courses', 'chapters.course_id', '=', 'courses.id') // Join bảng chapters và courses dựa trên course_id
                                ->select('video_done.*') // Chọn tất cả các cột từ bảng lessons
                                ->where('courses.id', '=', $data->id) // Điều kiện chỉ lấy những bản ghi có courses.id bằng $data->id
                                ->count();
                            $count_quizz = DB::table('quiz_results')
                                ->where('course_id', $data->id)
                                ->where('user_id', auth()->user()->id)
                                ->where('score', '>=', 60)
                                ->count();
                            $count_quizz2 = DB::table('quizzes')
                                // ->where('user_id', auth()->user()->id)
                                ->where('course_id', $data->id)
                                ->count();
                            $count_final = DB::table('results_final')
                                ->where('user_id', auth()->user()->id)
                                ->where('course_id', $data->id)
                                ->where('score', '>=', 80)
                                ->count();
                            $count_final2 = DB::table('quiz_finals')
                                // ->where('user_id', auth()->user()->id)
                                ->where('course_id', $data->id)
                                ->count();
                        @endphp
                        @if ($les2 + $count_quizz + $count_final == $les + $count_quizz2 + $count_final2)
                            <a href="{{ url('/certificate/' . auth()->user()->id . '/' . $data->id) }}">Lấy chứng chỉ</a>

                            <script>
                                // Gửi yêu cầu AJAX để gửi email
                                fetch("{{ route('send.certificate.email') }}", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/json",
                                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                        },
                                        body: JSON.stringify({
                                            user_id: {{ auth()->user()->id }},
                                            course_id: {{ $data->id }},
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log('Email đã được gửi:', data.message);
                                    })
                                    .catch(error => {
                                        console.error('Lỗi khi gửi email:', error);
                                    });
                            </script>
                        @endif
                        <h2>Tiến độ : {{ $les2 + $count_quizz + $count_final }}/{{ $les + $count_quizz2 + $count_final2 }}
                        </h2>
                        <h2>Danh sách chương</h2>
                        @foreach ($chapters->sortBy('number') as $item)
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $item->chapterID }}" aria-expanded="true"
                                            aria-controls="collapse{{ $item->chapterID }}"
                                            data-chapter-id="{{ $item->chapterID }}">
                                            Chương: {{ $item->chaptername }}
                                        </button>
                                        @php
                                            $quizzes = DB::table('quizzes')
                                                ->where('course_id', $data->id)
                                                ->where('chapter_id', $item->chapterID)
                                                ->select('id', 'name')
                                                ->get();

                                            $quizzes2 = DB::table('quizzes')
                                                ->where('course_id', $data->id)
                                                ->where('chapter_id', $item->chapterID)
                                                ->first();
                                        @endphp
                                    </h2>
                                    <div id="collapse{{ $item->chapterID }}" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="list-group lesson-list">
                                                @if (isset($chapterLessons[$item->chapterID]))
                                                    @foreach ($chapterLessons[$item->chapterID]->sortBy('number') as $lesson)
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center">
                                                            <a href="{{ route('client.lesson', ['id' => $data->id, 'lesson-id' => $lesson->lessonID]) }}"
                                                                class="lesson-link"
                                                                data-lesson-id="{{ $lesson->lessonID }}"
                                                                @php
$bucketName = 'entweb01';
                                                                    $path_prefix ='ENT01';
                                                                    $filePath = 'folder-name';
                                                                    $namefile= $lesson->lessonvideo;
                                                                    $url = "https://storage.googleapis.com/{$bucketName}/{$path_prefix}/{$filePath}/{$namefile}"; @endphp
                                                                data-video="{{ Storage::url('public/' . $lesson->lessonvideo) }}"
                                                                data-title="{{ $lesson->lessonname }}"
                                                                onclick="loadLesson(event, '{{ $data->id }}', '{{ $item->chapterID }}', '{{ $lesson->lessonID }}', '{{ $lesson->lessonname }}', '{{ $url }}')">
                                                                Bài: {{ $lesson->lessonname }}
                                                            </a>
                                                            <i class="fa-solid fa-check hidden-check"
                                                                style="color: #63E6BE;"></i>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                            @forelse($quizzes as $quiz)
                                                <li class="list-group-item d-flex justify-content-between align-items-center mt-2"
                                                    id="quiz-row">
                                                    <a href="{{ route('client.courses.quiz-chapter', $quiz->id) }}">
                                                        <span>Quiz: {{ $quiz->name }}</span></a>

                                                    @php
                                                        $quizz_result = DB::table('quiz_results')
                                                            // ->where('score', '>=', 60)
                                                            ->where('user_id', auth()->user()->id)
                                                            ->where('quiz_id', $quizzes2->id)
                                                            ->first();

                                                        // dd($quizz_result);

                                                    @endphp
                                                    @php

                                                        $final = DB::table('quiz_finals')
                                                            ->where('course_id', $data->id)
                                                            ->first();

                                                        if ($final) {
                                                            $final_result = DB::table('results_final')
                                                                // ->where('score', '>=', 80)
                                                                ->where('user_id', auth()->user()->id)
                                                                ->where('quiz_final_id', $final->id)
                                                                ->first();
                                                        }
                                                        // dd($quizz_result);
                                                    @endphp
                                                    @if ($quizz_result)
                                                        <b>{{ $quizz_result->score }} / 100</b>
                                                    @endif
                                                </li>
                                            @empty
                                                <li class="list-group-item mt-2">Không có bài quiz nào.</li>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @forelse ($quizFinals as $quiz)
                            <tr>
                                <td></td> <!-- Assuming 'title' is the column name -->
                                <td>
                                    <div class="d-flex mt-2">

                                        <a href="{{ route('client.quiz.quiz-final', ['quiz_id' => $quiz->id]) }}">
                                            <h2>{{ $quiz->title }}</h2>

                                        </a>
                                        @if ($final_result)
                                            <b class=" mt-2" style="margin-left: 104px">{{ $final_result->score }} /
                                                100</b>
                                        @endif
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center" disabled>Chưa có quiz final nào.</td>
                            </tr>
                        @endforelse
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
        //cua th Trường
        function loadLesson(event, id, chapterID, lessonID, lessonName, lessonVideo) {
            event.preventDefault();

            const url = new URL(window.location);
            url.searchParams.set('lesson-id', lessonID);
            window.history.pushState({
                path: url.toString()
            }, '', url.toString());

            var videoElement = document.getElementById('lesson-video');
            var imgElement = document.getElementById('lesson-thumbnail');

            // Đặt nguồn video mới
            videoElement.src = lessonVideo;

            // Ẩn ảnh thumbnail và hiển thị video
            imgElement.style.display = 'none';
            videoElement.style.display = 'block';
            document.getElementById('lesson-title').innerText = lessonName;

            // var courseid = document.getAttribute('courseid');
            // var chapterid = document.getAttribute('chapterid');
            // var lessonid = document.getAttribute('lessonid');

            document.getElementById('courseID').value = id;
            document.getElementById('chapterID').value = chapterID;
            document.getElementById('lessonID').value = lessonID;
            // console.log(courseid, chapterid, lessonid)

        }

        window.addEventListener('popstate', function(event) {
            const url = new URL(window.location);
            const lessonID = url.searchParams.get('lesson-id');

            if (lessonID) {

                const lessonLink = document.querySelector(`a[data-lesson-id="${lessonID}"]`);
                if (lessonLink) {
                    loadLesson(null, lessonID, lessonLink.dataset.title, lessonLink.dataset.video);
                }
            }
        });

        //chức năng bắt quá trình video
        document.addEventListener('DOMContentLoaded', function() {
            var video = document.getElementById('lesson-video');
            var intervalId;
            //đẩy lên database
            function saveProgress() {
                var currentTime = video.currentTime;
                var duration = video.duration;
                var percent = (currentTime / duration) * 100;
                var courseId = document.getElementById('courseID').value;
                var chapterId = document.getElementById('chapterID').value;
                var lessonId = document.getElementById('lessonID').value;

                var xhr = new XMLHttpRequest();
                var url = percent >= 95 ? '/video-progress-complete' : '/video-progress';
                xhr.open('POST', url, true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content'));
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        console.log(xhr.responseText);
                    }
                };
                var data = JSON.stringify({
                    course_id: courseId,
                    chapter_id: chapterId,
                    lesson_id: lessonId,
                    percent: percent
                });
                xhr.send(data);

                console.log('Current time: ' + currentTime, 'Percent: ' + percent, courseId, chapterId, lessonId);
            }

            video.addEventListener('play', function() {
                intervalId = setInterval(saveProgress, 5000); // Gửi dữ liệu sau mỗi 5 giây
            });

            video.addEventListener('pause', function() {
                clearInterval(intervalId);
                saveProgress();
            });

            video.addEventListener('seeked', function() {
                saveProgress(); // Gửi dữ liệu khi người dùng tua video
            });
            var completedLessons =
                @json($checklesson); // Giả sử bạn có mảng $completedLessons chứa các lessonID đã hoàn thành
            completedLessons.forEach(function(lessonId) {
                var checkIcon = document.querySelector(`a[data-lesson-id="${lessonId}"]`)
                    .nextElementSibling;
                if (checkIcon) {
                    checkIcon.classList.remove('hidden-check');
                    checkIcon.classList.add('completed-check');
                }
            });

            video.addEventListener('ended', function() {
                clearInterval(intervalId);
                saveProgress(); // Gửi dữ liệu khi video kết thúc

                // Hiển thị dấu tích sau khi người dùng xem xong video
                var lessonId = document.getElementById('lessonID').value;
                var checkIcon = document.querySelector(`a[data-lesson-id="${lessonId}"]`)
                    .nextElementSibling;

                if (checkIcon) {
                    checkIcon.classList.remove('hidden-check');
                    checkIcon.classList.add('completed-check');
                }
            });

        });
    </script>
@endsection
