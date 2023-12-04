<?php

use App\Http\Controllers\LoginController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'halaman_login'])->name('halaman_login');
    Route::post('/act_login', [LoginController::class, 'act_login'])->name('act_login');
    Route::get('/register', [LoginController::class, 'halaman_register'])->name('halaman_register');
    Route::post('/act_register', [LoginController::class, 'act_register'])->name('act_register');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/helloworld', [LoginController::class, 'helloworld'])->name('helloworld')->middleware('auth');
