<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\PrescriptionController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\LabResultController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::apiResource('patients', PatientController::class);
// Public Routes (optional - if you want some endpoints public)

// Protected Routes (typically with Sanctum or Passport auth)
// Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('doctors', DoctorController::class);
    Route::apiResource('patients', PatientController::class);
    Route::apiResource('appointments', AppointmentController::class);
    Route::apiResource('prescriptions', PrescriptionController::class);
    Route::apiResource('invoices', InvoiceController::class);
    Route::apiResource('lab-results', LabResultController::class);
// });


// Route::get('/patient',[PatientController::class, 'index']);
// Route::get('/user', [UserController::class, 'index']);

// Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
//     Route::apiResource('users', UserController::class);
// });

// Route::middleware(['auth:sanctum', 'role:doctor,receptionist'])->group(function () {
//     Route::apiResource('appointments', AppointmentController::class);
// });

// Route::middleware(['auth:sanctum', 'role:receptionist'])->group(function () {
//     Route::apiResource('patients', PatientController::class);
// });
