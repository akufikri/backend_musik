<?php

use App\Http\Controllers\MusikController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getMusik', [MusikController::class, 'getMusik']);
Route::post('storeMusik', [MusikController::class, 'storeMusik']);
Route::delete('deleteMusik/{id}', [MusikController::class, 'deleteMusik']);
Route::get('showMusik/{id}', [MusikController::class, 'showMusik']);
Route::post('updateMusik/{id}', [MusikController::class, 'updateMusik']);