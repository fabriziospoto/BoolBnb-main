@extends('layouts.app')

@section('content')

    {{-- @dd($apartment, $promo, $token); --}}

    <input type="hidden" id="token" value="{{ $token }}">

    @if (session('success_message'))
       <div class="alert alert-success">
           {{ session('success_message') }}
       </div>
    @endif

   @if(count($errors) > 0)
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif

   <div class="content container-all">
       <div class="cont-max-wdt">
           <form method="post" id="payment-form" class="form-box-t2" action="{{ route('apartments.promo.upload') }}">
               @csrf
               <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">
               <input type="hidden" name="promo_id" value="{{ $promo->id }}">
               <input type="hidden" name="promo_period" value="{{ $promo->period }}">
               <section>
                   <label for="amount">
                       <span class="input-label">Importo promozione</span>
                       <div class="input-wrapper amount-wrapper ">
                           <input id="amount" class="form-select-t2 pl-2 form-control" name="amount" type="tel" min="1" placeholder="Amount" value="{{ $promo->price }}" readonly>
                       </div>
                   </label>

                   <div class="bt-drop-in-wrapper">
                       <div id="bt-dropin"></div>
                   </div>
               </section>

               <input id="nonce" name="payment_method_nonce" type="hidden" />
               <button class="btn-delete-t2" type="submit"><span>Acquista ora</span></button>
           </form>
       </div>

    </div>

@endsection
