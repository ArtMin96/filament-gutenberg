<?php

namespace ArtMin96\FilamentGutenberg\Forms\Concerns;

trait CanDisableWelcomeGuide
{
    protected bool $welcomeGuide = true;

    public function disableWelcomeGuide(): static
    {
        $this->welcomeGuide = false;

        return $this;
    }

    public function getWelcomeGuide(): bool
    {
        return $this->welcomeGuide;
    }
}
