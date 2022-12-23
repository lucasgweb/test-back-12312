<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])
        ->name('home.index');

    Route::get('/manutencoes', [MaintenanceController::class, 'index'])
        ->name('maintenance.index');

    Route::get('/veiculos', [VehicleController::class, 'index'])
        ->name('vehicle.index');

});



