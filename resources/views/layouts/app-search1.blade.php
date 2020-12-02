<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

        <div id="app">
        
        <div class="header_all">
            <div class="cont-max-wdt">
                <div id="navbar">
                    <a href="index.html"><img src="img/boolbnb_logo_red.png" alt="logo_boolbnb"></a>
                    <!-- *******DA INSERIRE?********** -->
                    <div class="srcall">
                        <div class="search-section ssall">
                            <input type="text" name="" value="" placeholder="Inizia la ricerca">
                        </div>
                        <button type="button" name="button"><i class="fas fa-search"></i></button>
                        <div class="add_filter">
                            <div class="filtercol">
                                <h4>Aggiungi filtro</h4>
                                <div class="filter">
    				                <span class="btnAddRem" id="remove_beds">-</i></span>
                    				<span class="numFilter" id="val_beds" class="badge">2</span>
                    				<span class="btnAddRem" id="add_beds">+</i></span>
                    				<p>Letti</p>
    			                </div>
                                <div class="filter">
    				                <span class="btnAddRem" id="remove_rooms">-</i></span>
                    				<span class="numFilter" id="val_rooms" class="badge">1</span>
                    				<span class="btnAddRem" id="add_rooms">+</i></span>
                    				<p>Camere</p>
    			                </div>
                                <div class="filter">
    				                <span class="btnAddRem" id="remove_baths">-</i></span>
                    				<span class="numFilter" id="val_baths" class="badge">15</span>
                    				<span class="btnAddRem" id="add_baths">+</i></span>
                    				<p>Bagni</p>
    			                </div>
                                <h4>Aumenta distanza</h4>
                                <select name="radius" id="range">
                        			<option value="5">5 km</option>
                        			<option value="10">10 km</option>
                        			<option value="20" selected="">20 km</option>
                        			<option value="50">50 km</option>
                        			<option value="100">100 km</option>
                        		</select>
                            </div>
                            <div class="filtercol">
                    			<h4>Servizi disponibili</h4>
                                <div class="service">
                                    <label for="service_1">WiFi
                                        <input type="checkbox" id="service_1" value="1" class="service_n">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="service">
                                    <label for="service_2">Piscina
                            			<input type="checkbox" id="service_2" value="2" class="service_n">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="service">
                                    <label for="service_3">Parcheggio
                            			<input type="checkbox" id="service_3" value="3" class="service_n">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="service">
                                    <label for="service_4">Sauna
                            			<input type="checkbox" id="service_4" value="4" class="service_n">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="service">
                                    <label for="service_5">Vista mare
                            			<input type="checkbox" id="service_5" value="5" class="service_n">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="service">
                                    <label for="service_6">Portineria
                            			<input type="checkbox" id="service_6" value="6" class="service_n">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- *************FINE******* -->
                    <div id="user_menu" class="umall">
                        <i class="fas fa-bars"></i>
                        <img src="img/user.png" alt="user_image">
                        <div class="menu_tend">
                            <a href="#" class="navlink">Accedi</a>
                            <a href="#" class="navlink">Registrati</a>
                            <a href="#" class="navlink">I miei appartamenti</a>
                            <a href="#" class="navlink">Aggiungi appartamento</a>
                            <a href="#" class="navlink">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class="py-4">
		  <div class="">
			@yield('content')
		  </div>
        </main>
    </div>

    @include('layouts.partials.handlebars')

    {{-- <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script> --}}

</body>
</html>
