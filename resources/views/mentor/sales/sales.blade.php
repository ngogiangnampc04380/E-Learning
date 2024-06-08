@extends('client.layout.master')
@section('content')

    <section class="page-content course-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="add-course-header mt-3">
                        <h2>THÊM MÃ GIẢM GIÁ</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="widget-set">
                            <div class="widget-content multistep-form">
                                <form id="multiStepForm" action="{{ route('mentor.show-sale-course') }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="add-course-info">
                                        <div class="add-course-form">
                                            <div class="form-group mt-3">
                                                <label for="name">Tên mã giảm giá</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                       placeholder="Nhập tên mã giảm giá">

                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="description">Mô tả</label>
                                                <input type="text" id="description" name="description"
                                                       class="form-control" placeholder="Nhập mô tả">

                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="percent_sale">Phần trăm giảm giá</label>
                                                <input type="text" id="percent_sale" name="percent_sale"
                                                       class="form-control" placeholder="Nhập phần trăm giảm giá (%)">

                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="sales_code">Mã giảm giá</label>
                                                <input type="text" id="sales_code" name="sales_code"
                                                       class="form-control" placeholder="Nhập mã giảm giá">

                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="start_date">Ngày bắt đầu</label>
                                                <input type="date" id="start_date" name="start_date"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="end_date">Ngày kết thúc</label>
                                                <input type="date" id="end_date" name="end_date" class="form-control">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="amount">Số lượng</label>
                                                <input type="text" id="amount" name="amount" class="form-control"
                                                       placeholder="Nhập số lượng giảm giá">

                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="status">Trạng thái</label>
                                                <input type="text" id="status" name="status" class="form-control"
                                                       placeholder="Nhập trạng thái">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="course_id">Khóa học</label><br>
                                                <select id="course_id" name="course_id" class="form-control">
                                                    <option value="">Chọn khóa học</option>
                                                    @foreach($data as $value)
                                                        <option value="{{ $value->id }}">{{ $value ->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="error_message">
                                                    @error('course_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-3">
                                                <!-- Nút Quay lại -->
                                                <div class="widget-btn">
                                                    <a href="{{ route('client.dashboard-profile') }}" class="btn btn-info-light prev">Quay lại</a>
                                                </div>
                                                <!-- Nút Submit -->
                                                <div class="widget-btn">
                                                    <button type="submit" class="btn btn-info-light prev">Submit</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
