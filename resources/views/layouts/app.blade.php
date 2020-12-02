<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Boolbnb - Team 2</title>
    <link rel="icon" href="{{ asset('images/logo_small.png') }}">

    <!-- Scripts -->
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

    <div id="app">
        <header>
            @yield('header')
        </header>

        <main>
			@yield('content')
        </main>

        <footer>
            @include('layouts.partials.footer')
        </footer>
    </div>

    @include('layouts.partials.handlebars')
    @if(Route::currentRouteName() == 'apartments.create' || Route::currentRouteName() == 'apartments.edit')
        <script src="{{asset('ckeditor\ckeditor.js')}}"></script>
        <script>
            CKEDITOR.replace( 'description',{
                allowedContent: 'p b i; a[!href]',
            });
        </script>
    @endif

</body>
</html>
