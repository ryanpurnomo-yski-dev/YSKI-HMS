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
Route::post('/user/logout', [AuthController::class, 'logout'])->name('logout.post');

Volt::route('/user/setting/profile', 'pages.profile_hms')->name('profile');
Route::post('/user/setting/profile', [AuthController::class, 'profile'])->name('profile.post');

Volt::route('/user/dashboard', 'pages.dashboard_hms')->name('dashboard');
Volt::route('/user/requests', 'pages.requests_hms')->name('requests');
Volt::route('/user/items', 'pages.items_hms')->name('items');
Route::livewire('/user/items', 'pages.list_items_hms');
Route::livewire('/user/category', 'pages.kategori_hms')->name('category');
Volt::route('/user/tickets', 'pages.tickets_hms')->name('tickets');

// Route::prefix('user')->group(function(){
//     Volt::route('/home', 'home')->name('pages.user.home');
// });

// Volt::route('/', 'home')->name('home');
// Volt::route('/user/home', 'home')->name('pages.user.home');
