@extends("layouts.admin")
@section('title', "تعديل {$model->name}")
@section('breadcrumbs')
{{ Breadcrumbs::render('models.edit',$model)}}
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

        <form method="post" action="{{ route('models.update', ['model' => $model->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-6">
                    <div class="form-group col-8 ">
                        <label for="name.ar">تعديل اسم الموديل بالغة العربية</label>
                        <input type="text" name="name[ar]" class="form-control" id="name.ar"  value="{{ $model->getTranslation('name','ar') }}">
                        @error('name.ar')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <label for="name.en">تعديل اسم الموديل باللغة اللإنجليزية</label>
                        <input type="text" name="name[en]" class="form-control" id="name.en"  value="{{ $model->getTranslation('name','en') }}">
                        @error('name.en')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-8">
                        <label for="brand_id">العلامة التجارية</label>
                        <select name="brand_id" class="custom-select" id="brand_id">
                            
                            @foreach ($brands as $brand)
                                <option @selected($model->brand_id == $brand->id) value="{{ $brand->id }}">
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
                        <input type="text" name="year" class="form-control" id="datepicker" value="{{ $model->year }}">
                        @error('year')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                   
    
                   
                    <button type="submit" name="edit" class="btn btn-primary mt-2">تعديل</button>
                </div>
                <div class="col-6">

                    <div class="row">
                        <div class="col-4 mb-5" style="height:150px">
                            <input type="file" name="image" class="custom-file-input d-none" id="image"
                                    onchange="previewImage(event)">
                            <label for="image">
                                <img src="{{ asset($model->getFirstMediaUrl('models')) }}" id="image-preview" class="w-100 mb-3"
                                    alt="{{ $model->name }}" style="cursor: pointer"  style="max-width: 150px ; max-height: 100px">
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-8">
        
                        <label for="resize" class="mt-3">تغيير أبعاد الصورة </label>
                        <input type="checkbox" @checked((old('resize')==='true')||$errors->get('width')||$errors->get('height')) name="resize" class=" custom-checkbox" value="exist" id="resize">
                        <div class="row d-none" id="resizebox">
                            <div class="mr-2 mb-2">
                             <input class="form-control" type="number" name="width" value="{{old('width')}}"  placeholder="العرض">
                                @foreach ($errors->get('width') as $message) 
                                    <div class="alert alert-danger mt-2 d-block">{{ $message }}</div>
                                @endforeach
                            </div>
                            
                            <div >
                           <input class="form-control" type="number"  name="height" value="{{old('height')}}" placeholder="الطول">
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
        $('#resize').on('change',function(){
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
