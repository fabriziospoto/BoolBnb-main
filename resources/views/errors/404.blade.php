@extends('layouts.app')
@section('content')

<div class="container-404">
    <div class="cont-max-wdt">
        <div class="sec-404">
        <img class="img-404" src="{{asset('images/404_duck.png')}}" alt="404_error">
            <h2 class="title-404"><strong>404 error</strong></h2>
            <span>La pagina che hai cercato non esiste</span>
            <br>
            <a href="{{url('/')}}" class="btn-delete-t2">Torna alla home</a>
        </div>
    </div>
</div>

@endsection