<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', WelcomeController::class)->name('welcome');
Volt::route('view/film/{film_id}', 'film.show')->name('film.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Volt::route('new/film', 'film.create')->name('film.create');

require __DIR__ . '/auth.php';
