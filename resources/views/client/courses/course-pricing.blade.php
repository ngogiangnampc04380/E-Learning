@extends('client.layout.master')
@section('content')
    <style>
        .benefit-box {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .benefit-box h5 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #333;
        }

        .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .info-list li {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .promotion-form {
            margin-bottom: 20px;
        }

        .promotion-form .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .promotion-form .btn {
            display: inline-block;
            width: 100%;
            text-align: center;
        }

        .alert {
            margin-top: 10px;
        }

        .course-info p {
            font-size: 16px;
            margin: 5px 0;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
    <section class="course-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 text-center mx-auto">
                    <div class="title-sec">
                        <h2>Tiến hành thanh toán</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="plan-box">
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 20px;">
                                <img src="{{ Storage::url($course->thumbnail) }}" alt="Thumbnail" class="img-fluid"
                                    style="width: 800px;">
                                <h3 class="title"><a></a>
                                </h3>
                                <p
                                    style="font-size: 20px; font-weight: bold; color: #333; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                                    Khóa học: {{ $course->description }}
                                </p>

                                <div>
                                    <h5 style="color:red">Giá tiền: {{ number_format($course->price) }} VNĐ</h5>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="benefit-box">
                        <h5 style=" font-weight: bold;">Thông tin khách hàng:</h5>
<ul class="info-list">
                            <li><strong>Họ và tên:</strong> {{ session('fullname' ?? '') }}</li>
                            <li><strong>Số điện thoại:</strong> {{ session('phone' ?? '') }}</li>
                            <li><strong>Email:</strong> {{ session('email' ?? '') }}</li>
                            <li><strong>Địa chỉ:</strong> {{ session('address' ?? '') }}</li>
                        </ul>
                        <hr>
                        <form action="{{ route('promotion') }}" method="POST" class="promotion-form">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="text" name="discount_code" placeholder="Nhập mã khuyến mãi"
                                class="form-control">
                            <button type="submit" class="btn btn-primary">Áp dụng</button>
                        </form>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <hr>
                        <div class="course-info">
                            <p><strong>Khóa học:</strong> {{ $course->name }}</p>
                            <p><strong>Giá gốc:</strong>
                                @if (session('price'))
                                    {{ session('price') }}
                                @else
                                    {{ $originalPrice ?? '' }}
                                @endif
                            </p>
                            <p><strong>Giá sau khi giảm:</strong> {{ $discountedPrice ?? '' }}</p>
                        </div>
                        <hr>
                        <form action="{{ route('client.checkout') }}" method="post">
                            @csrf
                            <button name="payUrl" type="submit" class="btn btn-primary w-100">Thanh toán momo</button>
                            <hr>
                            <a href="javascript:void(0);" class="btn btn-secondary w-100" id="cancel-payment-btn">Hủy thanh
                                toán</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('cancel-payment-btn').addEventListener('click', function() {
            if (confirm('Bạn có chắc chắn muốn hủy thanh toán không?')) {
                window.history.back(); // Quay lại trang trước
            }
        });
</script>
@endsection