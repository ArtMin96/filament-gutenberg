<?php

namespace ArtMin96\FilamentGutenberg\Forms\Concerns;

trait CanDisableAllowWide
{
    protected bool $allowWide = true;

    public function disableAllowWide(): static
    {
        $this->allowWide = false;

        return $this;
    }

    public function getAllowWide(): bool
    {
        return $this->allowWide;
    }
}
