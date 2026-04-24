<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Public tickets view (no auth required)
Route::view('list-tickets', 'public-tickets')
    ->name('public.tickets');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('tickets', 'tickets')
    ->middleware(['auth'])
    ->name('tickets');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
