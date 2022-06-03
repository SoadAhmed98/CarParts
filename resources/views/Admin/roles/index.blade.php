@extends("layouts.admin")
@section('title','الوظائف')
@section('breadcrumbs')
{{ Breadcrumbs::render('roles.index')}}
@endsection
@section('content')
 <div class="col-12">
     <h1 class="h1 text-center text-dark">@yield('title') </h1>
 </div>
 <div class="col-12">
   @if (can('Store Roles','admin'))
   <a href="{{route('roles.create')}}" class="btn btn-primary rounded btn-sm">إنشاء وظيفة جديدة </a>
   @endif
 </div>
 <div class="col-12">
    <div class="table-responsive mt-15">
        <table class="table center-aligned-table mb-0">
          <thead>
            <tr class="text-dark">
              <th>الرقم</th>
              <th>اسم الوظيفة</th>
              <th>تاريخ الإنشاء</th>
              <th>تاريخ التعديل </th>
              <th>العمليات</th>
           
            </tr>
          </thead>
          <tbody>
              @forelse ($roles as $role)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->created_at}}</td>
                    <td>{{$role->updated_at}}</td>
                    <td>
                      {{-- @if($role->name != 'Super Admin') --}}
                      @if(can('Update Roles','admin'))
                      <a href="{{route('roles.edit',['role'=> $role->id])}}" class="btn btn-outline-primary btn-sm">تعديل</a>
                      @endif
                      @if(can('Destroy Roles','admin'))
                        <form method="post" action="{{route('roles.destroy',['role'=>$role->id])}}" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger btn-sm">حذف</button>
                        </form>
                      @endif
                        {{-- @endif --}}
                    </td>
                </tr>
              @empty
                  <tr>
                      <td  colspan="7" class="alert alert-warning font-weight-bold text-center">لا يوجد  مدن حاليا</td>
                  </tr>
              @endforelse
            
            

             
          </tbody>
        </table>
      </div>
 </div>
@endsection