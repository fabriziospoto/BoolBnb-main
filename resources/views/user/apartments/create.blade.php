@extends('layouts.app')
@section('header')
    @include("layouts.partials.header_all")
@endsection
@section('content')

    <div class="container-all ">
        <div class="cont-max-wdt ">
            <div class="form-box-t2 ">
                <form action="{{ route('apartments.store') }}" method='post' enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    @include('layouts.partials.form')
                    <div class="form-bb-t2">
                        @foreach ($services as $service)
                            <div class="service form-dd-t2">
                                <label for="service-{{$service->name}}"><i class="fas fa-{{$service->icon}}"></i> &nbsp {{$service->name}}
                                    <input class="service_n" type="checkbox" name="services[]" id="service-{{$service->name}}" value="{{$service->id}}" {{ (is_array(old('services')) && in_array($service->id, old('services'))) ? ' checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
									 </div>
								@endforeach
                        <br>                     
						  </div>
						  @error ('services') <p class="alert alert-danger form-select-t2">{{ $message }}</p> @enderror 
                    <button type="submit" class="btn-delete-t2">Inserisci immagini <i class="fas fa-arrow-circle-right"></i></button>
					 </form>
				</div>
        </div>
    </div>

@endsection
