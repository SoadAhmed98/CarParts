@extends('layouts.admin')
@section('title', 'كل الموديلات ')
@section('breadcrumbs')
    {{ Breadcrumbs::render('models.index') }}
@endsection
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('titile')</h1>
    </div>
    <div class="col-12">
        @if (can('Store Models', 'admin'))
            <a href="{{ route('models.create') }}" class="btn btn-primary rounded btn-sm">إنشاء موديل</a>
        @endif
    </div>
    <div class="col-12">
        <div class="table-responsive mt-15">
            <table class="table center-aligned-table mb-0">
                <thead>
                    <tr class="text-dark">
                        <th>الرقم</th>
                        <th>اسم الموديل باللغة العربية</th>
                        <th>اسم الموديل باللغة اللإنجليزية</th>
                        <th>السنة</th>
                        <th>العلامة التجارية</th>
                        <th>الحالة</th>
                        <th>تاريخ الإنشاء</th>
                        <th>تاريخ التعديل </th>
                        <th>العمليات</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($models as $model)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $model->getTranslation('name', 'ar') }}</td>
                            <td>{{ $model->getTranslation('name', 'en') }}</td>
                            <td>{{ $model->year }}</td>
                            <td>{{ $model->brand_id }}</td>
                            <td><label
                                    class="badge badge-{{ $model->status == 1 ? 'success' : 'danger' }}">{{ $model->status == 1 ? 'مفعل' : 'غير مفعل' }}
                                </label></td>
                            <td>{{ $model->created_at }}</td>
                            <td>{{ $model->updated_at }}</td>
                            <td>
                                @if (can('Update Models', 'admin'))
                                    <a href="{{ route('models.edit', ['model' => $model->id]) }}"
                                        class="btn btn-outline-primary btn-sm">تعديل</a>
                                @endif
                                @if (can('Destroy Models', 'admin'))
                                    <form method="post" action="{{ route('models.destroy', ['model' => $model->id]) }}"
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
                            <td colspan="9" class="alert alert-warning font-weight-bold text-center">لا يوجد موديلات حاليا
                            </td>
                        </tr>
                    @endforelse




                </tbody>
            </table>
        </div>
    </div>
@endsection
