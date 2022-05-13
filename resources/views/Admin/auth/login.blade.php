@extends('layouts.app')
@section('title', 'تسجيل الدخول')
@section('content')
    <div
        style="background-image: url({{ asset('assets/admin/images/bg/1.jpg') }}); background-size:100%; background-repeat: no-repeat;">
        <section class="height-100vh d-flex align-items-center page-section-ptb login" {{-- style="background-color:#000000b3;" --}}>
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">
                    <div class="col-lg-5 col-md-6 bg-white border border-secondary" style=" border-width:10px !important;">
                        <div class="login-fancy pb-40 clearfix">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <h3 class="mb-30">تسجيل الدخول كمشرف</h3>
                                <div class="section-field mb-20">
                                    <label class="mb-10" for="email">البريد الإلكترونى * </label>
                                    <input id="email" type="email"
                                        class="web form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
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
                                <div class="section-field">
                                    <div class="remember-checkbox mb-30">
                                        <input type="checkbox" class="form-control" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }} />
                                        <label for="remember"> تذكرنى</label>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link float-right" href="{{ route('password.request') }}">
                                                هل نسيت كلمة المرور ؟
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">
                                    <span>تسجيل الدخول</span>
                                    <i class="fa fa-check"></i>
                                </button>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
