@extends('layouts.master')
@section('title', 'Zaloguj się')

@section('content')
    <div class="wrapper">
        <div class="rte">
            <h1>Zaloguj się</h1>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-fieldset">
                <input class="form-field{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="Your e-mail" value="{{ old('email') }}">
            </div>
            <div class="form-fieldset">
                <input class="form-field {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password">
            </div>
            <button class="button">Wyślij</button>
        </form>

        <div class="rte mt">
            <p>Don't have an account? <a href="{{ route('register') }}">Register now.</a><br>Forgot your password? <a href="{{ route('password.request') }}">Reset it here.</a></p>
        </div>
    </div>
@endsection
