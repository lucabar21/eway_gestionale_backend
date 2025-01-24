<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:sanctum')->group(function () {
//     Route::apiResource('employees', EmployeeController::class);
//     Route::apiResource('projects', ProjectController::class);
//     Route::apiResource('reports', ReportController::class);
// });

Route::apiResource('employees', EmployeeController::class);
Route::apiResource('projects', ProjectController::class);
Route::apiResource('reports', ReportController::class);