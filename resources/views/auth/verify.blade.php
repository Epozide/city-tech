@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('توثيق البريد الالكتروني') }}</div>
				<center>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('تم ارسال رابط التوثيق لبريدك الالكتروني') }}
                        </div>
                    @endif

                    {{ __('الرجاء التاكد من بريدك الالكتروني لتوثيق الحساب') }}<br>
                    {{ __('اذا لم يصلك البريد بالرجاء طلب محاولة اخري') }}
					</center>
                    <center><form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button  class="site-btn submit-order-btn" type="submit">{{ __('طلب محاولة اخري') }}</button>
                    </form></center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
