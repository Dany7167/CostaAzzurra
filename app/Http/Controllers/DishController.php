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
            'image' => 'nullable|image|max:2048',
        ], [
            'price.max' => 'Il prezzo non può superare 99999.99 €',
            'price.min' => 'Il prezzo deve essere maggiore di 0',
            'image.image' => 'Il file deve essere un\'immagine',
            'image.max' => 'L\'immagine non può superare 2 MB',
            ]);

            $path = null;
            if ($request->hasFile('image')) {
            $path = $request->file('image')->store('dishes', 'public');
            }

        Dish::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $path
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
            'category' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $dish = Dish::findOrFail($id);

        $data = [
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category' => $request->category
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('dishes', 'public');
        }

        $dish->update($data);

        return redirect()->route('dishes.index')
        ->with('success', 'Piatto aggiornato con successo!');
    }


    public function edit(string $id)
    {
        $dish = \App\Models\Dish::findOrFail($id);

        return view('dishes.edit', compact('dish'));
    }
}