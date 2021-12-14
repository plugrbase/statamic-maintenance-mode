<?php

use Illuminate\Support\Facades\Route;

Route::namespace('\Plugrbase\MaintenanceMode\Http\Controllers')->prefix('maintenance/settings/')->name('plugrbase.maintenance.settings.')->group(function () {
    Route::get('/', 'MaintenanceModeAdminController@index')->name('index');
    Route::put('/', 'MaintenanceModeAdminController@update')->name('update');
});
