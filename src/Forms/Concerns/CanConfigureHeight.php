<?php

namespace ArtMin96\FilamentGutenberg\Forms\Concerns;

use Closure;

trait CanConfigureHeight
{
    protected null|string|Closure $height = '100vh';

    protected null|string|Closure $minHeight = '100vh';

    protected null|string|Closure $maxHeight = '';

    public function height(string|Closure $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getHeight(): ?string
    {
        return $this->evaluate($this->height);
    }

    public function minHeight(string|Closure $height): static
    {
        $this->minHeight = $height;

        return $this;
    }

    public function getMinHeight(): ?string
    {
        return $this->evaluate($this->minHeight);
    }

    public function maxHeight(string|Closure $height): static
    {
        $this->maxHeight = $height;

        return $this;
    }

    public function getMaxHeight(): ?string
    {
        return $this->evaluate($this->maxHeight);
    }
}
