@extends("layouts.admin")
@section('title', "تعديل  {$city->name}")
@section('breadcrumbs')
{{ Breadcrumbs::render('cities.edit',$city)}}
@endsection
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('title')</h1>
    </div>

    <div class="col-12 mt-5">

        <form method="post" action="{{ route('cities.update', ['city' => $city->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-6">
                    <div class="form-group col-8 ">
                        <label for="name.ar">تعديل اسم العلامة التجارية بالغة العربية</label>
                        <input type="text" name="name[ar]" class="form-control" id="name.ar"  value="{{ $city->getTranslation('name','ar') }}">
                        @error('name.ar')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <label for="name.en">تعديل اسم العلامة التجارية باللغة اللإنجليزية</label>
                        <input type="text" name="name[en]" class="form-control" id="name.en"  value="{{ $city->getTranslation('name','en') }}">
                        @error('name.en')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-8">
                        <label for="status">الحالة</label>
                        <select name="status" class="custom-select" id="status">
    
                            @foreach ($statuses as $status => $value)
                                <option @selected($city->status == $value) value="{{ $value }}">{{ $status }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
    
                   
                    <button type="submit" name="edit" class="btn btn-primary mt-2">تعديل</button>
                </div>
                
            </div>
        </form>

    </div>
@endsection
