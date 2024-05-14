@extends('client.layout.master')

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-12 mx-auto" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-5">
                <form id="multiStepForm" action="{{route('client.saveEditChapter',$data->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="add-course-info">
                        <div class="add-course-form">
                            <div class="table">
                                <div class="add-course-inner-header">
                                    <h4>SỬA CHƯƠNG</h4>
                                    <div class="form-group mt-3">
                                        <label for="chapter_name">Tên chương</label>
                                        <input type="text" id="chapter_name" name="chapter_name" class="form-control" value="{{$data->name}}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="course_id ">Danh mục khóa học</label><br>
                                        <select id="course_id " name="course_id" class="form-control">
                                            @foreach($course as $courses)
                                                @if($courses->id == $data->course_id)
                                                    <option selected value="{{$courses->id}}">{{$courses->name}}</option>
                                                @else
                                                    <option value="{{$courses->id}}">{{$courses->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-btn form-group"> <!-- Sử dụng form-group để tạo kích thước cho nút -->
                                <button type="submit" class="btn btn-info-light btn-block" id="submit">Hoàn tất</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

