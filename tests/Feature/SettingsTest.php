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

    /** @test */
    public function cannot_see_settings_with_no_permissions(): void
    {
        $this->signInUser();

        $this->get(cp_route('plugrbase.maintenance.settings.index'))
             ->assertRedirect(cp_route('index'));
    }

    /** @test */
    public function can_update_settings_without_error(): void
    {
        $payload = [
            'enabled'    => true,
            'expireTime' => 999,
            'allowedAddresses' => [],
            'allowedDomains' => [],
        ];

        $this->patch(cp_route('plugrbase.maintenance.settings.update'), $payload)->assertOk();

        $this->get(cp_route('plugrbase.maintenance.settings.index'))
             ->assertSee(999);
    }
}
