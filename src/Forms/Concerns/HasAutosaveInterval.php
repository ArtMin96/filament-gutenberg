<?php

namespace ArtMin96\FilamentGutenberg\Forms\Concerns;

trait HasAutosaveInterval
{
    protected int $autosaveInterval = 10;

    public function autosaveInterval(int $interval): static
    {
        $this->autosaveInterval = $interval;

        return $this;
    }

    public function getAutosaveInterval(): int
    {
        return $this->autosaveInterval;
    }
}
