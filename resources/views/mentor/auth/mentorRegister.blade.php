@extends('client.layout.authMaster')
@section('content')
<style>
    /* Gợi ý (Suggestions) */
.suggestions {
    position: absolute;
    max-height: 200px;
    overflow-y: auto;
    list-style-type: none;
    padding: 0;
    margin: 0;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 10;
    /* Đảm bảo width khớp với trường nhập liệu */
    display: none; /* Ẩn danh sách gợi ý khi không có gợi ý */
}

.suggestions li {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    cursor: pointer;
    transition: background-color 0.3s;
}

.suggestions li:hover {
    background-color: #f1f1f1;
}

.suggestions li:last-child {
    border-bottom: none;
}

</style>
    <div class="main-wrapper log-wrap">
        <div class="row">

            <div class="col-md-6 login-bg">
                <div class="owl-carousel login-slide owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-3798px, 0px, 0px); transition: all 0.25s ease 0s; width: 5318px;">
                            <div class="owl-item cloned" style="width: 735.6px; margin-right: 24px;">
                                <div class="welcome-login">
                                    <div class="login-banner">
                                        <img src="https://cdnl.iconscout.com/lottie/premium/thumb/account-login-8677600-6981645.gif" class="img-fluid" alt="Logo">
                                    </div>
                                    <div class="mentor-course text-center">
                                        <h2>Chào mừng bạn đến với <br>các khóa học của ENT .</h2>
                                                                            <p>Khám phá ENT - Trang web tiên phong về khóa học tiếng Anh. Với đội ngũ giáo viên chất lượng và nội dung học tập đa dạng, chúng tôi sẽ giúp bạn tiến xa trên hành trình học tiếng Anh của mình.</p>

                                    </div>
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 735.6px; margin-right: 24px;">
                                <div class="welcome-login">
                                    <div class="login-banner">
                                        <img src="https://cdnl.iconscout.com/lottie/premium/thumb/account-login-8677600-6981645.gif" class="img-fluid" alt="Logo">
                                    </div>
                                    <div class="mentor-course text-center">
                                        <h2>Chào mừng bạn đến với <br>các khóa học của ENT .</h2>
                                                                            <p>Khám phá ENT - Trang web tiên phong về khóa học tiếng Anh. Với đội ngũ giáo viên chất lượng và nội dung học tập đa dạng, chúng tôi sẽ giúp bạn tiến xa trên hành trình học tiếng Anh của mình.</p>

                                    </div>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 735.6px; margin-right: 24px;">
                                <div class="welcome-login">
                                    <div class="login-banner">
                                        <img src="https://cdnl.iconscout.com/lottie/premium/thumb/account-login-8677600-6981645.gif" class="img-fluid" alt="Logo">
                                    </div>
                                    <div class="mentor-course text-center">
                                        <h2>Chào mừng bạn đến với <br>các khóa học của ENT .</h2>
                                                                            <p>Khám phá ENT - Trang web tiên phong về khóa học tiếng Anh. Với đội ngũ giáo viên chất lượng và nội dung học tập đa dạng, chúng tôi sẽ giúp bạn tiến xa trên hành trình học tiếng Anh của mình.</p>

                                    </div>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 735.6px; margin-right: 24px;">
                                <div class="welcome-login">
                                    <div class="login-banner">
                                        <img src="https://cdnl.iconscout.com/lottie/premium/thumb/account-login-8677600-6981645.gif" class="img-fluid" alt="Logo">
                                    </div>
                                    <div class="mentor-course text-center">
                                        <h2>Chào mừng bạn đến với <br>các khóa học của ENT .</h2>
                                                                            <p>Khám phá ENT - Trang web tiên phong về khóa học tiếng Anh. Với đội ngũ giáo viên chất lượng và nội dung học tập đa dạng, chúng tôi sẽ giúp bạn tiến xa trên hành trình học tiếng Anh của mình.</p>

                                    </div>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 735.6px; margin-right: 24px;">
                                <div class="welcome-login">
                                    <div class="login-banner">
                                        <img src="https://cdnl.iconscout.com/lottie/premium/thumb/account-login-8677600-6981645.gif" class="img-fluid" alt="Logo">
                                    </div>
                                    <div class="mentor-course text-center">
                                        <h2>Chào mừng bạn đến với <br>các khóa học của ENT .</h2>
                                                                            <p>Khám phá ENT - Trang web tiên phong về khóa học tiếng Anh. Với đội ngũ giáo viên chất lượng và nội dung học tập đa dạng, chúng tôi sẽ giúp bạn tiến xa trên hành trình học tiếng Anh của mình.</p>

                                    </div>
                                </div>
                            </div>
                            <div class="owl-item cloned active" style="width: 735.6px; margin-right: 24px;">
                                <div class="welcome-login">
                                    <div class="login-banner">
                                        <img src="https://cdnl.iconscout.com/lottie/premium/thumb/account-login-8677600-6981645.gif" class="img-fluid" alt="Logo">
                                    </div>
                                    <div class="mentor-course text-center">
                                        <h2>Chào mừng bạn đến với <br>các khóa học của ENT .</h2>
                                                                            <p>Khám phá ENT - Trang web tiên phong về khóa học tiếng Anh. Với đội ngũ giáo viên chất lượng và nội dung học tập đa dạng, chúng tôi sẽ giúp bạn tiến xa trên hành trình học tiếng Anh của mình.</p>

                                    </div>
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 735.6px; margin-right: 24px;">
                                <div class="welcome-login">
                                    <div class="login-banner">
                                        <img src="https://cdnl.iconscout.com/lottie/premium/thumb/account-login-8677600-6981645.gif" class="img-fluid" alt="Logo">
                                    </div>
                                    <div class="mentor-course text-center">
                                        <h2>Chào mừng bạn đến với <br>các khóa học của ENT .</h2>
                                                                            <p>Khám phá ENT - Trang web tiên phong về khóa học tiếng Anh. Với đội ngũ giáo viên chất lượng và nội dung học tập đa dạng, chúng tôi sẽ giúp bạn tiến xa trên hành trình học tiếng Anh của mình.</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span
                                aria-label="Previous">‹</span></button><button type="button" role="presentation"
                            class="owl-next"><span aria-label="Next">›</span></button></div>
                    <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                            role="button" class="owl-dot"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button></div>
                </div>
            </div>

            <div class="col-md-6 login-wrap-bg">

                <div class="login-wrapper">
                    <div class="loginbox">
                        <div class="w-100">
                            <div class="img-logo">
                                <img src="/assets-client/img/logo.svg" class="img-fluid" alt="Logo">
                                <div class="back-home">
                                    <a href="{{ route('Dashboard-client') }}">Quay về trang chủ</a>
                                </div>
                            </div>      
                            <h1>Đăng ký mentor - Thông tin chuyển khoản</h1>
                            <form action="{{route('mentor-register')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Tên chủ thẻ</label>
                                    <input type="text" name="name" placeholder="Nhập tên chủ thẻ" class="form-control"oninput="enter_data()">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Tên ngân hàng</label>
                                    <input type="text" id="name_banking" name="name_banking" class="form-control" placeholder="Nhập tên ngân hàng" oninput="enter_data()">
                                    <ul id="suggestions" class="suggestions">
                                        <!-- Các gợi ý sẽ xuất hiện ở đây -->
                                    </ul>
                                </div>
                                
                            <div class="form-group">
                                <label class="form-control-label">Số tài khoản</label>
                                <input type="text" name="id_banking" placeholder="Nhập số tài khoản" class="form-control"oninput="enter_data()">
                                @error('id_banking')
                                <div class="error">{{ $message }}</div>
                            @enderror
                            </div>
                            
                            <div class="d-grid">
                                <button class="btn btn-primary btn-start" type="submit" disabled>
                                    Tiếp theo <i class="fas fa-chevron-right"></i>
                                  </button>
                                  
                            </div>
                            </form>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
    <script>
    var btn_login = document.querySelector('.btn-start');
    var inputs = (document.querySelectorAll('input[oninput="enter_data()"]'))
    var inputs_length = inputs.length
    function enter_data(){
    let check_ = true
        for(let i = 0 ; i < inputs_length; i++) {
            
            if(inputs[i].value.length < 5){
                btn_login.setAttribute('disabled', true);
                return;
            }
        }
        if(check_)    btn_login.removeAttribute('disabled');
    
    }
    // ----------------const name_banking

    const banks = [
    "Vietcombank (Ngân hàng Ngoại thương Việt Nam)",
    "VietinBank (Ngân hàng Công Thương Việt Nam)",
    "BIDV (Ngân hàng Đầu tư và Phát triển Việt Nam)",
    "VIB (Ngân hàng Quốc tế Việt Nam)",
    "Techcombank (Ngân hàng Kỹ thương Việt Nam)",
    "MB Bank (Ngân hàng Quân đội)",
    "ACB (Ngân hàng Á Châu)",
    "Sacombank (Ngân hàng Sài Gòn Thương Tín)",
    "VPBank (Ngân hàng Việt Nam Thịnh Vượng)",
    "HDBank (Ngân hàng Phát triển Nhà TP.HCM)",
    "LienVietPostBank (Ngân hàng Liên Việt Post Bank)",
    "Agribank (Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam)",
    "Eximbank (Ngân hàng Xuất nhập khẩu Việt Nam)",
    "HSBC (Ngân hàng HSBC Việt Nam)",
    "Standard Chartered (Ngân hàng Standard Chartered Việt Nam)",
    "Citibank (Ngân hàng Citibank Việt Nam)",
    "ANZ (Ngân hàng ANZ Việt Nam)",
    "JPMorgan Chase (Ngân hàng JPMorgan Chase Việt Nam)",
    "Deutsche Bank (Ngân hàng Deutsche Bank Việt Nam)",
    "UBS (Ngân hàng UBS Việt Nam)"
];


const input = document.getElementById('name_banking');
const suggestions = document.getElementById('suggestions');

input.addEventListener('input', function() {
    const query = this.value.toLowerCase().trim();
    suggestions.innerHTML = '';

    if (query) {
        const filteredBanks = banks.filter(bank => bank.toLowerCase().includes(query));
        filteredBanks.forEach(bank => {
            const li = document.createElement('li');
            li.textContent = bank;
            li.style.cursor = 'pointer';
            li.addEventListener('click', function() {
                input.value = bank;
                suggestions.innerHTML = '';
                suggestions.style.display = 'none';
            });
            suggestions.appendChild(li);
        });

        suggestions.style.display = filteredBanks.length ? 'block' : 'none';
    } else {
        suggestions.style.display = 'none';
    }
});
    </script>
@endsection
