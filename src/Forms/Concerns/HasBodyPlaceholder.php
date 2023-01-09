<?php

namespace ArtMin96\FilamentGutenberg\Forms\Concerns;

trait HasBodyPlaceholder
{
    protected ?string $bodyPlaceholder = null;

    public function bodyPlaceholder(string $body): static
    {
        $this->bodyPlaceholder = $body;

        return $this;
    }

    public function getBodyPlaceholder(): ?string
    {
        return $this->bodyPlaceholder;
    }
}
