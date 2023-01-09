<?php

namespace ArtMin96\FilamentGutenberg;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use VanOns\Laraberg\Laraberg;

class FilamentGutenbergServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-gutenberg';

    protected array $resources = [
        // CustomResource::class,
    ];

    protected array $pages = [
        // CustomPage::class,
    ];

    protected array $widgets = [
        // CustomWidget::class,
    ];

    protected function getStyles(): array
    {
        parent::getStyles();

        return [
            'filament-gutenberg' => asset('vendor/laraberg/css/laraberg.css'),
            'plugin-filament-gutenberg-style' => __DIR__.'/../resources/dist/filament-gutenberg.css',
        ];
    }

    protected function getScripts(): array
    {
        parent::getScripts();

        return [
            //            'plugin-filament-gutenberg-react' => 'https://unpkg.com/react@17.0.2/umd/react.production.min.js',
            //            'plugin-filament-gutenberg-react-dom' => 'https://unpkg.com/react-dom@17.0.2/umd/react-dom.production.min.js',
            //            'plugin-filament-gutenberg-moment' => 'https://unpkg.com/moment@2.24.0/min/moment.min.js',
            //            'plugin-filament-gutenberg-jquery' => 'https://code.jquery.com/jquery-3.6.0.min.js',
            //            'filament-gutenberg' => asset('vendor/laraberg/js/laraberg.js'),
            //            'plugin-filament-gutenberg' => __DIR__.'/../resources/dist/component.js',
        ];
    }

    protected function getBeforeCoreScripts(): array
    {
        parent::getBeforeCoreScripts();

        return [
            'plugin-filament-gutenberg-react' => 'https://unpkg.com/react@17.0.2/umd/react.production.min.js',
            'plugin-filament-gutenberg-react-dom' => 'https://unpkg.com/react-dom@17.0.2/umd/react-dom.production.min.js',
            'plugin-filament-gutenberg-moment' => 'https://unpkg.com/moment@2.24.0/min/moment.min.js',
            'plugin-filament-gutenberg-jquery' => 'https://code.jquery.com/jquery-3.6.0.min.js',
            //            'filament-gutenberg' => __DIR__.'/../resources/dist/laraberg.js',
            'filament-gutenberg' => asset('vendor/laraberg/js/laraberg.js'),
            'filament-gutenberg-file-manager' => __DIR__.'/../resources/dist/laravel-filemanager/index.js',
            'plugin-filament-gutenberg' => __DIR__.'/../resources/dist/field.js',
            //            'plugin-filament-gutenberg' => __DIR__.'/../resources/dist/filament-gutenberg.js',
        ];
    }

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasConfigFile()
            ->hasRoute('web')
            ->hasAssets()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        parent::packageBooted();

        Laraberg::registerBlockType('example/example-block', [], function ($attributes, $content) {
            return "<div style='background-color: black; color: white; padding: 1rem'>{$content}<p>Dynamic block</p></div>";
        });

        Laraberg::registerBlockType(
            'first-block-namespace/first-block',
            [],
            function ($attributes, $content) {
                return view('blocks.first-block', compact('attributes', 'content'));
            }
        );

        FilamentGutenberg::registerCategories(
            ['Name', 'value'],
            ['Name 2', 'value2'],
        );
    }

    public function register(): void
    {
        parent::register();

        $this->mergeConfigFrom(base_path('vendor/van-ons/laraberg/config/laraberg.php'), 'laraberg');
    }
}
