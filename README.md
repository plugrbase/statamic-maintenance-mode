<!-- statamic:hide -->
![GitHub release (latest by date)](https://img.shields.io/github/v/release/plugrbase/statamic-maintenance-mode?style=flat-square)
![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=flat-square&link=https://statamic.com)

# Statamic Maintenance mode

<!-- /statamic:hide -->

This addons adds an environment bar to the control panel so that you know your working environment. You can change the colors, texts and enable / disable the bar per environment. 

# Installation

You can install the package via composer:

```bash
composer require plugrbase/statamic-maintenance-mode
```

Optionally publish the config file of this package:

```bash
php artisan vendor:publish --provider="Plugrbase\MaintenanceMode\ServiceProvider"
```

# Control Panel

Once installed, you can access the settings in the control panel by clicking the "Maintenance Mode" button.

![settings](./docs/settings-form.jpeg)

## Official Support

If you're in need of some help, drop an email to [hello@plugrbase.com](mailto:hello@plugrbase.com)!

# License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
