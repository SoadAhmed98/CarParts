@extends("layouts.admin")
@section('title', 'إنشاء الموديلات')
@section('breadcrumbs')
{{ Breadcrumbs::render('models.create')}}
@endsection
@push('css')
{{-- <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet"> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('title') </h1>
    </div>
    {{-- @include('includes.validation_errors') --}}
    <div class="col-12 mt-5">

        <form method="post" action="{{ route('models.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col-6">
                    <div class="form-group col-8 ">
                        <label for="name.ar">ادخل اسم الموديل بالغة العربية</label>
                        <input type="text" name="name[ar]" class="form-control" id="name.ar" value="{{ old('name.ar') }}">
                        @error('name.ar')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <label for="name.en">ادخل اسم الموديل باللغة اللإنجليزية</label>
                        <input type="text" name="name[en]" class="form-control" id="name.en" value="{{ old('name.en') }}">
                        @error('name.en')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-8">
                        <label for="brand_id">العلامة التجارية</label>
                        <select name="brand_id" class="custom-select" id="brand_id">
                            <option disabled selected>اختر</option>
                            @foreach ($brands as $brand)
                                <option @selected(old('brand_id') == $brand->id) value="{{ $brand->id }}">
                                    {{$brand->getTranslation('name','ar')}}-{{$brand->getTranslation('name','en') }}
                                </option>
                            @endforeach
                        </select>
                        @error('brand_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-8">
                        <label for="datepicker">تاريخ الموديل</label>
                        <input type="text" name="year" class="form-control" id="datepicker" value="{{ old('year') }}">
                        @error('year')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    
                </div>

                <div class="col-6">
                    
                    <div class="form-group col-8 " style="height:150px">
                        <div class="custom-file ">
                            <input type="file" name="image" class="custom-file-input d-none" id="upload"
                                onchange="previewImage(event)">
                            <label for="upload">
                                <img src="{{ asset('assets/admin/images/upload.png') }}" id="image-preview"
                                    class="mb-3" alt="{{ 'upload image' }}"
                                    style="cursor: pointer;width:150px; height:100px"></label>
                        </div>
                        
                    </div>
                    @error('image')
                        <div class="alert alert-danger mt-2 col-4">{{ $message }}</div>
                        @enderror
                    <div class="form-group col-8">

                        <label for="resize" class="mt-3">تغيير أبعاد الصورة </label>
                        <input type="checkbox" @checked(old('resize') === 'true') name="resize" class=" custom-checkbox"
                            value="exist" id="resize">
                        <div class="row d-none" id="resizebox">
                            <div class="mr-2">
                                <input class="form-control" type="number" name="width" value="{{ old('width') }}"
                                    placeholder="العرض">
                                @foreach ($errors->get('width') as $message)
                                    <div class="alert alert-danger mt-2 d-block">{{ $message }}</div>
                                @endforeach
                            </div>

                            <div>
                                <input class="form-control" type="number" name="height" value="{{ old('height') }}"
                                    placeholder="الطول">
                                @foreach ($errors->get('height') as $message)
                                    <div class="alert alert-danger mt-2 d-block">{{ $message }}</div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="form-group col-8">
                        <label for="status">الحالة</label>
                        <select name="status" class="custom-select" id="status">
                            @foreach ($statuses as $status => $value)
                                <option @selected(old('status') === "$value") value="{{ $value }}">{{ $status }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
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
        var previewImage = function(event) {
            var output = document.getElementById('image-preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endpush
@push('js')
    <script>
        $('#resize').on('change', function() {
            $('#resizebox').toggleClass('d-none');
        });
    </script>
@endpush
@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function(){
      $("#datepicker").datepicker({
         format: "yyyy",
         viewMode: "years", 
         minViewMode: "years",
         autoclose:true
      });   
    })
</script>
@endpush
