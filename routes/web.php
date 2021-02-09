<?php

use App\Http\Controllers\CoilController;
use App\Http\Controllers\CoilProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RibbonController;
use App\Models\CoilProduct;
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
    return view('layouts.plantilla');
});

Route::resource('coil', CoilController::class);

Route::resource('ribbon', RibbonController::class);

Route::resource('coilProduct', CoilProductController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('provider', ProviderController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
