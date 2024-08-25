@extends('client.layout.master')
@section('content')
    <style>
        .table-container {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            background-color: #fff;
        }

        .table-container .table {
            margin-bottom: 0;
        }

        .table-container .table th,
        .table-container .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table-container .student-row {
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .table-container .student-row:hover {
            background-color: #f9f9f9;
        }

        .table-container .courses-details {
            background-color: #f9f9f9;
        }

        .table-container .courses-details .table {
            margin-bottom: 0;
        }

        .table-container .courses-details .table th,
        .table-container .courses-details .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table-container .courses-details .table td img {
            border-radius: 4px;
        }

        .btn-info {
            background-color: #17a2b8;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            text-decoration: none;
        }

        .btn-info:hover {
            background-color: #138496;
            text-decoration: none;
        }

        .header-container {
            margin-bottom: 30px;
            text-align: center;
        }

        .header-title {
            font-size: 2rem;
            /* Tăng kích thước chữ */
            font-weight: bold;
            /* Chữ đậm */
            color: #333;
            /* Màu chữ tối để dễ đọc */
            border-bottom: 3px solid #3498db;
            /* Đường viền dưới màu sắc để tạo điểm nhấn */
            display: inline-block;
            /* Để đường viền chỉ nằm dưới chữ */
            padding-bottom: 10px;
            /* Khoảng cách giữa chữ và đường viền */
            margin: 0;
            /* Xóa khoảng cách mặc định */
            text-transform: uppercase;
            /* Chữ in hoa để tạo cảm giác mạnh mẽ */
            letter-spacing: 1px;
            /* Khoảng cách giữa các chữ cái */
        }

        .header-title::before {
            content: "";
            display: block;
            width: 60px;
            height: 4px;
            background-color: #3498db;
            /* Đường gạch dưới nhỏ hơn để tạo điểm nhấn */
            margin: 0 auto 10px auto;
            /* Căn giữa và khoảng cách dưới đường gạch */
        }
    </style>
    <div class="page-content">
        <div class="container">
            <div class="row">
                @include('components.settingprofile')


                <div class="col-xl-9 col-lg-8 col-md-12 mx-auto" style="margin-top: 100px;">

                    <div class="row">
                        <div class="header-container">
                            <h2 class="header-title">Danh sách học viên</h2>
                        </div>

                        <div class="table-container">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $index => $student)
                                        <tr class="student-row" data-user-id="{{ $student->id }}">
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info view-courses"
                                                    data-user-id="{{ $student->id }}">Khóa học đã đăng ký</a>
                                            </td>
                                        </tr>
                                        <!-- Hidden row for courses list -->
                                        <tr class="courses-row" data-user-id="{{ $student->id }}" style="display: none;">
                                            <td colspan="4" class="courses-details">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Ảnh khóa học</th>
                                                            <th>Tên khóa học</th>

                                                            <th>Số bài học</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="courses-list" data-user-id="{{ $student->id }}">
                                                        @foreach ($studentsCourses[$student->id] as $course)
                                                            <tr>
                                                                <td>{{ $course->id }}</td>
                                                                <td>
                                                                    <img src="{{ Storage::url('public/' . $course->thumbnail) }}"
                                                                        alt="{{ $course->name }}"
                                                                        style="width: 100px; height: auto; border-radius: 4px;">
                                                                </td>
                                                                <td>{{ $course->name }}</td>

                                                                <td>{{ $course->total_ketqua }}/{{ $course->lesson_count + $course->quiz_count + $course->quiz_final_count }}</td>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.view-courses').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const userId = this.getAttribute('data-user-id');
                    const coursesRow = document.querySelector(
                        `.courses-row[data-user-id="${userId}"]`);

                    if (coursesRow.style.display === 'none' || coursesRow.style.display === '') {
                        coursesRow.style.display = 'table-row';
                    } else {
                        coursesRow.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
