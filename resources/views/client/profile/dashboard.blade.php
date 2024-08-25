@extends('client.layout.master')
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                @include('components.settingprofile')

                <!-- Right -->
                @if (in_array(auth()->user()->role, [0, 3]))
                    <div class="col-xl-9 col-lg-8 col-md-12" style="text-align: center;">
                        <div class="row">
                            <h2
                                style="color: #3c763d; font-size: 40px; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">
                                Chào mừng bạn đến với trang quản lý thông tin người dùng
                            </h2>
                        </div>
                    </div>
                @elseif (auth()->user()->role == 1)
                    <div class="col-xl-9 col-lg-8 col-md-12" style="text-align: center;">
                        <div class="row">
                            <h2
                                style="color: #3c763d; font-size: 40px; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">
                                Chào mừng bạn đến với trang quản lý thông tin quản trị viên
                            </h2>
                        </div>
                    </div>
                @else
                    <div class="col-xl-9 col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-md-4 d-flex">
                                <div class="card instructor-card w-100">
                                    <div class="card-body">
                                        <div class="instructor-inner">
                                            <h6>Doanh thu</h6>
                                            <h4 class="instructor-text-success">
                                                {{ number_format($reneuve, 0, ',', '.') }} VNĐ</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="card instructor-card w-100">
                                    <div class="card-body">
                                        <div class="instructor-inner">
                                            <h6>Lợi nhuận</h6>
                                            <h4 class="instructor-text-info">
                                                {{ number_format($profit, 0, ',', '.') }} VNĐ</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="card instructor-card w-100">
                                    <div class="card-body">
                                        <div class="instructor-inner">
                                            <h6>Số người đã đăng ký</h6>
                                            <h4 class="instructor-text-warning">{{ $eroll }} Người</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h6 style="color: red; text-align:center;">Doanh thu của bạn sẽ được quản trị viên ENT chuyển về tài khoản ngân hàng vào ngày 5 hằng tháng</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card instructor-card">
                                    <div class="card-header">
                                        <h4>Thống kê số người đăng ký trong tháng này</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <canvas id="myChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels), // Dữ liệu ngày trong tháng 8
                datasets: [{
                    label: 'Số người đăng ký tháng 8',
                    data: @json($enrollments), // Dữ liệu số người đăng ký trong tháng 8
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
