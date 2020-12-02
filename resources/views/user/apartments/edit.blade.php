@extends('layouts.app')
@section('header')
@include("layouts.partials.header_all")
@endsection
@section('content')

<div class="container-all">
	<div class="cont-max-wdt">
		<div class="form-box-t2">

			@if (Auth::user()->id == $apartment->user->id)

			<form action="{{ route('apartments.update', $apartment->id) }}" method='post' enctype="multipart/form-data"
				id="edit-apartment-form">
				@csrf
				@method('PATCH')
				@include('layouts.partials.form')
				<div class="form-bb-t2">
					@foreach ($services as $service)
					<div class="service form-dd-t2">
						<label for="service-{{$service->name}}"><i class="fas fa-{{$service->icon}}"></i> &nbsp
							{{$service->name}}
							<input type="checkbox" name="services[]" id="service-{{$service->name}}" value="{{$service->id}}"
								{{($apartment->services->contains($service->id) ? 'checked' : '')}}>
							<span class="checkmark"></span>
						</label>
					</div>
					@endforeach
				</div>
				@error ('services') <p class="alert alert-danger form-select-t2">{{ $message }}</p> @enderror
				<button type="submit" class="btn-delete-t2">Modifica</button>

			</form>
			@else
			<div class="alert alert-danger">
				<p>Non hai i permessi per accedere alla pagina</p>
			</div>
			@endif
		</div>
	</div>
</div>




@endsection
