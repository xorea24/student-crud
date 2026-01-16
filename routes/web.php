<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

// This excludes the 'show' method so the error won't trigger
Route::resource('students', StudentController::class);