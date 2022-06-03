@extends('layouts.admin')
@section('title', 'الصفحة الشخصية')
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('title') </h1>
    </div>
    <div class="col-12">
        
        <form method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-2 offset-5 ">
                    <input type="file" name="image" class="custom-file-input d-none" id="upload"
                        onchange="previewImage(event)">
                    <label for="upload">
                        <img src="{{ $admin->getFirstMediaUrl('admins') ? asset($admin->getFirstMediaUrl('admins')) : asset('assets/admin/images/default.png') }}"
                            id="image-preview"  class="mb-3 w-100 rounded-circle" alt="{{ 'upload image' }}"
                            style="cursor:pointer;">
                    </label>
                </div>
                <div class="col-4 offset-4">
                    @error('image')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                   
                <div class="col-4 offset-4">
                    <div class="form-group">
                        <label for="Name">الأسم</label>
                        <input type="text" name="name" id="Name" class="form-control" placeholder=""  aria-describedby="helpId" value="{{ $admin->name }}">
                        @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <a class="text-primary" href="{{ route('profile.reset.password') }}" >هل تريد تعديل كلمة
                            المرور؟</a>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary rounded"> تعديل </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        var previewImage = function(event) {
            var output = document.getElementById('image-preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endpush
