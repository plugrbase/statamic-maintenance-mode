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
        $settings = [];

        if (config()->has('statamic.plugrbase-maintenance-mode.path')) {
            $settings = tap(YAML::file(config('statamic.plugrbase-maintenance-mode.path'))->parse());
        }

        if (isset($settings->target) && count($settings->target)) {
            $this->settings = $settings->target;
            $this->enabled = $this->settings['maintenance_mode_enabled'];

            if (isset($this->settings['maintenance_mode_title']) && $this->settings['maintenance_mode_title'] != '') {
                $this->title = $this->settings['maintenance_mode_title'];
            }
            
            if (isset($this->settings['maintenance_mode_message']) && $this->settings['maintenance_mode_message'] != '') {
                $this->message = $this->settings['maintenance_mode_message'];
            }
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
