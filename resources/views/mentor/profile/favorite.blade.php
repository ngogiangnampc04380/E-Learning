@extends('client.layout.master')
@section('content')
<div class="breadcrumb-bar">
    <div class="container">
    </div>
</div>
    <div class="page-content instructor-page-content">
        <div class="container">
            <div class="row">
                <!-- Left -->
                <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                    <div class="settings-widget dash-profile">
                        <div class="settings-menu p-0">
                            <div class="profile-bg">
                                <img src="/assets-client/img/instructor-profile-bg.jpg" alt="">
                                <div class="profile-img">
                                    <a href="instructor-profile.html"><img src="/assets-client/img/user/user15.jpg"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="profile-group">
                                <div class="profile-name text-center">
                                    <h4><a href="instructor-profile.html">Nam Béo</a></h4>
                                    <p>Giảng viên</p>
                                </div>
                                <div class="go-dashboard text-center">
                                    <a href="add-course.html" class="btn btn-primary">Tạo khóa học mới</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="settings-widget account-settings">
                        <div class="settings-menu">
                            <h3>Thông tin giảng viên</h3>
                            <ul>
                                <li class="nav-item active">
                                    <a href="{{route('client.mentor-profile')}}" class="nav-link">
                                        <i class="feather-home"></i> Hồ sơ
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="instructor-course.html" class="nav-link">
                                        <i class="feather-book"></i> Khóa học của tôi
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('client.mentor-comment')}}" class="nav-link">
                                        <i class="feather-star"></i> Quản lý bình luận
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('client.mentor-favorite')}}" class="nav-link">
                                        <i class="feather-star"></i> Quản lý lượt thích
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Right -->
                <div class="col-xl-9 col-lg-8 col-md-12">
                    
                    <div class="row">
                              <div class="col-md-12">
                                <div class="settings-widget">
                                  <div class="settings-inner-blk p-0">
                                    <div class="sell-course-head comman-space">
                                      <h3>Danh sách lượt thích</h3>
                                    </div>
                                    <div class="comman-space pb-0">
                                      {{-- <div class="instruct-search-blk">
                                        <div class="show-filter choose-search-blk">
                                          <form action="#">
                                            <div class="row gx-2 align-items-center">
                                              <div class="col-md-6 col-item">
                                                <div class="search-group">
                                                  <i class="feather-search"></i>
                                                  <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Search our courses"
                                                  />
                                                </div>
                                              </div>
                                              <div class="col-md-6 col-lg-6 col-item">
                                                <div class="input-block select-form mb-0">
                                                  <select
                                                    class="form-select select"
                                                    name="sellist1"
                                                  >
                                                    <option>Choose</option>
                                                    <option>Angular</option>
                                                    <option>React</option>
                                                    <option>Node</option>
                                                  </select>
                                                </div>
                                              </div>
                                            </div>
                                          </form>
                                        </div>
                                      </div> --}}
                                      <div class="settings-tickets-blk course-instruct-blk table-responsive">
                                        <table class="table table-nowrap mb-2">
                                          <thead>
                                            <tr>
                                              <th>Khóa học</th>
                                              <th>lượt thích</th>
                                              
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($data as $fav)
                                            <tr>
                                                <td>{{ $fav->course }}</td>
                                                <td>{{ $fav->likes }}</td>
                                                
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

                </div>

            </div>
        </div>
    </div>
@endsection
