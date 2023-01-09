<?php

namespace ArtMin96\FilamentGutenberg\Forms\Concerns;

trait CanAllowImageEditing
{
    protected bool $imageEditing = true;

    public function disableImageEditing(): static
    {
        $this->imageEditing = false;

        return $this;
    }

    public function getImageEditing(): bool
    {
        return $this->imageEditing;
    }
}
