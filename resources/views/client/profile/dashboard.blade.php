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
                                <h5>Beginner</h5>
                                <img src="/assets-client/img/instructor-profile-bg.jpg" alt="">
                                <div class="profile-img">
                                    <a href=""><img src="{{Storage::url('assets-client/img/user/'.$data->thumbnail)}}"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="profile-group">
                                <div class="profile-name text-center">
                                    <h4><a href="instructor-profile.html">Jenny Wilson</a></h4>
                                    <p>Instructor</p>
                                </div>
                                <div class="go-dashboard text-center">
                                    <a href="add-course.html" class="btn btn-primary">Create New Course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="settings-widget account-settings">
                        <div class="settings-menu">
                            <h3>DASHBOARD</h3>
                            <ul>
                                
                                <li class="nav-item active">
                                    <a href="{{ route('client.dashboard-profile',$data->id) }}" class="nav-link">
                                        <i class="feather-home"></i> My Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('client.user-profile',$data->id) }}" class="nav-link">
                                        <i class="feather-star"></i> Profile
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="instructor-course.html" class="nav-link">
                                        <i class="feather-book"></i> My Courses
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
                            <div class="card instructor-card">
                                <div class="card-header">
                                    <h4>Thông tin người dùng</h4>
                                </div>
                                <div class="card-body">
                                   
                                    <form class="container" action="{{route('client.user-profile-edit',$data->id)}}" method="POST">
                                       @csrf
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Tên</label>
                                                    <label name="name" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{$data -> name}}</label>
                                                        
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Số Điện thoại</label>
                                                    <label name="phone" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{$data -> phone}}</label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                                    <label name="email" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{$data -> email}}</label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                                                    <label name="address" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{$data -> address}}</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6"><div class="settings-widget dash-profile">
                                                <div class="settings-menu p-0">
                                                    <div class="profile-bg">
                                                        <h5>Beginner</h5>
                                                        <img src="/assets-client/img/instructor-profile-bg.jpg" alt="">
                                                        <div class="profile-img">
                                                            <a href=""><img src="{{Storage::url('assets-client/img/user/'.$data->thumbnail)}}"
                                                                    alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="profile-group">
                                                        <div class="profile-name text-center">
                                                            <h4><a href="">{{$data -> name}}</a></h4>
                                                            
                                                        </div>
                                                        <div class="go-dashboard text-center">
                                                           
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    
                                    </form>
                                    
                                    
                                </div>
                            </div>
                            <div class="card instructor-card">
                                <div class="card-header">
                                    <h4>Khóa học đã đăng kí</h4>
                                </div>
                                <div class="card-body">
                                    
                                    <form class="container" action="{{route('client.user-profile-edit',$data->id)}}" method="POST">
                                       @csrf
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Tên</label>
                                                    <label name="name" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{$data -> name}}</label>
                                                        
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Số Điện thoại</label>
                                                    <label name="phone" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{$data-> phone}}</label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                                    <label name="email" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{$data -> email}}</label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                                                    <label name="address" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{$data -> address}}</label>
                                                </div>
                                                <div class="profile-bg">
                                                    <h5>Beginner</h5>
                                                    <img src="/assets-client/img/instructor-profile-bg.jpg" alt="">
                                                    <div class="profile-img">
                                                        <a href="instructor-profile.html"><img src="{{asset('/public/uploads/'.$data->thumbnail)}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                            </div>


                                            
                                        </div>
                                        
                                    
                                    </form>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
