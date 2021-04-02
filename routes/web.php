<?php

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

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main');

Route::resources([
    '/faktura' => App\Http\Controllers\FakturaController::class, // Klienci
    '/klienci' => App\Http\Controllers\KlienciController::class, // Klienci
    '/produkty' => App\Http\Controllers\ProduktyController::class // Produkty
]);

Route::get('/faktura/pdf/{id}', [App\Http\Controllers\FakturaController::class, 'createPDF'])->name('create.pdf');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
