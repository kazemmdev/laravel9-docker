<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
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


Route::middleware('auth:sanctum')->post('/cats/{catId}/vote', 'CatController@vote');


Route::middleware('auth:sanctum')->group(function () {
    // Define protected routes here
    // Route::post('/cats/{cat}/vote', [CatController::class, 'vote']);
    Route::get('cats', [CatController::class, 'index']);
});


