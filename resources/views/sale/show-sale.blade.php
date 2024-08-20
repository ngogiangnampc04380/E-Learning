@extends('client.layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 my-5">
                <h2>Danh sách mã giảm giá</h2>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
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
                                <form action="{{ route('sale.destroy', $sale->id) }}" method="POST" style="display:inline;">
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
        </div>
    </div>
@endsection
