@extends('layouts.admin')
@section('title', 'الرقم القومى')
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('title')</h1>
    </div>
    <div class="col-12 mt-5">
        <div class="col-6 mt-3">
            @if (isset($NationalId))
                <div class="card">
                    <div class="card-body ">
                        <h5 class="card-title  text-info">National Id Data</h5>
                        @foreach ($NationalId as $key => $value)
                            @if ($key == 'National_id')
                                <p class="card-text">{{ 'National Id : ' . $value }}</p>
                                @continue
                            @endif
                            @if ($key == 'BirthMillennium'|$key == 'ProvinceCode')
                                @continue
                            @endif

                            <p class="card-text">{{ $key . ' : ' . $value }}</p>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
