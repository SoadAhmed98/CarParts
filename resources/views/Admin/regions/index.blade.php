@extends('layouts.admin')
@section('title', 'كل المناطق ')
@section('breadcrumbs')
    {{ Breadcrumbs::render('regions.index') }}
@endsection
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('title')</h1>
    </div>
    <div class="col-12">
        @if (can('Store Regions', 'admin'))
            <a href="{{ route('regions.create') }}" class="btn btn-primary rounded btn-sm">إنشاء منطقة</a>
        @endif
    </div>
    <div class="col-12">
        <div class="table-responsive mt-15">
            <table class="table center-aligned-table mb-0">
                <thead>
                    <tr class="text-dark">
                        <th>الرقم</th>
                        <th>اسم المنطقة باللغة العربية</th>
                        <th>اسم المنطقة باللغة اللإنجليزية</th>
                        <th> المدينة</th>
                        <th>خط عرض نقطة المنتصف</th>
                        <th>خط طول نقطة المنتصف </th>
                        <th>أبعد مسافة من نقطة المنتصف</th>
                        <th>الحالة</th>
                        <th>تاريخ الإنشاء</th>
                        <th>تاريخ التعديل </th>
                        <th>العمليات</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($regions as $region)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $region->getTranslation('name', 'ar') }}</td>
                            <td>{{ $region->getTranslation('name', 'en') }}</td>
                            <td>{{ $region->city_id }}</td>
                            <td>{{ $region->latitude }}</td>
                            <td>{{ $region->longitude }}</td>
                            <td>{{ $region->radius }}</td>
                            <td><label
                                    class="badge badge-{{ $region->status == 1 ? 'success' : 'danger' }}">{{ $region->status == 1 ? 'متاح التوصيل' : 'غير متاح التوصيل' }}
                                </label></td>
                            <td>{{ $region->created_at }}</td>
                            <td>{{ $region->updated_at }}</td>
                            <td>
                                @if (can('Update Regions', 'admin'))
                                    <a href="{{ route('regions.edit', ['region' => $region->id]) }}"
                                        class="btn btn-outline-primary btn-sm">تعديل</a>
                                @endif
                                @if (can('Destroy Regions', 'admin'))
                                    <form method="post" action="{{ route('regions.destroy', ['region' => $region->id]) }}"
                                        class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger btn-sm">حذف</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="alert alert-warning font-weight-bold text-center">لا يوجد مناطق حاليا
                            </td>
                        </tr>
                    @endforelse




                </tbody>
            </table>
        </div>
    </div>
@endsection
