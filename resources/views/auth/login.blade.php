@extends('layouts.app')
@section('header')
    @include("layouts.partials.header_all")
@endsection
@section('content')
<div class="container-all">
    <div class="cont-max-wdt">
        <div class="login-box-t2">
            <div style="font-size: 25px;">{{ __('Accedi') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- email --}}
                    <div class="form-group ">
                        <label for="email" >{{ __('E-Mail') }}</label>
                        <input id="email" type="email" class="form-select-t2 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        {{-- password --}}
                        <div class="form-group ">
                            <label for="password" class="">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-select-t2 form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="form-group row mb-0 d-flex justify-content-center">
                                <div class="">
                                    <button type="submit" class="btn-delete-t2">
                                        {{ __('Accedi') }}
                                    </button>
                                    {{--
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
