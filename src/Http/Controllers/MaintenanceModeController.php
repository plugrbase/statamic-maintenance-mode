<?php

namespace Plugrbase\MaintenanceMode\Http\Controllers;

use Plugrbase\MaintenanceMode\MaintenanceMode;

class MaintenanceModeController
{
    public function index()
    {
        $maintenanceMode = new MaintenanceMode();

        return view('statamic-maintenance-mode::maintenance')
            ->with(['message' => $maintenanceMode->message()]);
    }
}
