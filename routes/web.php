<?php

use Illuminate\Support\Facades\Route;

Route::get('/maintenance-mode', 'MaintenanceModeController@index')->name('plugrbase.maintenance.index');
