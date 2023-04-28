<?php

use App\Http\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProduct\ProductController;
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
Route::get('/productList', [ProductController::class, 'list'])->name('productList');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('productDetail');
// Route::get('/category', [ProductController::class, 'category'])->name('category');

// admin 

Route::get('/admin/product', [AdminProductController::class, 'index'])->name('productIndex');
Route::post('/admin/qrdownload/{id}', [AdminProductController::class, 'qrDownload'])->name('qrDownload');
Route::get('/admin/product/create', [AdminProductController::class, 'create'])->name('productCreate');
Route::post('/admin/product/create', [AdminProductController::class, 'store'])->name('productStore');

// QR 

Route::get('/qr/create',[QrCodeController::class, 'create'] )->name('qrCreate');
Route::get('/qr/getTemplate', [QrCodeController::class, 'getTemplate'])->name('getTemplate');
Route::post('/qr/getTemplate/store', [QrCodeController::class, 'storeTemplate'])->name('templateSubmit');
Route::get('/qr_codes', [QrCodeController::class, 'get_all_qrs'])->name('allQr');
Route::get('/qr/{id}', [QrCodeController::class, 'show'])->name('viewQr');
Route::get('/qr_code/{code}', [QrCodeController::class, 'showTemplate'])->name('showTemplate');
Route::get('/get_preview_template/{name}', [QrCodeController::class, 'get_preview_template'])->name('getPreviewTemplate');
Route::post('/get_qr_design', [QrCodeController::class, 'get_qr_design']);
Route::post('/save_qrcode', [QrCodeController::class, 'save_qrcode'])->name('save_qrcode');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
