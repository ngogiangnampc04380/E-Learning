@extends('client.layout.master')

@section('content')
    <div class="breadcrumb-bar">
        <div class="container">
        </div>
    </div>
    <div class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instructor-wrap border-bottom-0 m-0">
                        <div class="about-instructor align-items-center">
                            <div class="abt-instructor-img">
                                <a href="instructor-profile.html"><img src="/assets-client/img/user/user1.jpg" alt="img"
                                                                       class="img-fluid"></a>
                            </div>
                            <div class="instructor-detail me-3">
                                <h5><a href="#">
                                        @if($course->mentor)
                                            {{ $course->mentor->name }}
                                        @else
                                            Không tìm thấy mentor
                                        @endif
                                    </a></h5>
                            </div>
                        </div>
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
                            <h5 class="subs-title">Mô tả khóa học</h5>
                            <h6>Giới thiệu về khóa học</h6>
                            <p>{{ $course->description }}</p>
                        </div>
                    </div>
                    <div class="card instructor-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Thông tin giảng viên</h5>
                            <div class="instructor-wrap">
                                <div class="about-instructor">
                                    <div class="abt-instructor-img">
                                        <a href="instructor-profile.html"><img src="/assets-client/img/user/user1.jpg"
                                                                               alt="img" class="img-fluid"></a>
                                    </div>
                                    <div class="instructor-detail">
                                        <h5><a href="#">
                                                @if($course->mentor)
                                                    {{ $course->mentor->name }}
                                                @else
                                                    Không tìm thấy mentor
                                                @endif</a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="course-info d-flex align-items-center">
                                <div class="cou-info">
                                    <img src="/assets-client/img/icon/play.svg" alt>
                                    <p>5 Khóa học</p>
                                </div>
                                <div class="cou-info">
                                    <img src="/assets-client/img/icon/icon-01.svg" alt>
                                    <p>12+ Bài học</p>
                                </div>
                                <div class="cou-info">
                                    <img src="/assets-client/img/icon/icon-02.svg" alt>
                                    <p>9 giờ 30 phút</p>
                                </div>
                                <div class="cou-info">
                                    <img src="/assets-client/img/icon/people.svg" alt>
                                    <p>270,866 học viên đã đăng ký</p>
                                </div>
                            </div>
                            {{$mentor->introduce}}
                        </div>
                    </div>
                    <div class="card comment-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Bình luận</h5>
                            <form>
                                <div class="input-block">
                                    <textarea rows="4" class="form-control" placeholder="Nhập bình luận"></textarea>
                                </div>
                                <div class="submit-section">
                                    <button class="btn submit-btn" type="submit">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-sec py-5">
                        <div class="video-sec vid-bg">
                            <div class="card">
                                <div class="card-body">
                                    @if($course->video_demo)
                                        <div class="video-container">
                                            <video controls class="img-fluid rounded shadow-sm">
                                                <source src="{{ Storage::url('public/assets-client/Videos/Courses/'.$course->video_demo) }}" type="video/mp4">
                                                Trình duyệt của bạn không hỗ trợ thẻ video.
                                            </video>
                                        </div>
                                    @else
                                        <span class="text-muted">Không có video demo</span>
                                    @endif

                                    <div class="video-details mt-3">
                                        <div class="course-fee">
                                            <span>Giá: {{ $course->price }} VNĐ</span>
                                        </div>
                                        <div class="row mt-3 gx-2">
                                            <div class="col-md-6">
                                                <a href="course-wishlist.html" class="btn btn-wish w-100"><i class="feather-heart"></i> Yêu thích</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="javascript:void(0);" class="btn btn-wish w-100"><i class="feather-share-2"></i> Chia sẻ</a>
                                            </div>
                                        </div>
                                        <a href="checkout.html" class="btn btn-enroll w-100 mt-3">Đăng ký ngay</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card feature-sec">
                            <div class="card-body">
                                <div class="cat-title">
                                    <h4>Bao gồm</h4>
                                </div>
                                <ul>
                                    <li><img src="/assets-client/img/icon/users.svg" class="me-2" alt> Đã đăng ký:
                                        <span>{{ $course->enrollment }}</span> học viên
                                    </li>
                                    <li><img src="/assets-client/img/icon/timer.svg" class="me-2" alt> Thời lượng:
                                        <span>{{ $course->total_duration }}</span> giờ
                                    </li>
                                    <li><img src="/assets-client/img/icon/chapter.svg" class="me-2" alt> Chương:
                                        <span>{{ $course->chapters->count() }}</span></li>
                                    <li><img src="/assets-client/img/icon/video.svg" class="me-2" alt> Video:
                                        <span>{{ $course->video_hours }}</span> giờ
                                    </li>
                                    <li><img src="/assets-client/img/icon/chart.svg" class="me-2" alt> Cấp độ:
                                        <span>{{ $course->level }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
