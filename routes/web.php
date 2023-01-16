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

Route::get('/revisor', [RevisorController::class,'index'])->middleware('isRevisor')->name('revisor.home');

Route::patch('/revisor/ad/{ad}/accept', [RevisorController::class,'acceptAd'])->middleware('isRevisor')->name('revisor.ad.accept');
Route::patch('/revisor/ad/{ad}/reject', [RevisorController::class,'rejectAd'])->middleware('isRevisor')->name('revisor.ad.reject');

Route::get('/revisor/become', [RevisorController::class,'becomeRevisor'])->middleware('auth')->name('revisor.become');
Route::get('/revisor/{user}/make', [RevisorController::class,'makeRevisor'])->middleware('auth')->name('revisor.make');

Route::post('/locale/{locale}', [PublicController::class,'setLocale'])->name('locale.set');

/* Route::post('/', function () {
    return view('home');
})->name('loginHome'); */

/* Route::get('/login', function () {
    return view('auth/login');
})->name('login');

Route::get('/register', function () {
    return view('auth/register');
})->name('register'); */

