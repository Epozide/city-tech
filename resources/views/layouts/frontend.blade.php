<!DOCTYPE html>
<html lang="zxx"> 
<head>
	@yield('seo')
	<!-- Favicon -->
	<link href="/storage/uploads/logos/HBTybq6qFtlsejSy6h19e1OWdBoSYhjTd6r1pbFo.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('frontend/css/all.css') }}"/>

	<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}"/>
	<!-- font-owesome icons link -->
    <link href="{{ asset('frontend/fontawesome/css/all.css') }}" rel="stylesheet">

	<livewire:styles />
	@yield('css')

	<!-- Global site tag (gtag.js) - Google Analytics -->
	@if($shareSettings->google_analytics != null)
	<script async src="https://www.googletagmanager.com/gtag/js?id={{ $shareSettings->google_analytics }}"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '{{ $shareSettings->google_analytics }}');
	</script>
	@endif

</head>
<body>
	
	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<ul class="user-menu">
				<div class="up-item">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="/" class="site-logo">
							<img src="/storage/uploads/logos/uuQRmAo01K8khVTauA7U2hHSHxghA0M9bcU24Ktz.png" alt=""></img>
						</a>
					</div>
					<!-- search area -->
					<livewire:search-dropdown>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<div class="shopping-card">
									<a href="{{ route('cart.index') }}"><i class="flaticon-bag"></i></a>
									<span>{{ Cart::instance('default')->count() }}</span>
								</div>
								<a href="{{ route('cart.index') }}">حقيبتي</a>
							</div>
							@auth
							<li><i class="flaticon-profile mr-2"></i><a style="color:black;" href="#">{{ auth()->user()->name }}</a>
								<ul class="sub-menu">
									<li><a href="{{ route('my-profile.edit') }}">الاعدادات</a></li>
									<li><a href="{{ route('my-orders.index') }}">طلباتي</a></li>
									@if(auth()->user()->isAdmin())
									<li><a href="{{ route('home') }}" target="_blank">لوحة التحكم</a></li>
									@endif
									<li>
										<a href="{{ route('logout') }}"
										   onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
											{{ __('تسجيل الخروج') }}
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									</li>
								</ul>
							</li>
							@else
							<div class="up-item">
									<div class="shopping-card">
									<a href="{{ route('register') }}"><i class="flaticon-profile mr-2"></i></a>
								</div>
								<a href="{{ route('register') }}">انشاء حساب</a>
							</div>
							@endauth
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<livewire:nav-bar>
	</header>
	<!-- Header section end -->

	@yield('content')


	<!-- Footer section -->
	<livewire:footer-detail>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<livewire:scripts />
	<script src="{{ asset('frontend/js/all.js') }}"></script>

	<script src="{{ asset('js/toastr.js') }}"></script>
	<script>
	    @if(Session::has('success'))
	    toastr.success("{{ Session::get('success')}}")
	    @endif
	</script>

	<script>
	    @if(Session::has('error'))
	    toastr.error("{{ Session::get('error')}}")
	    @endif
	</script>

	@yield('scripts')

	</body>
</html>
