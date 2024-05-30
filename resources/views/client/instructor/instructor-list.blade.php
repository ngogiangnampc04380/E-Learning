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
                            <div class="d-flex align-items-center">
                                <div class="view-icons">
                                    <a href="{{route('client.instructor-list')}}" class="list-view active"><i
                                            class="feather-list"></i></a>
                                </div>
                                <div class="show-result">
                                    <h4>Showing 1-9 of 50 results</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="show-filter add-course-info">
                                <form action="#">
                                    <div class="row gx-2 align-items-center">
                                        <div class="col-md-6 col-item">
                                            <div class=" search-group">
                                                <i class="feather-search"></i>
                                                <input type="text" class="form-control"
                                                    placeholder="Search our courses">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-item">
                                            <div class="input-block select-form mb-0">
                                                <select class="form-select select" name="sellist1">
                                                    <option>Newly published </option>
                                                    <option>Angular</option>
                                                    <option>React</option>
                                                    <option>Nodejs</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($data as $mentor)
                    <div class="col-lg-12 d-flex">
                        
                        <div class="instructor-list flex-fill">
                            <div class="instructor-img">
                                <a href="{{route('client.mentor_detail', ['id' => $mentor->id]) }}">
                                    <img class="img-fluid" alt src="{{ $mentor->thumbnail ? Storage::url('assets-client/img/user/' . $mentor->thumbnail) : 'https://cdn-icons-png.flaticon.com/128/9721/9721084.png' }}"  alt="">
                                </a>
                            </div>
                            <div class="instructor-content">
                                <h5><a href="{{route('client.mentor_detail', ['id' => $mentor->id]) }}">{{ $mentor->name }}</a></h5>
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
                                    <span class="web-badge">Web Design</span>
                                    <span class="web-badge">web development</span>
                                    <span class="web-badge">UI Design</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
            <div class="col-lg-3">
                <div class="filter-clear">
                    <div class="clear-filter d-flex align-items-center">
                        <h4><i class="feather-filter"></i>Filters</h4>
                        <div class="clear-text">
                            <p>CLEAR</p>
                        </div>
                    </div>

                    <div class="card search-filter">
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection