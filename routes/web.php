<?php

use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\LabResultController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\PrescriptionController;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('1', function() { return 'Je suis la page 1 !'; });

// Route::get('/patient',[PatientController::class, 'index']);
// Route::get('/patient/{id}',[PatientController::class, 'show']);
// Route::apiResource('patient', PatientController::class);
// Route::apiResource('doctors', DoctorController::class);
// Route::apiResource('appointments', AppointmentController::class);
// Route::apiResource('prescriptions', PrescriptionController::class);
// Route::apiResource('invoices', InvoiceController::class);
// Route::apiResource('lab-results', LabResultController::class);
// Route::middleware(['auth:sanctum', 'role:receptionist'])->group(function () {
//     Route::apiResource('patients', PatientController::class);
// });