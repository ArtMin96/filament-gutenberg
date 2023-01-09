<?php

namespace ArtMin96\FilamentGutenberg\Forms\Concerns;

trait CanDisableFileManager
{
    protected bool $laravelFilemanager = true;

    public function disableLaravelFilemanager(): static
    {
        $this->laravelFilemanager = false;

        return $this;
    }

    public function getLaravelFilemanager(): bool
    {
        return $this->laravelFilemanager;
    }
}
