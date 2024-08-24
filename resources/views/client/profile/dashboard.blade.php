@extends('client.layout.master')
@section('content')
<div class="page-content">
    <div class="container">
        <div class="row">
@include('components.settingprofile')

                <!-- Right -->
                <div class="col-xl-9 col-lg-8 col-md-12">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card instructor-card">
                                <div class="card-header">
                                    <h4>Thông tin người dùng</h4>
                                </div>
                                <div class="card-body">
                                   
                                    <form class="container" action="{{route('client.user-profile-edit',auth()->user()->id)}}" method="POST">
                                       @csrf
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Tên</label>
                                                    <label name="name" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{auth()->user()-> name}}</label>
                                                        
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Số Điện thoại</label>
                                                    <label name="phone" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{auth()->user()-> phone}}</label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                                    <label name="email" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{auth()->user()-> email}}</label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                                                    <label name="address" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{auth()->user()-> address}}</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6"><div class="settings-widget dash-profile">
                                                <div class="settings-menu p-0">
                                                    <div class="profile-bg">
                                                        @if(in_array(auth()->user()->role, [0, 3]))
                                                        <h5 class="text-muted mb-0">Học viên</h5>
                                                        @elseif(auth()->user()->role == 1)
                                                        <h5 class="text-muted mb-0">Quản trị viên</h5>
                                                        @elseif(auth()->user()->role == 2)
                                                        <h5 class="text-muted mb-0">Giảng viên</h5>
                                                        @endif
                                                        <img src="/assets-client/img/instructor-profile-bg.jpg" alt="">
                                                        <div class="profile-img">
                                                            <a href=""><img src="{{ auth()->user()->thumbnail ? Storage::url('public/' . auth()->user()->thumbnail) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU' }}"  alt="">
                                                        </div>
                                                    </div>
                                                    <div class="profile-group">
                                                        <div class="profile-name text-center">
                                                            <h4><a href="">{{auth()->user()->name}}</a></h4>
                                                            
                                                        </div>
                                                        <div class="go-dashboard text-center">
                                                           
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label" >Giới thiệu</label>
                                            <label type="text" name="introduce" rows="5"
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Tam giác quỷ bemuda">{{ auth()->user()->introduce }}</label>
                                        </div>
                                        
                                    <button class="btn btn-primary"><a href="{{ route('client.user-profile') }}">Đến chỉnh sửa thông tin cá nhân</a></button>
                                    </form>
                                    
                                    
                                </div>
                            </div>
                            <div class="card instructor-card">
                                <div class="card-header">
                                    <h4>Khóa học đã đăng kí</h4>
                                </div>
                                <div class="card-body">
                                    
                                    <form class="container" action="{{route('client.user-profile-edit',auth()->user()->id)}}" method="POST">
                                       @csrf
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Tên</label>
                                                    <label name="name" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{auth()->user()-> name}}</label>
                                                        
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Số Điện thoại</label>
                                                    <label name="phone" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{auth()->user()-> phone}}</label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                                    <label name="email" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{auth()->user()-> email}}</label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                                                    <label name="address" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN">{{auth()->user()-> address}}</label>
                                                </div>
                                                
                                                <div class="profile-bg">
                                                    <h5>Beginner</h5>
                                                    <img src="/assets-client/img/instructor-profile-bg.jpg" alt="">
                                                    <div class="profile-img">
                                                        <a href="instructor-profile.html"><img src="{{asset('public/'.auth()->user()->thumbnail)}}"
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
