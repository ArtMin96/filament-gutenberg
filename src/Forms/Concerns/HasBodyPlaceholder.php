<?php

namespace ArtMin96\FilamentGutenberg\Forms\Concerns;

use Closure;

trait HasBodyPlaceholder
{
    protected null|string|Closure $bodyPlaceholder = null;

    public function bodyPlaceholder(string|Closure $body): static
    {
        $this->bodyPlaceholder = $body;

        return $this;
    }

    public function getBodyPlaceholder(): ?string
    {
        return $this->evaluate($this->bodyPlaceholder);
    }
}
