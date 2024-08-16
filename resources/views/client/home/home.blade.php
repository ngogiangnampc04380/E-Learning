@extends('client.layout.master')
@section('content')
    @if ($message = Session::get('success'))
        @include('components.message', ['message' => $message, 'type' => 'success'])
    @endif

    <section class="home-three-slide d-flex align-items-center">

        <div class="container">

            <div class="row ">
                <div class="col-xl-6 col-lg-8 col-md-12 col-12" data-aos="fade-down">
                    <div class="home-three-slide-face">
                        <div class="home-three-slide-text">
                            <h5>Người dẫn đầu trong học tập trực tuyến
                            </h5>
                            <h1>Hấp dẫn <span>&</span> Các khóa học trực tuyến có thể truy cập cho tất cả mọi người</h1>
                        </div>
                        <div class="banner-three-content">
                            <form class="form" id="searchForm" method="GET">
                                <div class="form-inner-three">
                                    <div class="input-group">
                                        <input type="text" name="query" class="form-control"
                                            placeholder="Tìm kiếm Giảng viên, khóa học trực tuyến, v.v."
                                            value="{{ request()->query('query') }}">
                                        <span class="drop-detail-three">
                                            <select name="type" class="form-three-select select"
                                                onchange="updateFormAction()">
                                                <option value="course"
                                                    {{ request()->query('type') == 'course' ? 'selected' : '' }}>Khóa học
                                                </option>
                                                <option value="mentor"
                                                    {{ request()->query('type') == 'mentor' ? 'selected' : '' }}>Giảng viên
                                                </option>
                                            </select>
                                        </span>
                                        <button class="btn btn-three-primary sub-btn" type="submit"><i
                                                class="fas fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                    <div class="col-xl-6 col-lg-4 col-md-6 col-12" data-aos="fade-up">
                        <div class="girl-slide-img aos">

                        </div>
                    </div>
                </div>
            </div>
    </section>


    <section class="section student-course home-three-course">
        <div class="container">
            <div class="course-widget-three">
                <div class="row">
                    <div class="col-lg-3 col-md-6 d-flex" data-aos="fade-up">
                        <div class="course-details-three">
                            <div class="align-items-center">
                                <div class="course-count-three course-count ms-0">
                                    <div class="course-img">
                                        <img class="img-fluid" src="/assets-client/img/icon-three/course-01.svg" alt>
                                    </div>
                                    <div class="course-content-three">
                                        <h4 class="text-blue"><span>{{ $courseCount }}</span></h4>
                                        <p>Khóa học trực tuyến</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex" data-aos="fade-up">
                        <div class="course-details-three">
                            <div class="align-items-center">
                                <div class="course-count-three course-count ms-0">
                                    <div class="course-img">
                                        <img class="img-fluid" src="/assets-client/img/icon-three/course-02.svg" alt>
                                    </div>
                                    <div class="course-content-three">
                                        <h4 class="text-yellow"><span class="counterUp">{{ $mentorCounts }}</span> </h4>
                                        <p>Người dùng</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex" data-aos="fade-up">
                        <div class="course-details-three">
                            <div class="align-items-center">
                                <div class="course-count-three course-count ms-0">
                                    <div class="course-img">
                                        <img class="img-fluid" src="/assets-client/img/icon-three/course-03.svg" alt>
                                    </div>
                                    <div class="course-content-three">
                                        <h4 class="text-info"><span class="counterUp">6</span> triệu +</h4>
                                        <p>Chứng chỉ đã cấp</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex" data-aos="fade-up">
                        <div class="course-details-three mb-0">
                            <div class="align-items-center">
                                <div class="course-count-three">
                                    <div class="course-img">
                                        <img class="img-fluid" src="/assets-client/img/icon-three/course-04.svg" alt>
                                    </div>
                                    <div class="course-content-three course-count ms-0">
                                        <h4 class="text-green"><span class="counterUp">{{ $mentorCount }}</span></h4>
                                        <p>Giảng viên</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="master-skill-three">
        <div class="master-three-vector">
            <img class="ellipse-right img-fluid" src="/assets-client/img/bg/pattern-01.png" alt>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12" data-aos="fade-right">
                    <div class="master-three-images">
                        <div class="master-three-left">
                            <img class="img-fluid" src="/assets-client/img/students/career.png" alt="image-banner"
                                title="image-banner">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12" data-aos="fade-left">
                    <div class="home-three-head" data-aos="fade-up">
                        <h2>Nắm vững các kỹ năng để thúc đẩy sự nghiệp của bạn</h2>
                    </div>
                    <div class="home-three-content" data-aos="fade-up">
                        <p>Nhận chứng chỉ, nắm vững các kỹ năng công nghệ hiện đại và thăng tiến trong sự nghiệp của bạn cho
                            dù bạn là người mới bắt đầu hay một chuyên gia dày dạn kinh nghiệm. 95% người học eLearning cho
                            biết nội dung thực hành của chúng tôi đã trực tiếp giúp ích cho sự nghiệp của họ.</p>
                    </div>
                    <div class="skils-group">
                        <div class="row">
                            <div class="col-lg-6 col-xs-12 col-sm-6" data-aos="fade-down">
                                <div class="skils-icon-item">
                                    <div class="skils-icon">
                                        <img class="img-fluid" src="/assets-client/img/icon-three/career-01.svg"
                                            alt="certified">
                                    </div>
                                    <div class="skils-content">
                                        <p class="mb-0">Được chứng nhận với hơn 100 khóa học cấp chứng chỉ.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-12 col-sm-6" data-aos="fade-up">
                                <div class="skils-icon-item">
                                    <div class="skils-icon">
                                        <img class="img-fluid" src="/assets-client/img/icon-three/career-02.svg"
                                            alt="Build skills">
                                    </div>
                                    <div class="skils-content">
                                        <p class="mb-0">Xây dựng kỹ năng theo cách của bạn, từ cơ bản đến nâng cao.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-12 col-sm-6" data-aos="fade-right">
                                <div class="skils-icon-item">
                                    <div class="skils-icon">
                                        <img class="img-fluid" src="/assets-client/img/icon-three/career-03.svg"
                                            alt="Stay Motivated">
                                    </div>
                                    <div class="skils-content">
                                        <p class="mb-0">Luôn có động lực với những người giảng viên hấp dẫn</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-12 col-sm-6" data-aos="fade-left">
                                <div class="skils-icon-item">
                                    <div class="skils-icon">
                                        <img class="img-fluid" src="/assets-client/img/icon-three/career-04.svg"
                                            alt="latest cloud">
                                    </div>
                                    <div class="skils-content">
                                        <p class="mb-0">Luôn cập nhật thông tin mới nhất</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="home-three-courses">
        <div class="container">
            <div class="favourite-course-sec">
                <div class="row">
                    <div class="home-three-head section-header-title" data-aos="fade-up">
                        <div class="row align-items-center d-flex justify-content-between">
                            <div class="col-lg-6 col-sm-8">
                                <h2>Khóa học</h2>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="see-all">
                                    <a href="{{ route('client.course-lists') }}">Xem tất cả<span class="see-all-icon"><i
                                                class="fas fa-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="all-corses-main">
                        <div class="tab-content">
                            <div class="nav tablist-three" role="tablist">
                                <a class="nav-tab active me-3" data-bs-toggle="tab" href="#alltab" role="tab">Tất
                                    cả</a>
                                @foreach ($categories as $category)
                                    <a class="nav-tab me-3" data-bs-toggle="tab" href="#category{{ $category->id }}"
                                        role="tab">{{ $category->name }}</a>
                                @endforeach
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="alltab" role="tabpanel">
                                    <div class="all-course">
                                        <div class="row">
                                            @foreach ($courses as $course)
                                                <div class="col-xl-3 col-lg-6 col-md-6 col-12" data-aos="fade-up">
                                                    <div class="course-box-three">
                                                        <div class="course-three-item">
                                                            <div class="course-three-img">
                                                                <a
                                                                    href="{{ route('client.course-details', $course->id) }}">
                                                                    <img class="img-fluid" alt="Course Image"
                                                                        src="{{ Storage::url('public/assets-client/img/Courses/' . $course->thumbnail) }}">
                                                                </a>
                                                                <div class="heart-three">
                                                                    <a href="#"><i
                                                                            class="fa-regular fa-heart"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="course-three-content">
                                                                <a
                                                                    href="{{ route('client.course-details', $course->id) }}">
                                                                    <h4 class="title instructor-text">
                                                                        {{ Str::limit($course->name, 40, '...') }}
                                                                    </h4>
                                                                </a>

                                                                <div class="mentor-info d-flex align-items-center mt-2">
                                                                    <a
                                                                        href="{{ route('client.mentor_detail', $course->mentor->user->id) }}">
                                                                        <img class="mentor-img img-fluid rounded-circle"
                                                                            alt="Mentor Image"
                                                                            src="{{ $course->mentor->user->thumbnail ? Storage::url('assets-client/img/user/' . $course->mentor->user->thumbnail) : 'https://cdn-icons-png.flaticon.com/128/9721/9721084.png' }}"
                                                                            style="width: 40px; height: 40px;">
                                                                    </a>
                                                                    <div class="mentor-name ms-2">
                                                                        <a
                                                                            href="{{ route('client.mentor_detail', $course->mentor->user->id) }}">
                                                                            <h5>{{ $course->mentor->user->name }}</h5>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="price-three-group d-flex align-items-center justify-content-between mt-3">
                                                                    <div class="course-price-three">
                                                                        <h3>{{ number_format($course->price) }} VNĐ
                                                                            <span>{{ number_format($course->discount_price) }}
                                                                                VNĐ</span></h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                                @foreach ($categories as $category)
                                    <div class="tab-pane fade" id="category{{ $category->id }}" role="tabpanel">
                                        <div class="all-course">
                                            <div class="row">
                                                @if ($coursesByCategory[$category->id]->isEmpty())
                                                    <p>Hiện chưa có khóa học nào trong danh mục này.</p>
                                                @else
                                                    @foreach ($coursesByCategory[$category->id] as $course)
                                                        <div class="col-xl-3 col-lg-6 col-md-6 col-12" data-aos="fade-up">
                                                            <div class="course-box-three">
                                                                <div class="course-three-item">
                                                                    <div class="course-three-img">
                                                                        <a
                                                                            href="{{ route('client.course-details', $course->id) }}">
                                                                            <img class="img-fluid" alt="Course Image"
                                                                                src="{{ Storage::url('public/assets-client/img/Courses/' . $course->thumbnail) }}">
                                                                        </a>
                                                                        <div class="heart-three">
                                                                            <a href="#"><i
                                                                                    class="fa-regular fa-heart"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="course-three-content">
                                                                        <a
                                                                            href="{{ route('client.course-details', $course->id) }}">
                                                                            <h4 class="title instructor-text">
                                                                                {{ Str::limit($course->name, 40, '...') }}
                                                                            </h4>
                                                                        </a>

                                                                        <div
                                                                            class="mentor-info d-flex align-items-center mt-2">
                                                                            <a
                                                                                href="{{ route('client.mentor_detail', $course->mentor->user->id) }}">
                                                                                <img class="mentor-img img-fluid rounded-circle"
                                                                                    alt="Mentor Image"
                                                                                    src="{{ $course->mentor->user->thumbnail ? Storage::url('assets-client/img/user/' . $course->mentor->user->thumbnail) : 'https://cdn-icons-png.flaticon.com/128/9721/9721084.png' }}"
                                                                                    style="width: 40px; height: 40px;">
                                                                            </a>
                                                                            <div class="mentor-name ms-2">
                                                                                <a
                                                                                    href="{{ route('client.mentor_detail', $course->mentor->user->id) }}">
                                                                                    <h5>{{ $course->mentor->user->name }}
                                                                                    </h5>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="price-three-group d-flex align-items-center justify-content-between mt-3">
                                                                            <div class="course-price-three">
                                                                                <h3>{{ number_format($course->price) }} VNĐ
                                                                                    <span>{{ number_format($course->discount_price) }}
                                                                                        VNĐ</span></h3>
                                                                            </div>
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
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="latest-blog-three">
        <div class="container">
            <div class="home-three-head section-header-title" data-aos="fade-up">
                <div class="row align-items-center d-flex justify-content-between">
                    <div class="col-lg-6 col-md-8">
                        <h2>Tin tức và sự kiện</h2>
                    </div>
                    <div class="col-lg-6 col-md-4">

                    </div>
                </div>
            </div>
            <div class="latest-blog-main">
                <div class="row">
                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-md-12" data-aos="fade-down">
                                <div class="event-blog-three blog-three-one">
                                    <div class="blog-img-three">
                                        <a href="blog-list.html">
                                            <img style="width: 100%; margin-bottom: 10%;margin-top: 10%;"
                                                class="img-fluid" alt src="/assets-client/img/blog/posts.gif">
                                        </a>
                                    </div>
                                    <div class="latest-blog-content">
                                        <div class="event-three-title">
                                            <div class="event-span-three">
                                                <a href="{{ route('client.post-list') }}"><span
                                                        class="span-name-three badge-green">XEM NGAY </span></a>
                                            </div>
                                            <a href="blog-list.html">
                                                <h5>Tin tức hot mỗi ngày</h5>
                                                <p>Tin tức hot mỗi ngày của ENT</p>
                                            </a>
                                            <div class="blog-student-count">
                                                <i class="fa-solid fa-calendar-days"></i>
                                                <span class="current-date"></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" data-aos="fade-down">
                                <div class="event-blog-three blog-three-two">
                                    <div class="blog-img-three">
                                        <a href="blog-list.html">
                                            <img style="width: 100%; margin-bottom: 10%;margin-top: 10%;"
                                                class="img-fluid" alt src="/assets-client/img/blog/teacher.gif">
                                        </a>
                                    </div>
                                    <div class="latest-blog-content">
                                        <div class="event-three-title">
                                            <div class="event-span-three">
                                                <span class="span-name-three badge-info">Xem ngay</span>
                                            </div>
                                            <a href="blog-list.html">
                                                <h5>Các giảng viên trình độ chuyên môn và tiềm năng</h5>
                                                <p>Giảng viên</p>
                                            </a>
                                            <div class="blog-student-count">
                                                <i class="fa-solid fa-calendar-days"></i>
                                                <span class="current-date"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-md-12" data-aos="fade-down">
                                <div class="event-blog-three blog-three-three">
                                    <div class="blog-img-three">
                                        <a href="blog-list.html">
                                            <img class="img-fluid" alt src="/assets-client/img/blog/voucher.gif">
                                        </a>
                                    </div>
                                    <div class="latest-blog-content">
                                        <div class="event-three-title">
                                            <div class="event-span-three">
                                                <a href=""><span class="span-name-three badge-info">Sử dụng
                                                        ngay</span></a>
                                            </div>
                                            <a href="blog-list.html">
                                                <h5>Voucher siêu ưu đãi giành cho học viên</h5>

                                            </a>
                                            <div class="blog-student-count">
                                                <i class="fa-solid fa-calendar-days"></i>
                                                <span class="current-date"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" data-aos="fade-down">
                                <div class="event-blog-three blog-three-four">
                                    <div class="blog-img-three">
                                        <a href="blog-list.html">
                                            <img class="img-fluid" alt src="/assets-client/img/blog/Contact.gif">
                                        </a>
                                    </div>
                                    <div class="latest-blog-content">
                                        <div class="event-three-title">
                                            <div class="event-span-three">
                                                <span class="span-name-three badge-info">Liên hệ giải đáp</span>
                                            </div>
                                            <a href="blog-list.html">
                                                <h5>Giải đáp thắc mắc của người dùng nhanh chóng</h5>
                                                <p>Liên hệ với chúng tôi</p>
                                            </a>
                                            <div class="blog-student-count">
                                                <i class="fa-solid fa-calendar-days"></i>
                                                <span class="current-date"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" data-aos="fade-down">
                                <div class="event-blog-three blog-three-five">
                                    <div class="blog-img-three">
                                        <a href="blog-list.html">
                                            <img class="img-fluid" alt src="/assets-client/img/blog/ent.gif">
                                        </a>
                                    </div>
                                    <div class="latest-blog-content">
                                        <div class="event-three-title">
                                            <div class="event-span-three">
                                                <a href=""><span class="span-name-three badge-yellow">Thông
                                                        tin</span></a>
                                            </div>
                                            <a href="blog-list.html">
                                                <h5>Giới thiệu về ENT</h5>
                                                <p>Về chúng tôi</p>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Hàm để định dạng ngày tháng theo tiếng Việt
        function formatDate(date) {
            const options = {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            };
            return date.toLocaleDateString('vi-VN', options);
        }

        // Lấy ngày hiện tại
        const today = new Date();
        const formattedDate = formatDate(today);

        // Cập nhật nội dung ngày tháng cho tất cả các phần tử có lớp 'current-date'
        document.querySelectorAll('.current-date').forEach(element => {
            element.textContent = formattedDate;
        });
    </script>
    <script>
        function updateFormAction() {
            const form = document.getElementById('searchForm');
            const typeSelect = form.querySelector('select[name="type"]');
            const selectedType = typeSelect.value;

            if (selectedType === 'course') {
                form.action = "{{ route('client.course-lists') }}";
            } else if (selectedType === 'mentor') {
                form.action = "{{ route('client.instructor-list') }}";
            }
        }

        // Gọi hàm khi trang được tải để đảm bảo hành động được thiết lập chính xác
        document.addEventListener('DOMContentLoaded', updateFormAction);
    </script>
@endsection
