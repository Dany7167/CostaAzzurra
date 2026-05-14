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
            'date' => 'required',
            'time' => 'required',
            'guests' => 'required|integer|min:1',
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