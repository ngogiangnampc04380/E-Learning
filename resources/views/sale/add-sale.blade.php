@extends('client.layout.master')

@section('content')
    <style>
        /* Phong cách cho dropdown */
        .custom-dropdown {
            position: relative;
            width: 100%;
            max-width: 400px;
            margin-top: 10px;
        }

        .custom-dropdown .dropdown-display {
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            background-color: #f8f9fa;
            transition: border-color 0.3s ease;
        }

        .custom-dropdown .dropdown-display:hover {
            border-color: #007bff;
        }

        .custom-dropdown .dropdown-options {
            display: none;
            position: absolute;
            width: 100%;
            border: 1px solid #ccc;
            background: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
            margin-top: 5px;
            padding: 10px 0;
            transition: opacity 0.3s ease;
        }

        .custom-dropdown .dropdown-options.active {
            display: block;
            opacity: 1;
        }

        .custom-dropdown .dropdown-options label {
            display: block;
            padding: 8px 15px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .custom-dropdown .dropdown-options label:hover {
            background-color: #f0f0f0;
        }

        .custom-dropdown .dropdown-options input {
            margin-right: 10px;
        }

        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 0.875em;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                <div class="settings-widget dash-profile">
                    <div class="settings-menu p-0">
                        <div class="profile-bg">
                            @if(auth()->user()->role == 0)
                                <h5 class="text-muted mb-0">Học viên</h5>
                            @elseif(auth()->user()->role == 1)
                                <h5 class="text-muted mb-0">Quản trị viên</h5>
                            @elseif(auth()->user()->role == 2)
                                <h5 class="text-muted mb-0">Giảng viên</h5>
                            @endif
                            <img src="/assets-client/img/instructor-profile-bg.jpg" alt="">
                            <div class="profile-img">
                                <a href="">
                                    <img
                                        src="{{ auth()->user()->thumbnail ? Storage::url('assets-client/img/user/' . auth()->user()->thumbnail) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU' }}"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <div class="profile-group">
                            <div class="profile-name text-center">
                                <h4><a href="">{{auth()->user()-> name}}</a></h4>
                                @if(auth()->user()->role == 0)
                                    <p class="text-muted mb-0">Học viên</p>
                                @elseif(auth()->user()->role == 1)
                                    <p class="text-muted mb-0">Quản trị viên</p>
                                @elseif(auth()->user()->role == 2)
                                    <p class="text-muted mb-0">Giảng viên</p>
                                @endif
                            </div>
                            @if(auth()->user()->role == 2)
                                <div class="go-dashboard text-center">
                                    <a href="{{ route('client.create-course') }}" class="btn btn-primary">THÊM KHÓA HỌC MỚI</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="settings-menu">
                    <h3>Thông tin tài khoản</h3>
                    <ul>
                        <li class="nav-item {{ request()->routeIs('client.dashboard-profile') ? 'active' : '' }}">
                            <a href="{{ route('client.dashboard-profile') }}" class="nav-link">
                                <i class="feather-home"></i> Dữ liệu và thống kê
                            </a>
                        </li>
                        @if(in_array(auth()->user()->role, [0, 2]))
                            <li class="nav-item {{ request()->is('instructor-course') ? 'active' : '' }}">
                                <a href="instructor-course.html" class="nav-link">
                                    <i class="feather-shopping-bag"></i> Khóa học của tôi
                                </a>
                            </li>
                        @endif
                        @if(auth()->user()->role == 2)
                            <li class="nav-item {{ request()->routeIs('client.instructor-course') ? 'active' : '' }}">
                                <a href="{{ route('client.instructor-course',auth()->user()->id) }}" class="nav-link">
                                    <i class="feather-book"></i> Quản lí khóa học
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('instructor-student-grid.html') ? 'active' : '' }}">
                                <a href="instructor-student-grid.html" class="nav-link">
                                    <i class="feather-users"></i> Quản lí học viên
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('instructor-earnings.html') ? 'active' : '' }}">
                                <a href="instructor-earnings.html" class="nav-link">
                                    <i class="feather-pie-chart"></i> Nam Béo
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('instructor-orders.html') ? 'active' : '' }}">
                                <a href="instructor-orders.html" class="nav-link">
                                    <i class="feather-shopping-bag"></i> Nam Béo
                                </a>
                            </li>
                        @endif
                        <div class="instructor-title">
                            <h3>Cài đặt tài khoản</h3>
                        </div>
                        <li class="nav-item {{ request()->routeIs('client.user-profile') ? 'active' : '' }}">
                            <a href="{{ route('client.user-profile') }}" class="nav-link">
                                <i class="feather-settings"></i> Thông tin cá nhân
                            </a>
                        </li>
                        @if(auth()->user()->role == 1)
                            <div class="instructor-title">
                                <h3>Quản trị viên</h3>
                            </div>
                            <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                                <a href="/admin" class="nav-link">
                                    <i class="feather-cpu"></i> Quản trị website
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('client.reset-password') }}" class="nav-link">
                                <i class="feather-log-out"></i> Đổi mật khẩu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="feather-log-out"></i> Đăng xuất
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('client.disable-account-form') }}" class="nav-link">
                                <i class="feather-user-x"></i> Vô hiệu hóa tài khoản
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12 my-5">
                <form action="{{route('sale.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="discount_title" class="form-label">Tiêu đề mã giảm giá</label>
                        <input type="text" class="form-control" id="discount_title" name="discount_title">
                        <div class="invalid-feedback" id="errorDiscountTitle"></div>
                    </div>

                    <div class="mb-3">
                        <label for="course_id" class="form-label">Chọn các khóa học giảm giá</label>
                        <div class="custom-dropdown">
                            <div class="dropdown-display" id="dropdownDisplay">Chọn khóa học</div>
                            <div class="dropdown-options" id="dropdownOptions">
                                @foreach($courses as $course)
                                    <label>
                                        <input type="checkbox" name="courses[]" value="{{ $course->id }}"> {{ $course->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="invalid-feedback" id="errorCourses"></div>
                    </div>

                    <div class="mb-3">
                        <label for="discount_percent" class="form-label">% Giảm giá</label>
                        <input type="number" class="form-control" id="discount_percent" name="discount_percent" step="0.01">
                        <div class="invalid-feedback" id="errorDiscountPercent"></div>
                    </div>

                    <div class="mb-3">
                        <label for="discount_code" class="form-label">Mã giảm giá</label>
                        <input type="text" class="form-control" id="discount_code" name="discount_code">
                        <div class="invalid-feedback" id="errorDiscountCode"></div>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" id="quantity" name="quantity">
                        <div class="invalid-feedback" id="errorQuantity"></div>
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Ngày bắt đầu</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                        <div class="invalid-feedback" id="errorStartDate"></div>
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">Ngày kết thúc</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                        <div class="invalid-feedback" id="errorEndDate"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mã giảm giá</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Lấy các phần tử
        const dropdownDisplay = document.getElementById('dropdownDisplay');
        const dropdownOptions = document.getElementById('dropdownOptions');

        // Toggle hiển thị/ẩn danh sách tùy chọn khi nhấp vào
        dropdownDisplay.addEventListener('click', function () {
            dropdownOptions.classList.toggle('active');
        });

        // Cập nhật các tùy chọn đã chọn
        dropdownOptions.addEventListener('change', function (event) {
            const selectedOptions = Array.from(dropdownOptions.querySelectorAll('input[type="checkbox"]:checked'))
                .map(option => option.parentElement.textContent.trim());
            if (selectedOptions.length > 0) {
                dropdownDisplay.textContent = selectedOptions.join(', ');
            } else {
                dropdownDisplay.textContent = 'Chọn khóa học';
            }
        });

        // Đóng danh sách khi nhấp ra ngoài
        document.addEventListener('click', function (event) {
            if (!dropdownDisplay.contains(event.target) && !dropdownOptions.contains(event.target)) {
                dropdownOptions.classList.remove('active');
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const discountTitle = document.getElementById('discount_title');
            const discountPercent = document.getElementById('discount_percent');
            const discountCode = document.getElementById('discount_code');
            const quantity = document.getElementById('quantity');
            const startDate = document.getElementById('start_date');
            const endDate = document.getElementById('end_date');
            const errorDiscountTitle = document.getElementById('errorDiscountTitle');
            const errorDiscountPercent = document.getElementById('errorDiscountPercent');
            const errorDiscountCode = document.getElementById('errorDiscountCode');
            const errorQuantity = document.getElementById('errorQuantity');
            const errorStartDate = document.getElementById('errorStartDate');
            const errorEndDate = document.getElementById('errorEndDate');
            const errorCourses = document.getElementById('errorCourses');

            form.addEventListener('submit', function(event) {
                let isValid = true;

                // Reset các thông báo lỗi
                errorDiscountTitle.textContent = '';
                errorDiscountPercent.textContent = '';
                errorDiscountCode.textContent = '';
                errorQuantity.textContent = '';
                errorStartDate.textContent = '';
                errorEndDate.textContent = '';
                errorCourses.textContent = '';

                // Kiểm tra tiêu đề mã giảm giá
                const discountTitleValue = discountTitle.value.trim();
                if (!discountTitleValue) {
                    isValid = false;
                    errorDiscountTitle.textContent = 'Tiêu đề mã giảm giá không được để trống.';
                } else if (discountTitleValue.length > 50) {
                    isValid = false;
                    errorDiscountTitle.textContent = 'Tiêu đề mã giảm giá không được vượt quá 50 ký tự.';
                }

                // Kiểm tra ít nhất một khóa học được chọn
                const selectedCourses = document.querySelectorAll('input[name="courses[]"]:checked');
                if (selectedCourses.length === 0) {
                    isValid = false;
                    errorCourses.textContent = 'Bạn phải chọn ít nhất một khóa học.';
                }

                // Kiểm tra % Giảm giá
                const percentValue = parseFloat(discountPercent.value);
                const percentPattern = /^[0-9]+(\.[0-9]+)?$/; // Chỉ cho phép số và số thập phân
                if (!discountPercent.value.trim()) {
                    isValid = false;
                    errorDiscountPercent.textContent = 'Phần trăm giảm giá không được bỏ trống.';
                } else if (!percentPattern.test(discountPercent.value) || percentValue <= 0 || percentValue >= 100) {
                    isValid = false;
                    errorDiscountPercent.textContent = 'Phần trăm giảm giá phải lớn hơn 0 và nhỏ hơn 100, không được nhập chữ và ký tự đặc biệt.';
                }

                // Kiểm tra mã giảm giá
                const discountCodeValue = discountCode.value.trim();
                const codePattern = /^[A-Za-z0-9]{4,7}$/; // Chỉ cho phép chữ cái và số, từ 4 đến 7 ký tự
                if (!discountCodeValue) {
                    isValid = false;
                    errorDiscountCode.textContent = 'Mã giảm giá không được để trống.';
                } else if (discountCodeValue.length < 4 || discountCodeValue.length > 7) {
                    isValid = false;
                    errorDiscountCode.textContent = 'Mã giảm giá phải có từ 4 đến 7 ký tự.';
                } else if (!codePattern.test(discountCodeValue)) {
                    isValid = false;
                    errorDiscountCode.textContent = 'Mã giảm giá chỉ được chứa chữ cái và số, không chứa ký tự đặc biệt.';
                }

                // Kiểm tra số lượng
                const quantityValue = parseInt(quantity.value, 10);
                if (!quantity.value.trim()) {
                    isValid = false;
                    errorQuantity.textContent = 'Số lượng không được để trống.';
                } else if (isNaN(quantityValue) || quantityValue <= 0) {
                    isValid = false;
                    errorQuantity.textContent = 'Số lượng phải là số nguyên và lớn hơn 0, không chứa ký tự đặc biệt.';
                }

                // Kiểm tra ngày bắt đầu và ngày kết thúc
                const today = new Date();
                const start = new Date(startDate.value);
                const end = new Date(endDate.value);

                if (!startDate.value) {
                    isValid = false;
                    errorStartDate.textContent = 'Ngày bắt đầu không được để trống.';
                } else if (start < today) {
                    isValid = false;
                    errorStartDate.textContent = 'Ngày bắt đầu không được nhỏ hơn ngày hiện tại.';
                }

                if (!endDate.value) {
                    isValid = false;
                    errorEndDate.textContent = 'Ngày kết thúc không được để trống.';
                } else if (end < today) {
                    isValid = false;
                    errorEndDate.textContent = 'Ngày kết thúc không được nhỏ hơn ngày hiện tại.';
                } else if (start >= end) {
                    isValid = false;
                    errorEndDate.textContent = 'Ngày kết thúc phải lớn hơn ngày bắt đầu.';
                } else {
                    // Tính số ngày giữa ngày bắt đầu và ngày kết thúc
                    const differenceInDays = (end - start) / (1000 * 60 * 60 * 24);

                    // Ngày kết thúc phải lớn hơn ngày bắt đầu ít nhất 15 ngày và tối đa 3 tháng
                    const minDays = 15;
                    const maxDays = 90; // 3 tháng ≈ 90 ngày
                    if (differenceInDays < minDays) {
                        isValid = false;
                        errorEndDate.textContent = 'Ngày kết thúc phải lớn hơn ngày bắt đầu ít nhất 15 ngày.';
                    } else if (differenceInDays > maxDays) {
                        isValid = false;
                        errorEndDate.textContent = 'Ngày kết thúc không được vượt quá ngày bắt đầu 3 tháng.';
                    }
                }

                // Nếu không hợp lệ, ngăn chặn gửi form
                if (!isValid) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
