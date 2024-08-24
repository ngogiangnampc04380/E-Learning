@extends('client.layout.master')

@section('content')
    <div class="container">
        <div class="row">
            @include('components.settingprofile')

            <div class="col-xl-9 col-lg-8 col-md-12 my-5">
                <!-- Tiêu đề form -->
                <h2 class="form-title" style="font-size: 24px; font-weight: 600; color: #007bff; margin-bottom: 20px;">Sửa mã giảm giá</h2>
                
                <!-- Form cập nhật mã giảm giá -->
                <form action="{{ route('sale.update', $sale->id) }}" method="post" class="discount-form">
                    @csrf
                    @method('PUT') <!-- Phương thức PUT để cập nhật dữ liệu -->
            
                    <!-- Tiêu đề mã giảm giá -->
                    <div class="mb-3">
                        <label for="discount_title" class="form-label">Tiêu đề mã giảm giá</label>
                        <input type="text" class="form-control" id="discount_title" name="discount_title" value="{{ $sale->discount_title }}" placeholder="Nhập tiêu đề mã giảm giá" required>
                        <div id="errorDiscountTitle" class="invalid-feedback"></div>
                    </div>
            
                    <!-- Chọn khóa học giảm giá -->
                    <div class="mb-3">
                        <label for="course_id" class="form-label">Chọn các khóa học giảm giá</label>
                        <div class="custom-dropdown">
                            <div class="dropdown-display" id="dropdownDisplay">Chọn khóa học</div>
                            <div class="dropdown-options" id="dropdownOptions">
                                @foreach($courses as $course)
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="courses[]" value="{{ $course->id }}"
                                            {{ in_array($course->id, $selectedCourses) ? 'checked' : '' }}>
                                        {{ $course->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div id="errorCourses" class="invalid-feedback"></div>
                    </div>
            
                    <!-- % Giảm giá -->
                    <div class="mb-3">
                        <label for="discount_percent" class="form-label">% Giảm giá</label>
                        <input type="number" class="form-control" id="discount_percent" name="discount_percent" value="{{ $sale->discount_percent }}" step="0.01" placeholder="Nhập % giảm giá" required>
                        <div id="errorDiscountPercent" class="invalid-feedback"></div>
                    </div>
            
                    <!-- Mã giảm giá -->
                    <div class="mb-3">
                        <label for="discount_code" class="form-label">Mã giảm giá</label>
                        <input type="text" class="form-control" id="discount_code" name="discount_code" value="{{ $sale->discount_code }}" placeholder="Nhập mã giảm giá" required>
                        <div id="errorDiscountCode" class="invalid-feedback"></div>
                    </div>
            
                    <!-- Số lượng -->
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $sale->quantity }}" placeholder="Nhập số lượng" required>
                        <div id="errorQuantity" class="invalid-feedback"></div>
                    </div>
            
                    <!-- Ngày bắt đầu -->
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Ngày bắt đầu</label>
                        <input type="date" class="form-control" id="start_date" name="start_date"
                               value="{{ \Carbon\Carbon::parse($sale->start_date)->format('Y-m-d') }}" required>
                        <div id="errorStartDate" class="invalid-feedback"></div>
                    </div>
            
                    <!-- Ngày kết thúc -->
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Ngày kết thúc</label>
                        <input type="date" class="form-control" id="end_date" name="end_date"
                               value="{{ \Carbon\Carbon::parse($sale->end_date)->format('Y-m-d') }}" required>
                        <div id="errorEndDate" class="invalid-feedback"></div>
                    </div>
            
                    <!-- Nút gửi -->
                    <button type="submit" class="btn btn-primary">Cập nhật mã giảm giá</button>
                </form>
            </div>
            
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lấy các phần tử
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
                } else if (!percentPattern.test(discountPercent.value)) {
                    isValid = false;
                    errorDiscountPercent.textContent = 'Phần trăm giảm giá phải là số hợp lệ.';
                } else if (percentValue <= 0 || percentValue >= 100) {
                    isValid = false;
                    errorDiscountPercent.textContent = 'Phần trăm giảm giá phải lớn hơn 0 và nhỏ hơn 100.';
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
                    errorQuantity.textContent = 'Số lượng phải là số nguyên và lớn hơn 0.';
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

            // Dropdown menu
            const dropdownDisplay = document.getElementById('dropdownDisplay');
            const dropdownOptions = document.getElementById('dropdownOptions');

            // Toggle hiển thị/ẩn danh sách tùy chọn khi nhấp vào
            dropdownDisplay.addEventListener('click', function () {
                dropdownOptions.classList.toggle('active');
            });

            // Cập nhật các tùy chọn đã chọn
            dropdownOptions.addEventListener('change', function () {
                const selectedOptions = Array.from(dropdownOptions.querySelectorAll('input[type="checkbox"]:checked'))
                    .map(option => option.parentElement.textContent.trim());
                dropdownDisplay.textContent = selectedOptions.length > 0 ? selectedOptions.join(', ') : 'Chọn khóa học';
            });

            // Đóng danh sách khi nhấp ra ngoài
            document.addEventListener('click', function (event) {
                if (!dropdownDisplay.contains(event.target) && !dropdownOptions.contains(event.target)) {
                    dropdownOptions.classList.remove('active');
                }
            });
        });
    </script>
@endsection
