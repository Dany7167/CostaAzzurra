<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'guests' => 'required|integer|min:1|max:15',
            'notes' => 'nullable',
            ], [
                'name.required' => 'Inserisci il nome.',

                'email.required' => 'Inserisci l’email.',

                'email.email' => 'Inserisci un’email valida.',

                'date.required' => 'Seleziona una data.',

                'date.after_or_equal' => 'Non puoi prenotare per una data passata.',

                'time.required' => 'Seleziona un orario.',

                'guests.required' => 'Inserisci il numero di persone.',

                'guests.max' => 'Non puoi prenotare per più di 15 persone.',

                'guests.min' => 'Deve esserci almeno 1 persona.',
            ]);

        Reservation::create([
            'name' => $request->name,
            'email' => $request->email,
            'date' => $request->date,
            'time' => $request->time,
            'guests' => $request->guests,
            'notes' => $request->notes,
        ]);

        return redirect('/reservations/create')
            ->with('success', 'Prenotazione inviata con successo!');
    }

    public function index()
    {
        $reservations = Reservation::all();

        return view('reservations.index', compact('reservations'));
    }

    public function destroy(string $id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->delete();

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Prenotazione eliminata con successo!');
    }

}