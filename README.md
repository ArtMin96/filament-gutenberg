# Filament Gutenberg editor

[![Latest Version on Packagist](https://img.shields.io/packagist/v/artmin96/filament-gutenberg.svg?style=flat-square)](https://packagist.org/packages/artmin96/filament-gutenberg)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/artmin96/filament-gutenberg/run-tests?label=tests)](https://github.com/artmin96/filament-gutenberg/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/artmin96/filament-gutenberg/Check%20&%20fix%20styling?label=code%20style)](https://github.com/artmin96/filament-gutenberg/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/artmin96/filament-gutenberg.svg?style=flat-square)](https://packagist.org/packages/artmin96/filament-gutenberg)

Gutenberg editor as Filament field.

## Installation

You can install the package via composer:

```bash
composer require artmin96/filament-gutenberg
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-gutenberg-config"
```

This is the contents of the published config file:

```php
return [
    'initialize_default_colors' => true, // Tailwind default colors
    
    'colors' => [],
    
    'gradients' => [],
    
    'font-sizes' => [],
    
    'categories' => [],
];
```

## Usage

```php
use ArtMin96\FilamentGutenberg\Forms\Components\Gutenberg;

Gutenberg::make('content')
```

## Options

| Option                      | Description                                                                                                                                                                                                                          | Usage                                           |
|-----------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------|
| `titlePlaceholder`          | Title of the placeholder.                                                                                                                                                                                                            | `->titlePlaceholder(string: 'Add title')`       |
| `bodyPlaceholder`           | Suggestive placeholder (default: 'Type / to choose a block').                                                                                                                                                                        | `->bodyPlaceholder(string: 'Body placeholder')` |
| `height`                    | Determines if the tooltip follows the user's cursor.<br>Default behaviour will follow cursor around target element.<br>`x` will follow the cursor horizontally.<br>`initial` will place the cursor at the user's cursor on trigger.  | `height(string: '')`                              |
| `minHeight`                 | Change the trigger event for the tooltip. Default behaviour is `mouseenter` and `focus`.                                                                                                                                             | `minHeight(string: '')`                                   |
| `maxHeight`                 | Hide the "arrow" on the tooltip.                                                                                                                                                                                                     | `maxHeight(string: '')`                                   |
| `disableImageEditing`       | Allow HTML inside of the tooltip.                                                                                                                                                                                                    | `disableImageEditing()`                         |
| `disableAllowWide`          | Allow the user to interact with the tooltip (prevent it from disappearing).                                                                                                                                                          | `disableAllowWide()`                            |
| `disableLaravelFilemanager` | Change the size of the invisible border (px) around the tooltip that will prevent it from hiding when the cursor leaves it.                                                                                                          | `disableLaravelFilemanager()`                   |

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
