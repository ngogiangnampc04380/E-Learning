@extends('client.layout.authMaster')
@section('content')
@if(Session::get('no_confirm_code'));
@include('client.section.message', ['message' => session('no_confirm_code'),'type'=>'error'])
@endif
@if(Session::get('no_user'));
@include('client.section.message', ['message' => session('no_user'),'type'=>'error'])
@endif




    <div class="login-wrapper">
        <div class="loginbox">
            <div class="img-logo">
                <img src="{{ asset('assets/img/logo.svg') }}" class="img-fluid" alt="Logo">
                <div class="back-home">
                    <a href="index.html">Back to Home</a>
                </div>
            </div>
            <h1>Forgot Password ?</h1>
            <div class="reset-password">
                <p>Enter your email to reset your password.</p>
            </div>
            @if (session('error'))
                <div class="alert alert-success">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('enter-email') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-control-label">Email</label>
                    <input type="email" class="form-control" placeholder="Enter your email address" name="email">
                </div>
                <div class="d-grid">
                    <button class="btn btn-start" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
