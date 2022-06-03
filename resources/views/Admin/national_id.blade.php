@extends('layouts.admin')
@section('title', 'الرقم القومى')
@section('content')
    <div class="col-12">
        <h1 class="h1 text-center text-dark">@yield('title')</h1>
    </div>
    <div class="col-12 mt-5">

        <form method="post" action="{{ route('check') }}">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group col-6">
                        <label for="National"> الرقم القومى </label>
                        <input type="text" name="N_id" class="form-control" id="National"
                            @if (isset($NationalId['National_id'])) value="{{ $NationalId['National_id'] }}"
                        @else
                           value="{{ old('N_id') }}" @endif>
                        @error('N_id')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" name="check" class="btn btn-info mt-2">ckeck</button>
            </div>
        </form>
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
