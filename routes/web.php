<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CoilController;
use App\Http\Controllers\BagController;
use App\Http\Controllers\CoilProductController;
use App\Http\Controllers\CoilReelController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RibbonController;
use App\Http\Controllers\RibbonProductController;
use App\Http\Controllers\WasteBagController;
use App\Http\Controllers\WasteRibbonController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RibbonReelController;
use App\Http\Controllers\WhiteCoilController;
use App\Http\Controllers\WhiteCoilProductController;
use App\Http\Controllers\WhiteRibbonController;
use App\Http\Controllers\WhiteRibbonReelController;
use App\Http\Controllers\WhiteWasteController;
use App\Http\Controllers\WhiteWasteRibbonController;
use App\Http\Controllers\CoilTypeController;
use App\Models\WhiteCoil;
use App\Models\WhiteRibbon;
use App\Models\WhiteRibbonReel;
use App\Models\WhiteWaste;
use Illuminate\Support\Facades\Artisan;
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

Route::view('login', 'login')->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

Route::get('user/create', [RegisterController::class, 'create'])->name('user.create')->middleware('auth');
Route::post('user/store', [RegisterController::class, 'store'])->name('user.store')->middleware('auth');
Route::get('user', [RegisterController::class, 'index'])->name('user.index')->middleware('auth');
Route::delete('user/delete/{id}', [RegisterController::class,'destroy'])->name('user.destroy')->middleware('auth');

Route::get('base', function () {
        Artisan::call('migrate:fresh');
        });

Route::get('seeder', function () {
        Artisan::call('db:seed');
        });

Route::resource('coilReel', CoilReelController::class)->middleware('auth');
Route::get('coilReel/create/{coil}', [CoilReelController::class, 'createProduct'])->name('coilReel.createProduct')->middleware('auth');

Route::resource('coil', CoilController::class)->middleware('auth');//->except(['create']);
Route::get('coil/create/{provider}', [CoilController::class, 'createFromProvider'])->name('coil.createFromProvider')->middleware('auth');

Route::get('coil/terminar/{coil}', [CoilController::class, 'terminar'])->name('coil.terminar')->middleware('auth');

Route::resource('whiteCoil', WhiteCoilController::class)->middleware('auth');

Route::resource('coilProduct', CoilProductController::class)->middleware('auth');

Route::resource('whiteCoilProduct', WhiteCoilProductController::class)->middleware('auth');

Route::resource('ribbon', RibbonController::class)->middleware('auth');
Route::get('ribbon/create/{coil}', [RibbonController::class, 'createProduct'])->name('ribbon.createProduct')->middleware('auth');

Route::resource('whiteRibbon', WhiteRibbonController::class)->middleware('auth');
Route::get('whiteRibbon/create/{whiteCoil}', [WhiteRibbonController::class, 'createProduct'])->name('whiteRibbon.createProduct')->middleware('auth');

Route::resource('wasteRibbon' , WasteRibbonController::class)->middleware('auth');
Route::get('wasteRibbon/create/{coil}', [WasteRibbonController::class, 'createProduct'])->name('wasteRibbon.createProduct')->middleware('auth');

Route::resource('provider', ProviderController::class)->middleware('auth');

Route::resource('bag', BagController::class)->middleware('auth');
Route::get('bag/create/{ribbon}', [BagController::class, 'createProduct'])->name('bag.createProduct')->middleware('auth');

Route::resource('wasteBag', WasteBagController::class)->middleware('auth');
Route::get('wasteBag/create/{ribbon}', [WasteBagController::class, 'createProduct'])->name('wasteBag.createProduct')->middleware('auth');

Route::resource('ribbonProduct', RibbonProductController::class)->middleware('auth');

Route::resource('whiteRibbonProduct', WhiteRibbonController::class)->middleware('auth');

Route::resource('employee', EmployeeController::class)->middleware('auth');

Route::resource('whiteWaste', WhiteWasteController::class)->middleware('auth');
Route::get('whiteWaste/create/{whiteCoil}', [WhiteWasteController::class, 'createProduct'])->name('whiteWaste.createProduct')->middleware('auth');

Route::resource('ribbonReel', RibbonReelController::class)->middleware('auth');
Route::get('ribbonReel/create/{ribbon}', [RibbonReelController::class, 'createProduct'])->name('ribbonReel.createProduct')->middleware('auth');

Route::resource('whiteRibbonReel', WhiteRibbonReelController::class)->middleware('auth');
Route::get('whiteRibbonReel/create/{whiteRibbon}', [WhiteRibbonReelController::class, 'createProduct'])->name('whiteRibbonReel.createProduct')->middleware('auth');

Route::resource('whiteWasteRibbon', WhiteWasteRibbonController::class)->middleware('auth');
Route::get('whiteWasteRibbon/create/{whiteRibbon}', [WhiteWasteRibbonController::class, 'createProduct'])->name('whiteWasteRibbon.createProduct')->middleware('auth');

Route::resource('coilType', CoilTypeController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
