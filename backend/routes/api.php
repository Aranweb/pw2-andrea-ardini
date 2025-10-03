<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/test', function () {
//     return response()->json(['message' => '✅ Connessione da Laravel OK!']);
// });

Route::apiResource('customers', CustomerController::class);
Route::get('/customers/{customer}', [CustomerController::class], 'customerWithOrder');