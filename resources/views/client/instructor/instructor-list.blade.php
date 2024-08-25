@extends('client.layout.master')
@section('content')
    <div class="breadcrumb-bar">
        <div class="container">
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="showing-list">
                        <div class="row">
                            <div class="col-lg-6">
                                @if (auth()->check())
                                    @if (auth()->user()->role == 1)
                                        <a href="/admin/mentors" class="btn btn-secondary"><i class="fa-solid fa-gear"></i>
                                            Quản lí giảng viên</a>
                                    @endif
                                @endif


                            </div>
                            <div class="col-lg-6">
                                <div class="show-filter add-course-info">
                                    <form action="{{ route('client.instructor-list') }}" method="GET">
                                        <div class="row gx-2 align-items-center">
                                            <div class="col-item d-flex">
                                                <div class="search-group">
                                                    <input type="text" name="query" class="form-control"
                                                        style="width:420px;"
                                                        placeholder="Tìm kiếm Giảng viên, khóa học trực tuyến, v.v."
                                                        value="{{ request()->query('query') }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fas fa-search"></i></button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($query))
                        <h2>Kết quả tìm kiếm cho: "{{ $query }}"</h2>
                    @endif

                    @if ($data->isEmpty())
                        <p>Không tìm thấy giảng viên nào.</p>
                    @else
                        @foreach ($data as $mentor)
                            <div class="col-lg-12 d-flex">
                                <div class="instructor-list flex-fill">
                                    <div class="instructor-img">
                                        <a href="{{ route('client.mentor_detail', ['id' => $mentor->mentor->id]) }}">
                                            <img class="img-fluid" alt
                                                src="{{ $mentor->thumbnail ? Storage::url('public/' . $mentor->thumbnail) : 'https://cdn-icons-png.flaticon.com/128/9721/9721084.png' }}"
                                                alt="{{ $mentor->name }}">
                                        </a>
                                    </div>
                                    <div class="instructor-content">
                                        <h5><a
                                                href="{{ route('client.mentor_detail', ['id' => $mentor->mentor->id]) }}">{{ $mentor->name }}</a>
                                        </h5>
                                        @if (isset($mentorStatistics[$mentor->id]))
                                        <div class="instructor-info">
                                            <div class="rating-img d-flex align-items-center">
                                                <i class="fa-solid fa-book me-1"></i> <!-- Icon cho Khóa học -->
                                                <p>Khóa học: {{ $mentorStatistics[$mentor->id]['totalCourses'] }}</p>
                                            </div>
                                            <div class="course-view d-flex align-items-center ms-0">
                                                <i class="fa-solid fa-list me-1"></i> <!-- Icon cho Chương -->
                                                <p>Chương: {{ $mentorStatistics[$mentor->id]['totalChapters'] }}</p>
                                            </div>
                                            <div class="rating-img d-flex align-items-center">
                                                <i class="fa-solid fa-file-alt me-1"></i> <!-- Icon cho Bài học -->
                                                <p>Bài học: {{ $mentorStatistics[$mentor->id]['totalLessons'] }}</p>
                                            </div>
                                            <div class="rating-img d-flex align-items-center">
                                                <i class="fa-solid fa-users me-1"></i> <!-- Icon cho Học viên -->
                                                <p>Học viên: {{ $mentorStatistics[$mentor->id]['totalStudents'] }}</p>
                                            </div>
                                        </div>
                                        
                                        @endif
                                        <div class="instructor-badge">
                                            <div class="blog-content blog-read">
                                                {!! Str::limit($mentor->introduce, 100) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-md-12">
                            {{ $data->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="filter-clear">
                        <div class="clear-filter d-flex align-items-center">
                            <h4><i class="feather-filter"></i>Lọc</h4>
                            {{-- <div class="clear-text">
                            <p>clear</p>
                        </div> --}}
                        </div>

                        <div class="card search-filter categories-filter-blk">
                            <div class="card-body">
                                <div class="filter-widget mb-0">
                                    <div class="categories-head d-flex align-items-center">
                                        <h4>Danh mục khóa học</h4>
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                    <ul>
                                        <ul style="list-style-type: none; padding: 0; margin: 0;">
                                            @foreach ($categories as $category)
                                                <li style="margin: 5px 0;">
                                                    <a href="{{ route('client.course-lists', ['categories' => [$category->id]]) }}"
                                                       style="text-decoration: none; color: #333; display: block; padding: 10px; border-radius: 4px; transition: background-color 0.3s;"
                                                       onmouseover="this.style.backgroundColor='#f0f0f0'; this.style.color='#000';"
                                                       onmouseout="this.style.backgroundColor=''; this.style.color='#333';">
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
