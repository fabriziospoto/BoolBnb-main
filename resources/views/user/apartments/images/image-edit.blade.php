@extends('layouts.app')
@section('header')
@include("layouts.partials.header_all")
@endsection
@section('content')
<div class="container-all ">
	<div class="cont-max-wdt ">
		@if (Auth::user()->id == $apartment->user->id)
			@include('layouts.partials.fileinput')
			<a href="{{route('apartments.show', $apartment->id)}}" class="btn-edit-t2">Il mio appartamento</a>
			<div class="image-edit-box">
				@foreach ($apartment->images as $image)
					<div class="card-t2 number-card">
						<img class="" src="{{ $image->img }}">
						<form action="{{ route('image.delete', $image) }}" method="post">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn-delete-t2 card-btn-delete" name="button"><i
									class="fas fa-trash"></i></button>
						</form>
					</div>
				@endforeach
			</div>
		@else

			<div class="alert alert-danger">
				<p>Non hai i permessi per accedere alla pagina</p>

			</div>
		@endif
	</div>
</div>
@endsection
