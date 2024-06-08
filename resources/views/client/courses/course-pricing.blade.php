@extends('client.layout.master')
@section('content')

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
                                     style="width: 200px;">
                            </div>
                            <div>
                                <h3 class="title"><a
                                            href="{{ route('client.course-details', $course->id) }}">{{ $course->name }}</a>
                                </h3>
                                <p>{{ $course->description }}</p>
                            </div>
                        </div>

                        <h5 style="color:red">{{ number_format($course->price) }} VNĐ</h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="benefit-box">
                        <h5>Thông tin</h5>
                        <ul>
                            <p><strong>Họ và tên:</strong> {{ $sessionData['fullname'] }}</p>
                            <p><strong>Số điện thoại:</strong> {{ $sessionData['phone'] }}</p>
                            <p><strong>Email:</strong> {{ $sessionData['email'] }}</p>
                            <p><strong>Địa chỉ:</strong> {{ $sessionData['address'] }}</p>
                            <p><strong>Mã Khóa Học:</strong> {{ $sessionData['course_id'] }}</p>

                        </ul>
                        <hr>
                        @if(isset($data->sales_code))
                            <div class="discount-card">
                                <h3>{{$data->name}}</h3>
                                <p>{{$data->description}}</p>
                                <p>{{$data->percent_sale}}%</p>
                                <button onclick="showDiscountCode()" class="btn btn-secondary w-100">Lấy mã giảm giá</button>
                            </div>

                            <div id="showDiscountCodeDiv" style="display:none; margin-top: 10px;">
                                <p><strong>Mã giảm giá của bạn:
                                    </strong>
                                    {{$data->sales_code}}
                                </p>
                            </div>
                            <hr>
                        @endif

                        <button onclick="toggleDiscountCode()" class="btn btn-secondary w-100">Nhập mã giảm giá</button>
                        <div id="discountCodeDiv" style="margin-top: 10px;">
                            <input type="text" id="discountCode" class="form-control" placeholder="Nhập mã giảm giá">
                            <button onclick="applyDiscount()" class="btn btn-primary w-100" style="margin-top: 10px;">Áp dụng</button>
                        </div>
                        <hr>
                        Giá:{{ number_format($course->price) }} VNĐ
                        <hr>
                        <div id="discountedPriceDiv" style="display: none;">
                            Giá đã giảm:<span id="discountedPrice"></span> VNĐ
                        </div>
                        <div id="invalidCodeDiv" style="display: none;">
                            <hr>
                            <h2>Mã giảm giá không hợp lệ</h2>
                            <hr>
                        </div>
                        <hr>
                        <h5>Phương thức thanh toán</h5>
                        <ul>
                            <li style="list-style: none; display: inline-block; margin-right: 10px;">
                                <label>
                                    <input type="radio" name="payment_method" class="btn" value="momo">
                                    <img src="https://tse3.mm.bing.net/th?id=OIP.ozc76HTNt1OMfXfNiFShsQHaHa&pid=Api&P=0&h=180" alt="" style="height: 50px; width: auto;">
                                </label>
                            </li>
                        </ul>
                        <a href="javascript:void(0);" class="btn btn-secondary w-100">Thanh toán</a>
                        <hr>
                        <a href="javascript:void(0);" class="btn btn-secondary w-100">Hủy thanh toán</a>
                    </div>                </div>

            </div>
        </div>
    </section>
    <script>
        function toggleDiscountCode() {
            var discountDiv = document.getElementById('discountCodeDiv');
            if (discountDiv.style.display === 'none') {
                discountDiv.style.display = 'block';
            } else {
                discountDiv.style.display = 'none';
            }
        }
        function showDiscountCode() {
            var displayDiscountCodeDiv = document.getElementById('showDiscountCodeDiv');
            displayDiscountCodeDiv.style.display = 'block';
        }
        function applyDiscount() {
            var discountCode = document.getElementById('discountCode').value;
            var validCode = "{{$data->sales_code}}";

            if (discountCode === validCode) {
                var percentSale = {{$data->percent_sale}};
                var price = {{$course->price}};
                var discountedPrice = number_format(price * (1 - percentSale / 100)) ;
                document.getElementById('discountedPrice').innerText = discountedPrice;
                document.getElementById('discountedPriceDiv').style.display = 'block';
                document.getElementById('invalidCodeDiv').style.display = 'none';
            } else {
                document.getElementById('discountedPriceDiv').style.display = 'none';
                document.getElementById('invalidCodeDiv').style.display = 'block';
            }
        }
    </script>
@endsection
