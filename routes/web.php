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

Route::resource('coil', CoilController::class);//->except(['create']);
Route::get('coil/create/{provider}', [CoilController::class, 'createFromProvider'])->name('coil.createFromProvider');

Route::resource('whiteCoil', WhiteCoilController::class);

Route::resource('coilProduct', CoilProductController::class);

Route::resource('whiteCoilProduct', WhiteCoilProductController::class);

Route::resource('ribbon', RibbonController::class);
Route::get('ribbon/create/{coil}', [RibbonController::class, 'createProduct'])->name('ribbon.createProduct');

Route::resource('whiteRibbon', WhiteRibbonController::class);
Route::get('whiteRibbon/create/{whiteCoil}', [WhiteRibbonController::class, 'createProduct'])->name('whiteRibbon.createProduct');

Route::resource('wasteRibbon' , WasteRibbonController::class);
Route::get('wasteRibbon/create/{coil}', [WasteRibbonController::class, 'createProduct'])->name('wasteRibbon.createProduct');

Route::resource('provider', ProviderController::class);

Route::resource('bag', BagController::class);
Route::get('bag/create/{ribbon}', [BagController::class, 'createProduct'])->name('bag.createProduct');

Route::resource('wasteBag', WasteBagController::class);
Route::get('wasteBag/create/{ribbon}', [WasteBagController::class, 'createProduct'])->name('wasteBag.createProduct');

Route::resource('ribbonProduct', RibbonProductController::class);

Route::resource('employee', EmployeeController::class);

Route::resource('whiteWaste', WhiteWasteController::class);
Route::get('whiteWaste/create/{whiteCoil}', [WhiteWasteController::class, 'createProduct'])->name('whiteWaste.createProduct');

Route::resource('ribbonReel', RibbonReelController::class);
Route::get('ribbonReel/create/{ribbon}', [RibbonReelController::class, 'createProduct'])->name('ribbonReel.createProduct');

Route::resource('whiteRibbonReel', WhiteRibbonReelController::class);
Route::get('whiteRibbonReel/create/{whiteRibbon}', [WhiteRibbonReelController::class, 'createProduct'])->name('whiteRibbonReel.createProduct');

Route::resource('whiteWasteRibbon', WhiteWasteRibbonController::class);
Route::get('whiteWasteRibbon/create/{whiteRibbon}', [WhiteWasteRibbonController::class, 'createProduct'])->name('whiteWasteRibbon.createProduct');

Route::resource('coilType', CoilTypeController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
