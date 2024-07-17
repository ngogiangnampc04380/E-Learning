@extends('client.layout.master')
@section('content')
    <div class="breadcrumb-bar">
        <div class="container">
        </div>
    </div>
    <section class="course-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @if($myCourses->isEmpty())
        <div class="no-courses" style="text-align: center">
            <p class="h4 font-weight-normal">bạn chưa có khóa học nào.</p>
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
                        <img src="{{ Storage::url('public/assets-client/img/Courses/'.$course->thumbnail) }}" alt="Thumbnail" style="width: 250px; height: 150px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    </a>
                </div>
                <div class="product-content">
                    <div class="head-course-title">
                        <h2 class="title">
                            <a href="{{ route('client.course-details', $course->id) }}">{{ $course->name }}</a>
                        </h2>
                        <div class="all-btn all-category d-flex align-items-center">
                            <a href="{{ route('client.lesson', $course->id) }}" class="btn btn-primary">Học</a>
                        </div>
                    </div>
                    <div class="rating">
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star"></i>
                        <span class="d-inline-block average-rating"><span>4.0</span> (15)</span>
                    </div>
                    <div class="course-group d-flex mb-0">
                        <div class="course-group-img d-flex">
                            <a href="{{ route('client.mentor_detail', $mentor->id) }}">
                                <img src="{{ $mentor->thumbnail ? Storage::url('assets-client/img/user/' . $mentor->thumbnail) : 'https://cdn-icons-png.flaticon.com/128/9721/9721084.png' }}"
                                     class="img-fluid rounded-circle">
                            </a>
                            <div class="course-name">
                                <h4>
                                    <a href="{{ route('client.mentor_detail', $mentor->id) }}">{{ $mentor->name }}</a>
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
<div class="row">
    <div class="col-md-12">
        <ul class="pagination lms-page">
            <li class="page-item prev">
                <a class="page-link" href="javascript:void(0)" tabindex="-1"><i
                        class="fas fa-angle-left"></i></a>
            </li>
            <li class="page-item first-page active">
                <a class="page-link" href="javascript:void(0)">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="javascript:void(0)">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="javascript:void(0)">3</a>
            </li>
            <li class="page-item next">
                <a class="page-link" href="javascript:void(0)"><i class="fas fa-angle-right"></i></a>
            </li>
        </ul>
    </div>
</div>
@endif
                   
                </div>
            </div>
        </div>
    </section>
@endsection
