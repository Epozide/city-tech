<section class="footer-section">
	<div class="container">
		<div class="footer-logo text-center">
			<a href="/"><img src="" alt=""></a>
		</div>
		<div class="row">
			<div class="col-lg-3 col-sm-6">
				<div class="footer-widget about-widget">
					<h2>معلومات عننا</h2>
					<p>{{ $systemDetail->description }}</p>
					<!--<img src="{{ asset('frontend/img/cards.png') }}" alt="">-->
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="footer-widget about-widget">
					<h2>روابط مفيدة</h2>
					<ul>
						<li><a href="{{ route('about-us') }}">عننا</a></li>
						<!--<li><a href="">Track Orders</a></li>-->
						<!--<li><a href="">Shipping</a></li>-->
						<li><a href="{{ route('contact-us') }}">تواصل معنا</a></li>
						<li><a href="{{ route('my-orders.index') }}">طلباتي</a></li>
					</ul>
					<ul>
						<li><a href="{{ route('contact-us') }}">الدعم</a></li>
						<li><a href="{{ route('terms.conditions') }}">قواعد و شروط الاستخدام</a></li>
						<li><a href="{{ route('privacy.policy') }}">قواعد الشراء</a></li>
						<!--<li><a href="">Blog</a></li>-->
					</ul>
				</div>
			</div>

			<div class="col-lg-3 col-sm-6">
				<div class="footer-widget contact-widget">
					<h2>تواصل معنا</h2>
					<div class="con-info">
						<!--<span>N.</span>-->
						<p>{{ $systemDetail->name }} </p>
					</div>
					<div class="con-info">
						<!--<span>A.</span>-->
						<p>{{ $systemDetail->address }} </p>
					</div>
					<div class="con-info">
						<!--<span>T.</span>-->
						<p>{{ $systemDetail->tel }}</p>
					</div>
					<div class="con-info">
						<!--<span>E.</span>-->
						<p>{{ $systemDetail->email }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="social-links-warp">
		<div class="container">
			 class="container">
			@if($socialLinks != null)
			<div class="social-links">
				@if($socialLinks->instagram != null)
					<a href="{{$socialLinks->instagram}}" target="_blank" class="instagram"><i class="fab fa-instagram"></i><span>instagram</span></a>
				@endif
				@if($socialLinks->pinterest != null)
					<a href="{{$socialLinks->pinterest}}" target="_blank" class="pinterest"><i class="fab fa-pinterest"></i><span>pinterest</span></a>
				@endif
				@if($socialLinks->facebook != null)
					<a href="{{$socialLinks->facebook}}" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i><span>facebook</span></a>
				@endif
				@if($socialLinks->twitter != null)
					<a href="{{$socialLinks->twitter}}" target="_blank" class="twitter"><i class="fab fa-twitter"></i><span>twitter</span></a>
				@endif
				@if($socialLinks->youtube != null)
					<a href="{{$socialLinks->youtube}}" target="_blank" class="youtube"><i class="fab fa-youtube"></i><span>youtube</span></a>
				@endif
				@if($socialLinks->linkedin != null)
					<a href="{{$socialLinks->linkedin}}" target="_blank" class="linkedin"><i class="fab fa-linkedin"></i><span>linkedin</span></a>
				@endif
				@if($socialLinks->tiktok != null)
					<a href="{{$socialLinks->tiktok}}" target="_blank" class="tiktok"><i class="fab fa-tiktok"></i><span>tiktok</span></a>
				@endif
			</div>
			@endif
			<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved to City Tech.</p>
			<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="page_inbox"
        page_id="100721541916414">
      </div>

		</div>
	</div>
</section>
