@extends('client.layout.master')

@section('content')
<style>/* Tệp CSS riêng hoặc trong phần <style> của HTML */

    .page-title {
        font-size: 28px;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
    }
    
    .alert-success {
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 5px;
    }
    
    .table-container {
        margin-top: 20px;
        overflow-x: auto;
    }
    
    .table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }
    
    .table thead {
        background-color: #f8f9fa;
        color: #333;
    }
    
    .table th, .table td {
        padding: 12px;
        text-align: left;
    }
    
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    
    .table-bordered th, .table-bordered td {
        border: 1px solid #dee2e6;
    }
    
    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    
    .table tbody tr:hover {
        background-color: #e9ecef;
    }
    
    .btn {
        padding: 5px 10px;
        font-size: 14px;
        border-radius: 3px;
    }
    
    .btn-warning {
        background-color: #ffc107;
        color: #212529;
        border: 1px solid #ffc107;
    }
    
    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
    }
    
    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border: 1px solid #dc3545;
    }
    
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
    /* Đảm bảo bạn đã include CSS này trong layout của bạn */
.no-discount-message {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 200px;
    text-align: center;
}

.no-discount-message p {
    font-size: 1.25rem;
    margin-bottom: 20px;
}

.no-discount-message .btn-primary {
    font-size: 1rem;
    padding: 10px 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.no-discount-message .btn-primary i {
    margin-right: 8px; /* Khoảng cách giữa icon và văn bản */
}

.icon-info {
    font-size: 3rem; /* Kích thước icon */
    color: #007bff; /* Màu sắc icon */
    margin-bottom: 20px; /* Khoảng cách giữa icon và văn bản */
}


    </style>
    <div class="container">
        <div class="row">
            @include('components.settingprofile')
            <div class="col-xl-9 col-lg-8 col-md-12 my-5">
                <h2 class="page-title">Danh sách mã giảm giá</h2>
            
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            
                @if($sales->isEmpty())
                <div class="no-discount-message">
                    <i class="fas fa-info-circle icon-info"></i>
                    <p>Hiện tại chưa có mã giảm giá nào.</p>
                    <a href="{{ route('sale.add-sale') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tạo mã giảm giá mới
                    </a>
                </div>
    @else
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>% Giảm giá</th>
                        <th>Mã giảm giá</th>
                        <th>Số lượng</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Khóa học liên quan</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sale->discount_title }}</td>
                            <td>{{ $sale->discount_percent }}%</td>
                            <td>{{ $sale->discount_code }}</td>
                            <td>{{ $sale->quantity }}</td>
                            <td>{{ $sale->start_date->format('d/m/Y') }}</td>
                            <td>{{ $sale->end_date->format('d/m/Y') }}</td>
                            <td>
                                @foreach($sale->courses as $course)
                                    {{ $course->name }}@if(!$loop->last), @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('sale.edit', $sale->id) }}" class="btn btn-warning">Sửa</a>
                                <form action="{{ route('sale.destroy', $sale->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
            </div>
            
        </div>
    </div>
@endsection
