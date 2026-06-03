<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class DishController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0|max:99999.99',
        ], [
            'price.max' => 'Il prezzo non può superare 99999.99 €',
            ]);


        Dish::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category
        ]);

        return redirect()
        ->route('dishes.index')
        ->with('success', 'Piatto creato correttamente!');

        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();

        return view('dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dishes.create');
    }

    public function destroy(string $id)
    {
        $dish = Dish::findOrFail($id);

        $dish->delete();

        return redirect()->route('dishes.index')
        ->with('success', 'Piatto eliminato correttamente!');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'category' => 'required'
        ]);

        $dish = Dish::findOrFail($id);

        $dish->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category
        ]);

        return redirect()->route('dishes.index')
        ->with('success', 'Piatto aggiornato con successo!');
    }


    public function edit(string $id)
    {
        $dish = \App\Models\Dish::findOrFail($id);

        return view('dishes.edit', compact('dish'));
    }
}