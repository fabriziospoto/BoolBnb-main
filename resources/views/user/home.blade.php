@extends('layouts.app')
@section('header')
    @include("layouts.partials.header_all")
@endsection
@section('content')
<div class="container-all">
    <div class="cont-max-wdt">
        <div class="login-box-t2">
            <div class="card-body text-center">
               @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @elseif (session('edit'))
                    {{ session('edit') }}
                @else
                    {{ __('Accesso effettuato') }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection