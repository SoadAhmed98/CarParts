@extends("layouts.admin")
@section('title','كل العلامات التجارية ')
@section('breadcrumbs')
{{ Breadcrumbs::render('brands.index')}}
@endsection
@section('content')
 <div class="col-12">
     <h1 class="h1 text-center text-dark">@yield('title') </h1>
 </div>
 <div class="col-12">
  @if (can('Store Brands','admin'))
     <a href="{{route('brands.create')}}" class="btn btn-primary rounded btn-sm">إنشاء علامة تجارية</a>
  @endif
 </div>
 <div class="col-12">
    <div class="table-responsive mt-15">
        <table class="table center-aligned-table mb-0">
          <thead>
            <tr class="text-dark">
              <th>الرقم</th>
              <th>اسم العلامة التجارية باللغة العربية</th>
              <th>اسم العلامة التجارية باللغة اللإنجليزية</th>
              <th>الحالة</th>
              <th>تاريخ الإنشاء</th>
              <th>تاريخ التعديل </th>
              <th>العمليات</th>
           
            </tr>
          </thead>
          <tbody>
              @forelse ($brands as $brand)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$brand->getTranslation('name','ar')}}</td>
                    <td>{{$brand->getTranslation('name','en')}}</td>
                    <td><label class="badge badge-{{$brand->status == 1 ? 'success' : 'danger' }}">{{$brand->status == 1 ? 'مفعل' : 'غير مفعل'}} </label></td>
                    <td>{{$brand->created_at}}</td>
                    <td>{{$brand->updated_at}}</td>
                    <td>
                      @if (can('Update Brands','admin'))
                      <a href="{{route('brands.edit',['brand'=> $brand->id])}}" class="btn btn-outline-primary btn-sm">تعديل</a>
                      @endif
                      @if (can('Destroy Brands','admin'))
                      <form method="post" action="{{route('brands.destroy',['brand'=>$brand->id])}}" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger btn-sm">حذف</button>
                    </form>
                      @endif
                    </td>
                </tr>
              @empty
                  <tr>
                      <td  colspan="6" class="alert alert-warning font-weight-bold text-center">لا يوجد علامات تجارية حاليا</td>
                  </tr>
              @endforelse
            
            

             
          </tbody>
        </table>
      </div>
 </div>
@endsection