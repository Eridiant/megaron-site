<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\ApartmentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\AdminController;
use App\Services\Localization\LocalizationService;

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

// Route::get('/', 'SiteController@index');
// Route::get('/', [SiteController::class, 'index']);

Route::group(
    [
        'prefix' => LocalizationService::locale(),
        'middleware' => 'setLocale',
    ],
    function() {
        Route::get('/', [SiteController::class, 'index'])->name('index');
        Route::get('/about', [SiteController::class, 'about'])->name('about');
        Route::get('/contacts', [SiteController::class, 'contacts'])->name('contacts');
        Route::get('/guide', [SiteController::class, 'guide'])->name('guide');
        
        Route::get('/auction', [AuctionController::class, 'auction'])->name('auction');
        // Route::group(['prefix' => 'auction'], function() {});
        
        Route::get('/properties', [PropertiesController::class, 'properties'])->name('properties');
        Route::get('/properties/{properties:slug}', [PropertiesController::class, 'show']);
        // Route::group(['prefix' => 'properties'], function() {});
        
        Route::get('/apartments', [ApartmentsController::class, 'apartments'])->name('apartments');
        // Route::group(['prefix' => 'apartments'], function() {});
        
        Route::get('/user', [UserController::class, 'index']);
        Route::get('/user/favorites', [UserController::class, 'favorites']);
        // Route::group(['prefix' => 'user'], function() {});
        
        Route::get('/news', [NewsController::class, 'news'])->name('news');
        // Route::group(['prefix' => 'news'], function() {});
        // Route::get('/', [AuctionController::class, 'auction']);
    }
);
