<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Route::get('/', function () {
//     Volt::route('/home', 'pages.home')->name('pages.user.home');
// });


// Route::livewire('/', 'pages.login')->redirect->route();
Route::redirect('/', '/user/');
Route::livewire('/barang/kategori', 'pages.Data.kategori_hms');
Volt::route('/user/', 'pages.login');
Volt::route('/user/dashboard', 'pages.dashboard_hms');
// Route::livewire('/user/dashboard', 'pages.dashboard_hms');
// Route::livewire('/user/home', 'pages.dashboard_hms');
// Route::livewire('/user/items', 'pages.list_items_hms');


// Route::prefix('user')->group(function(){
//     Volt::route('/home', 'home')->name('pages.user.home');
// });

// Volt::route('/', 'home')->name('home');
// Volt::route('/user/home', 'home')->name('pages.user.home');
