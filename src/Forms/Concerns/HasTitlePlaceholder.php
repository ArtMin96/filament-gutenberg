<?php

namespace ArtMin96\FilamentGutenberg\Forms\Concerns;

use Closure;

trait HasTitlePlaceholder
{
    protected null|string|Closure $titlePlaceholder = null;

    public function titlePlaceholder(string|Closure $title): static
    {
        $this->titlePlaceholder = $title;

        return $this;
    }

    public function getTitlePlaceholder(): ?string
    {
        return $this->evaluate($this->titlePlaceholder);
    }
}
