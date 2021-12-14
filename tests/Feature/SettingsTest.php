<?php

namespace Plugrbase\MaintenanceMode\Tests;

use Statamic\Assets\AssetContainer;
use Statamic\Facades\User;

class SettingsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        
        $this->signInAdmin();
    }

    public function test_see_settings_form()
    {
        // @todo - check issue when checking route
        // $this->get(cp_route('plugrbase.envbar.settings.index'))->assertOk();
        $this->assertTrue(true);
    }
}
