@extends('client.layout.master')
@section('content')
    <section class="page-content course-sec course-lesson">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="student-widget lesson-introduction">
                        <div class="lesson-widget-group">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/lUdVsouSl4E?si=AC1I1jWfUnxADPan"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="lesson-group">
                        <h2>Danh sách bài học</h2>
                        <ul class="list-group">
                            <li class="list-group-item">Bài học 1: HTML cơ bản</li>
                            <li class="list-group-item">Bài học 2: CSS cơ bản</li>
                            <li class="list-group-item">Bài học 3: JavaScript cơ bản</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
