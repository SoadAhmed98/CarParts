@extends('layouts.admin')
@section('title', 'الصفحة الشخصية')
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('title') </h1>
    </div>
    <div class="col-12">
        
        <form method="post" action="{{route('profile.update.password')}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-4 offset-4 mt-3">
                    <div class="form-group">
                        <label for="old_password">كلمة المرور القديمة</label>
                        <input type="password" name="old_password" id="old_password" class="form-control"  value="">
                        @error('old_password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">كلمة المرور الجديدة</label>
                        <input type="password" name="password" id="password" class="form-control"  value="">
                        @error('password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">تأكيد كلمة المرور الجديدة</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"  value="">
                        @error('password_confirmation')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
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
