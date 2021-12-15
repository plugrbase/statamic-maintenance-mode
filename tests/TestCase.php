<?php

namespace Plugrbase\MaintenanceMode\Tests;

use Statamic\Extend\Manifest;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Plugrbase\MaintenanceMode\ServiceProvider;
use Statamic\Facades\Role;
use Statamic\Facades\User;
use Statamic\Providers\StatamicServiceProvider;
use Statamic\Statamic;

abstract class TestCase extends OrchestraTestCase
{
    protected bool $shouldFakeVersion = true;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        if ($this->shouldFakeVersion) {
            /** @phpstan-ignore-next-line */
            \Facades\Statamic\Version::shouldReceive('get')->andReturn('3.0.10');
            $this->addToAssertionCount(-1); // Dont want to assert this
        }
    }

    protected function getPackageProviders($app)
    {
        return [
            StatamicServiceProvider::class,
            ServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Statamic' => Statamic::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        $app->make(Manifest::class)->manifest = [
            'plugrbase/statamic-maintenance-mode' => [
                'id' => 'plugrbase/statamic-maintenance-mode',
                'namespace' => 'Plugrbase\\MaintenanceMode\\',
            ],
        ];
    }

    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $configs = [
            'assets', 'cp', 'forms', 'routes', 'static_caching',
            'sites', 'stache', 'system', 'users'
        ];

        foreach ($configs as $config) {
            $app['config']->set("statamic.$config", require(__DIR__."/../vendor/statamic/cms/config/{$config}.php"));
        }

        $app['config']->set('statamic.users.repository', 'file');

        Statamic::pushCpRoutes(function () {
            return require_once realpath(__DIR__.'/../routes/cp.php');
        });

        Statamic::pushWebRoutes(function () {
            return require_once realpath(__DIR__.'/../routes/web.php');
        });

        $app['config']->set('statamic.plugrbase-maintenance-mode', require(__DIR__.'/../config/plugrbase-maintenance-mode.php'));
    }

    /**
     * Sign in a Statamic user as admin.
     *
     * @return mixed
     */
    protected function signInAdmin()
    {
        $user = User::make();
        $user->id(1)->email('test@mail.de')->makeSuper();
        $this->be($user);

        return $user;
    }

    /**
     * Sign in a Statamic user.
     *
     * @param  array  $permissions
     * @return mixed
     */
    protected function signInUser($permissions = [])
    {
        $role = Role::make()->handle('test')->title('Test')->addPermission($permissions)->save();

        $user = User::make();
        $user->id(1)->email('test@mail.de')->assignRole($role);
        $this->be($user);

        return $user;
    }
}
