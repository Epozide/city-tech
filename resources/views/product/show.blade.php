@extends('layouts.frontend')

@section('seo')

<title>{{ $product->name }} | {{ $systemName->name }}</title>
<meta charset="UTF-8">
<meta name="description" content="{{ $product->meta_description }}">
<meta name="keywords" content="{{ $product->meta_keywords }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@endsection

@section('content')

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>{{ $product->category->name }}</h4>
			<div class="site-pagination">
				<a href="{{ route('welcome') }}">الصفحة الرئيسية</a> /
				<a href="">منتجات</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="{{ route('frontendCategories') }}"> &lt;&lt; الرجوع للمنتجات</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						
						@if($singleImage != null)
                            <img class="product-big-img" src="/storage/{{ $singleImage->images }}" alt="">
                        @else
                            <img src="{{ asset('frontend/img/no-image.png') }}" alt="">
                        @endif
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							@foreach($product->photos as $image)
								<div class="pt active" data-imgbigurl="
								@if($image->count() > 0)
		                                /storage/{{ $image->images }}
		                            @else
		                                {{ asset('frontend/img/no-image.png') }}
		                            @endif
								">	
									@if($image->count() > 0)
		                                <img src="/storage/{{ $image->images }}" alt="">
		                            @else
		                                <img src="{{ asset('frontend/img/no-image.png') }}" alt="">
		                            @endif
								</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-lg-6 product-details">
				@if (($product->saved) != 0)
					<b><h2 class="p-title">{{$product->name}}</h2></b>
					<b><h2 class="p-title">{{$product->price}} EGP</h2></b>
					<h2 class="p-title" style="color:gray;text-decoration: line-through;font-size:12px;">{{$product->dprice}} EGP</h2>
					<h2 class="p-title"style="color:green; font-size:12px">ستوفر  {{$product->saved}} جنيه مصري </h2>
				@else
					<h2 class="p-title">{{ $product->name }}</h2>
					<h3 class="p-price">{{ $product->price }} EGP</h3>
				@endif
					@if($pieces)
						<h4 class="p-stock">Pieces: 
							<span>
								{{ $pieces->attribute_value }}
							</span>
						</h4>
					@endif
					<h4 class="p-stock">التوفر:
						<span>
							@if($product->inStock())
								موجود
							@else
								غير موجود
							@endif
						</span>
					</h4>
					<!-- Add to cart logic -->
					<form action="{{ route('cart.store') }}" method="post">
						@csrf
					@if(!empty($color))
						<div class="fw-size-choose">
							<!--<p>اللون</p>-->
							@foreach($color as $c)
								<div class="sc-item">
									<input type="radio" name="اللون" id="{{ $c->attribute_value }}" value="{{ $c->attribute_value }}">
									<label for="{{ $c->attribute_value }}" class="choose-color">{{ $c->attribute_value }}</label>
								</div>
							@endforeach
						</div>
					@endif

					@if(!empty($sizes))
						<div class="fw-size-choose">
							<!--<p>الحجم</p>-->
							@foreach($sizes as $size)
								<div class="sc-item">
									<input type="radio" name="الحجم" id="{{ $size->attribute_value }}" value="{{ $size->attribute_value }}">
									<label for="{{ $size->attribute_value }}">{{ $size->attribute_value }}</label>
								</div>
							@endforeach
						</div>
					@endif

                    
						<div class="quantity">
							<!--<p>الكمية</p>-->
	                        <div class="pro-qty"><input type="text" name="quantity" value="1"></div>
	                    </div>
						<input type="hidden" name="id" value="{{ $product->id }}">
						<input type="hidden" name="name" value="{{ $product->name }}">
						<input type="hidden" name="price" value="{{ $product->price }}">
						<button type="submit" class="site-btn">اضافة للحقيبة</button>
					</form>

					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">الوصف</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>{{ $product->description }}</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">قواعد الشراء</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<!--<h4>7 Days Returns</h4>-->
									<b><p>يتم حجز المنتج من موقعنا و استلامه في الفرع
<br>
<br>
عند حجز المنتج, يقوم احد موظفين سيتي تيك بالتاكد من وجود المنتج و التواصل مع العميل لتاكيد الطلب و يكون الطلب جاهز للاستلام من الفرع
<br>
<br>
عند استلام المنتج, يتفضل العميل بزيارة الفرع لدفع ثمن المنتج و استلام الطلب
<br>
<br>
اذا تم رفض الطلب, يتم اعلام العميل عن السبب من احد موظفين سيتي تيك*
<br>
 يتم رفض الطلب في حالة عدم الوجود المنتج او وجود بيانات خاطئة له علي الموقع*
<br></b><br> مده تاكيد الطلب خلال <span>من 1 الي 3 ايام عمل</span></p>
									<p>{{-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec. --}}</p>
								</div>
							</div>
						</div>
					</div>
					<div class="social-sharing">
						<a href=""><i class="fa fa-instagram"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->


	<!-- RELATED PRODUCTS section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>منتجات شبيهة</h2>
			</div>
			<div class="product-slider owl-carousel">
				@foreach($relatedProducts as $related)
				<div class="product-item">
					<div class="pi-pic">
						<a href="{{ route('single-product', $related->slug) }}">
							@if($related->photos->count() > 0)
                                <img src="/storage/{{ $related->photos->first()->images }}" alt="">
                            @else
                                <img src="{{ asset('frontend/img/no-image.png') }}" alt="">
                            @endif
						</a>
						<div class="pi-links">
							<form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$related->id}}">
                                <input type="hidden" name="name" value="{{$related->name}}">
                                <input type="hidden" name="price" value="{{$related->price}}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="add-card"><i class="flaticon-bag"></i><span>اضافة للحقيبة</span></button>
                            </form>
                            <form action="{{ route('wishlist.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$related->id}}">
                                <input type="hidden" name="name" value="{{$related->name}}">
                                <input type="hidden" name="price" value="{{$related->price}}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="wishlist-btn"><i class="flaticon-heart"></i></button>
                            </form>
						</div>
					</div>
					<div class="pi-text">
						<h6>{{ $related->price }} EGP</h6>
						<p>{{ $related->name }} </p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- RELATED PRODUCTS section end -->

@endsection