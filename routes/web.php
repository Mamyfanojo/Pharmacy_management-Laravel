<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\MedicamentController;
use App\Http\Controllers\admin\StockController;
use App\Http\Controllers\admin\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function ()  {
    Route::resource('supplier', SupplierController::class)->except('show');
    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('medicament', MedicamentController::class);
    
});

Route::get('admin/stock-medoc',[ StockController::class, 'index'])->name('admin.medoc.stock')->middleware('auth');

Route::post('admin/stock-medoc/{medicament}',[ StockController::class, 'updateStock'])->name('admin.updateStock')->middleware('auth');
Route::post('admin/stock-medocInit/{medicament}',[ StockController::class, 'initStock'])->name('admin.initStock')->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/login', [AuthController::class, 'doLogin']);