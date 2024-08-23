@extends('client.layout.master')

@section('content')
    <div class="breadcrumb-bar">
        <div class="container">
        </div>
    </div>
    <div class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instructor-wrap border-bottom-0 m-0">
                        <div class="about-instructor align-items-center">

                            <div class="instructor-detail me-3">
                                <h2>{{ $course->name }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="page-content course-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card overview-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Mô tả khóa học</h5>
                            <h6>Giới thiệu về khóa học</h6>
                            <p>{{ $course->description }}</p>
                        </div>
                    </div>
                    <div class="card instructor-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Thông tin giảng viên</h5>
                            <div class="instructor-wrap">
                                <div class="about-instructor">
                                    <div class="abt-instructor-img">
                                        <a href="javascript:void(0);" class="profile-info-img">
                                            <img src="{{ $course->mentor->thumbnail ? Storage::url('public/' . $course->mentor->thumbnail) : 'https://cdn-icons-png.flaticon.com/128/9721/9721084.png' }}"
                                                alt class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="instructor-detail">
                                        <h5><a href="#">
                                                @if ($course->mentor)
                                                    {{ $course->mentor->user->name }}
                                                @else
                                                    Không tìm thấy mentor
                                                @endif
                                            </a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="course-info d-flex align-items-center">
                                <div class="cou-info">
                                    <img src="/assets-client/img/icon/play.svg" alt>
                                    <p>{{ $allCourses->count() }} Khóa học</p>
                                </div>
                                <div class="cou-info">
                                    <img src="/assets-client/img/icon/icon-01.svg" alt>
                                    <p>{{ $totalLessons }} Bài học</p>
                                </div>
                                {{--                                <div class="cou-info"> --}}
                                {{--                                    <img src="/assets-client/img/icon/icon-02.svg" alt> --}}
                                {{--                                    <p>9 giờ 30 phút</p> --}}
                                {{--                                </div> --}}
                                <div class="cou-info">
                                    <img src="/assets-client/img/icon/people.svg" alt>
                                    @if ($totalStudents == 0)
                                        <p>Chưa ai đăng ký khóa học</p>
                                    @elseif ($totalStudents == 1)
                                        <p>1 học viên đã đăng ký</p>
                                    @else
                                        <p>{{ number_format($totalStudents) }} học viên đã đăng ký</p>
                                    @endif
                                </div>

                            </div>
                            {{ $mentor->introduce }}
                        </div>
                    </div>
                    <div class="card comment-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Bình luận</h5>
                            <form action="{{ route('client.comments-store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="rating">Đánh giá:</label>
                                    <div class="rating-stars">
                                        <input type="radio" id="star1" name="stars" value="5" />
                                        <label for="star1" title="1 star">&#9733;</label>
                                        <input type="radio" id="star2" name="stars" value="4" />
                                        <label for="star2" title="2 stars">&#9733;</label>
                                        <input type="radio" id="star3" name="stars" value="3" />
                                        <label for="star3" title="3 stars">&#9733;</label>
                                        <input type="radio" id="star4" name="stars" value="2" />
                                        <label for="star4" title="4 stars">&#9733;</label>
                                        <input type="radio" id="star5" name="stars" value="1" />
                                        <label for="star5" title="5 stars">&#9733;</label>
                                    </div>
                                </div>
                                <input type="hidden" name="course_id" value="{{ $course->id }}" /> <!-- Thay $course->id bằng ID khóa học hiện tại -->
                                <div class="input-block">
                                    <textarea name="content" rows="4" class="form-control" placeholder="Nhập bình luận" required></textarea>
                                </div>
                                <div class="submit-section">
                                    <button class="btn submit-btn" type="submit">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="review-section">
                        <div class="review-container">
                            <h5 class="review-title">Bình luận của khóa học</h5>
                            @if($comments->isEmpty())
                                <p class="no-reviews">Chưa có bình luận nào cho khóa học này.</p>
                            @else
                                @foreach($comments as $comment)
                                    <div class="binh-luan-item mb-4 p-3 border rounded shadow-sm">
                                        <div class="binh-luan-header d-flex justify-content-between align-items-center mb-2">
                                            <strong class="binh-luan-nguoi-danh-gia">{{ $comment->user->name }}</strong>
                                            <span class="binh-luan-ngay text-muted">{{ $comment->created_at->format('d/m/Y H:i') }}</span>
                                        </div>
                                        <div class="binh-luan-noi-dung mb-2">
                                            <p>{{ $comment->content }}</p>
                                        </div>
                                        <div class="binh-luan-danh-gia mb-2">
                                            @for($i = 1; $i <= 5; $i++)
                                                <span class="sao-danh-gia {{ $i <= $comment->stars ? 'da-danh-gia' : '' }}">&#9733;</span>
                                            @endfor
                                        </div>
                                        <!-- Nút Chỉnh sửa, Xóa và Trả lời -->
                                        <div class="d-flex justify-content-end">
                                            @if(auth()->check() && auth()->user()->id == $comment->user_id)
                                                <button class="btn btn-primary btn-sm edit-comment-btn" data-comment-id="{{ $comment->id }}">Chỉnh sửa</button>
                                                <button class="btn btn-danger btn-sm delete-comment-btn ml-2" data-comment-id="{{ $comment->id }}">Xóa</button>
                                            @endif
                                            <button class="btn btn-info btn-sm reply-comment-btn ml-2" data-comment-id="{{ $comment->id }}">Trả lời</button>
                                        </div>
                    
                                        <!-- Form trả lời bình luận -->
                                        <div class="reply-comment-form d-none" id="reply-comment-form-{{ $comment->id }}">
                                            <h5>Trả lời bình luận</h5>
                                            <form method="POST" action="{{ route('client.comments-reply', ['id' => $comment->id]) }}">
                                                @csrf
                                                <div class="form-group">
                                                    <textarea class="form-control" name="content" rows="3" placeholder="Nội dung trả lời"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-sm">Gửi</button>
                                                <button type="button" class="btn btn-secondary btn-sm cancel-reply-btn">Hủy</button>
                                            </form>
                                        </div>
                    
                                        <!-- Form chỉnh sửa bình luận -->
                                        <div class="edit-comment-form d-none" id="edit-comment-form-{{ $comment->id }}">
                                            <h5>Chỉnh sửa bình luận</h5>
                                            <form method="POST" action="{{ route('client.comments-update', ['id' => $comment->id]) }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="rating">Đánh giá:</label>
                                                    <div class="rating-stars">
                                                        @for($i = 5; $i >= 1; $i--)
                                                            <input type="radio" id="star{{ $comment->id }}-{{ $i }}" name="stars" value="{{ $i }}" {{ $i == $comment->stars ? 'checked' : '' }} />
                                                            <label for="star{{ $comment->id }}-{{ $i }}" title="{{ $i }} stars">&#9733;</label>
                                                        @endfor
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="content" rows="3" placeholder="Nội dung bình luận">{{ $comment->content }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-sm">Lưu</button>
                                                <button type="button" class="btn btn-secondary btn-sm cancel-edit-btn">Hủy</button>
                                            </form>
                                        </div>
                    
                                        <!-- Hiển thị các câu trả lời -->
                                        @if($comment->replies->isNotEmpty())
                                        @foreach($comment->replies as $reply)
                                            <div class="binh-luan-item mb-4 mt-3 p-3 border rounded shadow-sm ml-4">
                                                <div class="binh-luan-header d-flex justify-content-between align-items-center mb-2">
                                                    <strong class="binh-luan-nguoi-danh-gia">{{ $reply->user->name }}</strong>
                                                    <span class="binh-luan-ngay text-muted">{{ $reply->created_at->format('d/m/Y H:i') }}</span>
                                                </div>
                                                <div class="binh-luan-noi-dung mb-2">
                                                    <p>{{ $reply->content }}</p>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    @if(auth()->check() && auth()->user()->id == $reply->user_id)
                                                        <button class="btn btn-primary btn-sm edit-reply-btn" data-reply-id="{{ $reply->id }}">Chỉnh sửa</button>
                                                        <form method="POST" action="{{ route('client.replies-delete', ['id' => $reply->id]) }}" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm ml-2">Xóa</button>
                                                        </form>
                                                    @endif
                                                </div>
                                                <!-- Form chỉnh sửa trả lời -->
                                                <div class="edit-reply-form d-none" id="edit-reply-form-{{ $reply->id }}">
                                                    <h5>Chỉnh sửa trả lời</h5>
                                                    <form method="POST" action="{{ route('client.replies-update', ['id' => $reply->id]) }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="content" rows="3" placeholder="Nội dung trả lời">{{ $reply->content }}</textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-success btn-sm">Lưu</button>
                                                        <button type="button" class="btn btn-secondary btn-sm cancel-edit-reply-btn">Hủy</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-sec py-5">
                        <div class="video-sec vid-bg">
                            <div class="card">
                                <div class="card-body">
                                    @if ($course->video_demo)
                                        <div class="video-container">
                                            <video controls class="img-fluid rounded shadow-sm">
                                                <source src="{{ Storage::url('public/' . $course->video_demo) }}"
                                                    type="video/mp4">
                                                Trình duyệt của bạn không hỗ trợ thẻ video.
                                            </video>
                                        </div>
                                    @else
                                        <span class="text-muted">Không có video demo</span>
                                    @endif

                                    <div class="video-details mt-3">
                                        <div class="course-fee">
                                            <span>Giá: {{ $course->price }} VNĐ</span>
                                        </div>
                                        <a href="{{ route('client.course-checkout', $course->id) }}"
                                            class="btn btn-enroll w-100 mt-3">Đăng ký ngay</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card feature-sec">
                            <div class="card-body">
                                <div class="cat-title">
                                    <h4>Bao gồm</h4>
                                </div>
                                <ul>
                                    <li>
                                        <img src="/assets-client/img/icon/users.svg" class="me-2" alt>
                                        @if ($totalStudents1 == 0)
                                            Chưa ai đăng ký khóa học
                                        @elseif ($totalStudents1 == 1)
                                            Đã đăng ký: 1 học viên
                                        @else
                                            Đã đăng ký: {{ $totalStudents1 }} học viên
                                        @endif
                                    </li>

                                    {{--                                    <li><img src="/assets-client/img/icon/timer.svg" class="me-2" alt> Thời lượng: --}}
                                    {{--                                        <span>{{ $course->total_duration }}</span> giờ --}}
                                    {{--                                    </li> --}}
                                    <li>
                                        <img src="/assets-client/img/icon/chapter.svg" class="me-2" alt>
                                        @if ($totalChapters == 0)
                                            Không có chương nào
                                        @elseif ($totalChapters == 1)
                                            Số chương: 1
                                        @else
                                            Số chương: {{ $totalChapters }}
                                        @endif
                                    </li>

                                    <li>
                                        <img src="/assets-client/img/icon/video.svg" class="me-2" alt>
                                        @if ($totalLessons == 0)
                                            Không có bài học nào
                                        @elseif ($totalLessons == 1)
                                            Số bài: 1
                                        @else
                                            Số bài: {{ $totalLessons }}
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.edit-comment-btn').forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            const form = document.querySelector(`#edit-comment-form-${commentId}`);
            
            // Hiện form chỉnh sửa
            form.classList.remove('d-none');
            form.classList.add('d-block');
        });
    });

    document.querySelectorAll('.cancel-edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.edit-comment-form');
            
            // Ẩn form chỉnh sửa
            form.classList.remove('d-block');
            form.classList.add('d-none');
        });
    });
});

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-comment-btn');
        
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const commentId = this.getAttribute('data-comment-id');
        
                    if (confirm('Bạn có chắc chắn muốn xóa bình luận này?')) {
                        fetch(`/client/comments/${commentId}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message === 'Comment deleted successfully') {
                                // Xóa bình luận khỏi giao diện
                                this.closest('.binh-luan-item').remove();
                            } else {
                                alert('Có lỗi xảy ra khi xóa bình luận.');
                            }
                        });
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
    // Hiển thị form trả lời khi nhấn nút "Trả lời"
    document.querySelectorAll('.reply-comment-btn').forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            const form = document.getElementById(`reply-comment-form-${commentId}`);
            form.classList.toggle('d-none');
        });
    });

    // Ẩn form trả lời khi nhấn nút "Hủy"
    document.querySelectorAll('.cancel-reply-btn').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.reply-comment-form');
            form.classList.add('d-none');
        });
    });

   
});
document.addEventListener('DOMContentLoaded', function() {
    // Hiển thị form chỉnh sửa trả lời
    document.querySelectorAll('.edit-reply-btn').forEach(button => {
        button.addEventListener('click', function() {
            const replyId = this.getAttribute('data-reply-id');
            const form = document.getElementById(`edit-reply-form-${replyId}`);
            form.classList.remove('d-none');
        });
    });

    // Ẩn form chỉnh sửa trả lời khi nhấn nút "Hủy"
    document.querySelectorAll('.cancel-edit-reply-btn').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.edit-reply-form').classList.add('d-none');
        });
    });
});


        </script>
        
@endsection
