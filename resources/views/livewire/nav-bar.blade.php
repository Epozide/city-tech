<nav class="main-navbar">
	<div class="container">
		<!-- menu -->
		<ul class="main-menu">
					<center>
			<li><a href="/">الصفحة الرئيسية</a></li>
			@auth
			@else
			<li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
			@endauth
			<li><a href="{{ route('on-sale') }}">العروض
				<!--<span class="new">خصم</span>-->
			</a></li>
			@foreach($navCategories as $cat)
			<!--<li><a href="{{ route('frontendCategory', $cat->slug) }}">{{ $cat->name }}</a>-->
			@endforeach
			<li><a href="{{ route('frontendCategories') }}">منتجات</a>
				<ul class="sub-menu">
					@foreach($navCategories as $cat)
						<li><a href="{{ route('frontendCategory', $cat->slug) }}">{{ $cat->name }}</a></li>
					@endforeach	
				</ul>
				
			</li>
			<!--<li><a href="#">Blog</a></li>-->
			<!--<li><a href="{{ route('contact-us') }}">Contact</a></li>-->
			</center>
		</ul>
	</div>
</nav>
