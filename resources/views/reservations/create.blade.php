@extends('layouts.app')

@section('content')

<h1>Prenota un tavolo</h1>

@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif

<form method="POST" action="/reservations">

    @csrf

    <div>
        <input type="text" name="name" placeholder="Nome">
    </div>

    <br>

    <div>
        <input type="email" name="email" placeholder="Email">
    </div>

    <br>

    <div>
        <input type="date" name="date">
    </div>

    <br>

    <div>
        <input type="time" name="time">
    </div>

    <br>

    <div>
        <input type="number" name="guests" placeholder="Numero persone">
    </div>

    <br>

    <div>
        <textarea name="notes" placeholder="Note"></textarea>
    </div>

    <br>

    <button type="submit">
        Prenota
    </button>

</form>

@endsection