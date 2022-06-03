@extends("layouts.admin")
@section('title','المُشرفين')
@section('breadcrumbs')
{{ Breadcrumbs::render('admins.index')}}
@endsection
@section('content')
 <div class="col-12">
     <h1 class="h1 text-center text-dark">@yield('title') </h1>
 </div>
 <div class="col-12">
   @if (can('Store Admins','admin'))
   <a href="{{route('admins.create')}}" class="btn btn-primary rounded btn-sm">إنشاء مُشرف جديدة </a>
   @endif
 </div>
 <div class="col-12">
    <div class="table-responsive mt-15">
        <table class="table center-aligned-table mb-0">
          <thead>
            <tr class="text-dark">
              <th>الرقم</th>
              <th>اسم المُشرف</th>
              <th>البريد الإلكترونى</th>
              <th>اسم الوظيفة</th>
              <th>الحالة</th>
              <th>تاريخ الإنشاء</th>
              <th>تاريخ التعديل </th>
              <th>العمليات</th>
           
            </tr>
          </thead>
          <tbody>
              @forelse ($admins as $admin)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->getRoleNames()->toArray()[0]}}</td>
                    <td>{{$admin->email_verified_at ? "مُفعل":"غير مُفعل"}}</td>
                    <td>{{$admin->created_at}}</td>
                    <td>{{$admin->updated_at}}</td>
                    <td>
                      {{-- @if($admin->name != 'Super Admin') --}}
                      @if (can('Update Admins','admin'))
                        <a href="{{route('admins.edit',['admin'=> $admin->id])}}" class="btn btn-outline-primary btn-sm">تعديل</a>
                      @endif
                      @if (can('Destroy Admins','admin'))
                        <form method="post" action="{{route('admins.destroy',['admin'=>$admin->id])}}" class="d-inline-block">
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
                      <td  colspan="7" class="alert alert-warning font-weight-bold text-center">لا يوجد مُشرفين حاليا</td>
                  </tr>
              @endforelse
            
            

             
          </tbody>
        </table>
      </div>
 </div>
@endsection