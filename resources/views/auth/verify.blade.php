@extends('layouts.master')
@section('title', 'Zweryfikuj swój e-mail')

@section('content')
<div class="wrapper">
    <div class="rte">
        <h1>Zweryfikuj swój e-mail</h1>
    </div>

    <div class="rte mt">
        <p>Nie dostałeś jeszcze wiadomości e-mail z linkiem aktywacyjnym? <a href="{{ route('verification.resend') }}">Wyślij ponownie.</a></p>
    </div>
</div>
@endsection
