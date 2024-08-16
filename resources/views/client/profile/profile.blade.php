@extends('client.layout.master')
@section('content')
    <div class="breadcrumb-bar">
        <div class="container">
        </div>
    </div>
    <div class="page-content instructor-page-content">
        <div class="container">
            <div class="row">
                <!-- Left -->
                <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                    <div class="settings-widget dash-profile">
                        <div class="settings-menu p-0">
                            <div class="profile-bg">
                                @if(auth()->user()->role == 0)
                                <h5 class="text-muted mb-0">Học viên</h5>
                                @elseif(auth()->user()->role == 1)
                                <h5 class="text-muted mb-0">Quảng trị viên</h5>
                                @elseif(auth()->user()->role == 2)
                                <h5 class="text-muted mb-0">Giảng viên</h5>
                                @endif
                                <img src="/assets-client/img/instructor-profile-bg.jpg" alt="">
                                <div class="profile-img">
                                    <a href="">
                                        <img src="{{ auth()->user()->thumbnail ? Storage::url('assets-client/img/user/' . auth()->user()->thumbnail) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU' }}"  alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="profile-group">
                                <div class="profile-name text-center">
                                    <h4><a href="">{{auth()->user()-> name}}</a></h4>
                                    @if(auth()->user()->role == 0)
                                        <p class="text-muted mb-0">Học viên</p>
                                        @elseif(auth()->user()->role == 1)
                                        <p class="text-muted mb-0">Quản trị viên</p>
                                        @elseif(auth()->user()->role == 2)
                                        <p class="text-muted mb-0">GIảng viên</p>
                                        @endif
                                </div>
                                @if(auth()->user()->role == 2)
                                <div class="go-dashboard text-center">
                                    <a href="{{ route('client.create-course') }}" class="btn btn-primary">THÊM KHÓA HỌC MỚI</a>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="settings-menu">
    <h3>Thông tin tài khoản</h3>
   <ul>
        <li class="nav-item {{ request()->routeIs('client.dashboard-profile') ? 'active' : '' }}">
            <a href="{{ route('client.dashboard-profile') }}" class="nav-link">
                <i class="feather-home"></i> Dữ liệu và thống kê
            </a>
        </li>
        @if(in_array(auth()->user()->role, [0, 2]))
        <li class="nav-item {{ request()->is('instructor-course') ? 'active' : '' }}">
            <a href="instructor-course.html" class="nav-link">
                <i class="feather-shopping-bag"></i> Khóa học của tôi
            </a>
        </li>
        @endif
        @if(auth()->user()->role == 2)
        <li class="nav-item {{ request()->routeIs('client.instructor-course') ? 'active' : '' }}">
            <a href="{{ route('client.instructor-course',auth()->user()->id) }}" class="nav-link">
                <i class="feather-book"></i> Quản lí khóa học
            </a>
        </li>
        <li class="nav-item {{ request()->is('instructor-student-grid.html') ? 'active' : '' }}">
            <a href="instructor-student-grid.html" class="nav-link">
                <i class="feather-users"></i> Quản lí học viên
            </a>
        </li>
        
        @endif
        <div class="instructor-title">
            <h3>Cài đặt tài khoản</h3>
        </div>
        <li class="nav-item {{ request()->routeIs('client.user-profile') ? 'active' : '' }}">
            <a href="{{ route('client.user-profile') }}" class="nav-link">
                <i class="feather-settings"></i> Thông tin cá nhân
            </a>
        </li>
        @if(auth()->user()->role == 1)
        <div class="instructor-title">
            <h3>ADMIN</h3>
        </div>
        <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
            <a href="/admin" class="nav-link">
                <i class="feather-cpu"></i> Quảng trị website
            </a>
        </li>
        @endif
        <li class="nav-item">
            <a href="{{ route('client.reset-password') }}" class="nav-link">
                <i class="feather-log-out"></i> Đổi mật Khẩu
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
                <i class="feather-log-out"></i> Đăng xuất
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('client.disable-account-form') }}" class="nav-link">
                <i class="feather-user-x"></i> Vô hiệu hóa tài khoản
            </a>
        </li>
    </ul>
