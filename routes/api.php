<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TreatmentController;
use App\Http\Controllers\Api\NotificationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/notify', [NotificationController::class, 'send']);

Route::apiResource('categories', CategoryController::class);
Route::apiResource('treatments', TreatmentController::class);
