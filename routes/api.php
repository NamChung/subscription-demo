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

Route::middleware('auth:sanctum')->namespace("App\Http\Controllers")->group(function () {
    Route::apiResources([
        'users' => 'UserController',
        'subscriptions' => 'SubscriptionController',
    ]);

});
Route::post('login', [ 'as' => 'login', 'uses' => 'App\Http\Controllers\AuthController@login']);

Route::fallback(function () {
    return response()->json(['message' => 'API not found'], 404);
});
