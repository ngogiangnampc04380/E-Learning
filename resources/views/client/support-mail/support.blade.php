@extends('client.layout.master')
@section('content')

<div class="page-banner">
   
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="support-wrap">
                    <h5 class="support-title">GỬI YÊU CẦU HỖ TRỢ CỦA BẠN</h5>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form id="support-form" action="{{ route('client.contact.submit') }}" method="POST">
                        @csrf
                        <div class="input-block">
                            <label for="firstName">Họ và tên</label>
                            <input type="text" id="firstName" name="firstName" class="form-control" placeholder="Nhập họ và tên của bạn" required>
                        </div>
                        <div class="input-block">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Nhập địa chỉ email của bạn" required>
                        </div>
                        <div class="input-block">
                            <label for="subject">Chủ đề</label>
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Nhập chủ đề" required>
                        </div>
                        <div class="input-block">
                            <label for="description">Mô tả</label>
                            <textarea id="description" name="description" class="form-control" placeholder="Viết nội dung yêu cầu hỗ trợ của bạn" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-submit">Gửi yêu cầu</button>
                        
                        <div id="loading" class="loading" style="display: none;">
                            <div class="spinner"></div>
                            <span>Đang gửi, xin vui lòng chờ...</span>
                        </div>
                        
                        <div id="success-message" class="success-message" style="display: none;">
                            <div class="checkmark">
                                <svg viewBox="0 0 24 24" class="checkmark-svg">
                                    <path d="M21 7L9 19l-5-5"></path>
                                </svg>
                            </div>
                            <p>Yêu cầu đã được gửi thành công!</p>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#support-form').on('submit', function(e) {
            e.preventDefault(); // Ngăn không cho form gửi theo cách mặc định

            // Hiển thị hiệu ứng quay tròn
            $('#loading').show();
            $('#success-message').hide();

            // Gửi yêu cầu bằng AJAX
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    // Ẩn hiệu ứng quay tròn và hiển thị thông báo thành công
                    $('#loading').hide();
                    $('#success-message').show();

                    // Tự động tải lại trang sau 2 giây
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                },
                error: function(xhr) {
                    // Ẩn hiệu ứng quay tròn nếu có lỗi
                    $('#loading').hide();
                    alert('Đã xảy ra lỗi. Vui lòng thử lại.');
                }
            });
        });
    });
</script>


@endsection
