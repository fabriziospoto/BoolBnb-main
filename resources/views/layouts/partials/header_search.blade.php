<div class="header_all">
    <div class="cont-max-wdt">
        <div id="navbar" class="nav-fle-col">
            <a href="{{ url('/') }}">
                <img class="img-fle-col im-big-t2" src="{{ asset('images/boolbnb_logo_red.png') }}" alt="logo_boolbnb" data-scroll-reveal="enter left and move 500px over 1s">
                <img class="im-sm-t2" src="{{ asset('images/boolbnb_logo_red_min.png') }}" alt="logo_boolbnb" data-scroll-reveal="enter left and move 500px over 1s">
            </a>
            <div class="srcall">
                <div class="search-section ssall">
                    <input type="text" id ="search" name="query" value="{{$query ?? ''}}" placeholder="Inizia la ricerca" autocomplete="off">
                    <div class="add_filter my-display-none">
                        <div class="filtercol beds_input">
                            <h4>Aggiungi filtro</h4>
                            <div class="filter">
                                <span class="btnAddRem" id="remove_beds">-</i></span>
                                <span class="numFilter" id="val_beds" class="badge">1</span>
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
                                <span class="numFilter" id="val_baths" class="badge">1</span>
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
                        <div class="filtercol service_check">
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
                <button type="button" id="searchBtn" name="button"><i class="fas fa-search"></i></button>
            </div>
            <div id="user_menu" class="umall">
                <i class="fas fa-bars"></i>
                <img src="{{ asset('images/user.png') }}" alt="user_image">
                <div class="menu_tend">
                @guest
                    <a href="{{ route('login') }}" class="navlink">{{ __('Accedi') }}</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="navlink">{{ __('Registrati') }}</a>
                    @endif
                @else
                    <a class="navlink username" href="{{ route('user.show', Auth::user()->id) }}">
                        {{ __('Account') }} 
                    </a>
                    <a href="{{ route('apartments.index') }}" class="navlink">
                        {{ __('I miei appartamenti') }}
                    </a>
                    <a href="{{ route('apartments.create') }}" class="navlink">
                        {{ __('Aggiungi appartamento') }}
                    </a>
                    <a href="{{ route('logout') }}" class="navlink logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }} 
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </div>
</div>
