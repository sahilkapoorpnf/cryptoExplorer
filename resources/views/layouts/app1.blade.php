<!DOCTYPE html>
<html>
	<head>
		<title>Xcoins Explore</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="{{ __('messages.meta_description') }}" />
		<meta name="keywords" content="{{ __('messages.meta_keywords') }}" />
		<link rel="shortcut icon" href="{{ asset('images/logoIcon.png') }}">

		<!--Open Graph tags-->
		<!-- <meta property="og:url" content="{{ url()->full() }}" /> -->
		<!-- <meta property="og:type" content="article" /> -->
		<!-- <meta property="og:title" content="{{ __('messages.app_name_full', ['network' => Helper::network()]) }}" /> -->
		<!-- <meta property="og:description" content="{{ __('messages.meta_description') }}" /> -->
		<meta property="og:image" content="{{ asset('images/BTC-og-image.jpg') }}" />
		<!--END Open Graph tags-->

		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<script>
		    window.show_transactions_on_main = 1 * '{{ config('settings.main.show_transactions', 10) }}';
		    window.network = '{{ Helper::network() }}';
		    window.locale_path = '{{ LaravelLocalization::getCurrentLocale() == config('settings.language') ? '/' : '/' . LaravelLocalization::getCurrentLocale() . '/' }}'
		</script>
	</head>
	<body>

		@include('layouts.header1')

		@yield('content')

		<!-- footer section start -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="footLogo">
							<a href="#"><img src="{{ asset('images/logo.png') }}"></a>
						</div>
						<div class="footReview">
							<a href="#"><img src="{{ asset('images/review.png') }}"></a>
						</div>
						<div class="footReviewPara">
							<p>14 East, Level 8 Slimea Road, GZR1639, Malta</p>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="footCompany">
									<h3>Company</h3>
									<ul>
										<li><a href="#">About Us</a></li>
										<li><a href="#">Careers</a></li>
										<li><a href="#">Press Kit</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="footCompany">
									<h3>Support</h3>
									<ul>
										<li><a href="#">Help Center</a></li>
										<li><a href="#">Contact</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="footCompany">
									<h3>Social</h3>
									<ul>
										<li><a href="#">Blog</a></li>
										<li><a href="#">Twitter</a></li>
										<li><a href="#">Facebook</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row footMargn">
					<div class="col-lg-7 col-md-7 col-sm-12">
						<div class="footerMenu">
							<ul>
								<li><a href="#">&copy Xcoins.com</a></li>
								<li><a href="#">Terms of Service</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Legal Notice</a></li>
								<li><a href="#">Sitemap</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-12">
						<div class="footlang">
							<span>Language:</span>
							<div class="form-group">
							    <select class="form-control" id="exampleFormControlSelect1">
							      <option selected>English</option>
							      <option>English 1</option>
							      <option>English 2</option>
							      <option>English 3</option>
							      <option>English 4</option>
							    </select>
							</div>
						</div>			
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="footerPara">
							<p>Xcoins is property of CF Technologies Ltd - Company lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum lorem ipsum  lorem ipsum  lorem ipsum  </p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- footer section exit -->
		<script src="{{ asset('/js/app.js') }}"></script>
		<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
		<script src="{{ asset('js/popper.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>

		<script type="text/javascript">
		    $(document).on('change', '#c_currency', function(){
		        var coinCurrency = $(this).val();
		        $.ajax({
		            url: "{{url('crypto-currency')}}/"+coinCurrency,
		            type: 'get',
		            success: function(response){
		                if (response) {
		                    window.location = "{{url('/')}}";
		                }
		            }
		        });
		    })
		</script>

		@stack('js')
		
	</body>
</html>