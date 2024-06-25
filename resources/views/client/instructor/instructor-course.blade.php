@extends('client.layout.master')
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">


                {{-- left --}}
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
                                    <a href="{{ route('client.create-course') }}" class="btn btn-primary">Create New Course</a>
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


                <div class="col-xl-9 col-lg-8 col-md-12 mt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="settings-widget">
                                @if($data->contains('status', 0))
                                <div class="settings-inner-blk p-4 bg-light rounded shadow">
                                    <div class="sell-course-head comman-space text-center mb-4">
                                        <h3 class="text-primary display-4">Danh sách khóa học đang chỉnh sửa</h3>
                                        <p class="text-muted lead">Quản lý và cập nhật các khóa học của bạn, bao gồm trạng thái và thông tin chi tiết.</p>
                                    </div>
                                    
                                        
                                        <div class="settings-tickets-blk course-instruct-blk table-responsive rounded shadow-sm p-3 bg-white">
                                            <table class="table table-striped table-hover">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>Hình ảnh</th>
                                                        <th>Video demo</th>
                                                        <th>Tên khóa học</th>
                                                        <th>Giá</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $post)
                                                    @if($post->status == 0)
                                                    <tr>
                                                        <td>
                                                            <a href="#">
                                                                <img src="{{ Storage::url('public/assets-client/img/Courses/'.$post->thumbnail) }}" alt="Thumbnail" class="img-fluid rounded shadow-sm" style="max-width: 100px;">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            @if($post->video_demo)
                                                            <video controls class="img-fluid rounded shadow-sm" style="max-width: 150px;">
                                                                <source src="{{ Storage::url('public/assets-client/Videos/Courses/'.$post->video_demo) }}" type="video/mp4">
                                                                Trình duyệt của bạn không hỗ trợ thẻ video.
                                                            </video>
                                                            @else
                                                            <span class="text-muted">Không có video demo</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="sell-tabel-info">
                                                                    <p class="mb-0">
                                                                        <a href="{{ route('client.instructor-coursedetails', $post->id) }}" class="text-dark text-decoration-none font-weight-bold">
                                                                            {{ $post->name }}
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ number_format($post->price) }} VNĐ</td>
                                                        <td>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <!-- Nút Xóa -->
                                                                <form action="{{ route('client.deleteCourse', $post->id) }}" method="POST" class="delete-course-form">
                                                                    @csrf
                                                                    <button type="button" class="btn btn-danger delete-course-btn ">
                                                                        <i class="fas fa-trash-alt"></i> Xóa
                                                                    </button>
                                                                </form>
                                
                                                                <!-- Nút Sửa -->
                                                                <a href="{{ route('client.editCourse', $post->id) }}" class="btn btn-warning mx-2 ">
                                                                    <i class="fas fa-edit"></i> Sửa
                                                                </a>
                                
                                                                <!-- Nút Gửi duyệt -->
                                                                <form action="{{ route('client.submitCourse', $post->id) }}" method="POST" class="submit-course-form">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <button type="button" class="btn btn-success submit-course-btn ">
                                                                        Gửi duyệt <i class="bi bi-arrow-right"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                     @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    
                                </div>
                                @endif
                                @if($data->contains('status', 1))
                                <div class="settings-inner-blk p-4 bg-light rounded shadow">
                                    <div class="sell-course-head comman-space text-center mb-4">
                                        <h3 class="text-primary display-4">Danh sách khóa học đã được gửi duyệt</h3>
                                        <p class="text-muted lead">Các khóa học đã được gửi đến người quản trị trang web để chờ được xét duyệt</p>
                                    </div>
                                    
                                        
                                        <div class="settings-tickets-blk course-instruct-blk table-responsive rounded shadow-sm p-3 bg-white">
                                            <table class="table table-striped table-hover">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>Hình ảnh</th>
                                                        <th>Video demo</th>
                                                        <th>Tên khóa học</th>
                                                        <th>Giá</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $post)
                                                    @if($post->status ==1)
                                                    <tr>
                                                        <td>
                                                            <a href="#">
                                                                <img src="{{ Storage::url('public/assets-client/img/Courses/'.$post->thumbnail) }}" alt="Thumbnail" class="img-fluid rounded shadow-sm" style="max-width: 100px;">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            @if($post->video_demo)
                                                            <video controls class="img-fluid rounded shadow-sm" style="max-width: 150px;">
                                                                <source src="{{ Storage::url('public/assets-client/Videos/Courses/'.$post->video_demo) }}" type="video/mp4">
                                                                Trình duyệt của bạn không hỗ trợ thẻ video.
                                                            </video>
                                                            @else
                                                            <span class="text-muted">Không có video demo</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="sell-tabel-info">
                                                                    <p class="mb-0">
                                                                        <a href="{{ route('client.instructor-coursedetails', $post->id) }}" class="text-dark text-decoration-none font-weight-bold">
                                                                            {{ $post->name }}
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ number_format($post->price) }} VNĐ</td>
                                                        <td>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <!-- Nút Thu hồi -->
                                <form action="{{ route('client.recallCourse', $post->id) }}" method="POST" class="recall-course-form">
                                    @csrf
                                    @method('POST')
                                    <button type="button" class="btn btn-info recall-course-btn">
                                        <i class="fas fa-undo"></i> Thu hồi
                                    </button>
                                </form>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                     @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    
                                </div>
                                @endif
                                @if($data->contains('status', 2))
                                <div class="settings-inner-blk p-4 bg-light rounded shadow">
                                    <div class="sell-course-head comman-space text-center mb-4">
                                        <h3 class="text-primary display-4">Danh sách khóa học đã được duyệt</h3>
                                        <p class="text-muted lead">Các khóa học đã được duyệt và sẽ công khai trên website</p>
                                    </div>
                                    
                                        
                                        <div class="settings-tickets-blk course-instruct-blk table-responsive rounded shadow-sm p-3 bg-white">
                                            <table class="table table-striped table-hover">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>Hình ảnh</th>
                                                        <th>Video demo</th>
                                                        <th>Tên khóa học</th>
                                                        <th>Giá</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $post)
                                                    @if($post->status == 2)
                                                    <tr>
                                                        <td>
                                                            <a href="#">
                                                                <img src="{{ Storage::url('public/assets-client/img/Courses/'.$post->thumbnail) }}" alt="Thumbnail" class="img-fluid rounded shadow-sm" style="max-width: 100px;">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            @if($post->video_demo)
                                                            <video controls class="img-fluid rounded shadow-sm" style="max-width: 150px;">
                                                                <source src="{{ Storage::url('public/assets-client/Videos/Courses/'.$post->video_demo) }}" type="video/mp4">
                                                                Trình duyệt của bạn không hỗ trợ thẻ video.
                                                            </video>
                                                            @else
                                                            <span class="text-muted">Không có video demo</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="sell-tabel-info">
                                                                    <p class="mb-0">
                                                                        <a href="{{ route('client.instructor-coursedetails', $post->id) }}" class="text-dark text-decoration-none font-weight-bold">
                                                                            {{ $post->name }}
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ number_format($post->price) }} VNĐ</td>
                                                        <td>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <!-- Nút Xóa -->
                                                                <form action="{{ route('client.deleteCourse', $post->id) }}" method="POST" class="delete-course-form">
                                                                    @csrf
                                                                    <button type="button" class="btn btn-danger delete-course-btn rounded-pill">
                                                                        <i class="fas fa-trash-alt"></i> Xóa
                                                                    </button>
                                                                </form>
                                
                                                                <!-- Nút Sửa -->
                                                                <a href="{{ route('client.editCourse', $post->id) }}" class="btn btn-warning mx-2 rounded-pill">
                                                                    <i class="fas fa-edit"></i> Sửa
                                                                </a>
                                
                                                                <!-- Nút Gửi duyệt -->
                                                                <form action="{{ route('client.submitCourse', $post->id) }}" method="POST" class="submit-course-form">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <button type="button" class="btn btn-success submit-course-btn rounded-pill">
                                                                        Gửi duyệt <i class="bi bi-arrow-right"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                     @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @endif
                                </div>
                                <div id="confirmDeleteModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <p>Bạn có chắc chắn muốn xóa khóa học này không?</p>
                                        <div class="modal-buttons">
                                            <button type="button" class="btn btn-secondary" id="cancelDeleteBtn">Hủy</button>
                                            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Xóa</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="confirmSubmitModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <p>Bạn có chắc chắn muốn gửi khóa học này để duyệt không?</p>
                                        <div class="modal-buttons">
                                            <button type="button" class="btn btn-secondary" id="cancelSubmitBtn">Hủy</button>
                                            <button type="button" class="btn btn-warning" id="confirmSubmitBtn">Gửi duyệt</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="confirmRecallModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <p>Bạn có chắc chắn muốn thu hồi khóa học này không?</p>
                                        <div class="modal-buttons">
                                            <button type="button" class="btn btn-secondary" id="cancelRecallBtn">Hủy</button>
                                            <button type="button" class="btn btn-info" id="confirmRecallBtn">Thu hồi</button>
                                        </div>
                                    </div>
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
    let formToSubmit;
    const deleteModal = document.getElementById("confirmDeleteModal");
    const submitModal = document.getElementById("confirmSubmitModal");
    const recallModal = document.getElementById("confirmRecallModal"); // Thêm modal thu hồi

    const closeModalButtons = document.querySelectorAll(".close");
    const cancelDeleteBtn = document.getElementById("cancelDeleteBtn");
    const confirmDeleteBtn = document.getElementById("confirmDeleteBtn");
    const cancelSubmitBtn = document.getElementById("cancelSubmitBtn");
    const confirmSubmitBtn = document.getElementById("confirmSubmitBtn");
    const cancelRecallBtn = document.getElementById("cancelRecallBtn"); // Button hủy thu hồi
    const confirmRecallBtn = document.getElementById("confirmRecallBtn"); // Button xác nhận thu hồi

    // Sự kiện khi nhấn nút xóa khóa học
    document.querySelectorAll('.delete-course-btn').forEach(button => {
        button.addEventListener('click', function() {
            formToSubmit = this.closest('form');
            deleteModal.style.display = "block";
        });
    });

    // Sự kiện khi nhấn nút gửi duyệt khóa học
    document.querySelectorAll('.submit-course-btn').forEach(button => {
        button.addEventListener('click', function() {
            formToSubmit = this.closest('form');
            submitModal.style.display = "block";
        });
    });

    // Sự kiện khi nhấn nút thu hồi khóa học
    document.querySelectorAll('.recall-course-btn').forEach(button => {
        button.addEventListener('click', function() {
            formToSubmit = this.closest('form');
            recallModal.style.display = "block";
        });
    });

    // Sự kiện đóng modal
    closeModalButtons.forEach(button => {
        button.onclick = function() {
            deleteModal.style.display = "none";
            submitModal.style.display = "none";
            recallModal.style.display = "none"; // Đóng modal thu hồi
        };
    });

    // Sự kiện hủy xóa
    cancelDeleteBtn.onclick = function() {
        deleteModal.style.display = "none";
    };

    // Sự kiện hủy gửi duyệt
    cancelSubmitBtn.onclick = function() {
        submitModal.style.display = "none";
    };

    // Sự kiện hủy thu hồi
    cancelRecallBtn.onclick = function() {
        recallModal.style.display = "none";
    };

    // Sự kiện xác nhận xóa
    confirmDeleteBtn.onclick = function() {
        if (formToSubmit) {
            formToSubmit.submit();
        }
    };

    // Sự kiện xác nhận gửi duyệt
    confirmSubmitBtn.onclick = function() {
        if (formToSubmit) {
            formToSubmit.submit();
        }
    };

    // Sự kiện xác nhận thu hồi
    confirmRecallBtn.onclick = function() {
        if (formToSubmit) {
            formToSubmit.submit();
        }
    };

    // Đóng modal khi nhấp ngoài modal
    window.onclick = function(event) {
        if (event.target == deleteModal) {
            deleteModal.style.display = "none";
        }
        if (event.target == submitModal) {
            submitModal.style.display = "none";
        }
        if (event.target == recallModal) {
            recallModal.style.display = "none";
        }
    };
});
    </script>
    
@endsection
