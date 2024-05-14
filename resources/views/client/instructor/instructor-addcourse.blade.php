@extends('client.layout.master')
@section('content')
    <section class="page-content course-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="add-course-header mt-3">
                        <h2>Add New Course</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="widget-set">
                            <div class="widget-content multistep-form">
                                <form id="multiStepForm" action="{{ route('client.saveCourse') }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="add-course-info">
                                        <div class="add-course-form">
                                            <div class="add-course-inner-header">
                                                <h4>THÊM KHÓA HỌC</h4>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="course_name">Tên khóa học</label>
                                                <input type="text" id="course_name" name="course_name"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="description">Mô tả khóa học</label>
                                                <textarea id="description" name="description" class="form-control"
                                                          rows="2"></textarea>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="thumbnail">Hình ảnh</label>
                                                <input type="file" id="thumbnail" name="thumbnail" class="form-control">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="price">Giá</label>
                                                <input type="number" id="price" name="price" class="form-control"
                                                       min="0">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="category_id">Danh mục khóa học</label><br>
                                                <select id="category_id" name="category_id" class="form-control">
                                                    <option value="">Chọn danh mục</option>
                                                    @foreach($getCategorie as $Categorie)
                                                        <option value="{{$Categorie->id}}">{{$Categorie->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- Các trường nhập khóa học -->
                                            <div class="widget-btn">
                                                <button type="button" class="btn btn-info-light prev">Quay lại</button>
                                                <button type="button" class="btn btn-info-light next">Tiếp theo</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bước 3: Thêm chương -->
                                    <div class="add-course-info">
                                        <div class="add-course-form">
                                            <div class="table">
                                                <div class="add-course-inner-header">
                                                    <h4>THÊM CHƯƠNG</h4>
                                                    <div class="form-group mt-3">
                                                        <label for="chapter_name">Tên chương</label>
                                                        <input type="text" id="chapter_name" name="chapter_name" class="form-control">
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="course_id ">Danh mục khóa học</label><br>
                                                        <select id="course_id " name="course_id" class="form-control">
                                                            <option value="">ID khóa học</option>
                                                            @foreach($getCourse as $Course)
                                                                <option value="{{$Course->id}}">{{$Course->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-btn form-group"> <!-- Sử dụng form-group để tạo kích thước cho nút -->
                                                <button type="button" class="btn btn-info-light prev">Quay lại</button>
                                                <button type="button" class="btn btn-info-light next">Tiếp theo</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bước 4: Thêm bài học -->
                                    <div class="add-course-info">
                                        <div class="add-course-form">
                                            <div class="add-course-inner-header">
                                                <h4>THÊM BÀI HỌC</h4>
                                            </div>
                                            <div class="form-group">
                                                <label for="lesson_name">Tên bài học</label>
                                                <input type="text" id="lesson_name" name="lesson_name"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="path_video"> Video</label>
                                                <input type="file" id="path_video" name="path_video"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="chapter_id">ID Chương</label><br>
                                                <select id="chapter_id" name="chapter_id" class="form-control">
                                                    <option value="">Chọn ID</option>
                                                    @foreach($getChapter as $Chapter)
                                                        <option value="{{$Chapter->id}}">{{$Chapter->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="widget-btn">
                                                <button type="button" class="btn btn-info-light prev">Quay lại</button>
                                                <button type="submit" class="btn btn-info-light" id="submit">Hoàn tất
                                                </button>
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

