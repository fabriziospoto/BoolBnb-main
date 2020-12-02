@extends('layouts.app')
@section('header')
    @include("layouts.partials.header_home")
@endsection
@section('content')
<main>
    <div class="container-home">
        <div class="cont-max-wdt">
            <section id="in-evidenza">
                <h3 data-scroll-reveal="enter from the top over 1.5s">Gli appartamenti in evidenza</h3>
                <div id="card-area">
                    @if(count($apartments_promo) > 0)
                        @foreach ($apartments_promo as $apartment)
                        <a href="{{route('guest.show',$apartment->id)}}" data-scroll-reveal="enter bottom but wait .2s">
                            <div class="card-t2">
                                <img src="{{ $apartment->images->random()->img }}" alt="{{ $apartment->title }}">
                                <div class="shadow-t2"></div>
                                <div class="p-t2">{{ $apartment->category->name }}</div>
                                <span class="sponsored">sponsored</span>
                            </div>
                        </a>
                        @endforeach
                    @endif
                    @if(count($apartments_no_promo) > 0)
                        @foreach ($apartments_no_promo as $apartment)
                        <a href="{{route('guest.show',$apartment->id)}}" data-scroll-reveal="enter bottom but wait .2s">
                            <div class="card-t2">
                                <img src="{{ $apartment->images->random()->img }}" alt="{{ $apartment->title }}">
                                <div class="shadow-t2"></div>
                                <div class="p-t2">{{ $apartment->category->name }}</div>
                            </div>
                        </a>
                        @endforeach
                    @endif
                </div>
            </section>
        </div>
    </div>
<div class="container-dev">
    <div class="cont-max-wdt">
        <section class="experience">
            <h3 data-scroll-reveal="enter from the top over 1.5s">Vivi nuove esperienze</h3>
            <p class="dev-sub" data-scroll-reveal="enter from the top over 1.5s">Riscopri il piacere di viaggiare con Boolbnb</p>
            <div class="dev-area">
                <div class="dev-lft" data-scroll-reveal="enter bottom but wait .2s">
                    @guest
                        <a href="{{ route('register') }}">
                            <div class="main-card-dev">
                                <div class="card-dev-img">
                                    <img src="https://images.pexels.com/photos/935756/pexels-photo-935756.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="img_home">
                                </div>
                                <div class="card-dev-text">
                                    <p>Diventa un Host</p>
                                </div>
                            </div>
                        </a>
                    @else
                        <a href="{{ route('apartments.index') }}">
                            <div class="main-card-dev">
                                <div class="card-dev-img">
                                    <img src="https://images.pexels.com/photos/280221/pexels-photo-280221.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="img_home">
                                </div>
                                <div class="card-dev-text">
                                    <p>I miei appartamenti</p>
                                </div>
                            </div>
                        </a>
                    @endguest
                </div>
                <div class="dev-rgt">
                    <div class="rgt-lef">
                        <a href="#" data-scroll-reveal="enter bottom but wait .2s">
                            <div class="card-dev">
                                <div class="card-dev-img">
                                    <img src="https://images.pexels.com/photos/2064827/pexels-photo-2064827.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="img_home">
                                    <form class="roma" action="{{ route('guest.search') }}" method="post" enctype="multipart/form-data" hidden>
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="query" value="Roma">
                                    </form>
                                </div>
                                <div class="card-dev-text">
                                    <p>Scopri Roma</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" data-scroll-reveal="enter bottom but wait .2s">
                            <div class="card-dev">
                                <div class="card-dev-img">
                                    <img src="https://images.pexels.com/photos/1100058/pexels-photo-1100058.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="img_home">
                                    <form class="firenze" action="{{ route('guest.search') }}" method="post" enctype="multipart/form-data" hidden>
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="query" value="Firenze">
                                    </form>
                                </div>
                                <div class="card-dev-text">
                                    <p>Scopri Firenze</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="rgt-rgt">
                        <a href="#" data-scroll-reveal="enter bottom but wait .2s">
                            <div class="card-dev">
                                <div class="card-dev-img">
                                    <img src="https://images.pexels.com/photos/1488017/pexels-photo-1488017.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="img_home">
                                    <form class="venezia" action="{{ route('guest.search') }}" method="post" enctype="multipart/form-data" hidden>
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="query" value="Venezia">
                                    </form>
                                </div>
                                <div class="card-dev-text">
                                    <p>Scopri Venezia</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" data-scroll-reveal="enter bottom but wait .2s">
                            <div class="card-dev">
                                <div class="card-dev-img">
                                    <img src="https://images.pexels.com/photos/783156/pexels-photo-783156.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="img_home">
                                    <form class="bologna" action="{{ route('guest.search') }}" method="post" enctype="multipart/form-data" hidden>
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="query" value="Bologna">
                                    </form>
                                </div>
                                <div class="card-dev-text">
                                    <p>Scopri Bologna</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</main>
@endsection