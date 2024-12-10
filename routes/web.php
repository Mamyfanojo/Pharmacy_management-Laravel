<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CartController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MedicamentController;
use App\Http\Controllers\admin\StockController;
use App\Http\Controllers\admin\SupplierController;
use App\Http\Controllers\admin\VenteController;
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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::get('admin/stock-medoc',[ StockController::class, 'index'])->name('admin.medoc.stock')->middleware('auth');
Route::get('admin/fairevente',[ VenteController::class, 'index'])->name('admin.vente')->middleware('auth');


Route::post('admin/fairevente/{id}',[CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
Route::get('admin/cart', [CartController::class, 'viewCart'])->name('cart.index');
// Route::post('admin/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('admin/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('admin/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');


Route::post('admin/stock-medoc/{medicament}',[ StockController::class, 'updateStock'])->name('admin.updateStock')->middleware('auth');
Route::post('admin/stock-medocInit/{medicament}',[ StockController::class, 'initStock'])->name('admin.initStock')->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/login', [AuthController::class, 'doLogin']);