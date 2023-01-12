<?php

namespace ArtMin96\FilamentGutenberg;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class Tailwind
{
    protected array $config;

    protected array $tailwindValues;

    public function __construct(array $config)
    {
        $this->config = $config;

        $config = Cache::get('tailwind_config');

        if ($config === null) {
            $configFile = File::get($this->config('tailwind_config_path'));

            // Somehow parse values

            Cache::put('tailwind_config', $configFile, now()->addMinutes(60));
        }

        $this->tailwindValues = [];
    }

    public function get(?string $key = null, ?string $default = null)
    {
        return Arr::get($this->tailwindValues, $key, $default);
    }

    public function config(string $key, ?string $default = null)
    {
        return Arr::get($this->config, $key, $default);
    }
}
