<?php

namespace Plugrbase\MaintenanceMode\Blueprints;

use Statamic\Facades\Blueprint;

class MaintenanceModeProviderBlueprint
{
    public function __invoke()
    {
        return Blueprint::make()->setContents([
            'sections' => [
                'Maintenance mode' => [
                    'fields' => [
                        [
                            'handle' => 'maintenance_mode_enabled',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Enabled',
                                'width' => 50,
                            ],
                        ],
                        [
                            'handle' => 'maintenance_mode_message',
                            'field'  => [
                                'type' => 'textarea',
                                'display' => 'Message',
                                'instructions'  => 'The message to display in the maintenance page',
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
