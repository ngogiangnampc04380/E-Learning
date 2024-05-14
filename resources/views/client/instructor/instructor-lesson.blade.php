@extends('client.layout.master')

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-12 mx-auto" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-5">
                <form id="multiStepForm" action="{{route('client.saveLesson') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
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
                                <label for="path_video">Video</label>
                                <input type="file" id="path_video" name="path_video"
                                       class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="chapter_id">ID Chương</label><br>
                                <select id="chapter_id" name="chapter_id" class="form-control">
                                    <option value="">Chọn ID</option>
                                    @foreach($getLesson as $Lesson)
                                        <option value="{{$Lesson->id}}">{{$Lesson->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="widget-btn form-group"> <!-- Sử dụng form-group để tạo kích thước cho nút -->
                                <button type="submit" class="btn btn-info-light btn-block" id="submit">Hoàn tất
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-7">
                <div class="settings-widget">
                    <div class="settings-inner-blk p-0">
                        <div class="comman-space pb-0">
                            <div class="settings-tickets-blk course-instruct-blk table-responsive">
                                <table class="table table-nowrap mb-2">
                                    <tbody>
                                    @foreach($data as $lesson)
                                        <tr>
                                            <td>
                                                <div class="sell-table-group d-flex align-items-center">
                                                    <div class="sell-tabel-info">
                                                        <a href="#"> <p><strong>bài học:</strong> {{$lesson->name}}</p></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('client.editLesson', $lesson->id)}}" class="btn btn-danger">
                                                    Sửa
                                                </a>
                                                <form id="deleteForm" action="{{ route('client.deleteLesson', $lesson->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">
                                                        Xóa
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
