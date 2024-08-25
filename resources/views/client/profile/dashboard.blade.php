@extends('client.layout.master')
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                @include('components.settingprofile')

                <!-- Right -->
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
