<?php

namespace Plugrbase\MaintenanceMode\Tests\Feature;

use Plugrbase\MaintenanceMode\Tests\TestCase;

class SettingsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        
        $this->signInAdmin();
    }

    public function test_can_see_settings_form(): void
    {
        // @todo - check issue when checking route
        $this->get(cp_route('plugrbase.maintenance.settings.index'))
            ->assertSee('Maintenance mode settings');
    }
}
