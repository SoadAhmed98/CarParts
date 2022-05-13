@extends('layouts.app')
@section('title', 'تأكيد كلمة المرور')
@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Confirm Password') }}</div>

                    <div class="card-body">
                        {{ __('Please confirm your password before continuing.') }}

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password" required
                                        autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirm Password') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div
        style="background-image: url({{ asset('assets/admin/images/bg/1.jpg') }}); background-size:100%; background-repeat: no-repeat;">
        <section class="height-100vh d-flex align-items-center page-section-ptb login" {{-- style="background-color:#000000b3;" --}}>
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">

                    <div class="col-lg-5 col-md-6 bg-white border border-secondary" style=" border-width:10px !important;">
                        <div class="login-fancy pb-40 clearfix">
                           
                            <form action="{{ route('password.confirm') }}" method="post">
                                @csrf
                                <h3 class="mb-30">يرجى تاكيد كلمة المرور الخاصة بك قبل المتابعة</h3>
                                <div class="section-field mb-20">
                                    <label class="mb-10" for="Password">كلمة المرور * </label>
                                    <input id="password" type="password"
                                        class="Password form-control @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success">
                                    <span> تاكيد كلمة المرور</span>
                                    <i class="fa fa-check"></i>
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        هل نسيت كلمة المرور ؟
                                    </a>
                                @endif
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
