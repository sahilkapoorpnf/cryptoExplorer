<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @if(Route::currentRouteName()=='front.index')
        <title>{{ __('messages.app_name_full', ['network' => Helper::network()]) }}</title>
    @else
        <title>{{ __('messages.app_name_full', ['network' => Helper::network()]) }} | @yield('title')</title>
    @endif

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ __('messages.meta_description') }}" />
    <meta name="keywords" content="{{ __('messages.meta_keywords') }}" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/' . Helper::network() . '/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/' . Helper::network() . '/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/' . Helper::network() . '/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/' . Helper::network() . '/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/favicon/' . Helper::network() . '/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="shortcut icon" href="{{ asset('images/favicon/' . Helper::network() . '/'.Helper::network().'.png') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="{{ asset('images/favicon/' . Helper::network() . '/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- END Favicon -->
    <!--Open Graph tags-->
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ __('messages.app_name_full', ['network' => Helper::network()]) }}" />
    <meta property="og:description" content="{{ __('messages.meta_description') }}" />
    <meta property="og:image" content="{{ asset('images/BTC-og-image.jpg') }}" />
    <!--END Open Graph tags-->
    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <script>
        window.show_transactions_on_main = 1 * '{{ config('settings.main.show_transactions', 10) }}';
        window.network = '{{ Helper::network() }}';
        window.locale_path = '{{ LaravelLocalization::getCurrentLocale() == config('settings.language') ? '/' : '/' . LaravelLocalization::getCurrentLocale() . '/' }}'
    </script>
    @adv
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    @endadv
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
</head>
<body class="color-{{ config('settings.color_scheme') }}">
    <div id="app">
        <nav id="navbar-header" class="navbar navbar-header navbar-expand-md bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), '/') }}">
                    @if(config('settings.logo'))
                        <img src="{{ asset('storage/' . config('settings.logo')) }}" height="30" class="d-inline-block align-top" alt="">
                    @else
                        <img src="{{ asset('/images/' . Helper::network() . '.png') }}" height="30" class="d-inline-block align-top" alt="">

                    @endif
                    {{ __('messages.block_explorer') }}
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                    $BTCSelected = ''; 
                    $LTCSelected = ''; 
                    $DOGESelected = ''; 
                    $ETHSelected = ''; 
                    if(\Session::get('cryptoCurrency') === "LTC"){
                        $LTCSelected = 'selected';
                    } else if(\Session::get('cryptoCurrency') === "DOGE"){
                        $DOGESelected = 'selected';
                    } else if(\Session::get('cryptoCurrency') === "ETH"){
                        $ETHSelected = 'selected';
                    } else{
                        $BTCSelected = 'selected';
                    }
                    ?>
                    <select class="form-control" name="crypto_currency" id="c_currency">
                        <option value="BTC" <?php echo $BTCSelected; ?> >Bitcoin BTC</option>
                        <option value="LTC" <?php echo $LTCSelected; ?> >Litecoin LTC</option>
                        <option value="DOGE" <?php echo $DOGESelected; ?> >Dogecoin DOGE</option>
                        <option value="ETH" <?php echo $ETHSelected; ?> >Ethereum ETH</option>
                    </select>
                </div>    

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="form-inline ml-auto" action="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), '/search') }}">
                        <input type="hidden" name="currency" value="{{ Helper::network() }}">
                        <input class="form-control rounded-0" type="search" name="q" placeholder="{{ __('messages.search_placeholder') }}">
                        <button class="btn btn-light my-2 my-sm-0 rounded-0" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    {{ Widget::language() }}
                    @if (Auth::check())
                        <a class="btn btn-primary" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), route('admin.index')) }}"><i class="fas fa-cog"></i> </a>
                    @endif
                </div>
            </div>
        </nav>

        @adv('1')
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <!— Responsive 1 —>
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="{{ config('settings.adsense.client_id') }}"
                             data-ad-slot="{{ config('settings.adsense.block1_id') }}"
                             data-ad-format="auto"></ins>
                    </div>
                </div>
            </div>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        @endadv

        <main class="py-4">

            @if (session('success'))
                <div class="container">
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif

            <span class="base_url" data-attr="{{ asset('') }}"></span>

            @yield('content')
        </main>

        @adv('2')
            <div class="container mt-4 pb-4">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <!— Responsive 2 —>
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="{{ config('settings.adsense.client_id') }}"
                             data-ad-slot="{{ config('settings.adsense.block2_id') }}"
                             data-ad-format="auto"></ins>
                    </div>
                </div>
            </div>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        @endadv

        <nav class="navbar navbar-footer navbar-expand-md navbar-dark bg-dark footer">
            <div class="container">
                <a class="navbar-brand" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), '/') }}">
                    {{ __('messages.app_name') }}
                </a>
                <div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), '/page/about') }}">{{ __('messages.about') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>

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
