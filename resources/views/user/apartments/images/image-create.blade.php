@extends('layouts.app')

@section('header')
@include("layouts.partials.header_all")
@endsection

@section('content')
<div class="container-all">
	<div class="cont-max-wdt">
		@if (Auth::user()->id == $apartment->user->id)

		@include('layouts.partials.fileinput')
		<a href="{{route('apartments.index')}}" class="btn-delete-t2 text-center pt-2 pb-2" id="btn-apartment_create">Crea Appartamento</a>

		@else
		<div class="alert alert-danger">
			<p>Non hai i permessi per accedere alla pagina</p>
		</div>
		@endif
	</div>
</div>

@endsection