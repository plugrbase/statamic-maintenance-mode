<?php

namespace Plugrbase\MaintenanceMode\Http\Middleware;

use Plugrbase\MaintenanceMode\MaintenanceMode;
use Statamic\Support\Str;

class HandleMaintenanceMode
{
    /**
     * Check if the maintenance mode is activated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        $url = Str::start($request->getRequestUri(), '/');
        $maintenanceMode = new MaintenanceMode();

        if (auth()->user() && (auth()->user()->isSuper() || auth()->user()->hasPermission("access cp"))) {
            return $next($request);
        }

        if ($maintenanceMode->isEnabled() === false && $url == '/maintenance-mode') {
            return redirect('/');
        }

        if ($maintenanceMode->isEnabled() === false) {
            return $next($request);
        }

        if ($maintenanceMode->isEnabled() === true && $url == '/maintenance-mode') {
            return $next($request);
        }
        
        if ($maintenanceMode->isEnabled() === true && $url != '/maintenance-mode') {
            return redirect('maintenance-mode');
        }
    }
}
