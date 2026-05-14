@extends('layouts.app')

@section('content')

<h1>Prenota un tavolo</h1>
 @if ($errors->any())
    <div style="color:red; margin-bottom:15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
        <select name="time">
            <option value="">Seleziona orario</option>

            <optgroup label="🍝 Pranzo">
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
            </optgroup>

            <optgroup label="🍽 Cena">
                <option value="18:00">18:00</option>
                <option value="18:30">18:30</option>
                <option value="19:00">19:00</option>
                <option value="19:30">19:30</option>
                <option value="20:00">20:00</option>
            </optgroup>
        </select>
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

    <button type="submit" style="background:green; color:white; padding:10px 15px; border:none; border-radius:5px; cursor:pointer;">
    Prenota
    </button>

</form>

@endsection