<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PDFController;

Route::redirect('/', '/user/')->name('/');

Route::prefix('user')->group(function(){
    Volt::route('/', 'pages.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.post');

    Route::middleware('auth')->group(function() {
        //Dashboard
        Route::get('/login/dashboard', [DashboardController::class, 'index'])->name('dashboardController');
        Volt::route('/dashboard', 'pages.dashboard_hms')->name('dashboard');
        //Settings
        Volt::route('/setting/profile', 'pages.profile_hms')
            ->name('profile')
            ->middleware('auth');
        Route::post('/setting/profile', [AuthController::class, 'profile'])->name('profile.post');
        
        //Requests
        Volt::route('/items/requests', 'pages.requests_items_hms')->name('requests');

        //Items
        Volt::route('/items/forms', 'pages.form_items_hms')->name('items.forms');
        Volt::route('/items', 'pages.items_hms')->name('items');
        Volt::route('/items', 'pages.list_items_hms');
        Route::livewire('/items/tambah', 'pages.form_requests_items_hms');
        Route::livewire('/items/{id}/edit', 'pages.edit_barang');

        //Transactions
        Volt::route('/items/transactions', 'pages.transaction_items_hms');

        //Categories
        Route::livewire('/category', 'pages.kategori_hms')->name('category');

        //Ticketing
        Volt::route('/tickets/forms', 'pages.form_tickets_hms')->name('tickets.forms');
        Volt::route('/tickets', 'pages.tickets_hms')->name('tickets');
        Route::get('/tickets/post', [TicketController::class, 'store'])->name('tickets.post');

        //Approvals
        Route::get('/approval/save', [ApprovalController::class, 'store'])->name('approval.save');

        //PDF Button
        Route::get('/excel/export', [ExcelController::class, 'export'])->name('excel.export');
        Route::get('/pdf/export', [PDFController::class, 'export'])->name('pdf.export');
    });
});
