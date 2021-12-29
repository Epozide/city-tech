@extends('layouts.frontend')

@section('seo')

<title>
	@if(auth()->check()) 
		{{ auth()->user()->name }} 's Orders
	@endif
</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@endsection

@section('content')

	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
					<strong class="text-uppercase text-danger" color = "green">{{ $order->status }}</strong>
					<h3>{{ $order->order_number }} طلب رقم </h3>
					<div class="cart-table-warp">
						<table>
						<thead>
							<tr>
								<th class="product-th">المنتج</th>
								<th class="size-th">الكمية</th>
								<!--<th class="size-th">Code</th>-->
								<th class="total-th">السعر</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $p)
							<tr>
								<td class="product-col">
									@if($p->photos->count() > 0)
		                               <img src="/storage/{{ $p->photos->first()->images }} " alt="">
		                            @else
		                               <img src="{{ asset('frontend/img/no-image.png') }}" alt="">
		                            @endif
									<div class="pc-title">
										<h4>{{ $p->name }}</h4>
										<p>{{ $p->price }} EGP</p>
									</div>
								</td>
								<td class="size-col"><h4>{{ $p->pivot->quantity }}</h4></td>
								<!--<td class="size-col"><h4>{{ $p->code }}</h4></td>-->
								<td class="total-col"><h4>{{ $p->price * $p->pivot->quantity }} EGP</h4></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					</div>
					<div class="total-cost">
						<h6>مجموع الحساب: <span>{{ $order->billing_total }} جنيه مصري</span></h6>
					</div>
				</div>
				</div>
				<div class="col-lg-4 card-right">
					<a href="https://citytechluxor.com/my-profile" class="site-btn">اعداداتي</a>
					<a href="https://citytechluxor.com/" class="site-btn sb-dark">المنتجات</a>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->

	<!-- Related product section -->
<section class="related-product-section">
	<div class="container">
		<div class="section-title text-uppercase">
			<h2>تصفحت هذه المنتجات</h2>
		</div>
		<div class="row">
			@foreach($recentlyViewed as $view)
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<div class="tag-new">جديد</div>
						<a href="{{ route('single-product', $view->slug) }}">
							@if($view->photos->count() > 0)
                                <img src="/storage/{{ $view->photos->first()->images }}" alt="">
                            @else
                                <img src="{{ asset('frontend/img/no-image.png') }}" alt="">
                            @endif
						</a>
						<div class="pi-links">
							<form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$view->id}}">
                                <input type="hidden" name="name" value="{{$view->name}}">
                                <input type="hidden" name="price" value="{{$view->price}}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="add-card"><i class="flaticon-bag"></i><span>اضافة للحقيبة</span></button>
                            </form>
                            <form>
                                <button type="submit" class="wishlist-btn"><i class="flaticon-heart"></i></button>
                            </form>
						</div>
					</div>
					<div class="pi-text">
						<h6>{{ $view->price }} EGP</h6>
						<p>{{ $view->name }}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- Related product section end -->

@endsection