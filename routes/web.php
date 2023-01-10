<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Models\Ad;
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

/* Route::get('/', function () {
    return view('home');
})->name('home'); */

/* Route::get('/categories', function () {
    return view('categories');
})->name('categories'); */

Route::get('/categories', [PublicController::class,'showCategories'])->name('categories');


Route::get('/category/{category:name}/ads', [PublicController::class,'adsByCategory'])->name('category.ads');

Route::get('/ads/create', [AdController::class,'create'])->name('ads.create');

Route::get('/', [PublicController::class,'index'])->name('home');

Route::get('/revisor', [RevisorController::class,'index'])->name('revisor.home');

/* Route::post('/', function () {
    return view('home');
})->name('loginHome'); */

/* Route::get('/login', function () {
    return view('auth/login');
})->name('login');

Route::get('/register', function () {
    return view('auth/register');
})->name('register'); */

