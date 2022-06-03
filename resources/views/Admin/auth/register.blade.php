@extends('layouts.app')
@section('title', ' إنشاء مُشرف جديد')
@section('content')

    <div class="background-image">
        <section class="height-100vh d-flex align-items-center page-section-ptb login" {{-- background-filter --}}>
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">
                    <div class="col-lg-5 col-md-6 bg-white border border-secondary border-width">
                        <div class="login-fancy pb-40 clearfix">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <h4 class="mb-30">@yield('title')</h4>
                                <div class="section-field mb-20">
                                    <label class="mb-10" for="name">الإسم * </label>
                                    <input id="name" type="text" class="web form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

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
                                <div class="section-field mb-20">
                                    <label class="mb-10" for="password_confirmation">تأكيد كلمة المرور *</label>
                                    <input id="password_confirmation" type="password"
                                        class="Password form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" required>

                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>
                       
                                <button type="submit" class="btn btn-success">
                                    <span> إنشاء حساب جديد</span>
                                    <i class="fa fa-check"></i>
                                </button>

                    </div>
                    </form>
                </div>
            </div>
    </div>
    </section>
    </div>

@endsection
