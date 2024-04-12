# Filament login for Miqey sms login support

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rosiersrobin/filament-miqey-login.svg?style=flat-square)](https://packagist.org/packages/rosiersrobin/filament-miqey-login)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/rosiersrobin/filament-miqey-login/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/rosiersrobin/filament-miqey-login/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/rosiersrobin/filament-miqey-login/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/rosiersrobin/filament-miqey-login/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/rosiersrobin/filament-miqey-login.svg?style=flat-square)](https://packagist.org/packages/rosiersrobin/filament-miqey-login)


Add support for MiQey login flows to your Filament PHP project.

This package requires a valid MiQey Account and Pusher to work.
You also need to have Queues setup.

## Installation

You can install the package via composer:

```bash
composer require rosiersrobin/filament-miqey-login
```

[//]: # ()
[//]: # (You can publish and run the migrations with:)

[//]: # ()
[//]: # (```bash)

[//]: # (php artisan vendor:publish --tag="filament-miqey-login-migrations")

[//]: # (php artisan migrate)

[//]: # (```)

[//]: # (You can publish the config file with:)

[//]: # ()
[//]: # (```bash)

[//]: # (php artisan vendor:publish --tag="filament-miqey-login-config")

[//]: # (```)

[//]: # ()
[//]: # (Optionally, you can publish the views using)

[//]: # ()
[//]: # (```bash)

[//]: # (php artisan vendor:publish --tag="filament-miqey-login-views")

[//]: # (```)

[//]: # (This is the contents of the published config file:)

[//]: # ()
[//]: # (```php)

[//]: # (return [)

[//]: # (];)

[//]: # (```)

## Usage

Change the `login()` function in your panel provider you want the login to be active on.

```php
use RosiersRobin\FilamentMiqeyLogin\Pages\Auth\SmsLogin;


public function panel(Panel $panel): Panel
    {
        return $panel
        ...
        ->login(SmsLogin::class);
    }
```

Add an .env key called `SECURE_ID_API_KEY=` with the key given by MiQey.

Make sure you have pusher setup and working.

**Currently, this package uses the default queue to handle the webhooks received. Make sure you have a working queue setup that is NOT sync.**

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Robin Rosiers](https://github.com/RosiersRobin)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
