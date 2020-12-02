@extends('layouts.app')
@section('header')
    @include("layouts.partials.header_all")
@endsection
@section('content')

{{-- Tabella info di un appartamento --}}



<div class="container-all">
    <div class="cont-max-wdt">
		 @if ($message = Session::get('success_message'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>{{ $message }}</strong>
			</div>
		@endif

		@if (Auth::user()->id == $apartment->user->id)

        <h4 class="apartment_title">{{$apartment->title}}</h4>
        <div class="cont-adr-sms">
            <div class="cont-adr">
                <span class="apartment_position">{{$apartment->address}}</span>
                <span class="separator">|</span>
                <span class="apartment_categories">{{$apartment->category->name}}</span>
            </div>
            <div class="cont-sms-1">
                    <a href="{{ route('message.show', $apartment->id) }}" class="btn-sms1-t2"> <i class="fas fa-envelope"></i> </a>
            </div>
        </div>
        <div class="photo_box">
            @include("layouts.partials.apartment_image_show")
            <a href="{{ route('image.edit', $apartment) }}" type="button" class="btn-t2"><i class="fas fa-th"></i> Gestisci Immagini</a>

        </div>
        <section class= "tools-t2">
            <div class="tools-delete" >
                {{-- Modifica info appartamento -> edit --}}
                <a href="{{ route('apartments.edit',$apartment->id) }}" class="  btn-edit-t2">MODIFICA</a>
                {{-- Cancellazione appartamento -> destroy --}}
                <form action="{{route('apartments.destroy',$apartment->id)}}" method="post" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class=' btn-delete-t2  ml-2'>CANCELLA</button>
                </form>
            </div>
        </section>

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
                    <div class="info-1">
                        <p>{!! $apartment->description !!}</p>
                    </div>
                    <br>
                <div class="">
                    <h2>Servizi Extra</h2>
                    <div class="apartment-comp">

                        {{-- ********* aggiungi nel controller apartmentcontroller@show
                        di passare tutti i servizi *********** --}}

                        @foreach($apartment->services as $service)
                            <span class="extra-active">
                                <i class='fas fa-{{$service->icon}}'></i>
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="contact-apartment">
                <div class="message-box  ">
                    <div class="promo-active-card">
                        {{-- <h4 class="text-center">Le Tue Promozioni</h4> --}}
                        <ul class="list-promo">
                            @foreach ($all_promos as $key => $promo)
                                @if ($key == 0)
                                    <li class=" active-promo-box form-sec">
                                        <h4> Promozione in corso: {{$promotions[$promo->promotion_id - 1]->promotion_name}}</h4>
                                        <span>La tua promozione scadrà il: {{$promo->ended_at}}</span>

                                    </li>
                                @else
                                    <li class=" promo-box form-sec">
                                        <h4 class= "promo-box-title-2">Prossima promozione: {{$promotions[$promo->promotion_id - 1]->promotion_name}}</h4>
                                        <span>Inizio: {{$promo->started_at}}</span>
                                        <span>Fine: {{$promo->ended_at}}</span>

                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class=" promo-card">
                        <div class="  rounded text-center  ">
                            <h4> Metti in evidenza il tuo appartamento</h4>
                            <p>Scegli il piano di sponsorizzazione piu adatto alle tue esigenze.</p>

                            <form action="#" id="promotion-form" method="post">
                                @csrf
                                @method('POST')
                                    @foreach ($promotions as $key => $promotion)
                                        <div class="form-check service">
                                            <label class="form-check-label" for="exampleRadios{{$key}}"><strong>€ {{ $promotion->price }}</strong><span>{{ $promotion->name }} (Valido per {{ $promotion->period }}h)</span>
                                                <input class="form-check-input" type="radio" name="promo" id="exampleRadios{{$key}}" data-url="{{ route('apartments.promo.payment', ['apartment'=>$apartment, 'promo'=>$promotion]) }}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    @endforeach
                                <button class="btn-bnb" disabled>Promuovi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="charts-section">
            <div class="charts-box " >
                <div >
                    <h2 class="charts-title">Statistiche</h2>
                </div>
                @include('layouts.partials.chart')
            </div>

		 </section>



		@else

			<div class="alert alert-danger">
				<p>Non hai i permessi per accedere alla pagina</p>

			</div>

		@endif
    </div>
</div>


@endsection
