@extends('layouts.app')
@section('header')
    @include("layouts.partials.header_all")
@endsection
@section('content')
 
	<div class="container-all ">
		<div class="cont-max-wdt ">
			
			@if (Auth::user()->id == $user->id)
				<div class="form-box-t2 ">

				<div style="font-size: 25px;">{{ __('I tuoi dati') }}</div>

				<form action="{{ route('user.update', $user->id) }}" method='post' enctype="multipart/form-data">
				@csrf
				@method('PATCH')

					@include('layouts.partials.form_user')

				</form>
				</div>
		
			@else
				<div class="alert alert-danger">
					<p>Non hai i permessi per accedere alla pagina</p>
				</div>
		
			@endif

		</div>
	</div>

@endsection
