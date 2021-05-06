<!-- header black section start -->
<div class="blackBar">
	<div class="container">
		<div class="blackInner">
			<div class="blackLogo">
			<a href="{{ asset('/') }}"><img src="{{ asset('images/xlogo.png') }}" align=""></a>
			</div>
			<div class="blackNav">
				<div class="blackSelect">

					{{ Widget::language() }}

					@if (Auth::check())
					    <a class="btn btn-primary" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), route('admin.index')) }}"><i class="fas fa-cog"></i> </a>
					@endif

				</div>
				<span class="logBtn"><a type="button">Login</a></span>
				<span class="signBtn"><a type="button">Sign Up</a></span>
			</div>
		</div>
	</div>
</div>
<!-- header black section exit -->