# Filament login for Miqey sms login support

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rosiersrobin/filament-miqey-login.svg?style=flat-square)](https://packagist.org/packages/rosiersrobin/filament-miqey-login)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/rosiersrobin/filament-miqey-login/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/rosiersrobin/filament-miqey-login/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/rosiersrobin/filament-miqey-login/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/rosiersrobin/filament-miqey-login/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/rosiersrobin/filament-miqey-login.svg?style=flat-square)](https://packagist.org/packages/rosiersrobin/filament-miqey-login)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require rosiersrobin/filament-miqey-login
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-miqey-login-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-miqey-login-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-miqey-login-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentMiqeyLogin = new RosiersRobin\FilamentMiqeyLogin();
echo $filamentMiqeyLogin->echoPhrase('Hello, RosiersRobin!');
```

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

- [Robin](https://github.com/RosiersRobin)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
