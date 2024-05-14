@extends('client.layout.master')

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-12 mx-auto" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form id="multiStepForm" action="{{route('client.saveEditLesson',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="add-course-info">
                        <div class="add-course-form">
                            <div class="add-course-inner-header">
                                <h4>SỬA BÀI HỌC</h4>
                            </div>
                            <div class="form-group">
                                <label for="lesson_name">Tên bài học</label>
                                <input type="text" id="lesson_name" name="lesson_name" class="form-control"
                                       value="{{$data->name}}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="path_video">Video</label>
                                <input type="file" id="path_video" name="path_video" class="form-control"
                                       value="{{$data->path_video}}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="chapter_id">ID Chương</label><br>
                                <select id="chapter_id" name="chapter_id" class="form-control">
                                    @foreach($chapter as $chapters)
                                        @if($chapters->id == $data->chapter_id)
                                            <option selected value="{{ $chapters->id }}">{{ $chapters->name }}</option>
                                        @else
                                            <option value="{{ $chapters->id }}">{{ $chapters->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="widget-btn form-group"> <!-- Sử dụng form-group để tạo kích thước cho nút -->
                                <button type="submit" class="btn btn-info-light btn-block" id="submit">Hoàn tất</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div> <!-- Cột trống bên phải -->
        </div>

    </div>
@endsection
