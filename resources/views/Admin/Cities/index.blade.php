@extends("layouts.admin")
@section('title','كل المدن  ')
@section('breadcrumbs')
{{ Breadcrumbs::render('cities.index')}}
@endsection
@section('content')
 <div class="col-12">
     <h1 class="h1 text-center text-dark">@yield('title') </h1>
 </div>
 <div class="col-12">
     <a href="{{route('cities.create')}}" class="btn btn-primary rounded btn-sm">إنشاء  مدينة</a>
 </div>
 <div class="col-12">
    <div class="table-responsive mt-15">
        <table class="table center-aligned-table mb-0">
          <thead>
            <tr class="text-dark">
              <th>الرقم</th>
              <th>اسم مدينة  باللغة العربية</th>
              <th>اسم مدينة  باللغة اللإنجليزية</th>
              <th>الحالة</th>
              <th>تاريخ الإنشاء</th>
              <th>تاريخ التعديل </th>
              <th>العمليات</th>
           
            </tr>
          </thead>
          <tbody>
              @forelse ($cities as $city)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$city->getTranslation('name','ar')}}</td>
                    <td>{{$city->getTranslation('name','en')}}</td>
                    <td><label class="badge badge-{{$city->status == 1 ? 'success' : 'danger' }}">{{$city->status == 1 ? 'متاح التوصيل' : 'غير متاح التوصيل'}} </label></td>
                    <td>{{$city->created_at}}</td>
                    <td>{{$city->updated_at}}</td>
                    <td>
                        <a href="{{route('cities.edit',['city'=> $city->id])}}" class="btn btn-outline-primary btn-sm">تعديل</a>
                        <form method="post" action="{{route('cities.destroy',['city'=>$city->id])}}" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger btn-sm">حذف</button>
                        </form>
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