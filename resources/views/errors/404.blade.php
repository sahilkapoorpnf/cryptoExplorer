@extends('layouts.app1')

@section('content')
<section class="exitOuter">
	<div class="exitBg">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-9">
					<div class="exitBox">
						<h3>404 </h3>
						<h1>Sorry we can't find that page</h1>
						<div class="exploreTwoRight">
							<label>Continue searching or <a href="{{ asset(Helper::locale()) }}">Go to homepage</a></label>
							<div class="exploreTwoSearch">
								<form action="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), '/search') }}">
	                                <input type="hidden" name="currency" value="{{ Helper::network() }}">
	                                <input class="form-control rounded-0" type="search" name="q" placeholder="{{ __('messages.search_placeholder') }}">
                                	<button class="btn btn-light my-2 my-sm-0 rounded-0" type="submit"><i class="fas fa-search"></i></button>
                            	</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection