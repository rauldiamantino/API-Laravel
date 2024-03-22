<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\InvoiceController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/users', [UserController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('invoices', InvoiceController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/teste', [TesteController::class, 'index'])->middleware('ability:teste-index');
    Route::get('/users/{user}', [UserController::class, 'show'])->middleware('ability:user-get');
});

