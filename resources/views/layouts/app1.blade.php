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
		<meta property="og:image" content="{{ asset('images/BTC-og-image.jpg') }}" />
		<link rel="shortcut icon" href="{{ asset('images/logoIcon.png') }}">
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
		<link rel="stylesheet" href="{{ asset('css/dd.css') }}">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<script>
		    window.show_transactions_on_main = 1 * '{{ config('settings.main.show_transactions', 10) }}';
		    window.show_blocks_on_main = 1 * '{{ config('settings.main.show_blocks', 10) }}';
		    window.network = '{{ Helper::network() }}';
		    window.locale_path = '{{ LaravelLocalization::getCurrentLocale() == config('settings.language') ? '/' : '/' . LaravelLocalization::getCurrentLocale() . '/' }}'
		</script>

		<link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
	</head>
	<body>

		@include('layouts.header1')

		<span class="base_url" data-attr="{{ asset('') }}"></span>

		@yield('content')

		<footer>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="footLogo">
							<a href=""><img src="{{ asset('images/logo.png') }}"></a>
						</div>
						<div class="footReview">
							<a href="https://www.reviews.io/company-reviews/store/xcoins-com1" target="_blank">
							<div class="footReviewLeft">
							<h3><span><i class="fas fa-star"></i></span> Reviews</h3>
							<p>The Customers' Voice</p>
							</div>
							<div class="footReviewRight">
								<p>Read our reviews</p>
								<ul class="footStar">
									<li><span><i class="fas fa-star"></i></li>
									<li><span><i class="fas fa-star"></i></li>
									<li><span><i class="fas fa-star"></i></li>
									<li><span><i class="fas fa-star"></i></li>
									<li><span><i class="fas fa-star-half-alt"></i></li>
								</ul>
							</div>
							</a>
						</div>
						<div class="footReviewPara">
							<p>14 East, Level 8 Sliema Road, GZR1639, Malta.</p>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-6">
								<div class="footCompany">
									<h3>Company</h3>
									<ul>
										<li><a href="https://xcoins.com/en/about-us" target="_blank">About Us</a></li>
										<li><a href="#">Contact</a></li>
										<li><a href="#">Help Center</a></li>
										<li><a href="https://www.xcoins.com/en/support" target="_blank">Support</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6">
								<div class="footCompany">
									<h3>Social</h3>
									<ul>
										<li><a href="https://xcoins.com/en/blog" target="_blank"><span><i class="fas fa-clipboard-list"></i></span> Blog</a></li>
										<li><a href="https://www.facebook.com/xcoinscom/" target="_blank"><span><i class="fab fa-facebook-f"></i></span> Facebook</a></li>
										<li><a href="https://twitter.com/realxcoins" target="_blank"><span><i class="fab fa-twitter"></i></span> Twitter</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row footMargn">
					<div class="col-lg-7 col-md-8 col-sm-12">
						<div class="footerMenu">
							<ul>
								<li><a href="https://xcoins.com/" target="_blank">&copy Xcoins.com</a></li>
								<li><a href="https://xcoins.com/en/privacypolicy" target="_blank">Terms of Service</a></li>
								<li><a href="https://xcoins.com/en/terms-of-service" target="_blank">Privacy Policy</a></li>
								<li><a href="#">Sitemap</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-5 col-md-4 col-sm-12">
						<div class="footlang">
							<span>Language:</span>
							<div class="form-group">

							    {{ Widget::language() }}
							    
							</div>
						</div>			
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="footerPara">
							<p>Xcoins Explorer is property of CF Technologies Ltd - Company #204616970 14 East, Level 8, Sliema Road, GZR1639, Malta. All trademarks and copyrights belong to their respective owners. All rights reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
		<script src="{{ asset('js/popper.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		
		<!-- <script src="{{ asset('/js/app.js') }}"></script> -->
		<script src="{{ asset('/js/pusher.min.js') }}"></script>

		<script>
		    /*$(document).on('change', '#c_currency', function(){
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
		    });*/

		    $(document).on('click', '.enabled', function(){
		        var coinCurrency = $(this).attr('value');
		        $.ajax({
		            url: "{{url('crypto-currency')}}/"+coinCurrency,
		            type: 'get',
		            success: function(response){
		                if (response) {
		                    window.location = "{{url('/')}}";
		                }
		            }
		        });
		    });
		</script>

		@stack('js')

		<!-- Hash script start -->
		<script>
		function copyToClipboard(element) {
	    	var $temp = $("<input>");
		  	$("body").append($temp);
		  	$temp.val($(element).text()).select();
		  	document.execCommand("copy");
		  	$temp.remove();
		  	var tooltip = document.getElementById("myTooltip");
		  	tooltip.innerHTML = "Copied";
		}

		function outFunc(address = null) {
		  	var tooltip = document.getElementById("myTooltip");
		  	if(address === 'address'){
		  		tooltip.innerHTML = "Copy Address";
		  	} else{
		  		tooltip.innerHTML = "Copy Hash";
		  	}
		}
		</script>
		<!-- Hash script end -->

		<!-- Input script start -->
		<script>
			function copyToClipboardAddress(element, id) {
		    	var $temp = $("<input>");
			  	$("body").append($temp);
			  	$temp.val($(element).text()).select();
			  	document.execCommand("copy");
			  	$temp.remove();
			  	var tooltip = document.getElementById("myTooltip_" + id);
			  	tooltip.innerHTML = "Copied";
			}

			function outFunction(id, block = null) {
			  	var tooltip = document.getElementById("myTooltip_" + id);
			  	if(block === 'block' || block === 'address'){
			  		tooltip.innerHTML = "Copy Hash";
			  	} else{
			  		tooltip.innerHTML = "Copy Address";
			  	}
			}
		</script>
		<!-- Input script end -->

		<!-- Output script start -->
		<script>
			function copyToClipboardAddressOutput(element, id) {
		    	var $temp = $("<input>");
			  	$("body").append($temp);
			  	$temp.val($(element).text()).select();
			  	document.execCommand("copy");
			  	$temp.remove();
			  	var tooltip = document.getElementById("myTooltips_" + id);
			  	tooltip.innerHTML = "Copied";
			}

			function outFunctionOutput(id) {
			  	var tooltip = document.getElementById("myTooltips_" + id);
			  	tooltip.innerHTML = "Copy Address";
			}
		</script>
		<!-- Output script end -->
		
	</body>
</html>