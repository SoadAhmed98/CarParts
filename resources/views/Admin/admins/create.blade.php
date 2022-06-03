@extends('layouts.admin')
@section('title', 'إنشاء مُشرف ')
@section('breadcrumbs')
    {{ Breadcrumbs::render('admins.create') }}
@endsection
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('title')</h1>
    </div>
    @include('includes.validation_errors')
    <div class="col-12 mt-5">

        <form method="post" action="{{ route('admins.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="col-12">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="name"> الإسم </label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group  col-6">
                                <label for="email"> البريد الإلكترونى </label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="password"> كلمة مرور </label>
                                <input type="password" name="password" class="form-control" id="password"
                                    value="{{ old('password') }}">
                            </div>
                            <div class="form-group col-6">
                                <label for="password_confirmation"> تأكيد كلمة مرور </label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation" value="{{ old('password') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="status">الحالة</label>
                                <select name="status" class="custom-select" id="status">
                                    <option disabled selected>اختار</option>
                                    @foreach ($statuses as $status => $value)
                                        <option @selected(old('status') === "$value") value="{{ $value }}">{{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="role_id">الوظيفة</label>
                                <select name="role_id" class="custom-select" id="role_id">
                                    <option disabled selected>اختار</option>
                                    @foreach ($roles as $role)
                                        <option @selected(old('role_id') === "$role->id") value="{{ $role->id }}">{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    {{-- <label for="upload">الصورة الشخصية</label> --}}
                    <div class="form-group " style="height:150px">
                        <div class="custom-file ">
                            <input type="file" name="image" class="custom-file-input d-none" id="upload"
                                onchange="previewImage(event)">
                            <label for="upload">
                                <img src="{{ asset('assets/admin/images/default.png') }}" id="image-preview"
                                    class="mb-3" alt="{{ 'upload image' }}"
                                    style="cursor: pointer;width:200px; height:150px"></label>
                        </div>
                    </div>
                </div>

            </div>

    </div>
    <div>
        @include('includes.create_submit_buttons')
    </div>
    </form>
    </div>
@endsection
@push('js')
    <script>
        $('#all').change(function() {
            if (this.checked) {
                $('.check-all').attr('checked', 'checked');
            } else {
                $('.check-all').removeAttr('checked');
            }
        });
    </script>
    {{-- <script>
    $('#controller').change(function(){
     if(this.checked){
         $('.check-controller').attr('checked','checked');
     }else{
        $('.check-controller').removeAttr('checked');
     }
    });
</script> --}}
@endpush
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