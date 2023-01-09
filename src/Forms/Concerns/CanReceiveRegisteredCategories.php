<?php

namespace ArtMin96\FilamentGutenberg\Forms\Concerns;

use ArtMin96\FilamentGutenberg\FilamentGutenberg;

trait CanReceiveRegisteredCategories
{
    public function getRegisteredCategories(): array
    {
        return FilamentGutenberg::getRegisteredCategories();
    }
}
