@extends("layouts.admin")
@section('title', "تعديل {$region->name}")
@section('breadcrumbs')
{{ Breadcrumbs::render('regions.edit',$region)}}
@endsection
@push('css')
{{-- <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet"> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark"> @yield('title')</h1>
    </div>
{{-- @include('includes.validation_errors') --}}
    <div class="col-12 mt-5">

        <form method="post" action="{{ route('regions.update', ['region' => $region->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-6">
                    <div class="form-group col-8 ">
                        <label for="name.ar">تعديل اسم المنطقة بالغة العربية</label>
                        <input type="text" name="name[ar]" class="form-control" id="name.ar"  value="{{ $region->getTranslation('name','ar') }}">
                        @error('name.ar')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <label for="name.en">تعديل اسم المنطقة باللغة اللإنجليزية</label>
                        <input type="text" name="name[en]" class="form-control" id="name.en"  value="{{ $region->getTranslation('name','en') }}">
                        @error('name.en')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-8">
                        <label for="city_id"> المدينة</label>
                        <select name="city_id" class="custom-select" id="city_id">
                            
                            @foreach ($cities as $city)
                                <option @selected($city->city_id == $city->id) value="{{ $city->id }}">
                                    {{$city->getTranslation('name','ar')}}-{{$city->getTranslation('name','en') }}
                                </option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    
                   
                    <button type="submit" name="edit" class="btn btn-primary mt-2">تعديل</button>
                </div>
                <div class="col-6">

                    <div class="col-8">
                        <label for="latitude">خط عرض نقطة المنتصف </label>
                        <input type="number" step=".0001" name="latitude" class="form-control" id="latitude" value="{{ $city->latitude }}">
                        @error('latitude')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-8">
                        <label for="longitude">خط طول نقطة المنتصف </label>
                        <input type="number" step=".0001" name="longitude" class="form-control" id="longitude" value="{{ $city->longitude }}">
                        @error('longitude')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-8">
                        <label for="radius">أبعد مسافة من نقطة المنتصف </label>
                        <input type="number" step=".0001" name="radius" class="form-control" id="radius" value="{{ $city->radius }}">
                        @error('radius')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-8">
                        <label for="status">الحالة</label>
                        <select name="status" class="custom-select" id="status">
    
                            @foreach ($statuses as $status => $value)
                                <option @selected($model->status == $value) value="{{ $value }}">{{ $status }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
