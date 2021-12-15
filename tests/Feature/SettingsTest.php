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

    public function cannot_see_settings_with_no_permissions(): void
    {
        $this->signInUser();

        $this->get(cp_route('plugrbase.maintenance.settings.index'))
             ->assertRedirect(cp_route('index'));
    }
}
