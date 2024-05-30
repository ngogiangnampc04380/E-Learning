@extends('client.layout.master')
@section('content')

    <section class="page-content course-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="add-course-header mt-3">
                        <h2>Add New sales</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="widget-set">
                            <div class="widget-content multistep-form">
                                <form id="multiStepForm" action="{{route('mentor.sale-course')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="add-course-info">
                                        <div class="add-course-form">
                                           
                                            <div class="form-group mt-3">
                                                <label for="course_name">Giá sale</label>
                                                <input type="text" id="price_sale" name="price_sale"
                                                       class="form-control" placeholder="Nhập giá giảm giá ( % )">
                                                       <div class="error_message">
                                                        @error('price_sale')
                    <small class="text-danger">
                        {{ $errors->first('price_sale') }}
                    </small>
                    @enderror
                                                    </div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="description">Mã giảm giá</label>
                                                <input type="text" id="sales_code" name="sales_code"
                                                class="form-control" placeholder="Nhập mã giảm giá">
                                                <div class="error_message">
                                                    @error('sales_code')
                                                        <span style="color: red;font-weight:lighter">{{ $message }}</span>
                                                        <br>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="start_date">Ngày bắt đầu</label>
                                                <input type="date" id="start_date" name="start_date" class="form-control">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="end_date">Ngày kết thúc</label>
                                                <input type="date" id="end_date" name="end_date" class="form-control">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="amount">số lượng</label>
                                                <input type="text" id="amount" name="amount"
                                                class="form-control" placeholder="Nhập số lượng giảm giá">
                                                <div class="error_message">
                                                    @error('amount')
                                                        <span style="color: red;font-weight:lighter">{{ $message }}</span>
                                                        <br>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="course_id">khóa học</label><br>
                                                <select id="course_id" name="course_id" class="form-control">
                                                    <option value="">Chọn khóa học</option>
                                                    @foreach($data as $value)
                                                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="error_message">
                                                    @error('course_id')
                                                        <span style="color: red;font-weight:lighter">{{ $message }}</span>
                                                        <br>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="status">Trạng thái</label>
                                                <input type="text" id="status" name="status"
                                                class="form-control" placeholder="">
                                                <div class="error_message">
                                                    @error('status')
                                                        <span style="color: red;font-weight:lighter">{{ $message }}</span>
                                                        <br>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- Các trường nhập khóa học -->
                                            <div class="widget-btn">
                                                <button type="submit" class="btn btn-info-light prev">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bước 3: Thêm chương --> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection