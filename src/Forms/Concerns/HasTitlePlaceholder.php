<?php

namespace ArtMin96\FilamentGutenberg\Forms\Concerns;

trait HasTitlePlaceholder
{
    protected ?string $titlePlaceholder = null;

    public function titlePlaceholder(string $title): static
    {
        $this->titlePlaceholder = $title;

        return $this;
    }

    public function getTitlePlaceholder(): ?string
    {
        return $this->titlePlaceholder;
    }
}
