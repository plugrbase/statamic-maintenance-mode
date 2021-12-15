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
                            ],
                        ],
                        [
                            'handle' => 'maintenance_mode_title',
                            'field' => [
                                'type' => 'text',
                                'display' => 'Title',
                                'instructions'  => 'The title to display in the maintenance page',
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
