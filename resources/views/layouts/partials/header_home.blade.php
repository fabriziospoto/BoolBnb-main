<div class="header_home">
    <div class="cont-max-wdt">
        <div id="navbar">
            <a href="{{ url('/') }}">
                <img class="im-big-t2" src="{{ asset('images/boolbnb_logo.png') }}" alt="logo_boolbnb">
                <img class="im-sm-t2" src="{{ asset('images/boolbnb_logo_min.png') }}" alt="logo_boolbnb">
            </a>
            <div id="user_menu">
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
        <div class="searchbar srchome">
            <form class="search-section" action="{{ route('guest.search') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <h6>Dove</h6>
                <input type="text" id="input-search-jumbo" name="query" aria-label="Cerca" placeholder="Dove vuoi andare?" autocomplete="off" >
                <button type="submit" id="btn-search-jumbo" class="btn-search-jumbo" name="button" disabled><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div id="explore-section" data-scroll-reveal="enter left and move 500px over 1.5s">
            <h2>Vicino è bello</h2>
            <form  action="{{ route('guest.search') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="query" id="geoip">
                <button type="submit" name="button">Esplora i soggiorni nei dintorni</button>
            </form>
        </div>
    </div>
</div>
