@extends('client.layout.master')
@section('content')
<div class="page-content">
    <div class="container">
        <div class="row">
    @include('components.settingprofile')
    <div class="col-xl-9 col-lg-8 col-md-12">

        <div class="row">
            <div class="col-md-12">
                <div class="card instructor-card">
                    <div class="card-header">
                        <h4>Khóa học của tôi</h4>
                    </div>
                    <div class="card-body">

                        @if ($myCourses->isEmpty())
                            <div class="no-courses" style="text-align: center">
                                <p class="h4 font-weight-normal">Bạn chưa có khóa học nào.</p>
                                <a href="{{ route('client.course-lists') }}" class="btn btn-primary">Mua khóa học -></a>

                            </div>
                        @else
                            <div class="row">
                                @foreach ($myCourses as $courseUser)
                                    @php
                                        $course = $courseUser->course;
                                        $mentor = $course->mentor->user;
                                    @endphp
                                    <div class="col-lg-12 col-md-12 d-flex">
                                        <div class="course-box course-design list-course d-flex">
                                            <div class="product">
                                                <div class="product-img">
                                                    <a href="{{ route('client.course-details', $course->id) }}">
                                                        <img src="{{ Storage::url('public/' . $course->thumbnail) }}"
                                                            alt="Thumbnail"
                                                            style="width: 250px; height: 150px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <div class="head-course-title">
                                                        <h2 class="title">
                                                            <a
                                                                href="{{ route('client.course-details', $course->id) }}">{{ $course->name }}</a>
                                                        </h2>
                                                        <div class="all-btn all-category d-flex align-items-center">
                                                            <a href="{{ route('client.lesson', ['id' => $course->id]) }}"
                                                                class="btn btn-primary">Học</a>
                                                        </div>
                                                    </div>
                                                    <div class="course-group d-flex mb-0">
                                                        <div class="course-group-img d-flex">
                                                            <a href="{{ route('client.mentor_detail', $mentor->id) }}">
                                                                <img src="{{ $mentor->thumbnail ? Storage::url('public/' . $mentor->thumbnail) : 'https://cdn-icons-png.flaticon.com/128/9721/9721084.png' }}"
                                                                    class="img-fluid rounded-circle">
                                                            </a>
                                                            <div class="course-name">
                                                                <h4>
                                                                    <a
                                                                        href="{{ route('client.mentor_detail', $mentor->id) }}">{{ $mentor->name }}</a>
                                                                </h4>
                                                                <p>Giảng viên</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    
</div>
</div>
</div>    
        
    @endsection
