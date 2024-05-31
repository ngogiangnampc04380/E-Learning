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
                                <h5 class="text-muted mb-0">ADMIN</h5>
                                @elseif(auth()->user()->role == 2)
                                <h5 class="text-muted mb-0">Mentor</h5>
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
                                        <p class="text-muted mb-0">ADMIN</p>
                                        @elseif(auth()->user()->role == 2)
                                        <p class="text-muted mb-0">Mentor</p>
                                        @endif
                                </div>
                                @if(auth()->user()->role == 2)
                                <div class="go-dashboard text-center">
                                    <a href="{{ route('client.instructor-addcourse') }}" class="btn btn-primary">Create New Course</a>
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
                <i class="feather-home"></i> My Dashboard
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
        <li class="nav-item {{ request()->is('instructor-earnings.html') ? 'active' : '' }}">
            <a href="instructor-earnings.html" class="nav-link">
                <i class="feather-pie-chart"></i> Nam Béo
            </a>
        </li>
        <li class="nav-item {{ request()->is('instructor-orders.html') ? 'active' : '' }}">
            <a href="instructor-orders.html" class="nav-link">
                <i class="feather-shopping-bag"></i> Nam Béo
            </a>
        </li>
        @endif
        <div class="instructor-title">
            <h3>ACCOUNT SETTINGS</h3>
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

                                    <form enctype="multipart/form-data" class="container"
                                        action="{{ route('client.user-profile-edit') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">


                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Tên</label>
                                                    <input value="{{ auth()->user()->name }}"name="name" type="text"
                                                        class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Số Điện thoại</label>
                                                    <input value="{{ auth()->user()->phone }} "type="text" name="phone"
                                                        class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                                    <input value="{{ auth()->user()->email }}"type="text" name="email"
                                                        class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                                                    <input value="{{ auth()->user()->address }}"type="text" name="address"
                                                        class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" >
                                                </div>
                                                

                                            </div>
                                            
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                <div class="settings-widget dash-profile">
                                                    <div class="settings-menu p-0">

                                                        <div class="profile-bg">
                                                            <img src="/assets-client/img/instructor-profile-bg.jpg"
                                                                alt="">
                                                            <div class="profile-imgs">
                                                                <!-- Hiển thị hình ảnh đã lưu sẵn -->
                                                                <img class="trigger-element"
                                                                src="{{ auth()->user()->thumbnail ? Storage::url('assets-client/img/user/' . auth()->user()->thumbnail) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU' }}" 
                                                                <!-- Đặt input type="file" để cho phép người dùng chọn hình ảnh từ ổ cứng -->
                                                                <input type="file" id="thumbnail" name="thumbnail"
                                                                    accept="image/*" style="display: none;">
                                                                <!-- Nút "Chọn file" -->
                                                                <label class="target-element custom-file-upload"
                                                                    for="thumbnail">Chọn Ảnh</label>
                                                            </div>
                                                        </div>

                                                        <div class="profile-group">
                                                            <div class="profile-name text-center">
                                                                <h4><a href="">{{ auth()->user()->name }}</a></h4>
                                                            </div>
                                                            <div class="go-dashboard text-center">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label" >Giới thiệu</label>
                                                <textarea type="text" name="introduce" rows="5"
                                                    class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" >{{ auth()->user()->introduce }}</textarea>
                                            </div>
                                            @if(auth()->user()->role == 2)
                                            <div class="card-header">
                                                <h4>Thông tin Liên hệ</h4>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email liên hệ ( nếu có )</label>
                                                <input value="{{ auth()->user()->link_mail }}"type="text" rows="5" name="link_mail"
                                                    class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Link Facebook ( nếu có )</label>
                                                <input value="{{ auth()->user()->link_face }}"type="text" rows="5" name="link_face"
                                                    class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Link youtube ( nếu có )</label>
                                                <input value="{{ auth()->user()->link_youtube }}"type="text" rows="5" name="link_youtube"
                                                    class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" >
                                            </div>
                                            @endif
                                            {{-- <div class="card-header">
                                                <h4>Thông tin người dùng</h4>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Giới thiệu</label>
                                                <input value="{{ auth()->user()->introduce }}"type="text" name="email"
                                                    class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div> --}}
                                            
                                            {{-- <button type="button" class="d-none btn btn-primary position-absolute top-0 start-0 m-5" onclick="submitForm()" id="saveAvt">Lưu ảnh</button> --}}
                                            <button class="btn btn-primary" type="submit">Sửa thông tin</button>
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
                                        <form action="{{ route('client.storeEducation') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="academic_level" class="form-label">Trình độ</label>
                                                <input type="text" name="academic_level" class="form-control" placeholder="Ví dụ: Tốt nghiệp cử nhân chuyên ngành ngôn ngữ anh">
                                            </div>
                                            <div class="mb-3">
                                                <label for="school" class="form-label">Trường</label>
                                                <input type="text" name="school" class="form-control" placeholder="Ví dụ: đại học Cần Thơ">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="time" class="form-label">Thời gian</label>
                                                <input type="text" name="time" class="form-control" placeholder="Ví dụ: 2020 - 2024">
                                            </div>
                                            <div class="mb-3">
                                                <label for="describe" class="form-label">Mô tả</label>
                                                <textarea class="form-control" name="describe" rows="5" placeholder="Ví dụ: Để tốt nghiệp ngành Ngôn ngữ Anh tại Đại học B, sinh viên cần hoàn thành các khóa học về ngôn ngữ, văn hóa, và kỹ năng giao tiếp. Chương trình tập trung vào việc phát triển khả năng đọc, viết, nói, và nghe tiếng Anh cùng nghiên cứu văn học và văn hóa. Sinh viên cũng tham gia vào các hoạt động ngoại khóa và hoàn thành dự án tốt nghiệp dưới sự hướng dẫn của giáo viên."></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="thumbnail" class="form-label">Ảnh minh họa</label>
                                                <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
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
    
@endsection
