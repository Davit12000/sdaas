<?php

use App\Http\Controllers\Api\DeskController;
use App\Http\Controllers\Api\ListController;
use App\Http\Controllers\AuthController;
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

Route::get('users', [AuthController::class, 'index']);
Route::group(['middleware' => 'auth:sanctum'], function () {
Route::apiResources([
    'lists' => ListController::class,
    'desks' => DeskController::class,
]);
});
Route::POST('/login', [AuthController::class, 'login']);
Route::POST('/uRegister', [AuthController::class, 'register']);