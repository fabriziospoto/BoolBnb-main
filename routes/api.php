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

Route::get('view/{id}', 'Api\View@index');

Route::get('message/{id}', 'Api\Message@index');

// Search Api tutto il db
Route::get('search', 'Api\Search@index');
// Search Api db con filtro radius
Route::get('search/lat={lat}&long={long}&radius={radius}', 'Api\Search@show');
