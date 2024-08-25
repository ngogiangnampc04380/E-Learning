@extends('client.layout.master')
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                @include('components.settingprofile')


                <div class="col-xl-9 col-lg-8 col-md-12 mx-auto" style="margin-top: 100px;">
                    <div class="row">
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
                                            <a href="#" class="view-courses" data-user-id="{{ $student->id }}">Xem chi
                                                tiết</a>
                                        </td>
                                    </tr>
                                    <!-- Hidden row for courses list -->
                                    <tr class="courses-row" data-user-id="{{ $student->id }}" style="display: none;">
                                        <td colspan="4">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tên khóa học</th>
                                                        <th>Thumbnail</th>
                                                        <th> tổng Số bài học và quiz, QuizFinal</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="courses-list" data-user-id="{{ $student->id }}">
                                                    @foreach ($studentsCourses[$student->id] as $course)
                                                        <tr>
                                                            <td>{{ $course->id }}</td>
                                                            <td>{{ $course->name }}</td>
                                                            <td><img src="{{ $course->thumbnail }}" alt="{{ $course->name }}" style="width: 100px; height: auto;"></td>
                                                            <td>{{ $course->total_ketqua }}/{{ $course->lesson_count + $course->quiz_count + $course->quiz_final_count }}</td>
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
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="pagination lms-page">
                                <li class="page-item prev">
                                    <a class="page-link" href="javascript:void(0)" tabindex="-1"><i
                                            class="fas fa-angle-left"></i></a>
                                </li>
                                <li class="page-item first-page active">
                                    <a class="page-link" href="javascript:void(0)">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)">3</a>
                                </li>
                                <li class="page-item next">
                                    <a class="page-link" href="javascript:void(0)"><i class="fas fa-angle-right"></i></a>
                                </li>
                            </ul>
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
