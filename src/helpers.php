<?php

if (! function_exists('tailwind')) {
    function tailwind(?string $key = null, ?string $default = null)
    {
        if (is_null($key)) {
            return app('tailwind');
        }

        return app('tailwind')->get($key, $default);
    }
}
