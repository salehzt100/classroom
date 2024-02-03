<?php

use App\Http\Controllers\Api\v1\AccessTokenController;
use App\Http\Controllers\Api\v1\ClassroomsController;
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


Route::apiResource('classrooms', ClassroomsController::class)->names([
    'index' => 'api.classrooms.index',
    'store' => 'api.classrooms.store',
    'update' => 'api.classrooms.update',
    'destroy' => 'api.classrooms.destroy',
    'show' => 'api.classrooms.show',
])->middleware('auth:sanctum');


Route::post('auth/access-tokens',[AccessTokenController::class,'store'])
->middleware('guest:sanctum');



Route::delete('auth/access-tokens/{token?}',[AccessTokenController::class,'destroy'])
    ->middleware('auth:sanctum');


