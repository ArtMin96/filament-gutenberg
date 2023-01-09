<?php

namespace ArtMin96\FilamentGutenberg;

class FilamentGutenberg
{
    protected static array $registeredCategories;

    public static function registerCategories(...$categories): void
    {
        static::$registeredCategories = $categories;
    }

    public static function getRegisteredCategories(): array
    {
        return static::$registeredCategories;
    }
}
