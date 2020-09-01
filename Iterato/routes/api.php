<?php

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

use Illuminate\Support\Facades\Route;

Route::post('weather', 'WeatherController@getWeather');
Route::post('partials/tabs', 'WeatherController@getTabTemplate');
Route::post('partials/tabs-content', 'WeatherController@getTabContentTemplate');
Route::post('messages/warning', 'WeatherController@getTabContentTemplate');
