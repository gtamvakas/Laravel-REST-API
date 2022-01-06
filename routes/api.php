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
if (App::environment('production')) {
    URL::forceScheme('https');
}
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('movies', \App\Http\Controllers\MovieController::class);

Route::fallback(function(){
    return response()->json([
        'data' => 'Page Not Found.'], 404);
});