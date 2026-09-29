<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Public tickets view (no auth required)
Route::view('list-tickets', 'public-tickets')
    ->name('public.tickets');

// Ticket confirmation page (no auth required)
Route::get('ticket/confirm/{token}', \App\Livewire\TicketConfirmation::class)
    ->name('ticket.confirm');

// Ticket receipt page (no auth required - accessible after confirmation)
Route::get('ticket/receipt/{id}', [\App\Http\Controllers\TicketReceiptController::class, 'show'])
    ->name('ticket.receipt');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('tickets', 'tickets')
    ->middleware(['auth'])
    ->name('tickets');

Route::view('users', 'users')
    ->middleware(['auth'])
    ->name('users');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
