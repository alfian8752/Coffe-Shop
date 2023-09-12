<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class, 'index']);

// route halaman admin->produk
Route::get('/produk', [ProductController::class, 'index']);
// route halaman tambah produk
Route::get('/tambah-produk', [ProductController::class, 'create']);
// route create produk ke database
Route::post('/tambah-produk', [ProductController::class, 'create']);


Route::get('/hapus-produk-{id}', [ProductController::class, 'delete']);
Route::get('/edit', [ProductController::class, 'index']);
