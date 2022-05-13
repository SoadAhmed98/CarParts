@extends('layouts.app')
@section('title', 'التحقق من البريد الإلكترونى')
@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
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
                    <div class="col-lg-6 col-md-6 bg-white border border-secondary" style=" border-width:10px !important;">
                        <div class="card">
                            <div class="card-header">
                                <h6 >تنبيه !</h6>
                            </div>
                            <div class="card-body">
                                <div class="login-fancy pb-40 clearfix">
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.
                                        </div>
                                    @endif
                                    <h6 class="card-title">قبل المتابعة ، يرجى التحقق من بريدك الإلكتروني بحثًا عن رابط
                                        التحقق.</h6>

                                    <form class="d-inline" method="POST"
                                        action="{{ route('verification.resend') }}">
                                        @csrf
                                        <p>إذا لم تستلم البريد الإلكترونى <button type="submit" class="btn btn-link p-0 m-0 align-baseline">انقر هنا لطلب بريد
                                            أخر</button>.</p>
                                        
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
