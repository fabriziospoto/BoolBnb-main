@extends('layouts.app')
@section('header')
@include("layouts.partials.header_all")
@endsection
@section('content')

	{{-- @dd(count($apartments)) --}}

{{-- tabella tutti gli appartamenti singolo User --}}
<div class="container-all">
	<div class="cont-max-wdt-search">

		{{-- status ricerca appartamenti --}}
		@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif

		<div class="cont-app-t2 search-data">
			<div class="info-apartment-src">
				<h2 style="padding-left: 15px; margin-bottom: 15px; font-weight: bold;"><strong>Gestisci i tuoi appartamenti</strong></h2>
				@if (count($apartments) == 0)
					<div>
						<span style="padding-left: 15px; margin-bottom: 15px; display: inline;">Non hai ancora alcun appartamento</span>
						<a style="color: #fff" href="{{ route('apartments.create') }}" class="btn-delete-t2"><i class="fas fa-home"></i>&nbsp;<i class="fas fa-plus"></i></a>
					</div>
				@endif
				@foreach ($apartments as $key => $apartment)
					<div class="card-in-search">
						<span class="card-search-left-side">
							<div class="card-src-im">
								<img src="{{ $apartment->images[0]->img }}">
								@if (count($apartment->apartment_promotion) > 0)
									<span class="sponsored-card-search-ima">sponsored</span>
								@endif
							</div>
						</span>



						<div class="card-search-right-side">
							{{-- <p class="apartment_categories-src">{{$apartment->category->name}}</p> --}}
							<h4 class="apartment_title-src">{{$apartment->title}}</h4>
							<p class="apartment_position-src">{{$apartment->address}}</p>
							<div class="apartment-comp-src">
								<span>
									<i class="fas fa-home"></i>
									<span>{{$apartment->size}}m²</span>
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
							<div class="apartment-comp-src">
								@foreach($apartment->services as $service)
									<span class="extra-active">
										<i class='fas fa-{{$service->icon}}'></i>
									</span>
								@endforeach
							</div>
							<div class="action-t2">
								<div class=" btn-edit-t2">
									@if (count($apartment->images) != 5)
										<span>ATTENZIONE*</span>
									@else
										@if ($apartment->visible)
											<a href="{{route('apartments.toggle',$apartment->id)}}" class="visibility">Nascondi <i class="fas fa-eye-slash"></i></a>
										@else
											<a href="{{route('apartments.toggle',$apartment->id)}}" class="details-edit-t2">Rendi visibile <i class="fas fa-eye"></i></a>
										@endif
									@endif
								</div>
								<div class=" btn-delete-t2" style="margin-left:10px; margin-right:10px;">
									<a href="{{route('apartments.show',$apartment->id)}}" class="details-edit-t2 ">Dettagli</a>
								</div>
							</div>
							@if (count($apartment->images) != 5)
								<span class="invalid-feedback is-invalid" style="display: block;">
	                                <strong>*Il numero di immagini deve essere 5</strong>
	                            </span>
							@endif
						</div>
						<div class="position" hidden>
							<p class='lat'>{{$apartment->latitude}}</p>
							<p class='long'>{{$apartment->longitude}}</p>
						</div>
					</div>
					<table style="display:none;">
						<tbody >
							<tr class="latlong">
								<td data-lat-{{$key}}="{{$apartment->latitude}}">{{$apartment->latitude}}</td>
								<td data-long-{{$key}}="{{$apartment->longitude}}">{{$apartment->longitude}}</td>
							</tr>
						</tbody>
					</table>
				@endforeach
			</div>
			{{-- mappa --}}
			<div class="map-box-src">
				@if (count($apartments) > 0)
					<div id="map" style="width: 100%; height: 100%;"></div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
