<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('landingpage');
});
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'create'])->name('register.post');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/flights/search', [FlightController::class, 'search'])->name('flights.search');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::post('/payments', [PaymentController::class, 'store'])->middleware('auth')->name('payments.store');
Route::get('/riwayat', [PaymentController::class, 'history'])->middleware('auth');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth');
Route::post('/admin/approve/{id}', [AdminController::class, 'approve'])->middleware('auth')->name('admin.approve');

Route::get('/admin/flights', [FlightController::class, 'index'])->middleware('auth');
Route::get('/admin/flights/create', [FlightController::class, 'create'])->middleware('auth')->name('admin.flights.create');
Route::post('/admin/flights/create', [FlightController::class, 'store'])->middleware('auth')->name('admin.add');
Route::get('/admin/flights/{id}/edit', [FlightController::class, 'edit'])->middleware('auth')->name('admin.edit');
Route::put('/admin/flights/{id}', [FlightController::class, 'update'])->middleware('auth')->name('admin.update');
Route::delete('/admin/flights/{id}', [FlightController::class, 'delete'])->middleware('auth')->name('admin.delete');