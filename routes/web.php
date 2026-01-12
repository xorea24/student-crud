<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use App\Http\Controllers\StudentController;
>>>>>>> f1e3744 (Initial commit - Student CRUD with update and delete)

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
use App\Http\Controllers\StudentController;

Route::resource('students', StudentController::class);
=======
Route::resource('students', StudentController::class);
>>>>>>> f1e3744 (Initial commit - Student CRUD with update and delete)
