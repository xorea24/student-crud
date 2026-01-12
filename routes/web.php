<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController; // Ensure this line exists!

Route::get('/', function () {
    return view('welcome');
});

// This one line handles View, Create, Update, and Delete
Route::resource('students', StudentController::class);