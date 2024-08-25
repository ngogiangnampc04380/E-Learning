@extends('client.layout.master')
@section('content')
    <div class="breadcrumb-bar">
        <div class="container">
        </div>
    </div>
    <div class="page-banner instructor-bg-blk">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="profile-info-blk">

                        <a href="javascript:void(0);" class="profile-info-img">
                            <img class="img-fluid" alt
                                src="{{ $mentor->user->thumbnail ? Storage::url('public/' . $mentor->user->thumbnail) : 'https://cdn-icons-png.flaticon.com/128/9721/9721084.png' }}"
                                alt="{{ $mentor->user->name }}">
                        </a>
                        <h4><a href="javascript:void(0);">{{ $mentor->user->name }}</a></h4>
                        <p>Giảng viên</p>
                        <ul class="list-unstyled inline-inline profile-info-social">
                            @if ($mentor->link_face)
                                <li class="list-inline-item">
                                    <a href="{{ $mentor->user->link_face }}" target="_blank">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                </li>
                            @endif
                            @if ($mentor->user->link_mail)
                                <li class="list-inline-item">
                                    <a href="mailto:{{ $mentor->user->link_mail }}" target="_blank">
                                        <i class="fa-solid fa-envelope"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($mentor->user->phone)
                                <li class="list-inline-item">
                                    <a href="tel:{{ $mentor->user->phone }}" target="_blank">
                                        <i class="fa-solid fa-phone"></i>
                                    </a>
                                </li>
                            @endif
                            @if ($mentor->user->link_youtube)
                                <li class="list-inline-item">
                                    <a href="{{ $mentor->user->link_youtube }}" target="_blank">
                                        <i class="fa-brands fa-youtube"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @if (Auth::check() && Auth::id() == $mentor->user->id)
                <div class="text-center mt-3">
                    <a href="{{ route('client.user-profile') }}" class="btn btn-primary">Sửa thông tin</a>
                </div>
            @endif
        </div>
    </div>


    <section class="page-content course-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card overview-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Giới thiệu</h5>
                            <p>{{ $mentor->user->introduce }}</p>
                        </div>
                    </div>
                    <div class="card education-sec">

                        <div class="card-body">
                            <h5 class="subs-title">Trình độ học vấn</h5>
                            @foreach ($mentor->user->educations as $education)
                                <div class="edu-wrap">
                                    <div class="edu-name">
                                        <img src="{{ Storage::url('public/' . $education->thumbnail) }}" alt=""
                                            width="100">
                                    </div>
                                    <div class="edu-detail">
                                        <h6>{{ $education->academic_level }}</h6>
                                        <p class="edu-duration">{{ $education->school }} - {{ $education->time }}</p>
                                        <p>{{ $education->describe }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>


                    <div class="card education-sec">
                        <div class="card-body pb-0">
                            <h5 class="subs-title">Khóa học</h5>
                            <div class="card education-sec">
                                <div class="card-body pb-0">
                                    <h5 class="subs-title">Khóa học</h5>
                                    <div class="row">
                                        @if ($courses->isEmpty())
                                            <div class="col-12">
                                                <p>Chưa có khóa học nào.</p>
                                            </div>
                                        @else
                                            @foreach ($courses as $course)
                                                <div class="col-lg-6 col-md-6 d-flex">
                                                    <div class="course-box course-design d-flex">
                                                        <div class="product">
                                                            <div class="product-img">
                                                                <a href="#">
                                                                    <img src="{{ Storage::url('public/' . $course->thumbnail) }}"
                                                                        alt="Thumbnail" class="img-fluid rounded shadow-sm"
                                                                        style="max-width: 100px;"> </a>

                                                            </div>
                                                            <div class="product-content">
                                                                <div class="course-group d-flex">
                                                                    <div class="course-group-img d-flex">

                                                                        <div class="course-name">
                                                                            <h4><a
                                                                                    href="#">{{ $mentor->user->name }}</a>
                                                                            </h4>
                                                                            <p>Instructor</p>
                                                                        </div>
                                                                        <div class="price">
                                                                            <h3>{{ $course->price }}</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="course-share d-flex align-items-center justify-content-center">
                                                                      
                                                                    </div>
                                                                </div>
                                                                <h3 class="title instructor-text">
                                                                    <a
                                                                        href="{{ route('client.course-details', $course->id) }}">{{ $course->name }}</a>
                                                                </h3>
                                                                <div class="all-btn all-category d-flex align-items-center">
                                                                    <a href="#" class="btn btn-primary">BUY NOW</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card overview-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Tổng quan hồ sơ</h5>
                            <div class="profile-overview-list">
                                <div class="list-grp-blk d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="/assets-client/img/instructor/courses-icon.png" alt="Courses">
                                    </div>
                                    <div class="list-content-blk flex-grow-1 ms-3">
                                        <h5>{{ $totalCourses }}</h5>
                                        <p>Khóa học</p>
                                    </div>
                                </div>
                                <div class="list-grp-blk d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="/assets-client/img/instructor/ttl-stud-icon.png" alt="Total Students">
                                    </div>
                                    <div class="list-content-blk flex-grow-1 ms-3">
                                        <h5>{{ $totalStudents }}</h5>
                                        <p>Tổng học viên</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--                    <div class="card overview-sec"> --}}
                    {{--                        <div class="card-body"> --}}
                    {{--                            <h5 class="subs-title">Contact Details</h5> --}}
                    {{--                            <div class="contact-info-list"> --}}
                    {{--                                <div class="edu-wrap"> --}}
                    {{--                                    <div class="edu-name"> --}}
                    {{--                                        <span><img src="/assets-client/img/instructor/email-icon.png" alt="Address"></span> --}}
                    {{--                                    </div> --}}
                    {{--                                    <div class="edu-detail"> --}}
                    {{--                                        <h6>Email</h6> --}}
                    {{--                                        <p><a href="javascript:void(0);"><span class="__cf_email__" --}}
                    {{--                                                    data-cfemail="ef858a8181969886839c8081af8a978e829f838ac18c8082">[email&#160;protected]</span></a> --}}
                    {{--                                        </p> --}}
                    {{--                                    </div> --}}
                    {{--                                </div> --}}
                    {{--                                <div class="edu-wrap"> --}}
                    {{--                                    <div class="edu-name"> --}}
                    {{--                                        <span><img src="/assets-client/img/instructor/address-icon.png" alt="Address"></span> --}}
                    {{--                                    </div> --}}
                    {{--                                    <div class="edu-detail"> --}}
                    {{--                                        <h6>Address</h6> --}}
                    {{--                                        <p>877 Ferry Street, Huntsville, Alabama</p> --}}
                    {{--                                    </div> --}}
                    {{--                                </div> --}}
                    {{--                                <div class="edu-wrap"> --}}
                    {{--                                    <div class="edu-name"> --}}
                    {{--                                        <span><img src="/assets-client/img/instructor/phone-icon.png" alt="Address"></span> --}}
                    {{--                                    </div> --}}
                    {{--                                    <div class="edu-detail"> --}}
                    {{--                                        <h6>Phone</h6> --}}
                    {{--                                        <p> <a href="javascript:void(0);">+1(452) 125-6789</a></p> --}}
                    {{--                                    </div> --}}
                    {{--                                </div> --}}
                    {{--                            </div> --}}
                    {{--                        </div> --}}
                    {{--                    </div> --}}
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var socialLinks = document.querySelectorAll(".social-link");
                socialLinks.forEach(function(link) {
                    link.addEventListener("click", function(event) {
                        if (!link.href || link.href.trim() === "" || link.href === "#") {
                            event.preventDefault();
                            alert("Trang không tồn tại");
                        }
                    });
                });
            });
        </script>
    </section>

@endsection
