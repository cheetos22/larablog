@extends('layouts.master')
@section('title', 'Zresetuj hasło')

@section('content')
    <div class="wrapper">
        <div class="rte">
            <h1>Zresetuj hasło</h1>
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-fieldset">
                <input class="form-field{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="Your e-mail" value="{{ old('email') }}">
            </div>
            <button class="button">Wyślij</button>
        </form>

    </div>
@endsection
