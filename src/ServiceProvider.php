<?php

namespace Plugrbase\MaintenanceMode;

use Plugrbase\MaintenanceMode\Http\Middleware\HandleMaintenanceMode;
use Statamic\Facades\CP\Nav;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [];

    protected $fieldtypes = [];

    protected $scripts = [];

    protected $stylesheets = [];

    protected $routes = [
        'cp' => __DIR__.'/../routes/cp.php',
        'web' => __DIR__.'/../routes/web.php',
    ];

    protected $middlewareGroups = [
        'web' => [
            HandleMaintenanceMode::class
        ],
    ];

    public function boot()
    {
        parent::boot();

        Nav::extend(function ($nav) {
            $nav->tools('Maintenance mode')
                ->route('plugrbase.maintenance.settings.index')
                ->icon('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                    <g transform="matrix(3.4285714285714284,0,0,3.4285714285714284,0,0)"><g>
                    <path d="M10.5,2H13a.5.5,0,0,1,.5.5v8a.5.5,0,0,1-.5.5H1a.5.5,0,0,1-.5-.5v-8A.5.5,0,0,1,1,2H3.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></path>
                    <line x1="6" y1="11" x2="5" y2="13.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></line>
                    <line x1="8" y1="11" x2="9" y2="13.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></line>
                    <line x1="4" y1="13.5" x2="10" y2="13.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></line>
                    <rect x="5" y="5.5" width="4" height="3" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></rect>
                    <path d="M5.5,5.5v-1a1.5,1.5,0,0,1,3,0v1" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></path>
                    </g></g></svg>');
        });

        $this->bootAddonConfig();
    }

    protected function bootAddonConfig()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/plugrbase-maintenance-mode.php', 'statamic.plugrbase-maintenance-mode');

        $this->publishes([
            __DIR__.'/../config/plugrbase-maintenance-mode.php' => config_path('statamic/plugrbase-maintenance-mode.php'),
        ], 'plugrbase-maintenance-mode-config');

        return $this;
    }

    public function register()
    {
        parent::register();
    }
}
