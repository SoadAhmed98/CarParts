@extends("layouts.admin")
@section('title', 'إنشاء وظيفة ')
@section('breadcrumbs')
    {{ Breadcrumbs::render('roles.create') }}
@endsection
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('title')</h1>
    </div>
    @include('includes.validation_errors')
    <div class="col-12 mt-5">

        <form method="post" action="{{ route('roles.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group col-4 ">
                        <label for="name">ادخل اسم الوظيفة</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                        {{-- @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror --}}

                    </div>
                    <div class="form-group ">
                        <label for="all"><h5 class="text-primary">الصلاحيات</h5></label>
                        <input type="checkbox" id="all">
                        @foreach ($controllers_permissions as $controller=>$permissions)
                        <div>
                            <label for="{{$controller}}" class="font-weight-bold text-info">{{ $controller}}</label>
                            <input type="checkbox" id="{{$controller}}">
                        </div>
                        
                            @foreach ($permissions as $permission)
                                <div class="form-group d-inline">
                                    <input type="checkbox" class="check-all check-controller" name="permission_id[]" id="{{ $permission->id }}"
                                    value="{{ $permission->id }}">
                                    <label for="{{ $permission->id }}">{{ $permission->name }}</label>
                                    <span>&nbsp; &nbsp;</span>
                                </div>
                                     
                            @endforeach
                       
                        @endforeach
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
    $('#all').change(function(){
     if(this.checked){
         $('.check-all').attr('checked','checked');
     }else{
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
</script>  --}}
@endpush
