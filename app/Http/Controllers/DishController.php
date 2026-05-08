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
        'price' => 'required|numeric|min:0'
    ]);

    Dish::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price
    ]);

    return redirect()->route('dishes.index');
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

        return redirect()->route('dishes.index');
    }

}