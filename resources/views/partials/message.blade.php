@if ($errors->count())
<div class="message is-error">
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
@endif

@if (session('message'))
    <div class="class message">{{ session('message') }}</div>
@endif

@if (session('verified'))
    <div class="class message">Twój adres e-mail został zweryfikowany!</div>
@endif

@if (session('resent'))
    <div class="class message">Link z weryfikacyjny został wysłany!</div>
@endif
