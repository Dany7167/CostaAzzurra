@extends('layouts.app')

@section('content')

<h1>Gestione Prenotazioni</h1>

@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif

@foreach($reservations as $reservation)

    <div style="margin-bottom:20px; border:1px solid black; padding:10px;">

        <h3>{{ $reservation->name }}</h3>

        <p>Email: {{ $reservation->email }}</p>
        <p>Data: {{ $reservation->date }}</p>
        <p>Ora: {{ $reservation->time }}</p>
        <p>Persone: {{ $reservation->guests }}</p>
        <p>Note: {{ $reservation->notes }}</p>

        <form 
            action="{{ route('reservations.destroy', $reservation->id) }}" 
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button 
                type="submit"
                onclick="return confirm('Sei sicuro di voler eliminare questa prenotazione?')"
                style="background:red; color:white; padding:5px 10px; border:none; cursor:pointer;"
            >
                Elimina
            </button>
        </form>

    </div>

@endforeach

@endsection