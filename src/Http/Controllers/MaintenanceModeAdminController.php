<?php

namespace Plugrbase\MaintenanceMode\Http\Controllers;

use Illuminate\Http\Request;
use Plugrbase\MaintenanceMode\Blueprints\MaintenanceModeProviderBlueprint;
use Statamic\Http\Controllers\CP\CpController;
use Statamic\Facades\File;
use Statamic\Facades\YAML;

class MaintenanceModeAdminController extends CpController
{
    protected $path;

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->path = config('statamic.plugrbase_maintenance_mode.path');
    }

    public function index()
    {
        $blueprint = new MaintenanceModeProviderBlueprint();
        $fields = $blueprint()->fields()->preProcess();
        $values = file_exists($this->path) ? YAML::file($this->path)->parse() : $fields->values();

        return view('statamic-maintenance-mode::cp.settings.index', [
            'blueprint' => $blueprint()->toPublishArray(),
            'values'    => $values,
            'meta'      => $fields->meta(),
        ]);
    }

    public function update(Request $request)
    {
        $blueprint = new MaintenanceModeProviderBlueprint();
        $fields = $blueprint()->fields()->addValues($request->all());
        $fields->validate();
        File::put($this->path, YAML::dump($fields->process()->values()->all()));
    }
}
