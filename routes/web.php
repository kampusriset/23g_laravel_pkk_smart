<?php

use App\Http\Controllers\ResidentController;

use Illuminate\Support\Facades\Route;

Route::get('/', [ResidentController::class, 'index']);
Route::get('/register', [ResidentController::class, 'registerLink']);
Route::get('/login', [ResidentController::class, 'loginLink']);
Route::get('/resident/calendar',[ResidentController::class, 'calendar']);


Route::get('/resident', [ResidentController::class,'index']);
Route::get('/resident/create', [ResidentController::class, 'create']);
Route::get('/resident/{id}', [ResidentController::class, 'edit']);
Route::post('/resident', [ResidentController::class, 'store'])->name('resident.create');
Route::get('/resident/{id}/edit', [ResidentController::class, 'edit'])->name('resident.edit');
Route::put('/resident/{id}', [ResidentController::class, 'update'])->name('resident.update');
Route::delete('/resident/{id}', [ResidentController::class, 'destroy'])->name('resident.destroy');


//LOGIN

Route::post('/actionRegister', [ResidentController::class,'actionRegister']);
Route::post('/actionLogin', [ResidentController::class,'actionLogin']);
Route::post('/logout', [ResidentController::class,'logout']);



