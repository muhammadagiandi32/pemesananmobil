<?php

use App\Http\Controllers\CarsController;
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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/cars', CarsController::class);
Route::get('/pesan/{id}', [App\Http\Controllers\HomeController::class, 'pesan'])->name('pesan');
Route::get('/pesanan/list', [App\Http\Controllers\HomeController::class, 'list'])->name('pesanan.list');

Route::get('/pesanan/kembalikan/{id}', [App\Http\Controllers\HomeController::class, 'kembalikan'])->name('kembalikan');
