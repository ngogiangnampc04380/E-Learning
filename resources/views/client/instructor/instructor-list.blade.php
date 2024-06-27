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
                            @if(auth()->check())
                                    @if(auth()->user()->role == 1)
                            <a href="/admin/mentors" class="btn btn-secondary"><i class="fa-solid fa-gear"></i> Quản lí giảng viên</a>
                                        @endif
                                @endif


                        </div>
                        <div class="col-lg-6">
                            <div class="show-filter add-course-info">
                                <form action="{{ route('client.instructor-list') }}" method="GET">
                                    <div class="row gx-2 align-items-center">
                                        <div class="col-item d-flex">
                                            <div class="search-group">
                                                <input type="text" name="query" class="form-control" style="width:420px;" placeholder="Tìm kiếm Giảng viên, khóa học trực tuyến, v.v." value="{{ request()->query('query') }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($query))
                <h2>Kết quả tìm kiếm cho: "{{ $query }}"</h2>
            @endif

            @if($data->isEmpty())
                <p>Không tìm thấy giảng viên nào.</p>
            @else
                @foreach($data as $mentor)
                    <div class="col-lg-12 d-flex">
                        <div class="instructor-list flex-fill">
                            <div class="instructor-img">
                                <a href="{{ route('client.mentor_detail', ['id' => $mentor->id]) }}">
                                    <img class="img-fluid" alt src="{{ $mentor->thumbnail ? Storage::url('assets-client/img/user/' . $mentor->thumbnail) : 'https://cdn-icons-png.flaticon.com/128/9721/9721084.png' }}" alt="{{ $mentor->name }}">
                                </a>
                            </div>
                            <div class="instructor-content">
                                <h5><a href="{{ route('client.mentor_detail', ['id' => $mentor->id]) }}">{{ $mentor->name }}</a></h5>
                                <div class="instructor-info">
                                    <div class="rating-img d-flex align-items-center">
                                        <img src="/assets-client/img/icon/icon-01.svg" class="me-1" alt>
                                        <p>12+ Lesson</p>
                                    </div>
                                    <div class="course-view d-flex align-items-center ms-0">
                                        <img src="/assets-client/img/icon/icon-02.svg" class="me-1" alt>
                                        <p>9hr 30min</p>
                                    </div>
                                    <div class="rating-img d-flex align-items-center">
                                        <img src="/assets-client/img/icon/user-icon.svg" class="me-1" alt>
                                        <p>50 Students</p>
                                    </div>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating"><span>4.0</span> (15)</span>
                                    </div>
                                    <a href="#rate" class="rating-count"><i class="fa-regular fa-heart"></i></a>
                                </div>
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

            </div>
            <div class="col-lg-3">
                <div class="filter-clear">
                    <div class="clear-filter d-flex align-items-center">
                        <h4><i class="feather-filter"></i>Filters</h4>
                        <div class="clear-text">
                            <p>CLEAR</p>
                        </div>
                    </div>

                    <div class="card search-filter categories-filter-blk">
                        <div class="card-body">
                            <div class="filter-widget mb-0">
                                <div class="categories-head d-flex align-items-center">
                                    <h4>Danh mục khóa học</h4>
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <ul>
                                    {{-- @foreach ($categories as $category)
                                        <li>{{ $category->name }}</li>
                                    @endforeach --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card search-filter">
                        <div class="card-body">
                            <div class="filter-widget mb-0">
                                <div class="categories-head d-flex align-items-center">
                                    <h4>Giảng viên</h4>
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                @foreach ($data as $mentor)
                                    <div>
                                        <label class="custom_check">
                                            <input type="checkbox" name="select_specialist">
                                            {{-- <span class="checkmark"></span> {{ $mentor->name }} ({{ $mentor->courses_count }}) --}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
