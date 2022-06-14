<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\TaskController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::post('logout', [AuthController::class, 'logout']);

// タスク機能
Route::post('/task/add', [TaskController::class, 'add']);
Route::post('/task/check', [TaskController::class, 'check']);
Route::get('/task/done', [TaskController::class, 'done']);
Route::get('/task/doing', [TaskController::class, 'doing']);
Route::delete('/task/delete', [TaskController::class, 'delete']);
