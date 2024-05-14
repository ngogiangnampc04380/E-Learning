@extends('client.layout.master')

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-12 mx-auto" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-5">
                <form id="multiStepForm" action="{{route('client.saveEditCourse',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="add-course-info">
                        <div class="add-course-form">
                            <div class="add-course-inner-header">
                                <h4>SỬA KHÓA HỌC</h4>
                            </div>
                            <div class="form-group mt-3">
                                <label for="course_name">Tên khóa học</label>
                                <input type="text" id="course_name" name="course_name" class="form-control" value="{{$data->name}}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="description">Mô tả khóa học</label>
                                <textarea id="description" name="description" class="form-control" rows="2">{{$data->description}}</textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="thumbnail">Hình ảnh</label>
                                <input type="file" id="thumbnail" name="thumbnail" class="form-control" >
                            </div>
                            <div class="form-group mt-3">
                                <label for="price">Giá</label>
                                <input type="number" id="price" name="price" class="form-control" min="0" value="{{$data->price}}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="category_id">Danh mục khóa học</label><br>
                                <select id="category_id" name="category_id" class="form-control">
                                    <option value="">Chọn danh mục</option>
                                    @foreach($course_categories as $category)
                                        @if($category->id == $data->category_id)
                                            <option selected value="{{$category->id}}">{{$category->name}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <!-- Các trường nhập khóa học -->
                            <div class="widget-btn">
                                <button type="submit" class="btn btn-info-light btn-block" id="submit">Hoàn tất</button>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection

