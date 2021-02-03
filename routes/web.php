<?php

use App\Http\Controllers\CoilController;
use Illuminate\Support\Facades\Route;

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
<<<<<<< HEAD
    return view('layouts.plantilla');
});
=======
    return view('welcome');
});

Route::resource('coil', CoilController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
>>>>>>> 6b83cb5e4a881a2a97add603f8d4c7da0a56f0cb
