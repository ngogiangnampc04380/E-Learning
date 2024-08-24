@extends('client.layout.master')

@section('content')
    <style>
        /* Form container */
.discount-form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Form labels */
.form-label {
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    display: block;
}

/* Form input fields */
.form-control {
    width: 100%;
    padding: 12px;
    border-radius: 4px;
    border: 1px solid #ccc;
    font-size: 1rem;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
}

/* Dropdown container */
.custom-dropdown {
    position: relative;
    width: 100%;
    margin-top: 10px;
}

/* Dropdown display */
.dropdown-display {
    padding: 10px 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    cursor: pointer;
    background-color: #f8f9fa;
    transition: border-color 0.3s ease;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Dropdown display hover effect */
.dropdown-display:hover {
    border-color: #007bff;
}

/* Dropdown options container */
.dropdown-options {
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

/* Dropdown options active state */
.dropdown-options.active {
    display: block;
    opacity: 1;
}

/* Dropdown items */
.dropdown-options label {
    display: block;
    padding: 8px 15px;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

/* Dropdown item hover effect */
.dropdown-options label:hover {
    background-color: #f0f0f0;
}

/* Dropdown item checkbox spacing */
.dropdown-options input {
    margin-right: 10px;
}

/* Error messages */
.invalid-feedback {
    color: #dc3545;
    font-size: 0.875em;
    display: block;
    margin-top: 4px;
}

/* Submit button */
.btn-primary {
    background-color: #007bff;
    border: none;
    padding: 12px 24px;
    border-radius: 4px;
    color: #fff;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

        
    </style>
    <div class="container">
        <div class="row">
            @include('components.settingprofile')
            <div class="col-xl-9 col-lg-8 col-md-12 my-5">
                <h2 class="form-title" style="
        font-size: 1.75rem; 
        font-weight: bold; 
        color: #343a40; 
        margin-bottom: 20px; 
        border-bottom: 2px solid #007bff; 
        padding-bottom: 10px; 
        text-align: center; 
        text-transform: uppercase;
    ">Thêm mã giảm giá</h2>
                <form action="{{ route('sale.store') }}" method="post" class="discount-form">
                    @csrf
            
                    <div class="mb-3">
                        <label for="discount_title" class="form-label">Tiêu đề mã giảm giá</label>
                        <input type="text" class="form-control" id="discount_title" name="discount_title" placeholder="Nhập tiêu đề mã giảm giá">
                        <div class="invalid-feedback" id="errorDiscountTitle"></div>
                    </div>
            
                    <div class="mb-3">
                        <label for="course_id" class="form-label">Chọn các khóa học giảm giá</label>
                        <div class="custom-dropdown">
                            <div class="dropdown-display" id="dropdownDisplay">Chọn khóa học</div>
                            <div class="dropdown-options" id="dropdownOptions">
                                @foreach($courses as $course)
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="courses[]" value="{{ $course->id }}"> {{ $course->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="invalid-feedback" id="errorCourses"></div>
                    </div>
            
                    <div class="mb-3">
                        <label for="discount_percent" class="form-label">% Giảm giá</label>
                        <input type="number" class="form-control" id="discount_percent" name="discount_percent" step="0.01" placeholder="Nhập % giảm giá">
                        <div class="invalid-feedback" id="errorDiscountPercent"></div>
                    </div>
            
                    <div class="mb-3">
                        <label for="discount_code" class="form-label">Mã giảm giá</label>
                        <input type="text" class="form-control" id="discount_code" name="discount_code" placeholder="Nhập mã giảm giá">
                        <div class="invalid-feedback" id="errorDiscountCode"></div>
                    </div>
            
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng">
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
