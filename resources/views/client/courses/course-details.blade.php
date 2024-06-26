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
                            <h5><a href="#">Nicole Brown</a></h5>
                            <p>UX/UI Designer</p>
                        </div>
                        <div class="rating mb-0">
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                            <span class="d-inline-block average-rating"><span>4.5</span> (15)</span>
                        </div>
                    </div>
                </div>
                <div class="course-info d-flex align-items-center border-bottom-0 m-0 p-0">
                    <div class="cou-info">
                        <img src="/assets-client/img/icon/icon-01.svg" alt="">
                        <p>12+ Bài học</p>
                    </div>
                    <div class="cou-info">
                        <img src="/assets-client/img/icon/timer-icon.svg" alt="">
                        <p>9 giờ 30 phút</p>
                    </div>
                    <div class="cou-info">
                        <img src="/assets-client/img/icon/people.svg" alt="">
                        <p>32 học viên đã tham gia</p>
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
                        <h6>Nội dung học</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li>Mở rộng vốn từ vựng tiếng Anh của bạn.</li>
                                    <li>Bạn sẽ có thể thêm kỹ năng từ vựng vào CV của mình.</li>
                                    <li>Hiểu và sử dụng từ vựng trong các ngữ cảnh khác nhau.</li>
                                    <li>Phát triển kỹ năng nghe và đọc hiểu tiếng Anh.</li>
                                    <li>Phát triển kỹ năng viết và giao tiếp bằng tiếng Anh.</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li>Học cách sử dụng từ vựng trong giao tiếp hàng ngày.</li>
                                    <li>Bạn sẽ học cách sử dụng từ vựng phù hợp với ngữ cảnh.</li>
                                    <li>Thực hành từ vựng thông qua các bài tập và trò chơi.</li>
                                    <li>Áp dụng từ vựng vào các tình huống thực tế.</li>
                                    <li>Học các kỹ thuật ghi nhớ từ vựng hiệu quả.</li>
                                </ul>
                            </div>
                        </div>
                        <h6>Yêu cầu</h6>
                        <ul class="mb-0">
                            <li>Có kết nối internet để truy cập tài liệu và bài tập.</li>
                            <li>Không cần kinh nghiệm học tiếng Anh trước đó.</li>
                            <li class="mb-0">Tinh thần học hỏi và kiên trì.</li>
                        </ul>
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
                                    <p>Thiết kế UX/UI</p>
                                </div>
                            </div>
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i>
                                <span class="d-inline-block average-rating">Đánh giá giảng viên: 4.5 sao</span>
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
                <div class="card review-sec">
                    <div class="card-body">
                        <h5 class="subs-title">Đánh giá</h5>
                        <div class="instructor-wrap">
                            <div class="about-instructor">
                                <div class="abt-instructor-img">
                                    <a href="instructor-profile.html"><img src="/assets-client/img/user/user1.jpg"
                                                                           alt="img" class="img-fluid"></a>
                                </div>
                                <div class="instructor-detail">
                                    <h5><a href="instructor-profile.html">Nicole Brown</a></h5>
                                    <p>Thiết kế UX/UI</p>
                                </div>
                            </div>
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i>
                                <span class="d-inline-block average-rating">Đánh giá giảng viên: 4.5 sao</span>
                            </div>
                        </div>
                        <p class="rev-info">“ Đây là khóa học Photoshop thứ hai mà tôi đã hoàn thành với Cristian. Đáng đồng tiền
                            bát gạo và tôi rất đề nghị nó. Để có được nhiều nhất từ khóa học này, tốt nhất là nên học khóa từ cơ bản
                            đến nâng cao trước. Chất lượng âm thanh và video đều tốt. Cảm ơn Cristian nhiều. “</p>
                        <a href="javascript:void(0);" class="btn btn-reply"><i class="feather-corner-up-left"></i> Trả lời</a>
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
                <div class="sidebar-sec">

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
                                        <h2>MIỄN PHÍ</h2>
                                        <p><span>$99.00</span> Giảm 50%</p>
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
