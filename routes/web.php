<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\UserController;
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

Route::resource('film', FilmController::class)->names([
    'index' => 'film.index',
    'store' => 'film.store',
    'edit' => 'film.edit',
    'update' => 'film.update',
    'destroy' => 'film.destroy',
]);
//studio
Route::resource('studio', StudioController::class)->names([
    'index' => 'studio.index',
    'store' => 'studio.store',
    'edit' => 'studio.edit',
    'update' => 'studio.update',
    'destroy' => 'studio.destroy',
]);


Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login-proses', [LoginController::class, 'login_proses'])->name('login-proses');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register-proses', [RegisterController::class, 'store'])->name('register-proses');

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('user-login', [UserController::class, 'index'])->name('user-login');
Route::post('user-proses', [UserController::class, 'user_proses'])->name('user-proses');
Route::get('user-home', [UserController::class, 'indexx'])->name('user-home');

Route::get('tiket/{id}', [FilmController::class, 'BeliTiket'])->name('beli-tiket');


