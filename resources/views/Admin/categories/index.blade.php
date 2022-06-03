@extends("layouts.admin")
@section('title','كل الأقسام  ')
@section('breadcrumbs')
{{ Breadcrumbs::render('categories.index')}}
@endsection
@section('content')
 <div class="col-12">
     <h1 class="h1 text-center text-dark">@yield('title') </h1>
 </div>
 <div class="col-12">
  @if (can('Store Categories','admin'))
     <a href="{{route('categories.create')}}" class="btn btn-primary rounded btn-sm">إنشاء قسم </a>
  @endif
 </div>
 <div class="col-12">
    <div class="table-responsive mt-15">
        <table class="table center-aligned-table mb-0">
          <thead>
            <tr class="text-dark">
              <th>الرقم</th>
              <th>اسم قسم  باللغة العربية</th>
              <th>اسم قسم  باللغة اللإنجليزية</th>
              <th>الحالة</th>
              <th>تاريخ الإنشاء</th>
              <th>تاريخ التعديل </th>
              <th>العمليات</th>
           
            </tr>
          </thead>
          <tbody>
              @forelse ($categories as $category)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->getTranslation('name','ar')}}</td>
                    <td>{{$category->getTranslation('name','en')}}</td>
                    <td><label class="badge badge-{{$category->status == 1 ? 'success' : 'danger' }}">{{$category->status == 1 ? 'مفعل' : 'غير مفعل'}} </label></td>
                    <td>{{$category->created_at}}</td>
                    <td>{{$category->updated_at}}</td>
                    <td>
                      @if (can('Update Categories','admin'))
                      <a href="{{route('categories.edit',['category'=> $category->id])}}" class="btn btn-outline-primary btn-sm">تعديل</a>
                      @endif
                      @if (can('Destroy Categories','admin'))
                      <form method="post" action="{{route('categories.destroy',['category'=>$category->id])}}" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger btn-sm">حذف</button>
                    </form>
                      @endif
                    </td>
                </tr>
              @empty
                  <tr>
                      <td  colspan="7" class="alert alert-warning font-weight-bold text-center">لا يوجد أقسام حاليا</td>
                  </tr>
              @endforelse
            
            

             
          </tbody>
        </table>
      </div>
 </div>
@endsection