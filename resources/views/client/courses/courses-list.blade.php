@extends('client.layout.master')
@section('content')
<div class="breadcrumb-bar">
    <div class="container">
    </div>
</div>
<section class="course-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">

                <div class="showing-list">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                <div class="view-icons">
                                    <a href="{{route('client.course-lists')}}" class="list-view active"><i class="feather-list"></i></a>
                                </div>
                                <div class="show-result">
                                    <h4>Showing 1-9 of 50 results</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="show-filter add-course-info">
                                <form action="{{ route('client.course-lists') }}" method="GET">
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

                <div class="row">
                    @if(isset($query))
        <h2>Kết quả tìm kiếm cho: "{{ $query }}"</h2>
    @endif

    @if($data->isEmpty())
        <p>Không tìm thấy khóa học nào.</p>
    @else
    @foreach($data as $item)
    <div class="col-lg-12 col-md-12 d-flex">
        <div class="course-box course-design list-course d-flex">
            <div class="product">
                <div class="product-img">
                    <a href="{{ route('client.course-details', $item->id) }}">
                        <img src="{{ Storage::url(''. $item->thumbnail) }}" alt="Thumbnail" class="img-fluid" style="max-width: 150px;">
                    </a>
                </div>
                <div class="product-content">
                    <div class="head-course-title">
                        <h2 class="title"><a href="{{ route('client.course-details', $item->id) }}">{{ $item->name }}</a></h2>
                        <div class="all-btn all-category d-flex align-items-center">
                            <a href="{{ route('client.course-checkout', $item->id) }}" class="btn btn-primary">Mua ngay</a>
                        </div>
                    </div>
                    <div class="course-info border-bottom-0 pb-0 d-flex align-items-center">
                        <div class="rating-img d-flex align-items-center">
                            <h3>{{ number_format($item->price) }} VNĐ</h3>
                        </div>
                    </div>
                    <div class="rating">
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star"></i>
                        <span class="d-inline-block average-rating"><span>4.0</span> (15)</span>
                    </div>
                    <div class="course-group d-flex mb-0">
                        <div class="course-group-img d-flex">
                            <a href="instructor-profile.html"><img src="assets/img/user/user1.jpg" alt class="img-fluid"></a>
                            <div class="course-name">
                                <h4><a href="instructor-profile.html">Rolands R</a></h4>
                                <p>Instructor</p>
                            </div>
                        </div>
                        <div class="course-share d-flex align-items-center justify-content-center">
                            <a href="#rate"><i class="fa-regular fa-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

    @endif
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
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">4</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">5</a>
                            </li>
                            <li class="page-item next">
                                <a class="page-link" href="javascript:void(0)"><i class="fas fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 theiaStickySidebar">
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
                                    <h4>Course categories</h4>
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Backend (3)
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> CSS (2)
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Frontend (2)
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist" checked>
                                        <span class="checkmark"></span> General (2)
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist" checked>
                                        <span class="checkmark"></span> IT & Software (2)
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Photography (2)
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Programming Language (3)
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check mb-0">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Technology (2)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card search-filter">
                        <div class="card-body">
                            <div class="filter-widget mb-0">
                                <div class="categories-head d-flex align-items-center">
                                    <h4>Instructors</h4>
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Keny White (10)
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Hinata Hyuga (5)
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> John Doe (3)
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check mb-0">
                                        <input type="checkbox" name="select_specialist" checked>
                                        <span class="checkmark"></span> Nicole Brown
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card search-filter ">
                        <div class="card-body">
                            <div class="filter-widget mb-0">
                                <div class="categories-head d-flex align-items-center">
                                    <h4>Price</h4>
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <div>
                                    <label class="custom_check custom_one">
                                        <input type="radio" name="select_specialist">
                                        <span class="checkmark"></span> All (18)
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check custom_one">
                                        <input type="radio" name="select_specialist">
                                        <span class="checkmark"></span> Free (3)
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check custom_one mb-0">
                                        <input type="radio" name="select_specialist" checked>
                                        <span class="checkmark"></span> Paid (15)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card post-widget ">
                        <div class="card-body">
                            <div class="latest-head">
                                <h4 class="card-title">Latest Courses</h4>
                            </div>
                            <ul class="latest-posts">
                                <li>
                                    <div class="post-thumb">
                                        <a href="{{route('client.course-details')}}">
                                            <img class="img-fluid" src="/assets-client/img/blog/blog-01.jpg" alt>
                                        </a>
                                    </div>
                                    <div class="post-info free-color">
                                        <h4>
                                            <a href="{{route('client.course-details')}}">Introduction LearnPress – LMS plugin</a>
                                        </h4>
                                        <p>FREE</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-thumb">
                                        <a href="{{route('client.course-details')}}">
                                            <img class="img-fluid" src="/assets-client/img/blog/blog-02.jpg" alt>
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <h4>
                                            <a href="{{route('client.course-details')}}">Become a PHP Master and Make Money</a>
                                        </h4>
                                        <p>$200</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-thumb">
                                        <a href="#">
                                            <img class="img-fluid" src="/assets-client/img/blog/blog-03.jpg" alt>
                                        </a>
                                    </div>
                                    <div class="post-info free-color">
                                        <h4>
                                            <a href="blog-details.html">Learning jQuery Mobile for Beginners</a>
                                        </h4>
                                        <p>FREE</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-thumb">
                                        <a href="{{route('client.course-details')}}">
                                            <img class="img-fluid" src="/assets-client/img/blog/blog-01.jpg" alt>
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <h4>
                                            <a href="{{route('client.course-details')}}.html">Improve Your CSS Workflow with SASS</a>
                                        </h4>
                                        <p>$200</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-thumb ">
                                        <a href="{{route('client.course-details')}}">
                                            <img class="img-fluid" src="/assets-client/img/blog/blog-02.jpg" alt>
                                        </a>
                                    </div>
                                    <div class="post-info free-color">
                                        <h4>
                                            <a href="{{route('client.course-details')}}">HTML5/CSS3 Essentials in 4-Hours</a>
                                        </h4>
                                        <p>FREE</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
