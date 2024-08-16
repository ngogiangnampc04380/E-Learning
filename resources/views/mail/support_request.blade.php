<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Yêu Cầu Hỗ Trợ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
            font-size: 24px;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 10px;
        }
        strong {
            color: #555;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>YÊU CẦU HỔ TRỢ VÀ GÓP Ý CỦA NGƯỜI DÙNG</h1>
        <p><strong>Họ và Tên:</strong> {{ $data['firstName'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Chủ Đề:</strong> {{ $data['subject'] }}</p>
        <p><strong>Mô Tả:</strong></p>
        <p>{{ $data['description'] }}</p>
        <div class="footer">
            <p>Yêu cầu liên hệ & hỗ trợ của người dùng đã được gửi đến bạn! <br> Vui lòng nhanh chóng tiếp nhận và giải quyết.
            <br> Xin cảm ơn!. </p>
        </div>
    </div>
</body>
</html>
