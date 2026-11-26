<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::resource('services', ServiceController::class);
Route::resource('barbers', BarberController::class);
Route::resource('appointments', AppointmentController::class);
