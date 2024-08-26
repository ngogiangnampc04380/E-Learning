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
            padding: 10px 15px;
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

        .certificate-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #f9d72a;
            /* Màu vàng sáng */
            color: #000;
            /* Màu chữ đen */
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            border-radius: 20%;
            /* Bo tròn để tạo hình dạng huy chương */
            border: 4px solid #e1b700;
            /* Đường viền màu vàng đậm hơn */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            transition: background-color 0.3s, box-shadow 0.3s;
            margin-bottom: 20px;
        }

        .certificate-btn::before {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 10px solid #f9d72a;
            /* Màu vàng của huy chương */
            transform: translateX(-50%);
        }

        .certificate-btn:hover {
            background-color: #f7c830;
            /* Màu vàng đậm hơn khi hover */
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
    <section class="page-content course-sec course-lesson">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mb-4">
                    <div class="student-widget lesson-introduction">
                        <span style="font-weight: bold; font-size: 30px;">Welcome to: {{ $data->name }}</span>

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


                        @php
                            $quizzresultforfinal = DB::table('quiz_results')
                                ->where('score', '>=', 60)
                                ->where('user_id', auth()->user()->id)
                                ->where('course_id', $data->id)
                                ->count();
                        @endphp
                        @php
                            $quizzforfinal = DB::table('quizzes')
                                ->where('course_id', $data->id)
                                ->count();
                        @endphp


                        @if ($les2 + $count_quizz + $count_final == $les + $count_quizz2 + $count_final2)
                            <a href="{{ url('/certificate/' . auth()->user()->id . '/' . $data->id) }}" target="_blank"
                                class="certificate-btn">
                                Lấy chứng chỉ
                            </a>


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
                                                                data-chapter-name="{{ $item->chaptername }}"  
                                                                @php
$bucketName = 'entweb01';
                                                                    $path_prefix ='ENT01';
                                                                    $filePath = 'folder-name';
                                                                    $namefile= $lesson->lessonvideo;
                                                                    $url = "https://storage.googleapis.com/{$bucketName}/{$path_prefix}/{$filePath}/{$namefile}"; @endphp
                                                                data-video="{{ Storage::url('public/' . $lesson->lessonvideo) }}"
                                                                data-title="{{ $lesson->lessonname }}"
                                                                onclick="loadLesson(event, '{{ $data->id }}', '{{ $item->chapterID }}', '{{ $lesson->lessonID }}', '{{ $lesson->lessonname }}', '{{ $url }}','{{ $item->chaptername }}')">
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
                                                            ->where('quiz_id', $quiz->id)
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
                                                        <b style=" font-weight: bold; width: 200px;  display: flex; align-items: center;">{{ $quizz_result->score }} / 100</b>
                                                    @endif
                                                </li>
                                            @empty
                                                <li class="list-group-item mt-2">Không có bài quiz nào.</li>
                                            @endforelse
                                            @if ($quizzresultforfinal < $quizzforfinal)
                                            <h6 style="margin-top: 10px;">Bạn phải đạt từ 60/100 thì mới đủ điều kiện làm
                                                quìzinal</h6>
                                        @endif
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                          
                        @endforeach

                        @forelse ($quizFinals as $quiz)
                            <tr>
                                <td></td> <!-- Assuming 'title' is the column name -->
                                <td>



                                    @if ($quizzresultforfinal == $quizzforfinal)
                                        <h2 style="margin-top: 10px;">Quiz final:</h2>
                                        <h6 style="margin-top: 10px;">Bạn phải đạt từ 80/100 thì mới hoàn thành khóa học
                                        </h6>
                                        <div class="d-flex mt-1"
                                            style="background-color: #007bff; color: #ffffff; padding: 10px; border: 2px solid #0056b3; border-radius: 5px;">
                                            <a style="max-width: 150px;" href="{{ route('client.quiz.quiz-final', ['quiz_id' => $quiz->id]) }}"
                                                style="color: #ffffff; text-decoration: none;">
                                                <h6 style="width: 150px; white-space: normal; word-wrap: break-word; word-break: break-word;">
                                                    {{ $quiz->title }}
                                                </h6>
                                                
                                            </a>
                                            @if ($final_result)
                                            <b style="color: #ffffff; font-weight: bold; width: 120px; margin-left: 25px; display: flex; align-items: center;">
                                                {{ $final_result->score }} / 100
                                            </b>
                                                                                        @endif
                                        </div>
                                    @endif


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
        </div>
    </section>

    <script>
        function loadLesson(event, id, chapterID, lessonID, lessonName, lessonVideo,chapterName) {
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

           var lessonTitleElement = document.getElementById('lesson-title');
            lessonTitleElement.innerText = "Chương: " + chapterName + " => " + lessonName;
            lessonTitleElement.style.color = "black";
            lessonTitleElement.style.textDecoration = "none";
            lessonTitleElement.style.fontSize = "20px";

            document.getElementById('courseID').value = id;
            document.getElementById('chapterID').value = chapterID;
            document.getElementById('lessonID').value = lessonID;

            // Reset lại sự kiện cho video mới
            attachVideoEvents();
        }

        window.addEventListener('popstate', function(event) {
            const url = new URL(window.location);
            const lessonID = url.searchParams.get('lesson-id');

            if (lessonID) {
                const lessonLink = document.querySelector(`a[data-lesson-id="${lessonID}"]`);
                if (lessonLink) {
                    loadLesson(null, lessonLink.dataset.courseid, lessonLink.dataset.chapterid, lessonID, lessonLink
                        .dataset.title, lessonLink.dataset.video);
                }
            }
        });

        function attachVideoEvents() {
            var video = document.getElementById('lesson-video');
            var intervalId, lastTimeIntervalId;
            var lastTime = 0; // Thời gian cuối cùng mà người dùng đã xem

            function saveProgress() {
                var currentTime = video.currentTime;
                var duration = video.duration;
                var percent = (currentTime / duration) * 100;
                var courseId = document.getElementById('courseID').value;
                var chapterId = document.getElementById('chapterID').value;
                var lessonId = document.getElementById('lessonID').value;

                var xhr = new XMLHttpRequest();
                var url = percent = 100 ? '/video-progress-complete' : '/video-progress';
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

            function updateLastTime() {
                lastTime = video.currentTime; // Cập nhật thời gian hiện tại mỗi 2 giây
                console.log('Last time updated: ' + lastTime);
            }

            video.removeEventListener('play', startSavingProgress);
            video.removeEventListener('pause', stopAndSaveProgress);
            video.removeEventListener('seeked', preventForwardSeeking);
            video.removeEventListener('ended', markLessonComplete);

            function startSavingProgress() {
                intervalId = setInterval(saveProgress, 15000); // Gửi dữ liệu sau mỗi 15 giây
                lastTimeIntervalId = setInterval(updateLastTime, 7000); // Cập nhật lastTime mỗi 10 giây
            }

            function stopAndSaveProgress() {
                clearInterval(intervalId);
                clearInterval(lastTimeIntervalId); // Dừng cập nhật lastTime
                saveProgress();
            }

            function preventForwardSeeking() {
                if (video.currentTime > lastTime + 2) { // Chặn tua nhanh hơn lastTime + 1 giây
                    video.currentTime = lastTime; // Quay lại vị trí trước đó
                    // saveProgress();
                }
            }

            function markLessonComplete() {
                clearInterval(intervalId);
                clearInterval(lastTimeIntervalId); // Dừng cập nhật lastTime
                saveProgress(); // Gửi dữ liệu khi video kết thúc

                // Tạo lớp nền tối mờ
                var overlay = document.createElement('div');
                overlay.style.position = 'fixed';
                overlay.style.top = '0';
                overlay.style.left = '0';
                overlay.style.width = '100%';
                overlay.style.height = '100%';
                overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.7)'; // Nền tối mờ
                overlay.style.zIndex = '999'; // Đặt z-index cao để nằm trên tất cả các phần tử khác

                // Tạo thông báo ở giữa màn hình
                var notification = document.createElement('div');
                notification.innerText = "Bạn đã hoàn thành bài học này!";
                notification.style.position = 'fixed';
                notification.style.top = '50%';
                notification.style.left = '50%';
                notification.style.transform = 'translate(-50%, -50%)'; // Căn giữa thông báo
                notification.style.backgroundColor = '#28a745'; // Màu nền xanh lá cây
                notification.style.color = '#fff';
                notification.style.padding = '20px 40px';
                notification.style.borderRadius = '10px';
                notification.style.zIndex = '1000'; // Đặt z-index cao hơn lớp nền mờ
                notification.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.5)';
                notification.style.textAlign = 'center';
                notification.style.fontSize = '18px';

                document.body.appendChild(overlay);
                document.body.appendChild(notification);

                // Tự động tắt thông báo và lớp nền sau 2 giây
                setTimeout(function() {
                    notification.remove();
                    overlay.remove();

                    // Hiển thị dấu tích sau khi thông báo tắt
                    var lessonId = document.getElementById('lessonID').value;
                    var checkIcon = document.querySelector(`a[data-lesson-id="${lessonId}"]`).nextElementSibling;
                    if (checkIcon) {
                        checkIcon.classList.remove('hidden-check');
                        checkIcon.classList.add('completed-check');
                    }
                }, 1500); // 2000ms = 2 giây
            }


            video.addEventListener('play', startSavingProgress);
            video.addEventListener('pause', stopAndSaveProgress);
            video.addEventListener('seeked', preventForwardSeeking); // Chặn tua nhanh về phía trước, cho phép tua lùi
            video.addEventListener('ended', markLessonComplete);
        }

        document.addEventListener('DOMContentLoaded', function() {
            attachVideoEvents();

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
        });
    </script>
@endsection
