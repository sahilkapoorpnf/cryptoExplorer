
<!DOCTYPE html>
<html>
    <head>
        <title>Xcoins- Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap CSS Link -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <!-- Font Awesome 4.7 CDN Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <!-- Own CSS Link -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div id="wrapper">

            @include('layouts.sidebar')

            @include('layouts.header')

            @yield('content')

        </div>    
        <!-- jQuery CDN Link -->
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <!-- Bootstrap JavaScript Link -->
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript">
            const $button  = document.querySelector('#sidebar-toggle');
            const $wrapper = document.querySelector('#wrapper');
            $button.addEventListener('click', (e) => {
                e.preventDefault();
                $wrapper.classList.toggle('toggled');
            });
        </script>

        @stack('js')

    </body>
</html>