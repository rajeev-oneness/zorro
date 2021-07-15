<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/get-rider-by-name', 'DriverController@getRiderByName')->name('get.rider.by.name');
Route::post('/get-months-date', 'DriverController@getMonthDates')->name('get.month.dates');
Route::post('/get-driver-location', 'DriverController@getDriverLocation')->name('get.driver.location');
