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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('vulnerabilities', 'App\Http\Controllers\VulnerabilityController@index');
Route::group(['prefix' => 'vulnerability'], function () {
    Route::post('add', 'App\Http\Controllers\VulnerabilityController@add');
    Route::get('edit/{id}', 'App\Http\Controllers\VulnerabilityController@edit');
    Route::post('update/{id}', 'App\Http\Controllers\VulnerabilityController@update');
    Route::delete('delete/{id}', 'App\Http\Controllers\VulnerabilityController@delete');
});
