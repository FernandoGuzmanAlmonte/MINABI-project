<?php

use App\Http\Controllers\CoilController;
use App\Http\Controllers\BagController;
use App\Http\Controllers\CoilProductController;
use App\Http\Controllers\CoilReelController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RibbonController;
use App\Http\Controllers\RibbonProductController;
use App\Http\Controllers\WasteBagController;
use App\Http\Controllers\WasteRibbonController;
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


Route::resource('coilReel', CoilReelController::class);
Route::get('coilReel/create/{coil}', [CoilReelController::class, 'createProduct'])->name('coilReel.createProduct');

Route::resource('coil', CoilController::class)->except(['create']);
Route::get('coil/create/{provider}', [CoilController::class, 'create'])->name('coil.create');

Route::resource('coilProduct', CoilProductController::class);

Route::resource('ribbon', RibbonController::class);
Route::get('ribbon/create/{coil}', [RibbonController::class, 'createProduct'])->name('ribbon.createProduct');

Route::resource('wasteRibbon' , WasteRibbonController::class);
Route::get('wasteRibbon/create/{coil}', [WasteRibbonController::class, 'createProduct'])->name('wasteRibbon.createProduct');

Route::resource('provider', ProviderController::class);

Route::resource('bag', BagController::class);
Route::get('bag/create/{ribbon}', [BagController::class, 'createProduct'])->name('bag.createProduct');

Route::resource('wasteBag', WasteBagController::class);
Route::get('wasteBag/create/{ribbon}', [WasteBagController::class, 'createProduct'])->name('wasteBag.createProduct');

Route::resource('ribbonProduct', RibbonProductController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
