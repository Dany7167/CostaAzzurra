<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;

Route::resource('dishes', DishController::class)
    ->middleware('role:admin')
    ->except(['index', 'show']);
    Route::get('/dishes', [DishController::class, 'index'])->name('dishes.index');
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
