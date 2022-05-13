@extends("layouts.admin")
@section('title', 'إنشاء العلامات تجارية')
@section('breadcrumbs')
{{ Breadcrumbs::render('brands.create')}}
@endsection
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('title')</h1>
    </div>
    <div class="col-12 mt-5">

        <form method="post" action="{{ route('brands.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group col-8 ">
                        <label for="name.ar">ادخل اسم العلامة التجارية بالغة العربية</label>
                        <input type="text" name="name[ar]" class="form-control" id="name.ar" value="{{ old('name.ar') }}">
                        @error('name.ar')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <label for="name.en">ادخل اسم العلامة التجارية باللغة اللإنجليزية</label>
                        <input type="text" name="name[en]" class="form-control" id="name.en" value="{{ old('name.en') }}">
                        @error('name.en')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-8">
                        <label for="status">الحالة</label>
                        <select name="status" class="custom-select" id="status">
                            <option disabled selected>اختار</option>
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

                <div class="col-6">
                    <div class="form-group " style="height:150px">
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
                    <div class="form-group">

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
