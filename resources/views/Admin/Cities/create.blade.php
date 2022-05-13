@extends("layouts.admin")
@section('title', 'إنشاء المدن ')
@section('breadcrumbs')
{{ Breadcrumbs::render('cities.create')}}
@endsection
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('title')</h1>
    </div>
    <div class="col-12 mt-5">

        <form method="post" action="{{ route('cities.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group col-8 ">
                        <label for="name.ar">ادخل اسم المدينة  بالغة العربية</label>
                        <input type="text" name="name[ar]" class="form-control" id="name.ar" value="{{ old('name.ar') }}">
                        @error('name.ar')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <label for="name.en">ادخل اسم المدينة  باللغة اللإنجليزية</label>
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
            </div>




    </div>
    <div>
        @include('includes.create_submit_buttons')
    </div>

    </form>

    </div>

@endsection