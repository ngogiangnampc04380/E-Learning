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
                                <a href="instructor-profile.html"><img src="/assets-client/img/user/user1.jpg" alt="img" class="img-fluid"></a>
                            </div>
                            <div class="instructor-detail me-3">
                                <h5><a href="#">Nicole Brown</a></h5>
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
                            <p>Đây là một khóa học từ vựng tiếng Anh, tập trung vào việc xây dựng kỹ năng sử dụng từ vựng trong các tình huống giao tiếp và viết lách hàng ngày.</p>
                            <p>Khóa học này cung cấp cho bạn kiến thức và kỹ năng cần thiết để nâng cao vốn từ vựng tiếng Anh của mình.</p>
                        </div>
                    </div>
                    <div class="card instructor-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Thông tin giảng viên</h5>
                            <div class="instructor-wrap">
                                <div class="about-instructor">
                                    <div class="abt-instructor-img">
                                        <a href="instructor-profile.html"><img src="/assets-client/img/user/user1.jpg" alt="img" class="img-fluid"></a>
                                    </div>
                                    <div class="instructor-detail">
                                        <h5><a href="instructor-profile.html">Nicole Brown</a></h5>
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
                            <p>Thiết kế UX/UI, có hơn 7 năm kinh nghiệm. Cam kết mang lại công việc chất lượng cao.</p>
                            <p>Kỹ năng: Thiết kế Web, Thiết kế UI, Thiết kế UX/UI, Thiết kế Mobile, Thiết kế Giao diện người dùng, Sketch,
                                Photoshop, GUI, Html, Css, Hệ thống lưới, Typography, Minimal, Template, Tiếng Anh, Bootstrap, Thiết kế Web Responsive, Pixel Perfect, Thiết kế Đồ họa, Corporate, Sáng tạo, Flat, Luxury và nhiều hơn nữa.</p>
                            <p>Có sẵn cho:</p>
                            <ul>
                                <li>1. Làm việc toàn thời gian tại văn phòng</li>
                                <li>2. Làm việc từ xa</li>
                                <li>3. Làm Freelance</li>
                                <li>4. Hợp đồng</li>
                                <li>5. Trên toàn thế giới</li>
                            </ul>
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
                                    <a href="https://www.youtube.com/embed/1trvO6dqQUI" class="video-thumbnail" data-fancybox>
                                        <div class="play-icon">
                                            <i class="fa-solid fa-play"></i>
                                        </div>
                                        <img src="/assets-client/img/video.jpg" alt="">
                                    </a>
                                    <div class="video-details">
                                        <div class="course-fee">
                                            <span>Giá: 200000</span>
                                        </div>
                                        <div class="row gx-2">
                                            <div class="col-md-6">
                                                <a href="course-wishlist.html" class="btn btn-wish w-100"><i class="feather-heart"></i> Yêu thích</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="javascript:void(0);" class="btn btn-wish w-100"><i class="feather-share-2"></i> Chia sẻ</a>
                                            </div>
                                        </div>
                                        <a href="checkout.html" class="btn btn-enroll w-100">Đăng ký ngay</a>
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
                                    <li><img src="/assets-client/img/icon/users.svg" class="me-2" alt> Đã đăng ký: <span>32 học viên</span></li>
                                    <li><img src="/assets-client/img/icon/timer.svg" class="me-2" alt> Thời lượng: <span>20 giờ</span></li>
                                    <li><img src="/assets-client/img/icon/chapter.svg" class="me-2" alt> Chương: <span>15</span></li>
                                    <li><img src="/assets-client/img/icon/video.svg" class="me-2" alt> Video: <span>12 giờ</span></li>
                                    <li><img src="/assets-client/img/icon/chart.svg" class="me-2" alt> Cấp độ: <span>Cơ bản</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
