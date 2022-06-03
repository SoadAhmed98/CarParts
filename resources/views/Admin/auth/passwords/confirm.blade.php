@extends('layouts.app')
@section('title', 'تأكيد كلمة المرور')
@section('content')

    <div class="background-image">
        <section class="height-100vh d-flex align-items-center page-section-ptb login" {{-- background-filter --}}>
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">

                    <div class="col-lg-5 col-md-6 bg-white border border-secondary border-width">
                        <div class="login-fancy pb-40 clearfix">
                           
                            <form action="{{ route('password.confirm') }}" method="post">
                                @csrf
                                <h4 class="mb-30">يرجى تاكيد كلمة المرور الخاصة بك قبل المتابعة</h4>
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
