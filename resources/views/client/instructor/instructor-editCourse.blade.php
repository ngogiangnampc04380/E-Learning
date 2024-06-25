@extends('client.layout.master')
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">

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
        {{-- <li class="nav-item {{ request()->routeIs('client.instructor-course') ? 'active' : '' }}">
            <a href="{{ route('client.instructor-course') }}" class="nav-link">
                <i class="feather-book"></i> Quản lí khóa học
            </a>
        </li> --}}
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


                <div class="col-xl-9 col-lg-8 col-md-12 mx-auto" style="margin-top: 100px;">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <h2>Chỉnh sửa khóa học: {{ $course->name }}</h2>
                            <table class="table table-responsive table-hover">
                                
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Video demo</th>
                                        <th>Tên khóa học</th>
                                        <th>Giá</th>
                                        
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="{{ Storage::url('public/assets-client/img/Courses/'.$course->thumbnail) }}" alt="Thumbnail" class="img-fluid" style="max-width: 100px;">
                                                </a>
                                            </td>
                                            <td>
                                                @if($course->video_demo)
                                                    <video controls class="img-fluid" style="max-width: 150px;">
                                                        <source src="{{ Storage::url('public/assets-client/videos/Courses/'.$course->video_demo) }}" type="video/mp4">
                                                        Trình duyệt của bạn không hỗ trợ thẻ video.
                                                    </video>
                                                @else
                                                    Không có video demo
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="sell-tabel-info">
                                                        <p>
                                                            <a href="{{ route('client.instructor-coursedetails', $course->id) }}">
                                                                {{ $course->name }}
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ number_format($course->price) }} VNĐ</td>
                                            
                                            <td>
                                               
                                                    <form action="{{ route('client.deleteCourse', $course->id) }}" method="POST" class="mr-2 delete-course-form">
                                                        @csrf
                                                        <button type="button" class="btn btn-danger delete-course-btn">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                    
                                               
                                            </td>
                                        </tr>
                                    
                                </tbody>
                                
                            </table>
                            <button type="button" class="btn btn-secondary mt-3" id="backBtn" style="display: none;">Quay lại</button>
                        
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        
                            <!-- Nút chỉnh sửa thông tin khóa học -->
                            <button type="button" class="btn btn-warning mt-3 mb-3" id="editCourseBtn">Chỉnh sửa thông tin khóa học</button>
                        
                            <!-- Form cập nhật thông tin khóa học -->
                            <form action="{{ route('client.updateCourse', $course->id) }}" method="POST" enctype="multipart/form-data" id="editCourseForm" style="display: none;">
                                @csrf
                                <!-- Các trường thông tin khóa học -->
                                <div class="form-group">
                                    <label for="name">Tên khóa học</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $course->name }}" required>
                                </div>
                        
                                <div class="form-group">
                                    <label for="description">Mô tả khóa học</label>
                                    <textarea id="description" name="description" class="form-control" rows="3" required>{{ $course->description }}</textarea>
                                </div>
                        
                                <div class="form-group">
                                    <label for="thumbnail">Hình ảnh khóa học</label>
                                    <input type="file" id="thumbnail" name="thumbnail" class="form-control">
                                    @if($course->thumbnail)
                                        <img src="{{ Storage::url($course->thumbnail) }}" alt="Thumbnail" class="img-fluid" style="max-width: 100px; margin-top: 10px;">
                                    @endif
                                </div>
                        
                                <div class="form-group">
                                    <label for="video_demo">Video demo</label>
                                    <input type="file" id="video_demo" name="video_demo" class="form-control">
                                    @if($course->video_demo)
                                        <video controls class="img-fluid" style="max-width: 150px; margin-top: 10px;">
                                            <source src="{{ Storage::url($course->video_demo) }}" type="video/mp4">
                                            Trình duyệt của bạn không hỗ trợ thẻ video.
                                        </video>
                                    @endif
                                </div>
                        
                                <div class="form-group">
                                    <label for="price">Giá</label>
                                    <input type="text" id="price" name="price" class="form-control" value="{{ $course->price }}" required>
                                </div>
                        
                                <div class="form-group">
                                    <label for="category_id">Danh mục khóa học</label>
                                    <select id="category_id" name="category_id" class="form-control" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $course->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                        
                                <button type="submit" class="btn btn-primary">Cập nhật khóa học</button>
                                
                                <!-- Nút quay lại -->
                            </form>
                
                            <!-- Danh sách chương -->
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="mt-5">Danh sách chương</h3>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Tên chương</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($course->chapters as $chapter)
                                            <tr>
                                                <td>{{ $chapter->name }}</td>
                                                
                                                <td>
                                                    <div class="d-flex">
                                                        <form action="{{ route('client.deleteChapter', $chapter->id) }}" method="POST" class="delete-chapter-form mr-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger delete-chapter-btn " data-chapter-id="{{ $chapter->id }}">Xóa</button>
                                                        </form>
                                                        <button type="button" class="btn btn-warning ml-2 edit-chapter-btn ms-2 me-2" data-chapter-id="{{ $chapter->id }}">Sửa chương</button>
                                                        <button type="button" class="btn btn-primary ml-2 toggle-lesson-form ms-2 me-2" data-chapter-id="{{ $chapter->id }}">Thêm bài học</button>
                                                        <button type="button" class="btn btn-info ml-2 toggle-lesson-list" data-chapter-id="{{ $chapter->id }}">Ẩn bài học</button>
                                                        
                                                    </div>
                                                    <div class="lesson-list mt-2" data-chapter-id="{{ $chapter->id }}" style="display: block; border: 1px solid #ccc; padding: 10px;">
                                                        <h4 style="margin-bottom: 10px;">Danh sách bài học</h4>
                                                        <ul class="list-group">
                                                            @foreach($chapter->lessons as $lesson)
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <span>{{ $lesson->name }}</span>
                                                                <div>
                                                                    <a href="{{ asset('public/assets-client/Videos/Lessons/' . $lesson->path_video) }}" target="_blank" class="btn btn-sm btn-primary mr-2">Xem video</a>
                                                                    <button type="button" class="btn btn-sm btn-warning edit-lesson-btn" data-lesson-id="{{ $lesson->id }}">Sửa</button>
                                                                    <button type="button" class="btn btn-sm btn-danger delete-lesson-btn" data-lesson-id="{{ $lesson->id }}">Xóa</button>
                                                                    
                                                                </div>
                                                            </li>
                                                            <div class="edit-lesson-form mt-2" data-lesson-id="{{ $lesson->id }}" style="display: none;">
                                                                <form action="{{ route('client.updateLesson', $lesson->id) }}" method="POST" class="lesson-update-form" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-group">
                                                                        <label for="edit_lesson_name">Tên bài học</label>
                                                                        <input type="text" id="edit_lesson_name" name="name" class="form-control" value="{{ $lesson->name }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="edit_lesson_video">Video bài học</label>
                                                                        <input type="file" id="edit_lesson_video" name="video" class="form-control-file">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-success save-lesson-btn m-2">Lưu</button>
                                                                    <button type="button" class="btn btn-secondary cancel-edit-lesson-btn m-2" data-lesson-id="{{ $lesson->id }}">Hủy</button>
                                                                    <hr>
                                                                </form>
                                                            </div>
                                                            @endforeach
                                                        </ul>
                                                        
                                                    </div>
                                                    <div class="add-lesson-form mt-2" data-chapter-id="{{ $chapter->id }}" style="display: none;">
                                                        <form action="{{ route('client.addLesson') }}" method="POST" class="lesson-form" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="chapter_id" value="{{ $chapter->id }}">
                                                            
                                                            <div class="form-group">
                                                                <label for="lesson_name">Tên bài học</label>
                                                                <input type="text" id="lesson_name" name="name" class="form-control" required>
                                                            </div>
                                                    
                                                            <div class="form-group custom-file">
                                                                <label class="custom-file-label" for="lesson_video">Chọn video bài học</label>
                                                                <input type="file" class="custom-file-input" id="lesson_video" name="video" required accept="video/*">
                                                            </div>
                                                    
                                                            <button type="submit" class="btn btn-success">Lưu bài học</button>
                                                        </form>
                                                    </div>
                                                    <div class="edit-chapter-form mt-2" data-chapter-id="{{ $chapter->id }}" style="display: none;">
                                                        <form action="{{ route('client.updateChapter', $chapter->id) }}" method="POST" class="update-chapter-form">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="edit_chapter_name">Tên chương</label>
                                                                <input type="text" id="edit_chapter_name" name="name" class="form-control" value="{{ $chapter->name }}" required>
                                                            </div>
                                                            <button type="submit" class="btn btn-success">Lưu</button>
                                                            <button type="button" class="btn btn-secondary cancel-edit-chapter-btn" data-chapter-id="{{ $chapter->id }}">Hủy</button>
                                                        </form>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                    <!-- Nút thêm chương mới -->
                                    <div class="mt-4">
                                        
                                        <button type="button" class="btn btn-primary" id="addChapterBtn">Thêm chương mới</button>
                                    </div>
                                    
                                    <!-- Form thêm chương mới (ẩn mặc định) -->
                                    <div id="addChapterForm" style="display: none;">
                                        <h3 class="mt-4">Thêm chương mới</h3>
                                        <form action="{{ route('client.addChapter', $course->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="chapter_name">Tên chương</label>
                                                <input type="text" id="chapter_name" name="name" class="form-control" required>
                                            </div>
                                            <button type="submit" class="btn btn-success">Thêm chương</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <form action="{{ route('client.submitCourse', $course->id) }}" method="POST" class="submit-course-form">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-lg btn-warning btn-arrow">
                                    Gửi duyệt <i class="bi bi-arrow-right"></i>
                                </button>
                            </form>
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
                    </div>
                </div>

            </div>
        </div>
    </div>
   
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editCourseBtn = document.getElementById('editCourseBtn');
        const editCourseForm = document.getElementById('editCourseForm');
        const backBtn = document.getElementById('backBtn');

        editCourseBtn.addEventListener('click', function() {
            // Ẩn nút chỉnh sửa thông tin khóa học
            editCourseBtn.style.display = 'none';

            // Hiển thị form chỉnh sửa thông tin khóa học
            editCourseForm.style.display = 'block';

            // Hiển thị nút quay lại
            backBtn.style.display = 'block';
        });

        backBtn.addEventListener('click', function() {
            // Ẩn form cập nhật thông tin khóa học
            editCourseForm.style.display = 'none';

            // Hiển thị nút chỉnh sửa thông tin khóa học
            editCourseBtn.style.display = 'block';

            // Ẩn nút quay lại
            backBtn.style.display = 'none';
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let formToSubmit;
        const modal = document.getElementById("confirmDeleteModal");
        const closeModal = document.getElementsByClassName("close")[0];
        const cancelDeleteBtn = document.getElementById("cancelDeleteBtn");
        const confirmDeleteBtn = document.getElementById("confirmDeleteBtn");

        document.querySelectorAll('.delete-course-btn').forEach(button => {
            button.addEventListener('click', function() {
                formToSubmit = this.closest('form');
                modal.style.display = "block";
            });
        });

        closeModal.onclick = function() {
            modal.style.display = "none";
        }

        cancelDeleteBtn.onclick = function() {
            modal.style.display = "none";
        }

        confirmDeleteBtn.onclick = function() {
            formToSubmit.submit();
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
</script>
<script>
    // Script để hiển thị form thêm chương mới khi click vào nút
    document.getElementById('addChapterBtn').addEventListener('click', function() {
        document.getElementById('addChapterForm').style.display = 'block';
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-chapter-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Ngăn chặn hành động mặc định của button
                
                // Hiển thị thông báo xác nhận
                if (confirm('Bạn có chắc chắn muốn xóa chương này không?')) {
                    // Nếu xác nhận, submit form để xóa chương
                    this.closest('form').submit();
                }
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleLessonForms = document.querySelectorAll('.toggle-lesson-form');

        toggleLessonForms.forEach(button => {
            button.addEventListener('click', function() {
                const chapterId = this.getAttribute('data-chapter-id');
                const addLessonForm = document.querySelector(`.add-lesson-form[data-chapter-id="${chapterId}"]`);
                addLessonForm.style.display = addLessonForm.style.display === 'none' ? 'block' : 'none';
                this.innerText = addLessonForm.style.display === 'none' ? 'Thêm bài học' : 'Ẩn';
            });
        });
    });
</script>
<script>document.querySelectorAll('.toggle-lesson-list').forEach(button => {
    button.addEventListener('click', function() {
        const chapterId = this.getAttribute('data-chapter-id');
        const lessonList = document.querySelector(`.lesson-list[data-chapter-id="${chapterId}"]`);
        lessonList.style.display = lessonList.style.display === 'block' ? 'none' : 'block';

        // Đổi nút Xem bài học thành nút Ẩn khi hiển thị danh sách
        if (lessonList.style.display === 'block') {
            this.textContent = 'Ẩn bài học';
        } else {
            this.textContent = 'Xem bài học';
        }
    });
});
</script>
<script>
    document.querySelectorAll('.edit-lesson-btn').forEach(button => {
        button.addEventListener('click', function() {
            const lessonId = this.dataset.lessonId;
            const editForm = document.querySelector(`.edit-lesson-form[data-lesson-id="${lessonId}"]`);
            if (editForm.style.display === 'none') {
                editForm.style.display = 'block';
                this.textContent = 'Ẩn';
            } else {
                editForm.style.display = 'none';
                this.textContent = 'Sửa';
            }
        });
    });

    // Cancel edit lesson form
    document.querySelectorAll('.cancel-edit-lesson-btn').forEach(button => {
        button.addEventListener('click', function() {
            const lessonId = this.dataset.lessonId;
            const editForm = document.querySelector(`.edit-lesson-form[data-lesson-id="${lessonId}"]`);
            editForm.style.display = 'none';
            document.querySelector(`.edit-lesson-btn[data-lesson-id="${lessonId}"]`).textContent = 'Sửa';
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        // Xử lý sự kiện click nút xóa bài học
        document.querySelectorAll('.delete-lesson-btn').forEach(button => {
            button.addEventListener('click', function() {
                const lessonId = this.getAttribute('data-lesson-id');
                if (confirm('Bạn có chắc chắn muốn xóa bài học này không?')) {
                    fetch(`{{ route('client.deleteLesson', '') }}/${lessonId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Xóa thành công, cập nhật giao diện
                            this.closest('li').remove();
                            alert('Đã xóa bài học thành công.');
                        } else {
                            alert('Đã xảy ra lỗi khi xóa bài học.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Đã xảy ra lỗi khi xóa bài học.');
                    });
                }
            });
        });
    });
    document.querySelectorAll('.edit-chapter-btn').forEach(button => {
        button.addEventListener('click', function() {
            const chapterId = this.getAttribute('data-chapter-id');
            const editForm = document.querySelector(`.edit-chapter-form[data-chapter-id="${chapterId}"]`);
            editForm.style.display = editForm.style.display === 'none' ? 'block' : 'none';
        });
    });

    // Ẩn form sửa chương
    document.querySelectorAll('.cancel-edit-chapter-btn').forEach(button => {
        button.addEventListener('click', function() {
            const chapterId = this.getAttribute('data-chapter-id');
            const editForm = document.querySelector(`.edit-chapter-form[data-chapter-id="${chapterId}"]`);
            editForm.style.display = 'none';
        });
    });

</script>
@endsection