</div>

                </div>

                <!-- Right -->
                <div class="col-xl-9 col-lg-8 col-md-12">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card instructor-card">
                                <div class="card-header">
                                    <h4>Thông tin người dùng</h4>
                                </div>
                                <div class="card-body">

                                    <form enctype="multipart/form-data" class="container" action="{{ route('client.user-profile-edit') }}" method="POST">
                                        @csrf
                                    
                                        <div id="error-message" class="alert alert-danger" style="display: none;"></div>
                                    
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Tên <span class="required-indicator">*</span></label>
                                                    <input value="{{ old('name', auth()->user()->name) }}" name="name" type="text" class="form-control" id="name" placeholder="HỌ VÀ TÊN">
                                                    <span class="text-danger"></span>
                                                </div>
                                    
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Số Điện thoại <span class="required-indicator">*</span></label>
                                                    <input value="{{ old('phone', auth()->user()->phone) }}" type="text" name="phone" class="form-control" id="phone">
                                                    <span class="text-danger"></span>
                                                </div>
                                    
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email <span class="required-indicator">*</span></label>
                                                    <input value="{{ old('email', auth()->user()->email) }}" type="text" name="email" class="form-control" id="email">
                                                    <span class="text-danger"></span>
                                                </div>
                                    
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Địa chỉ <span class="required-indicator">*</span></label>
                                                    <input value="{{ old('address', auth()->user()->address) }}" type="text" name="address" class="form-control" id="address">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                    
                                            <div class="col-12 col-sm-6">
                                                <div class="settings-widget dash-profile">
                                                    <div class="settings-menu p-0">
                                                        <div class="profile-bg">
                                                            <img src="/assets-client/img/instructor-profile-bg.jpg" alt="">
                                                            <div class="profile-imgs">
                                                                <img class="trigger-element" src="{{ auth()->user()->thumbnail ? Storage::url('assets-client/img/user/' . auth()->user()->thumbnail) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU' }}" alt="">
                                                                <input type="file" id="thumbnail" name="thumbnail" accept="image/*" style="display: none;">
                                                                <label class="target-element custom-file-upload" for="thumbnail">Chọn Ảnh</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="introduce" class="form-label">Giới thiệu</label>
                                                    <textarea name="introduce" rows="5" class="form-control" id="introduce">{{ old('introduce', auth()->user()->introduce) }}</textarea>
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                    
                                            @if(auth()->user()->role == 2)
                                            <div class="col-12">
                                                <div class="card-header">
                                                    <h4>Thông tin Liên hệ</h4>
                                                </div>
                                    
                                                <div class="mb-3">
                                                    <label for="link_mail" class="form-label">Email liên hệ (nếu có)</label>
                                                    <input value="{{ old('link_mail', auth()->user()->link_mail) }}" type="text" name="link_mail" class="form-control" id="link_mail">
                                                    <span class="text-danger"></span>
                                                </div>
                                    
                                                <div class="mb-3">
                                                    <label for="link_face" class="form-label">Link Facebook (nếu có)</label>
                                                    <input value="{{ old('link_face', auth()->user()->link_face) }}" type="text" name="link_face" class="form-control" id="link_face">
                                                    <span class="text-danger"></span>
                                                </div>
                                    
                                                <div class="mb-3">
                                                    <label for="link_youtube" class="form-label">Link YouTube (nếu có)</label>
                                                    <input value="{{ old('link_youtube', auth()->user()->link_youtube) }}" type="text" name="link_youtube" class="form-control" id="link_youtube">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                            @endif
                                    
                                            
                                                <button class="btn btn-primary" type="submit">Lưu thông tin</button>
                                            
                                        </div>
                                    </form>
                                    
                                    
                                    
                                    
                                    
                                    @if(auth()->user()->role ==2)
                                    <div class="card-header">
                                        <h4>Bằng cấp, chứng chỉ</h4>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Ảnh minh họa</th>
                                                <th scope="col">Trình độ</th>
                                                <th scope="col">Thời gian</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data->educations as $education)
                                            <tr>
                                                
                                                <td>
                                                    @if ($education->thumbnail)
                                                    <img src="{{ asset('storage/assets-client/img/educations/' . $education->thumbnail) }}" width="100">
                                                    @endif
                                                </td>
                                                <td>{{ $education->academic_level }}</td>
                                                <td>{{ $education->time }}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-edit-education" data-id="{{ $education->id }}">Sửa</button>
                                                    <form action="{{ route('client.deleteEducation', $education->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button class="btn btn-success" id="btn-add-education">Thêm</button>
                                    
                                    <!-- Edit Education Form -->
                                    <div id="edit-education-form" style="display: none;">
                                        <div class="card-header">
                                            <h2>Sửa bằng cấp, chứng chỉ</h2>
                                        </div>
                                        
                                        <form id="edit-education" action="" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="education_id" id="education-id">
                                            <div class="mb-3">
                                                <label for="academic_level" class="form-label">Trình độ</label>
                                                <input type="text" name="academic_level" id="edit-academic-level" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="school" class="form-label">Trường</label>
                                                <input type="text" name="school" id="edit-school" class="form-control">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="time" class="form-label">Thời gian</label>
                                                <input type="text" name="time" id="edit-time" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="describe" class="form-label">Mô tả</label>
                                                <textarea class="form-control" name="describe" id="edit-describe" rows="5"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="thumbnail" class="form-label">Ảnh</label>
                                                <input type="file" id="edit-thumbnail" name="thumbnail" accept="image/*">
                                            </div>
                                            <button class="btn btn-primary" type="submit">Sửa thông tin</button>
                                        </form>
                                    </div>
                                    
                                    <!-- Add Education Form -->
                                    <div id="add-education-form" style="display: none;">
                                        <div class="card-header">
                                            <h2>Thêm bằng cấp, chứng chỉ</h2>
                                        </div>
                                        <form id="education-form" action="{{ route('client.storeEducation') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="academic_level" class="form-label">Trình độ <span class="required-indicator">*</span></label>
                                                <input type="text" name="academic_level" class="form-control" placeholder="Ví dụ: Tốt nghiệp cử nhân chuyên ngành ngôn ngữ anh">
                                                <span class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="school" class="form-label">Trường <span class="required-indicator">*</span></label>
                                                <input type="text" name="school" class="form-control" placeholder="Ví dụ: Đại học Cần Thơ">
                                                <span class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="time" class="form-label">Thời gian <span class="required-indicator">*</span></label>
                                                <input type="text" name="time" class="form-control" placeholder="Ví dụ: 13/01/2001 - 13/01/2001 hoặc 2001 - 2001 hoặc 13.01.2001 - 13.01.2001">
                                                <span class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="describe" class="form-label">Mô tả <span class="required-indicator">*</span></label>
                                                <textarea class="form-control" name="describe" rows="5" placeholder="Ví dụ: Để tốt nghiệp ngành Ngôn ngữ Anh tại Đại học B, sinh viên cần hoàn thành các khóa học về ngôn ngữ, văn hóa, và kỹ năng giao tiếp. Chương trình tập trung vào việc phát triển khả năng đọc, viết, nói, và nghe tiếng Anh cùng nghiên cứu văn học và văn hóa. Sinh viên cũng tham gia vào các hoạt động ngoại khóa và hoàn thành dự án tốt nghiệp dưới sự hướng dẫn của giáo viên."></textarea>
                                                <span class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="thumbnail" class="form-label">Ảnh minh họa</label>
                                                <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
                                                <span class="text-danger"></span>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Thêm thông tin</button>
                                        </form>
                                    </div>
                                    
                                    
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chọn các phần tử
            var triggerElement = document.querySelector('.trigger-element');
            var targetElement = document.querySelector('.target-element');

            // Thêm sự kiện khi rê chuột vào phần tử trigger hoặc target
            triggerElement.addEventListener('mouseenter', function() {
                // Hiển thị phần tử target khi rê chuột vào trigger hoặc target
                targetElement.style.display = 'block';
            });

            targetElement.addEventListener('mouseenter', function() {
                // Hiển thị phần tử target khi rê chuột vào trigger hoặc target
                targetElement.style.display = 'block';
            });

            // Thêm sự kiện khi rời chuột khỏi phần tử trigger
            triggerElement.addEventListener('mouseleave', function() {
                // Ẩn phần tử target khi rời chuột khỏi trigger
                targetElement.style.display = 'none';
            });

            targetElement.addEventListener('mouseleave', function() {
                // Ẩn phần tử target khi rời chuột khỏi trigger
                targetElement.style.display = 'none';
            });

            // Lắng nghe sự kiện khi người dùng chọn hình ảnh
            document.getElementById('thumbnail').addEventListener('change', function(event) {
                // Kiểm tra xem có hình ảnh nào được chọn hay không
                if (event.target.files && event.target.files[0]) {
                    // Đọc hình ảnh từ file
                    var reader = new FileReader();

                    // Đọc dữ liệu hình ảnh
                    reader.onload = function(e) {
                        // Hiển thị hình ảnh trong phần tử img
                        triggerElement.setAttribute('src', e.target.result);
                    }

                    // Đọc dữ liệu của file được chọn
                    reader.readAsDataURL(event.target.files[0]);
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btn-add-education').addEventListener('click', function (event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của nút button
        document.getElementById('add-education-form').style.display = 'block';
        document.getElementById('edit-education-form').style.display = 'none'; // Ẩn form sửa giáo dục khi nhấp vào nút "Thêm"
    });

    document.querySelectorAll('.btn-edit-education').forEach(function (button) {
        button.addEventListener('click', function () {
            if (document.getElementById('edit-education-form').style.display !== 'block') {
                        event.preventDefault(); 
                        document.getElementById('add-education-form').style.display = 'none';
                        document.getElementById('edit-education-form').style.display = 'block';
            }
            var educationId = this.getAttribute('data-id');
            // Fetch the education data and populate the edit form
            fetch(`/client/education/${educationId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('education-id').value = data.id;
                    document.getElementById('edit-academic-level').value = data.academic_level;
                    document.getElementById('edit-school').value = data.school;
                    document.getElementById('edit-describe').value = data.describe;
                    document.getElementById('edit-time').value = data.time;
                    document.getElementById('edit-education').action = `/client/education/${educationId}`;

                    // Ghi lại trạng thái hiển thị của form sửa giáo dục
                    console.log('Edit form display:', document.getElementById('edit-education-form').style.display);

                    // Kiểm tra trạng thái hiển thị của form sửa giáo dục trước khi hiển thị
                    
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        });
    });
});

    </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        var formData = new FormData(form[0]);

        // Xóa lỗi cũ
        form.find('.is-invalid').removeClass('is-invalid');
        form.find('.text-danger').html('');

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                window.location.href = response.redirect_url;
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var firstErrorInput = null;

                    $.each(errors, function (key, value) {
                        var inputElement = $('[name="' + key + '"]');
                        inputElement.addClass('is-invalid');
                        inputElement.siblings('.text-danger').html(value);

                        // Lưu lại input đầu tiên có lỗi
                        if (firstErrorInput === null) {
                            firstErrorInput = inputElement;
                        }
                    });

                    // Scroll đến input đầu tiên có lỗi
                    if (firstErrorInput !== null) {
                        var offsetTop = firstErrorInput.offset().top;
                        var windowHeight = $(window).height();
                        var navbarHeight = $('.navbar').outerHeight(); // Điều chỉnh nếu có navbar

                        var scrollTo = offsetTop - (windowHeight / 2) + (firstErrorInput.outerHeight() / 2) - navbarHeight;

                        $('html, body').animate({
                            scrollTop: scrollTo
                        }, 500);
                    }
                } else {
                    console.error(xhr.responseText);
                    alert('Đã xảy ra lỗi, vui lòng thử lại sau.');
                }
            }
        });
    });
});

</script>   


@endsection
