<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Login Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    
    /**
     * DASHBOARD ROUTE
     * This maps '127.0.0.1:8000/dashboard' to the index method.
     * This is the "Home" page with charts and KPIs.
     */

    
    Route::middleware(['auth'])->group(function () {
    // The main landing page after login
    Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');
    
    // The actual CRUD pages
    Route::resource('students', StudentController::class);
});
});
