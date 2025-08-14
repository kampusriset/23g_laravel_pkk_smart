<?php

use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ResidentController::class, 'index']);

Route::get('/resident', [ResidentController::class,'index']);
Route::get('/resident/create', [ResidentController::class, 'create']);
Route::get('/resident/{id}', [ResidentController::class, 'edit']);
Route::post('/resident', [ResidentController::class, 'store'])->name('resident.create');
Route::put('/resident/{id}', [ResidentController::class, 'update'])->name('resident.edit');
Route::delete('/resident/{id}', [ResidentController::class, 'delete']);
