<?php

namespace ArtMin96\FilamentGutenberg\Forms\Concerns;

use Closure;

trait HasAutosaveInterval
{
    protected null|int|Closure $autosaveInterval = 10;

    public function autosaveInterval(int|Closure $interval): static
    {
        $this->autosaveInterval = $interval;

        return $this;
    }

    public function getAutosaveInterval(): int
    {
        return $this->evaluate($this->autosaveInterval);
    }
}
