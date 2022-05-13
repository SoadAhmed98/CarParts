@extends("layouts.admin")
@section('title', "تعديل  {$brand->name}")
@section('breadcrumbs')
{{ Breadcrumbs::render('brands.edit',$brand)}}
@endsection
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('title')</h1>
    </div>

    <div class="col-12 mt-5">

        <form method="post" action="{{ route('brands.update', ['brand' => $brand->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-6">
                    <div class="form-group col-8 ">
                        <label for="name.ar">تعديل اسم العلامة التجارية بالغة العربية</label>
                        <input type="text" name="name[ar]" class="form-control" id="name.ar"  value="{{ $brand->getTranslation('name','ar') }}">
                        @error('name.ar')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <label for="name.en">تعديل اسم العلامة التجارية باللغة اللإنجليزية</label>
                        <input type="text" name="name[en]" class="form-control" id="name.en"  value="{{ $brand->getTranslation('name','en') }}">
                        @error('name.en')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-8">
                        <label for="status">الحالة</label>
                        <select name="status" class="custom-select" id="status">
    
                            @foreach ($statuses as $status => $value)
                                <option @selected($brand->status == $value) value="{{ $value }}">{{ $status }}</option>
                            @endforeach
                        </select>
                        @error('status')
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
                                <img src="{{ asset($brand->getFirstMediaUrl('brands')) }}" id="image-preview" class="w-100 mb-3"
                                    alt="{{ $brand->name }}" style="cursor: pointer"  style="max-width: 150px ; max-height: 100px">
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
        
                        <label for="resize" class="mt-3">تغيير أبعاد الصورة </label>
                        <input type="checkbox" @checked(old('resize')==='true') name="resize" class=" custom-checkbox" value="exist" id="resize">
                        <div class="row " id="resizebox">
                            <div class="mr-2">
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
    {{-- <script>
        $('#resize').on('change',function(){
           $('#resizebox').toggleClass('d-none');
        });
    </script> --}}
@endpush