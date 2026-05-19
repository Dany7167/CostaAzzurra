<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Http\Controllers\ReservationController;

Route::get('/reservations/create', [ReservationController::class, 'create'])
 ->middleware('auth');
Route::post('/reservations', [ReservationController::class, 'store'])
->name('reservations.store');

Route::delete('/admin/reservations/{id}', [ReservationController::class, 'destroy'])
    ->middleware('role:admin')
    ->name('reservations.destroy');

Route::get('/reservations', [ReservationController::class, 'index'])
    ->middleware('role:admin')
    ->name('reservations.index');

Route::resource('dishes', DishController::class)
    ->middleware('role:admin')
    ->except(['index', 'show']);
    Route::get('/dishes', [DishController::class, 'index'])->name('dishes.index');

    Route::get('/', function () {
    return view('home');
});

Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');
});
