<?php

use App\Filament\Resources\UserResource\Api\UserApiService;
use App\Filament\Resources\EventResource\Api\EventApiService;
use App\Http\Controllers\AuthenticationController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user', [AuthenticationController::class, 'user'])->middleware('auth:sanctum');

UserApiService::routes(['middleware' => 'auth:sanctum']);
EventApiService::routes(['middleware' => 'auth:sanctum']);
