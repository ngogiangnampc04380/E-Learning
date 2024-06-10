@extends('client.layout.master')
@section('content')
    <section class="course-content checkout-widget">


        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="student-widget">
                        <div class="student-widget-group add-course-info">
                            <div class="cart-head">
                                <strong><h3 style="color:red">THÔNG TIN THANH TOÁN</h3></strong>
                            </div>
                            <div class="checkout-form">
                                <form action="{{route('client.checkout-submit')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-block">
                                                <label class="form-control-label">Họ và tên</label>
                                                <input type="text" class="form-control" name="fullname"
                                                       placeholder="Họ và tên">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-block">
                                                <label class="form-control-label">Số điện thoại</label>
                                                <input type="text" class="form-control" name="phone"
                                                       placeholder="Số điện thoại">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-block">
                                                <label class="form-control-label">Email</label>
                                                <input type="text" class="form-control" name="email"
                                                       placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-block">
                                                <label class="form-control-label">Địa chỉ</label>
                                                <input type="text" class="form-control" name="address"
                                                       placeholder="Address">
                                            </div>
                                            <input type="hidden" class="form-control" name="course_id" value="{{$data->id}}">
                                        </div>
                                        <div class="col-lg-12 d-flex justify-content-between">
                                            <a href="#" class="btn btn-secondary mr-2 prev">Quay lại</a>
                                            <button type="submit" class="btn btn-primary">Tiến hành thanh toán</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 theiaStickySidebar">
                    <div class="student-widget select-plan-group">
                        <div class="student-widget-group">

                            <div class="basic-plan" style="display: flex; align-items: center;">
                                <img src="{{ Storage::url('assets-client/img/user/'. $data->thumbnail) }}" alt="Thumbnail" class="img-fluid"
                                     style="max-width: auto;">

                            </div>
                            <div>
                                <h1 style="color:red">{{$data->name}}</h1>
                                <span class="fs-5">{{number_format($data->price)}} VNĐ</span>
                            </div>
                            <div class="benifits-feature">
                                <h3>Mô tả khóa học</h3>
                                <ul>
                                    {{$data->description}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
