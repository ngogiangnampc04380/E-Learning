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
                                <form action="{{ route('client.checkout-submit') }}" method="post" ng-app="myApp" ng-controller="myCtrl" name="checkoutForm" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-block">
                                                <label class="form-control-label">Họ và tên</label>
                                                <input type="text" class="form-control" name="fullname" id="fullname"
                                                       placeholder="Họ và tên">
                                                <div ng-show="checkoutForm.fullname.$dirty && checkoutForm.fullname.$error.pattern">
                                                    <span class="error-text text-danger">Họ và tên không được chứa số.</span>
                                                </div>
                                                <div ng-show="checkoutForm.fullname.$dirty && checkoutForm.fullname.$error.required">
                                                    <span class="error-text text-danger">Vui lòng nhập họ và tên.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-block">
                                                <label class="form-control-label">Số điện thoại</label>
                                                <input type="text" class="form-control" name="phone" id="phone"
                                                       placeholder="Số điện thoại" ng-model="formData.phone" ng-required="true"
                                                       ng-pattern="/^\d{10}$/">
                                                <div ng-show="checkoutForm.phone.$dirty && checkoutForm.phone.$error.required">
                                                    <span class="error-text text-danger">Vui lòng nhập số điện thoại.</span>
                                                </div>
                                                <div ng-show="checkoutForm.phone.$dirty && checkoutForm.phone.$error.pattern">
                                                    <span class="error-text text-danger">Số điện thoại không hợp lệ.</span>
                                                </div>
                                                <div ng-show="checkoutForm.phone.$dirty && !checkoutForm.phone.$error.pattern && isNaN(formData.phone)">
                                                    <span class="error-text text-danger">Số điện thoại chỉ được nhập số.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-block">
                                                <label class="form-control-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                       placeholder="Email" ng-model="formData.email" ng-required="true">
                                                <div ng-show="checkoutForm.email.$dirty && checkoutForm.email.$invalid">
                                                    <span class="error-text text-danger" ng-show="checkoutForm.email.$error.required">Vui lòng nhập email.</span>
                                                    <span class="error-text text-danger" ng-show="checkoutForm.email.$error.email">Email không hợp lệ.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-block">
                                                <label class="form-control-label">Địa chỉ</label>
                                                <input type="text" class="form-control" name="address" id="address"
                                                       placeholder="Address" ng-model="formData.address" ng-required="true">
                                                <div ng-show="checkoutForm.address.$dirty && checkoutForm.address.$invalid">
                                                    <span class="error-text text-danger" ng-show="checkoutForm.address.$error.required">Vui lòng nhập địa chỉ.</span>
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" name="course_id" value="{{ $data->id }}">
                                        </div>
                                        <div class="col-lg-12 d-flex justify-content-between">
                                            <a href="#" class="btn btn-secondary mr-2 prev">Quay lại</a>
                                            <button type="submit" class="btn btn-primary" ng-disabled="checkoutForm.$invalid">Tiến hành thanh toán</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script>
        var app = angular.module('myApp', []);
        app.controller('myCtrl', function($scope) {
            $scope.formData = {};
        });
    </script>

@endsection
