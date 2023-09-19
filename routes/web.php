<?php

use Illuminate\Support\Facades\Route;
use Plugrbase\MaintenanceMode\Http\Controllers\MaintenanceModeController;

Route::get('/maintenance-mode', [MaintenanceModeController::class, 'index'])->name('plugrbase.maintenance.index');