<!-- resources/views/mentor/sales/salesList.blade.php -->
@extends('client.layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Danh sách mã khuyến mãi</h2>
                <a href="{{ route('mentor.show-sale-course') }}" class="btn btn-success mb-3">Tạo mã khuyến mãi</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Tên mã</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">% Khuyến mãi</th>
                        <th scope="col">Khóa học</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($list as $sale)
                        <tr>
                            <td>{{ $sale->name }}</td>
                            <td>{{ $sale->description }}</td>
                            <td>{{ $sale->percent_sale }}%</td>
                            <td>{{ $sale->courseName }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('mentor.edit-sale', ['id' => $sale->id]) }}" class="btn btn-primary btn-sm">Sửa</a>
                                    <span style="margin: 0 5px;">&nbsp;</span>
                                    <form action="{{ route('mentor.delete-sale', ['id' => $sale->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
