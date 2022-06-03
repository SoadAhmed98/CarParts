@extends('layouts.admin')
@section('title', "تعديل {$admin->name} ")
@section('breadcrumbs')
    {{ Breadcrumbs::render('admins.edit', $admin) }}
@endsection
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('title')</h1>
    </div>
    @include('includes.validation_errors')
    <div class="col-12 mt-5">
        <form method="post" action="{{route('admins.update',['admin' => $admin->id])}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="col-12">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="name"> الإسم </label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $admin->name }}">
                            </div>
                            <div class="form-group  col-6">
                                <label for="email"> البريد الإلكترونى </label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ $admin->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="password"> كلمة مرور </label>
                                <input type="password" name="password" class="form-control" id="password"
                                    value="">
                            </div>
                            <div class="form-group col-6">
                                <label for="password_confirmation"> تأكيد كلمة مرور </label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation" value="">
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
                                        <option @selected($admin->email_verified_at && $value==1) @selected(!$admin->email_verified_at && $value==0) value="{{ $value }}">{{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="role_id">الوظيفة</label>
                                <select name="role_id" class="custom-select" id="role_id">
                                    <option disabled selected>اختار</option>
                                    @foreach ($roles as $role)
                                        <option @selected(in_array($role->name, $admin->getRoleNames()->toArray())) value="{{ $role->id }}">{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" name="edit" class="btn btn-primary mt-2">تعديل</button>
                    </div>
                </div>
           
                <div class="col-6">
                    <div class="form-group " style="height:150px">
                        <div class="custom-file ">
                            <input type="file" name="image" class="custom-file-input d-none" id="upload"
                                onchange="previewImage(event)">
                            <label for="upload">
                                <img src="{{$admin->getFirstMediaUrl('admins') ? asset($admin->getFirstMediaUrl('admins')):asset("assets/admin/images/default.png")  }}" id="image-preview"
                                    class="mb-3" alt="{{ 'upload image' }}"
                                    style="cursor: pointer;width:200px; height:150px"></label>
                        </div>
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
