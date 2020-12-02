@extends('layouts.app')
@section('header')
    @include("layouts.partials.header_all")
@endsection
@section('content')
<div class="container-all">
    <div class="cont-max-wdt">
        <div class="login-box-t2">

            <div style="font-size: 25px;">{{ __('Registrati') }}</div>

            <div class="card-body">

                <form method="POST" action="{{ route('register') }}">

                    @csrf

                    <div class="form-group ">
                        <label for="name">{{ __('Nome') }}</label>
                        <input id="name" type="text" class="form-select-t2 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required  autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label for="lastname" class="">{{ __('Cognome') }}</label>
                        <input id="lastname" type="text" class="form-select-t2 form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autofocus>
                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" >{{ __('E-Mail') }}</label>
                            <input id="email" type="email" class="form-select-t2 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  required  autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group ">
                        <label for="password" >{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-select-t2 form-control @error('password') is-invalid @enderror" name="password" required  autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" >{{ __('Conferma Password') }}</label>
                        <input id="password-confirm" type="password" class="form-select-t2 form-control" name="password_confirmation" required  autocomplete="new-password">
                    </div>

                    {{-- birthday date-picker --}}
                    <div class="form-group">
                        <label for="datepicker" >{{ __('Data di nascita') }}</label>
								<input id="datepicker" name='birthday' class="form-select-t2 form-control @error('birthday') is-invalid @enderror"  data-date-format="mm/dd/yyyy" required  readonly autocomplete="birthday">
								 @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn-delete-t2">
                            {{ __('Registrati') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
