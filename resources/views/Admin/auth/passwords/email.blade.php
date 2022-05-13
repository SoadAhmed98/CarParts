@extends('layouts.app')
@section('title','استرجاع كلمة المرور')
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div  style="background-image: url({{asset('assets/admin/images/bg/1.jpg')}}); background-size:100%; background-repeat: no-repeat;">
    <section class="height-100vh d-flex align-items-center page-section-ptb login" 
        {{-- style="background-color:#000000b3;" --}}
         > 
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                
                <div class="col-lg-5 col-md-6 bg-white border border-secondary" style=" border-width:10px !important;">
                    <div class="login-fancy pb-40 clearfix">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form action="{{ route('password.email') }}" method="post">
                            @csrf
                            <h3 class="mb-30">التأكد من البريد الإلكترونى</h3>
                            <div class="section-field mb-20">
                                <label class="mb-10" for="email">البريد الإلكترونى * </label>
                                <input id="email" type="email" class="web form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                     autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-success">
                                <span> إرسال رابط تعيين كلمة المرور</span>
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
