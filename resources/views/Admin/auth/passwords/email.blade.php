@extends('layouts.app')
@section('title','استرجاع كلمة المرور')
@section('content')

<div class="background-image">
    <section class="height-100vh d-flex align-items-center page-section-ptb login" {{-- background-filter --}}  > 
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                
                <div class="col-lg-5 col-md-6 bg-white border border-secondary border-width">
                    <div class="login-fancy pb-40 clearfix">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form action="{{ route('password.email') }}" method="post">
                            @csrf
                            <h4 class="mb-30">التأكد من البريد الإلكترونى</h4>
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
