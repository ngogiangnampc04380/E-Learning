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
                                <div class="show-filter add-course-info">
                                    {{-- <form action="{{ route('client.course-lists') }}" method="GET">
                                        <div class="row gx-2 align-items-center">
                                            <div class="col-item d-flex">
                                                <div class="search-group">
                                                    <input type="text" name="query" class="form-control"
                                                        style="width:420px;" placeholder=""
                                                        value="{{ request()->query('query') }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fas fa-search"></i></button>
                                            </div>
                                        </div>

                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($data as $item)
                        <div class="col-lg-12 col-md-12 d-flex">
                            <div class="course-box course-design list-course d-flex">
                                <div class="product">
                                    <div class="product-img">
                                        <a href="{{ route('client.course-details', $item->id) }}">
                                            <img src="{{ Storage::url('assets-client/img/user/' . $item->thumbnail) }}"
                                                alt="Thumbnail" class="img-fluid" style="max-width: 150px;">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="head-course-title">
                                            <h2 class="title"><a
                                                    href="{{ route('client.course-details', $item->id) }}">{{ $item->name }}</a>
                                            </h2>
                                            <div class="all-btn all-category d-flex align-items-center">
                                                <a href="{{ route('client.course-checkout', $item->id) }}"
                                                    class="btn btn-primary">Học</a>
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
                                                <a href="instructor-profile.html"><img src="assets/img/user/user1.jpg" alt
                                                        class="img-fluid"></a>
                                                <div class="course-name">
                                                    <h4><a href="instructor-profile.html">Rolands R</a></h4>
                                                    <p>Instructor</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
    </section>
@endsection
