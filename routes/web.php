<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;


Route::get('/', fn() => view('landingpage'));
Route::get('/about', fn() => view('about'))->name('about');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'create'])->name('register.post');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/flights/search', [FlightController::class, 'search'])->name('flights.search');

Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/payments/form/{flight_id}', [PaymentController::class, 'form'])->name('payments.form');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/riwayat', [PaymentController::class, 'history'])->name('payments.history');
    Route::get('/payments/ticket/{id}', [PaymentController::class, 'ticket'])->name('payments.ticket');
    Route::get('/payments/ticket/{id}/download', [PaymentController::class, 'downloadTicket'])->name('payments.download');

    //buat admin
    Route::middleware('isAdmin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/admin/approve/{id}', [AdminController::class, 'approve'])->name('admin.approve');

        Route::get('/admin/flights', [FlightController::class, 'index'])->name('admin.flights');
        Route::get('/admin/flights/create', [FlightController::class, 'create'])->name('admin.flights.create');
        Route::post('/admin/flights/create', [FlightController::class, 'store'])->name('admin.add');
        Route::get('/admin/flights/{id}/edit', [FlightController::class, 'edit'])->name('admin.edit');
        Route::put('/admin/flights/{id}', [FlightController::class, 'update'])->name('admin.update');
        Route::delete('/admin/flights/{id}', [FlightController::class, 'delete'])->name('admin.delete');
    });
});