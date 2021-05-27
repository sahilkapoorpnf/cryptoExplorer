<div class="blackBar">
	<div class="container-fluid">
		<div class="blackInner">
			<div class="blackLogo">
				<a href="{{ asset(Helper::locale()) }}"><img src="{{ asset('images/xlogo.png') }}" align=""></a>
			</div>
			<input type="checkbox" id="navcheck">
		    <label for="navcheck" class="menu-btn">
		         <i class="fas fa-bars"></i>
		    </label>
			<div class="blackNav">
				<div class="blackNavInlin">
					<div class="blackSelect">

						{{ Widget::language() }}

						@if (Auth::check())
						    <a class="btn btn-primary" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), route('admin.index')) }}"><i class="fas fa-cog"></i> </a>
						@endif

					</div>
					<span class="signBtn"><a href="https://www.xcoins.com/" type="button" target="_blank">Buy Crypto</a></span>
				</div>
			</div>
		</div>
	</div>
</div>
