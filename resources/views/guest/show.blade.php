@extends('layouts.app')
@section('header')
    @include("layouts.partials.header_all")
@endsection
@section('content')


{{-- dettagli appartamento visibili al guest--}}

<div class="container-all">
    <div class="cont-max-wdt">
		 @if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
        <h4 class="apartment_title">{{$apartment->title}}</h4>
        <p class="apartment_position">{{$apartment->address}}</p>
        <p class="separator">|</p>
        <p class="apartment_categories">{{$apartment->category->name}}</p></span>
        <div class="photo_box">

            @include("layouts.partials.apartment_image_show")

        </div>
        <section class="apartment-data">
				<input type="hidden" id="latitude" value="{{$apartment->latitude}}">
				<input type="hidden" id="longitude" value="{{$apartment->longitude}}">
            <div class="info-apartment">
                <h2>Ulteriori dettagli</h2>
                <br>
                <div class="apartment-comp">
                    <span>
                        <i class="fas fa-ruler"></i>
                        <span>{{$apartment->size}} m²</span>
                    </span>
                    <span>
                        <i class="fas fa-door-open"></i>
                        <span>{{$apartment->room_number}}</span>
                    </span>
                    <span>
                        <i class="fas fa-bed"></i>
                        <span>{{$apartment->bed_number}}</span>
                    </span>
                    <span>
                        <i class="fas fa-toilet-paper"></i>
                        <span>{{$apartment->bath_number}}</span>
                    </span>
                </div>
                <p>{!! $apartment->description !!}</p>
                <br>
                <h2>Servizi Extra</h2>
                <div class="apartment-comp">

                    @foreach($apartment->services as $service)
                        <span class="extra-active">
                            <i class='fas fa-{{$service->icon}}'></i>
                        </span>
						  @endforeach

                </div>
            </div>
            <div class="contact-apartment">

					 @guest

					 	@include('layouts.partials.message_box')

					 @else
					   {{-- Utente proprietario dell'appartamento non visualizza box messaggi --}}
						@if (Auth::user()->id != $apartment->user->id)

							@include('layouts.partials.message_box')

						@endif
					 @endguest

					 {{-- Input duplicato nel caso in cui il guest corrisponda allo user  --}}
					<input type="hidden" id="apartment_id" name='apartment_id' value="{{ $apartment->id }}">

					<div class="map-box" id="map"></div>

				</div>


        </section>
    </div>
    <div class="position" hidden>
        <p class='lat'>{{$apartment->latitude}}</p>
        <p class='long'>{{$apartment->longitude}}</p>
    </div>
</div>

@endsection
