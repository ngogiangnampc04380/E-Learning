@extends('client.layout.master')

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-12 mx-auto" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-5">
                <form id="multiStepForm" action="{{route('client.saveChapter') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
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
                                           @foreach($getCourse as $chapter)
                                                <option value="{{$chapter->id}}">{{$chapter->name}}</option>
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
            <div class="col-md-7">
                <div class="settings-widget">
                    <div class="settings-inner-blk p-0">
                        <div class="comman-space pb-0">
                            <div class="settings-tickets-blk course-instruct-blk table-responsive">
                                <table class="table table-nowrap mb-2">
                                    <tbody>
                                    @foreach($data as $post)
                                        <tr>
                                            <td>
                                                <div class="sell-table-group d-flex align-items-center">
                                                    <div class="sell-tabel-info">
                                                        <a href="{{route('client.instructor-lesson',$post->id)}}">
                                                            <p> {{ $post->name }}</p> </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{route('client.editChapter', $post->id)}}" class="btn btn-danger">
                                                    Sửa
                                                </a>
                                                <form id="deleteForm" action="{{ route('client.deleteChapter', $post->id) }}" method="POST">
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

