<?php

namespace Plugrbase\MaintenanceMode;

use Statamic\Facades\YAML;

class MaintenanceMode
{
    /**
     * The maintenance mode status.
     *
     * @var boolean
     */
    protected $enabled = false;

    /**
     * The title to display
     *
     * @var string
     */
    protected $title = '';

    /**
     * The message to display
     *
     * @var string
     */
    protected $message = 'The website is in maintenance mode.';

    /**
     * The settings
     *
     * @var array|null
     */
    protected $settings = null;

    public function __construct()
    {
        $this->setSettings();
    }

    public function setSettings()
    {
        $settings = tap(YAML::file(config('statamic.plugrbase_maintenance_mode.path'))->parse());
        
        if (isset($settings->target)) {
            $this->settings = $settings->target;
            $this->enabled = $this->settings['maintenance_mode_enabled'];
            $this->title = $this->settings['maintenance_mode_title'];
            $this->message = $this->settings['maintenance_mode_message'];
        }
    }

    /**
     * Check if the site is in maintenance mode.
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * The title.
     *
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * The message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
