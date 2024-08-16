@extends('client.layout.master')
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">

                @include('components.settingprofile') 


                <div class="col-xl-9 col-lg-8 col-md-12 mt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="settings-widget">
                                <div class="settings-inner-blk p-0">
                                    <section class="page-content course-sec">
                                        <div class="container">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <div class="add-course-header mt-2 mb-2 text-center">
                                                        <h2 style="font-size: 36px; font-weight: bold; color: #333;">THÊM KHÓA HỌC MỚI</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="widget-set">
                                                            <div class="widget-content multistep-form">
                                                                <form id="multiStepForm" action="{{ route('client.saveCourse') }}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="add-course-info">
                                                                        <div class="add-course-form">
                                                                            <div class="form-group mt-3">
                                                                                <label for="course_name">Tên khóa học <span class="required-indicator">*</span></label>
                                                                                <input type="text" id="course_name" name="course_name" class="form-control">
                                                                                <span id="course_name_error" class="text-danger"></span>
                                                                            </div>
                                                                            <div class="form-group mt-3">
                                                                                <label for="description">Mô tả khóa học</label>
                                                                                <textarea id="description" name="description" class="form-control" rows="2"></textarea>
                                                                                <span id="description_error" class="text-danger"></span>
                                                                            </div>
                                                                            <div class="form-group mt-3">
                                                                                <label for="thumbnail">Hình ảnh <span class="required-indicator">*</span></label>
                                                                                <input type="file" id="thumbnail" name="thumbnail" class="form-control">
                                                                                <span id="thumbnail_error" class="text-danger"></span>
                                                                            </div>
                                                                            <div class="form-group mt-3">
                                                                                <label for="video_demo">Video demo khóa học</label>
                                                                                <input type="file" id="video_demo" name="video_demo" class="form-control">
                                                                                <span id="video_demo_error" class="text-danger"></span>
                                                                            </div>
                                                                            <div class="form-group mt-3">
                                                                                <label for="price">Giá tiền <span class="required-indicator">*</span></label>
                                                                                <div class="input-group">
                                                                                    <input type="number" id="price" name="price" class="form-control" min="0">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text">VNĐ</span>
                                                                                    </div>
                                                                                </div>
                                                                                <span id="price_error" class="text-danger"></span>
                                                                            </div>
                                                                            <div class="form-group mt-3">
                                                                                <label for="category_id">Danh mục khóa học <span class="required-indicator">*</span></label><br>
                                                                                <select id="category_id" name="category_id" class="form-control">
                                                                                    <option value="">Chọn danh mục</option>
                                                                                    @foreach ($getCategorie as $Categorie)
                                                                                        <option value="{{ $Categorie->id }}">{{ $Categorie->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <span id="category_id_error" class="text-danger"></span>
                                                                            </div>
                                                                            <!-- Các trường nhập khác -->
                                                                            <div class="widget-btn">
                                                                                <a href="{{ route('client.instructor-course', auth()->user()->id) }}">
                                                                                    <button type="button" class="btn btn-info-light prev">Quay lại</button>
                                                                                </a>
                                                                                <button type="button" class="btn btn-info-light next" onclick="saveCourse()">Tiếp theo</button>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        function saveCourse() {
            var formData = new FormData(document.getElementById('multiStepForm'));
    
            $.ajax({
                url: '{{ route("client.saveCourse") }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                window.location.href = response.redirect_url;
            },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        $('#course_name_error').text(errors.course_name ? errors.course_name[0] : '');
                        $('#description_error').text(errors.description ? errors.description[0] : '');
                        $('#thumbnail_error').text(errors.thumbnail ? errors.thumbnail[0] : '');
                        $('#video_demo_error').text(errors.video_demo ? errors.video_demo[0] : '');
                        $('#price_error').text(errors.price ? errors.price[0] : '');
                        $('#category_id_error').text(errors.category_id ? errors.category_id[0] : '');
    
                        // Scroll đến lỗi đầu tiên
                        var firstErrorElement = $('.text-danger').filter(':first');
                        $('html, body').animate({
                            scrollTop: firstErrorElement.offset().top - 300 // Offset cho thanh header, margin, etc.
                        }, 500);
                    }
                }
            });
        }
    </script>
    
@endsection
