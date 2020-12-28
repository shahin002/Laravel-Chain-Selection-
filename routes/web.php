<?php

use App\Http\Controllers\ApiLocationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('ajax')->name('ajax.')->group(function () {
    Route::get('/get-divisions',[LocationController::class, 'getDivisions'])->name('get-divisions');
    Route::get('/get-districts',[LocationController::class, 'getDistricts'])->name('get-districts');
    Route::get('/get-upazillas',[LocationController::class, 'getUpazillas'])->name('get-upazillas');
    Route::get('/get-unions',[LocationController::class, 'getUnions'])->name('get-unions');
});
Route::prefix('api')->name('api.')->group(function () {
    Route::get('/get-divisions',[ApiLocationController::class, 'getDivisions'])->name('get-divisions');
    Route::get('/get-districts',[ApiLocationController::class, 'getDistricts'])->name('get-districts');
    Route::get('/get-upazillas',[ApiLocationController::class, 'getUpazillas'])->name('get-upazillas');
    Route::get('/get-unions',[ApiLocationController::class, 'getUnions'])->name('get-unions');
});
