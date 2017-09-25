<?php

use Illuminate\Http\Request;

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

Route::resource('pertemuan', 'Api\PertemuanResource');
Route::resource('absen', 'Api\AbsenResource');
Route::resource('card', 'Api\CardResource');
Route::resource('ajar', 'Api\AjarResource');