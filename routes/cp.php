<?php

use Plugrbase\MaintenanceMode\Http\Controllers\MaintenanceModeAdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('maintenance/settings/')->name('plugrbase.maintenance.settings.')->group(function () {
    Route::get('/', [MaintenanceModeAdminController::class, 'index'])->name('index');
    Route::put('/', [MaintenanceModeAdminController::class, 'update'])->name('update');
});
