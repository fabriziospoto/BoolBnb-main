@extends('layouts.app')
@section('header')
    @include("layouts.partials.header_search")
@endsection
@section('content')

<div class="container-all">
	<div class="cont-max-wdt-search">
		<section class="search-data">
			<div class="info-apartment-src" id="apartment-view">
				{{-- h2 inserito dinamicamente javascript --}}
				<br>
				{{-- handlebars template --}}
			</div>
			<div class="map-box-src" id="map">
				{{-- mappa --}}
			</div>
		</section>
	</div>
</div>


@endsection
