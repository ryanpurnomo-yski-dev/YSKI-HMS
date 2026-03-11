<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\Auth\AuthController;

// Route::get('/', function () {
//     Volt::route('/home', 'pages.home')->name('pages.user.home');
// });


Route::redirect('/', '/user/')->name('/');
Volt::route('/user/', 'pages.login')->name('login');
Route::post('/user/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/user/logout', [AuthController::class, 'logout'])->name('login.post');
Volt::route('/user/dashboard', 'pages.dashboard_hms')->name('dashboard');
Route::livewire('/barang/kategori', 'pages.Data.kategori_hms');
Volt::route('/user/requests', 'pages.dashboard_hms')->name('dashboard');
Volt::route('/user/items', 'pages.dashboard_hms')->name('dashboard');
Volt::route('/user/tickets', 'pages.dashboard_hms')->name('dashboard');

// Route::prefix('user')->group(function(){
//     Volt::route('/home', 'home')->name('pages.user.home');
// });

// Volt::route('/', 'home')->name('home');
// Volt::route('/user/home', 'home')->name('pages.user.home');
