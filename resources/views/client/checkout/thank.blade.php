@extends('client.layout.master')
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                @if(isset($_GET['partnerCode']) && $_GET['message']=="Successful.")
                    <h1 class="text-center">CẢM ƠN BẠN ĐÃ ĐĂNG KÝ</h1>
                    <a href="{{route('Dashboard-client')}}"" class="text-center text-primary">quay về trang chủ</a>
                
                @else
                    <h1 class="text-center">ĐĂNG KÝ THẤT BẠI VÌ NGƯỜI DÙNG HỦY THANH TOÁN</h1>
                    <a href="{{route('Dashboard-client')}}"" class="text-center text-primary">quay về trang chủ</a>
                
                @endif
            </div>
        </div>
    </div>
@endsection
