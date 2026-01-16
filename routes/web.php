<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

//Login Route
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.submit');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

// Option A: If you want all CRUD functions
Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class);
}); 