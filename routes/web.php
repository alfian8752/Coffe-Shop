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
Route::get('/admin-produk', [ProductController::class, 'index']);
// route halaman tambah produk
Route::get('/tambah-produk', [ProductController::class, 'create']);
// route create produk ke database
Route::post('/tambah-produk', [ProductController::class, 'store']);

Route::get('/edit-produk-{id}', [ProductController::class, 'edit']);
Route::post('/edit-produk-{id}', [ProductController::class, 'update']);

Route::get('/hapus-produk-{id}', [ProductController::class, 'delete']);
