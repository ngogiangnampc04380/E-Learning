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
                            <div>
                                <h2 class="title"><a href="{{ route('client.course-details', $data->id) }}">{{ $data->name }}</a></h2>
                                <p> {{ $data->description }}</p>
                            </div>
                            <h3>{{ number_format($data->price) }} VNĐ</h3>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="benefit-box">
                            <h5>Thông tin</h5>
                            <ul>
                                <li>Họ và tên: {{$data2->fullname}}</li>
                                <li>Số điện thoại:{{$data2->phone}}</li>
                                <li>Email:{{$data2->email}}</li>
                                <li>Địa chỉ:{{$data2->address}}</li>
                            </ul>
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
                        </div>
                    </div>


            </div>
        </div>
    </section>
@endsection
