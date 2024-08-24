@extends('client.layout.master')
@section('content')

<div class="page-content">
    <div class="container">
        <div class="row">
    @include('components.settingprofile')

<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="row">
        <div class="col-md-12">
            
            <div class="card instructor-card">
                <div class="card-header">
                    <h4>thông tin banking</h4>
                </div>
                <div class="card-body">
                        <form action="{{ route('client.banking.update', $mentor->id) }}" method="POST">
                            @csrf
                    
                            @if ($errors->any())
                                <div class="error"> 
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                    
                            <div>
                                <label for="name">Tên:</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $mentor->name) }}">
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                    
                            <div>
                                <label for="name_banking">Tên ngân hàng:</label>
                                <input type="text" id="name_banking" name="name_banking" value="{{ old('name_banking', $mentor->name_banking) }}">
                                @error('name_banking')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                    
                            <div>
                                <label for="id_banking">Số ngân hàng:</label>
                                <input type="text" id="id_banking" name="id_banking" value="{{ old('id_banking', $mentor->id_banking) }}">
                                @error('id_banking')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                    
                            <button type="submit">Cập nhật</button>
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