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
                            <img src="{{ $mentor->thumbnail ? Storage::url('assets-client/img/user/' . $mentor->thumbnail) : 'https://cdn-icons-png.flaticon.com/128/9721/9721084.png' }}"   alt class="img-fluid">
                        </a>
                        <h4><a href="javascript:void(0);">{{ $mentor->name }}</a></h4>
                        <p>Giảng viên</p>
                        <ul class="list-unstyled inline-inline profile-info-social">
                            @if($mentor->link_face)
                                    <li class="list-inline-item">
                                    <a href="{{ $mentor->link_face }}" target="_blank">
                                    <i class="fa-brands fa-facebook"></i>
                                    </a>
                                    </li>
                            @endif
                            @if($mentor->link_mail)
                                    <li class="list-inline-item">
                                    <a href="mailto:{{ $mentor->link_mail }}" target="_blank">
                                    <i class="fa-solid fa-envelope"></i>
                                </a>
                            </li>
                             @endif

                            @if($mentor->phone)
                            <li class="list-inline-item">
                            <a href="tel:{{ $mentor->phone }}" target="_blank">
                                    <i class="fa-solid fa-phone"></i>
                                </a>
                            </li>
                    @endif
                    @if($mentor->link_youtube)
                    <li class="list-inline-item">
                    <a href="{{ $mentor->link_youtube}}" target="_blank">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            </li>
                             @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="page-content course-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card overview-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Giới thiệu</h5>
                            <p>{{ $mentor->introduce }}</p>
                            {{-- <p class="mb-0">As a highly skilled and successfull product development and design
                                specialist with more than 4 Years of My experience lies in successfully
                                conceptualizing, designing, and modifying consumer products specific to interior
                                design and home furnishings.</p> --}}
                        </div>
                    </div>

                    
                    <div class="card education-sec">
                        
                        <div class="card-body">
                            <h5 class="subs-title">Trình độ học vấn</h5>
                            @foreach($mentor->educations as $education)
                            <div class="edu-wrap">
                                <div class="edu-name">
                                    <img src="{{ Storage::url('assets-client/img/educations/' . $education->thumbnail) }}" alt="" width="100">
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
                            <h5 class="subs-title">Courses</h5>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 d-flex">
                                    <div class="course-box course-design d-flex ">
                                        <div class="product">
                                            <div class="product-img">
                                                <a href="course-details.html">
                                                    <img class="img-fluid" alt src="/assets-client/img/course/course-10.jpg">
                                                </a>
                                                <div class="price">
                                                    <h3>$300 <span>$99.00</span></h3>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="course-group d-flex">
                                                    <div class="course-group-img d-flex">
                                                        <a href="instructor-profile.html"><img
                                                                src="/assets-client/img/user/user1.jpg" alt class="img-fluid"></a>
                                                        <div class="course-name">
                                                            <h4><a href="instructor-profile.html">Rolands R</a></h4>
                                                            <p>Instructor</p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="course-share d-flex align-items-center justify-content-center">
                                                        <a href="#rate"><i class="fa-regular fa-heart"></i></a>
                                                    </div>
                                                </div>
                                                <h3 class="title instructor-text"><a
                                                        href="course-details.html.html">Information About UI/UX
                                                        Design Degree</a></h3>
                                                <div class="course-info d-flex align-items-center border-0 m-0">
                                                    <div class="rating-img d-flex align-items-center">
                                                        <img src="/assets-client/img/icon/icon-01.svg" alt>
                                                        <p>12+ Lesson</p>
                                                    </div>
                                                    <div class="course-view d-flex align-items-center">
                                                        <img src="/assets-client/img/icon/icon-02.svg" alt>
                                                        <p>9hr 30min</p>
                                                    </div>
                                                </div>
                                                <div class="rating">
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                    <span class="d-inline-block average-rating"><span>4.0</span>
                                                        (15)</span>
                                                </div>
                                                <div class="all-btn all-category d-flex align-items-center">
                                                    <a href="checkout.html" class="btn btn-primary">BUY NOW</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 d-flex">
                                    <div class="course-box course-design d-flex ">
                                        <div class="product">
                                            <div class="product-img">
                                                <a href="course-details.html">
                                                    <img class="img-fluid" alt src="/assets-client/img/course/course-11.jpg">
                                                </a>
                                                <div class="price">
                                                    <h3>$200 <span>$99.00</span></h3>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="course-group d-flex">
                                                    <div class="course-group-img d-flex">
                                                        <a href="instructor-profile.html"><img
                                                                src="/assets-client/img/user/user2.jpg" alt class="img-fluid"></a>
                                                        <div class="course-name">
                                                            <h4><a href="instructor-profile.html">Jenis R.</a></h4>
                                                            <p>Instructor</p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="course-share d-flex align-items-center justify-content-center">
                                                        <a href="#rate"><i class="fa-regular fa-heart"></i></a>
                                                    </div>
                                                </div>
                                                <h3 class="title instructor-text"><a href="course-details.html">Wordpress
                                                        for Beginners - Master
                                                        Wordpress Quickly</a></h3>
                                                <div class="course-info d-flex align-items-center border-0 m-0">
                                                    <div class="rating-img d-flex align-items-center">
                                                        <img src="/assets-client/img/icon/icon-01.svg" alt>
                                                        <p>12+ Lesson</p>
                                                    </div>
                                                    <div class="course-view d-flex align-items-center">
                                                        <img src="/assets-client/img/icon/icon-02.svg" alt>
                                                        <p>9hr 30min</p>
                                                    </div>
                                                </div>
                                                <div class="rating">
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                    <span class="d-inline-block average-rating"><span>4.0</span>
                                                        (15)</span>
                                                </div>
                                                <div class="all-btn all-category d-flex align-items-center">
                                                    <a href="checkout.html" class="btn btn-primary">BUY NOW</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card review-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Reviews</h5>
                            <div class="review-item">
                                <div class="instructor-wrap border-0 m-0">
                                    <div class="about-instructor">
                                        <div class="abt-instructor-img">
                                            <a href="instructor-profile.html">
                                                <img src="/assets-client/img/user/user1.jpg" alt="img" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="instructor-detail">
                                            <h5><a href="instructor-profile.html">Nicole Brown</a></h5>
                                            <p>UX/UI Designer</p>
                                        </div>
                                    </div>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <p class="rev-info">“ This is the second Photoshop course I have completed with
                                    Cristian. Worth every penny and recommend it highly. To get the most out of this
                                    course, its best to to take the Beginner to Advanced course first. The sound and
                                    video quality is of a good standard. Thank you Cristian. “</p>
                                <a href="javascript:void(0);" class="btn btn-reply"><i
                                        class="feather-corner-up-left"></i> Reply</a>
                            </div>
                            <div class="review-item">
                                <div class="instructor-wrap border-0 m-0">
                                    <div class="about-instructor">
                                        <div class="abt-instructor-img">
                                            <a href="instructor-profile.html">
                                                <img src="/assets-client/img/user/user1.jpg" alt="img" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="instructor-detail">
                                            <h5><a href="instructor-profile.html">Nicole Brown</a></h5>
                                            <p>UX/UI Designer</p>
                                        </div>
                                    </div>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <p class="rev-info">“ This is the second Photoshop course I have completed with
                                    Cristian. Worth every penny and recommend it highly. To get the most out of this
                                    course, its best to to take the Beginner to Advanced course first. The sound and
                                    video quality is of a good standard. Thank you Cristian. “</p>
                                <a href="javascript:void(0);" class="btn btn-reply"><i
                                        class="feather-corner-up-left"></i> Reply</a>
                            </div>
                            <div class="review-item">
                                <div class="instructor-wrap border-0 m-0">
                                    <div class="about-instructor">
                                        <div class="abt-instructor-img">
                                            <a href="instructor-profile.html">
                                                <img src="/assets-client/img/user/user1.jpg" alt="img" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="instructor-detail">
                                            <h5><a href="instructor-profile.html">Nicole Brown</a></h5>
                                            <p>UX/UI Designer</p>
                                        </div>
                                    </div>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <p class="rev-info">“ This is the second Photoshop course I have completed with
                                    Cristian. Worth every penny and recommend it highly. To get the most out of this
                                    course, its best to to take the Beginner to Advanced course first. The sound and
                                    video quality is of a good standard. Thank you Cristian. “</p>
                                <a href="javascript:void(0);" class="btn btn-reply"><i
                                        class="feather-corner-up-left"></i> Reply</a>
                            </div>
                        </div>
                    </div>


                    <div class="card comment-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Add a review</h5>
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <input type="text" class="form-control" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-block">
                                    <input type="email" class="form-control" placeholder="Subject">
                                </div>
                                <div class="input-block">
                                    <textarea rows="4" class="form-control" placeholder="Your Comments"></textarea>
                                </div>
                                <div class="submit-section">
                                    <button class="btn submit-btn" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">

                    <div class="card overview-sec">
                        <div class="card-body overview-sec-body">
                            <h5 class="subs-title">Professional Skills</h5>
                            <div class="sidebar-tag-labels">
                                <ul class="list-unstyled">
                                    <li><a href="javascript:void(0);" class>User Interface Design</a></li>
                                    <li><a href="javascript:void(0);">Web Development</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">UI Design</a></li>
                                    <li><a href="javascript:void(0);">Mobile App Design</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="card overview-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Profile Overview</h5>
                            <div class="rating-grp">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating"><span>4.0</span> (15)</span>
                                </div>
                                <div class="course-share d-flex align-items-center justify-content-center">
                                    <a href="#rate"><i class="fa-regular fa-heart"></i></a>
                                </div>
                            </div>
                            <div class="profile-overview-list">
                                <div class="list-grp-blk d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="/assets-client/img/instructor/courses-icon.png" alt="Courses">
                                    </div>
                                    <div class="list-content-blk flex-grow-1 ms-3">
                                        <h5>32</h5>
                                        <p>Courses</p>
                                    </div>
                                </div>
                                <div class="list-grp-blk d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="/assets-client/img/instructor/ttl-stud-icon.png" alt="Total Students">
                                    </div>
                                    <div class="list-content-blk flex-grow-1 ms-3">
                                        <h5>11,604</h5>
                                        <p>Total Students</p>
                                    </div>
                                </div>
                                <div class="list-grp-blk d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="/assets-client/img/instructor/review-icon.png" alt="Reviews">
                                    </div>
                                    <div class="list-content-blk flex-grow-1 ms-3">
                                        <h5>12,230</h5>
                                        <p>Reviews</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card overview-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Contact Details</h5>
                            <div class="contact-info-list">
                                <div class="edu-wrap">
                                    <div class="edu-name">
                                        <span><img src="/assets-client/img/instructor/email-icon.png" alt="Address"></span>
                                    </div>
                                    <div class="edu-detail">
                                        <h6>Email</h6>
                                        <p><a href="javascript:void(0);"><span class="__cf_email__"
                                                    data-cfemail="ef858a8181969886839c8081af8a978e829f838ac18c8082">[email&#160;protected]</span></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="edu-wrap">
                                    <div class="edu-name">
                                        <span><img src="/assets-client/img/instructor/address-icon.png" alt="Address"></span>
                                    </div>
                                    <div class="edu-detail">
                                        <h6>Address</h6>
                                        <p>877 Ferry Street, Huntsville, Alabama</p>
                                    </div>
                                </div>
                                <div class="edu-wrap">
                                    <div class="edu-name">
                                        <span><img src="/assets-client/img/instructor/phone-icon.png" alt="Address"></span>
                                    </div>
                                    <div class="edu-detail">
                                        <h6>Phone</h6>
                                        <p> <a href="javascript:void(0);">+1(452) 125-6789</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
