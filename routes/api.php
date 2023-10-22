<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssignmentController;

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

Route::group(['prefix' => 'assignments'], function () {
    Route::get('/', [AssignmentController::class, 'index']);
    Route::post('/', [AssignmentController::class, 'store']);
    Route::get('/{id}', [AssignmentController::class, 'show']);
    Route::post('/{id}/update', [AssignmentController::class, 'update']);
    Route::post('/{id}/delete', [AssignmentController::class, 'destroy']);
});
