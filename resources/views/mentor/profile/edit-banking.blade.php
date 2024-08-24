@extends('client.layout.master')
@section('content')
<style>
    .card {
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin: 20px;
    overflow: hidden;
}

.card-header {
    background-color: #007bff;
    color: #fff;
    padding: 15px;
}

.card-body {
    padding: 15px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group .form-control {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.error-message {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 15px;
}

.error-message ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.error-message li {
    margin-bottom: 5px;
}

.error {
    color: #721c24;
    font-size: 0.875rem;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
}

</style>
<div class="page-content">
    <div class="container">
        <div class="row">
    @include('components.settingprofile')

<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="row">
        <div class="col-md-12">
            
            <div class="card instructor-card">
                <div class="card-header">
                    <h4>Thông tin ngân hàng</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('client.banking.update', $mentor->id) }}" method="POST">
                        @csrf
            
                        @if ($errors->any())
                            <div class="error-message">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
            
                        <div class="form-group">
                            <label for="name">Tên:</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $mentor->name) }}">
                            @error('name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <div class="form-group">
                            <label for="name_banking">Tên ngân hàng:</label>
                            <input type="text" id="name_banking" name="name_banking" class="form-control" value="{{ old('name_banking', $mentor->name_banking) }}">
                            @error('name_banking')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <div class="form-group">
                            <label for="id_banking">Số ngân hàng:</label>
                            <input type="text" id="id_banking" name="id_banking" class="form-control" value="{{ old('id_banking', $mentor->id_banking) }}">
                            @error('id_banking')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
</div>
</div>
@endsection