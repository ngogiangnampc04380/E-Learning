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
                                <img src="{{ Storage::url($course->thumbnail) }}" alt="Thumbnail" class="img-fluid" style="width: 200px;">
                            </div>
                            <div>
                                <h3 class="title"><a href="{{ route('client.course-details', $course->id) }}">{{ $course->name }}</a></h3>
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
                        <h5>Phương thức thanh toán</h5>
                        <ul>
                            <li style="list-style: none; display: inline-block; margin-right: 10px;">
                                <label>
                                    <input type="radio" name="payment_method" class="btn" value="momo">
                                    <img
                                        src="https://tse3.mm.bing.net/th?id=OIP.ozc76HTNt1OMfXfNiFShsQHaHa&pid=Api&P=0&h=180"
                                        alt="" style="height: 50px; width: auto;">
                                </label>
                            </li>
                        </ul>
                        <a href="javascript:void(0);" class="btn btn-secondary w-100">Thanh toán</a>
                        <hr>
                        <a href="javascript:void(0);" class="btn btn-secondary w-100">Hủy thanh toán</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
