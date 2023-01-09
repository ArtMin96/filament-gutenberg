<?php

namespace ArtMin96\FilamentGutenberg\Forms\Concerns;

trait CanConfigureHeight
{
    protected ?string $height = '100vh';

    protected string $minHeight = '100vh';

    protected ?string $maxHeight = '';

    public function height(string $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getHeight(): ?string
    {
        return $this->height;
    }

    public function minHeight(string $height): static
    {
        $this->minHeight = $height;

        return $this;
    }

    public function getMinHeight(): string
    {
        return $this->minHeight;
    }

    public function maxHeight(string $height): static
    {
        $this->maxHeight = $height;

        return $this;
    }

    public function getMaxHeight(): ?string
    {
        return $this->maxHeight;
    }
}
