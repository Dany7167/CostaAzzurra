<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract class Controller
{
    public function create()
{
    return view('dishes.create');
}
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

}



