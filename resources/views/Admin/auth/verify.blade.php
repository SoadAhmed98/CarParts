@extends('layouts.app')
@section('title', 'التحقق من البريد الإلكترونى')
@section('content')
    <div class="background-image">
        <section class="height-100vh d-flex align-items-center page-section-ptb login" {{-- background-filter --}}>
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">
                    <div class="col-lg-6 col-md-6 bg-white border border-secondary border-width">
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
