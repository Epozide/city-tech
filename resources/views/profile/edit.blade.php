@extends('layouts.frontend')

@section('seo')

<title>{{ auth()->user()->name }} 's | Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@endsection

@section('content')

	<!-- Category section -->
	{{-- <section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Categories</h2>
						<ul class="category-menu">
							<li><a href="#">Children</a></li>
							<li><a href="#">Bags & Purses</a></li>
							<li><a href="#">Eyewear</a></li>
							<li><a href="#">Footwear</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</section> --}}
	<!-- Category section end -->

	<div class="card col-lg col-xl-9 flex-row mx-auto px-0">
		<div class="card-body">
			@if(auth()->user()->isVerified())
			<h4 class="title text-center mt-2 mb-3">حسابي</h4>
			<center><p style="color:green; font-size:24px">موثق</p></center>
			@else
			<h4 class="title text-center mt-2 mb-3">حسابي</h4>
			<center><p style="color:red; font-size:24px">غير موثق</p></center><center><p style="color:red;">برجاء توثيق البريد الالكتروني</p></center>
			@endif
			<form class="form-box px-3"method="POST" action="{{ route('my-profile.store') }}">
	            @csrf
	            <div class="form-input">
	                <span><i class="fa fa-user"></i></span>
	                <input type="text" name="name" placeholder="Name" tabindex="10" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name ?? old('name') }}" required>

	                @error('name')
	                    <span class="invalid-feedback mt-3" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
	            </div>
				@if(auth()->user()->isVerified())
				@else
	            <div class="form-input">
	                <span><i class="fa fa-envelope"></i></span>
	                <input type="email" name="email" placeholder="Email Address" tabindex="10" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email ?? old('email') }}" required>
					
	                @error('email')
	                    <span class="invalid-feedback mt-3" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
	            </div>
				@endif
			    <div class="form-input">
	                <span><i class="fa fa-phone"></i></span>
	                <input type="phone" name="phone" placeholder="Phone Number" tabindex="10" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ auth()->user()->phone ?? old('phone') }}" pattern="(01)[0-9]{9}" required>

	                @error('phone')
	                    <span class="invalid-feedback mt-3" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
	            </div>
	            <div class="form-input">
	                <span><i class="fa fa-key"></i></span>
	                <input type="password" name="password"class="form-control @error('password') is-invalid @enderror"  placeholder="كلمة السر">

	                 @error('password')
	                    <span class="invalid-feedback mt-3" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
	            </div>
	            <div class="form-input">
	                <span><i class="fa fa-key"></i></span>
	                <input type="password" name="password_confirmation" placeholder="تاكيد كلمة السر" class="form-control @error('password_confirmation') is-invalid @enderror">

	                 @error('password_confirmation')
	                    <span class="invalid-feedback mt-3" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
	            </div>
	            <div class="mb-3">
	                <button type="submit" class="btn btn-block">تغير بياناتي</button>
	            </div>
	        </form>
		</div>
	</div>

@endsection
