<?php

use App\Http\Controllers\news\ArticleController;
use App\Http\Controllers\news\CategoryController;
use App\Http\Controllers\notifikasi\MasterPushNotifikasiController;
use App\Http\Controllers\notifikasi\PerformaNotifikasiController;
use App\Http\Controllers\order\OrderController;
use App\Http\Controllers\pegawai\KaryawanController;
use App\Http\Controllers\pelanggan\PelangganController;
use App\Http\Controllers\produk\MasterProdukController;
use App\Http\Controllers\publication\PublicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/kategori', [CategoryController::class, 'api_get_kategori'])->name('api-get-kategori');
Route::get('/article', [ArticleController::class, 'api_get_article'])->name('api-get-article');