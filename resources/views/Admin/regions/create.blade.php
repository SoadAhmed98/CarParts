@extends("layouts.admin")
@section('title', 'إنشاء المناطق')
@section('breadcrumbs')
{{ Breadcrumbs::render('regions.create')}}
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

        <form method="post" action="{{ route('regions.store') }}" >
            @csrf
            <div class="row mb-4">
                <div class="col-6">
                    <div class="form-group col-8 ">
                        <label for="name.ar">ادخل اسم المنطقة بالغة العربية</label>
                        <input type="text" name="name[ar]" class="form-control" id="name.ar" value="{{ old('name.ar') }}">
                        @error('name.ar')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <label for="name.en">ادخل اسم المنطقة باللغة اللإنجليزية</label>
                        <input type="text" name="name[en]" class="form-control" id="name.en" value="{{ old('name.en') }}">
                        @error('name.en')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-8">
                        <label for="city_id"> المدينة</label>
                        <select name="city_id" class="custom-select" id="city_id">
                            <option disabled selected>اختر</option>
                            @foreach ($cities as $city)
                                <option @selected(old('city_id') == $city->id) value="{{ $city->id }}">
                                    {{$city->getTranslation('name','ar')}}-{{$city->getTranslation('name','en') }}
                                </option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                   
                   
                    
                </div>

                <div class="col-6">
                    
                    <div class="col-8">
                        <label for="latitude">خط عرض نقطة المنتصف </label>
                        <input type="text" name="latitude" class="form-control" id="latitude" value="{{ old('latitude') }}">
                        @error('latitude')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-8">
                        <label for="longitude">خط طول نقطة المنتصف </label>
                        <input type="text" name="longitude" class="form-control" id="longitude" value="{{ old('longitude') }}">
                        @error('longitude')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-8">
                        <label for="radius">أبعد مسافة من نقطة المنتصف </label>
                        <input type="number" step=".0001" name="radius" class="form-control" id="radius" value="{{ old('radius') }}">
                        @error('radius')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
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
