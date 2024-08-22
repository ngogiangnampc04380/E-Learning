<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .certificate-container {
            width: 150mm;
            /* Chiều rộng hình vuông */
            height: 150mm;
            /* Chiều cao hình vuông */
            padding: 20mm;
            /* Căn lề hợp lý */
            border: 10px solid #000;
            /* Đường viền của chứng chỉ */
            box-sizing: border-box;
            position: relative;
            margin: 40px auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: #fff;
            /* Màu nền trắng */
            border-radius: 10px;
            /* Bo góc nhẹ */
        }

        h1 {
            font-size: 30px;
            margin-bottom: 15px;
        }

        h2 {
            font-size: 24px;
            margin: 15px 0;
        }

        h3 {
            font-size: 20px;
            margin: 10px 0;
        }

        p {
            font-size: 16px;
            margin: 8px 0;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="certificate-container" id="certificate">
        <img src="{{ asset('/certificate.jpg') }}" alt=""
            style="width: 25%;height: auto;position: absolute;top: 25px;">
        <div style="position: relative; z-index: 1;">
            <h1>Certificate of Completion</h1>
            <p>This is to certify that</p>
            <h2>{{ $name }}</h2>
            <p>has successfully completed the course</p>
            <h3>{{ $course }}</h3>
            <p>on {{ $date }}</p>
        </div>
    </div>
    <button onclick="downloadPDF()">Download as PDF</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script>
        function downloadPDF() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF({
                orientation: 'portrait',
                unit: 'mm',
                format: [160, 160] // Định dạng trang hình vuông 150mm x 150mm
            });

            const certificate = document.getElementById('certificate');

            // Tăng tỷ lệ khi chụp ảnh canvas để có độ phân giải cao hơn
            html2canvas(certificate, {
                scale: 4
            }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');

                // Tính toán kích thước của hình ảnh so với kích thước trang PDF hình vuông
                const imgWidth = 160; // Chiều rộng của trang hình vuông
                const imgHeight = canvas.height * imgWidth / canvas.width;

                // Thêm hình ảnh vào PDF với độ phân giải cao hơn và căn trái trên
                doc.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);

                // Lưu tệp PDF
                doc.save('certificate.pdf');
            });
        }
    </script>
</body>

</html>
