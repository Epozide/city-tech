@extends('layouts.frontend')

@section('seo')

<title>{{ $systemInfo->name }} | Checkout</title>
<meta charset="UTF-8">
<meta name="description" content="{{ $systemInfo->description }}">
<meta name="keywords" content="{{ $systemInfo->description }}, {{ $systemInfo->description }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@endsection

@section('content')

<!-- checkout section  -->
<section class="checkout-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 order-2 order-lg-1">
			@if(auth()->user()->isVerified())
				<form class="checkout-form" action="{{ route('checkout.store') }}" method="post">
			@else
				<form class="checkout-form" action="/email/verify">
			@endif
					@csrf
					<div class="cf-title">بيانات العميل</div>
					<!--<div class="row">
						<div class="col-md-5">
							<div class="cf-radio-btns address-rb">
								<div class="cfr-item">
									<input type="radio" name="pm" id="one">
									<!-- <label for="one">Use my regular address</label>-->
								<!--</div>
								<div class="cfr-item">
									<input type="radio" name="pm" id="two">
									<!-- <label for="two">Use a different address</label>-->
								<!--</div>
							</div>
						</div>
					</div>-->
					<div class="row address-inputs">
						<div class="col-md-6">
							<input type="text" name="billing_fullname" placeholder="الاسم بالكامل" value="{{ auth()->user()->name }}" readonly>
						</div>
						<!--<div class="col-md-6">
							<input type="text" name="billing_email" placeholder="Email" value="{{ auth()->user()->email }}" readonly>
						</div>-->
						<!--<div class="col-md-12">
							<input type="text" name="billing_address" placeholder="Address"  value="{{ auth()->user()->address }}">
						</div>-->
						<!--<div class="col-md-6">
							<input type="text" name="billing_city" placeholder="City" value="{{ auth()->user()->city }}">
						</div>-->
						<!--<div class="col-md-6">
							<input type="text" name="billing_province" placeholder="Province or State" value="{{ auth()->user()->province }}">
						</div>-->
						<!--<div class="col-md-6">
							<input type="text" name="billing_zipcode" placeholder="Zip code"  value="{{ auth()->user()->zipcode }}">
						</div>-->
						<div class="col-md-6">
							<input type="text" name="billing_phone" placeholder="رقم الهاتف" value="{{ auth()->user()->phone }}" readonly >
						</div>
						<div class="col-md-12">
							<input type="text" name="notes" placeholder="ملاحظات" value="{{ auth()->user()->notes }}">
						</div>
					</div>
					{{-- <div class="cf-title">Delievery Info</div>
					<div class="row shipping-btns">
						<div class="col-6">
							<h4>Standard</h4>
						</div>
						<div class="col-6">
							<div class="cf-radio-btns">
								<div class="cfr-item">
									<input type="radio" name="shipping" id="ship-1">
									<label for="ship-1">Free</label>
								</div>
							</div>
						</div>
						<div class="col-6">
							<h4>Next day delievery  </h4>
						</div>
						<div class="col-6">
							<div class="cf-radio-btns">
								<div class="cfr-item">
									<input type="radio" name="shipping" id="ship-2">
									<label for="ship-2">$3.45</label>
								</div>
							</div>
						</div> --}}
					{{-- </div> --}}
					<div class="cf-title">تاكيد الطلب</div>
						<ul class="payment-list">
							@if(env('PAYPAL_SANDBOX_API_SECRET') != null)
							<li>
								<input type="radio" name="payment_method" value="paypal">
								Paypal<a href="#"><img src="{{ asset('frontend/img/paypal.png') }}" alt=""></a>
							</li>
							@endif
							{{-- <li>Credit / Debit card<a href="#"><img src="{{ asset('frontend/img/mastercart.png') }}" alt=""></a>
							</li> --}}
							<li>
								<input type="radio" name="payment_method" value="cash_on_delivery">
								الدفع في المحل
							</li>
						</ul>
						@if(auth()->user()->isVerified())
					<button type="submit" class="site-btn submit-order-btn">اكمال الطلب</button>
				@else
				<center><form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button class="site-btn submit-order-btn"  type="submit">{{ __('وثق بريدك الالكتروني') }}</button>
                    </form></center>
			@endif
				</form>
			</div>
			<div class="col-lg-4 order-1 order-lg-2">
				<div class="checkout-cart">
					<h3>حقيبتي</h3>
					<ul class="product-list">
						@foreach(Cart::content() as $item)
						<li>
							<div class="pl-thumb">
								@if($item->model->photos->count() > 0)
	                                <img src="/storage/{{ $item->model->photos->first()->images }}" alt="">
	                            @else
	                                <img src="{{ asset('frontend/img/no-image.png') }}" alt="">
	                            @endif
							</div>
							<h6>{{ $item->name }} ({{ $item->qty }})</h6>
						@if (($item->model->saved) != 0)
							<p>{{ $item->subtotal }} EGP</p>
							<p style="color:gray;text-decoration: line-through;font-size:12px;"> {{ $item->model->dprice * $item->qty}} EGP</p>
						@else
							<p>{{ $item->subtotal }} EGP</p>
						@endif
						</li>
						@endforeach
					</ul>
					<ul class="price-list">
						<!--<li>المجموع: <span>{{ $newSubtotal }}.00 EGP</span></li>-->
						<!--<li>Shipping<span>free</span></li>-->
						<li class="total">المجموع الكلي: <span>{{ $newTotal }}.00 EGP</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- checkout section end -->

@endsection