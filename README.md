# This is my package filament-gutenberg

[![Latest Version on Packagist](https://img.shields.io/packagist/v/artmin96/filament-gutenberg.svg?style=flat-square)](https://packagist.org/packages/artmin96/filament-gutenberg)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/artmin96/filament-gutenberg/run-tests?label=tests)](https://github.com/artmin96/filament-gutenberg/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/artmin96/filament-gutenberg/Check%20&%20fix%20styling?label=code%20style)](https://github.com/artmin96/filament-gutenberg/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/artmin96/filament-gutenberg.svg?style=flat-square)](https://packagist.org/packages/artmin96/filament-gutenberg)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require artmin96/filament-gutenberg
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-gutenberg-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-gutenberg-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-gutenberg-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filament-gutenberg = new ArtMin96\FilamentGutenberg();
echo $filament-gutenberg->echoPhrase('Hello, ArtMin96!');
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

- [Arthur Minasyan](https://github.com/ArtMin96)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
