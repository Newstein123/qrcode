<?php

use App\Http\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QrCodeController;

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

// frontend 

Route::get('/product', [ProductController::class, 'index'])->name('productList');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('productView');

// admin 

Route::get('/admin/product', [AdminProductController::class, 'index'])->name('productIndex');
Route::post('/admin/qrdownload/{id}', [AdminProductController::class, 'qrDownload'])->name('qrDownload');
Route::get('/admin/product/create', [AdminProductController::class, 'create'])->name('productCreate');
Route::post('/admin/product/create', [AdminProductController::class, 'store'])->name('productStore');

// QR 

Route::get('/qr/create',[QrCodeController::class, 'create'] )->name('qrCreate');
Route::get('/qr/getTemplate', [QrCodeController::class, 'getTemplate'])->name('getTemplate');
