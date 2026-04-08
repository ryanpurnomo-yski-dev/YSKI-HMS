<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;

Route::redirect('/', '/user/')->name('/');

Route::prefix('user')->group(function(){
    Volt::route('/', 'pages.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.post');
    Volt::route('/setting/profile', 'pages.profile_hms')
        ->name('profile')
        ->middleware('auth');
    Route::post('/setting/profile', [AuthController::class, 'profile'])->name('profile.post');
    Volt::route('/dashboard', 'pages.dashboard_hms')->name('dashboard');
    Volt::route('/requests', 'pages.requests_items_hms')->name('requests');
    Volt::route('/items', 'pages.items_hms')->name('items');
    Volt::route('/items', 'pages.list_items_hms');
    Route::livewire('/items/tambah', 'pages.tambah_barang');
    Route::livewire('/items/{id}/edit', 'pages.edit_barang');
    Route::livewire('/category', 'pages.kategori_hms')->name('category');
    Volt::route('/items/transactions', 'pages.transaction_items_hms');
    Volt::route('/forms', 'pages.form_tickets_hms')->name('forms');
    Volt::route('/tickets', 'pages.tickets_hms')->name('tickets');
    Route::get('/tickets/post', [TicketController::class, 'store'])->name('tickets.post');
});