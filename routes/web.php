<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\ApartmentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\AdminController;

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

Route::get('/', [SiteController::class, 'index']);
Route::get('/about', [SiteController::class, 'about']);
Route::get('/contacts', [SiteController::class, 'contacts']);
Route::get('/guide', [SiteController::class, 'guide']);

Route::group(['prefix' => 'auction'], function() {
    Route::get('/', [AuctionController::class, 'auction']);
});

Route::group(['prefix' => 'properties'], function() {
    Route::get('/', [PropertiesController::class, 'properties']);
    Route::get('/{properties:slug}', [PropertiesController::class, 'show']);
});

Route::group(['prefix' => 'apartments'], function() {
    Route::get('/', [ApartmentsController::class, 'apartments']);
});

Route::group(['prefix' => 'user'], function() {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/favorites', [UserController::class, 'favorites']);
});

Route::group(['prefix' => 'news'], function() {
    Route::get('/', [NewsController::class, 'news']);
    Route::get('/{news:slug}', [NewsController::class, 'show']);
});
