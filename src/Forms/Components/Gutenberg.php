<?php

namespace ArtMin96\FilamentGutenberg\Forms\Components;

use ArtMin96\FilamentGutenberg\Forms\Concerns\CanAllowImageEditing;
use ArtMin96\FilamentGutenberg\Forms\Concerns\CanConfigureHeight;
use ArtMin96\FilamentGutenberg\Forms\Concerns\CanDisableAllowWide;
use ArtMin96\FilamentGutenberg\Forms\Concerns\CanDisableFileManager;
use ArtMin96\FilamentGutenberg\Forms\Concerns\CanDisableWelcomeGuide;
use ArtMin96\FilamentGutenberg\Forms\Concerns\CanReceiveRegisteredCategories;
use ArtMin96\FilamentGutenberg\Forms\Concerns\HasAutosaveInterval;
use ArtMin96\FilamentGutenberg\Forms\Concerns\HasBodyPlaceholder;
use ArtMin96\FilamentGutenberg\Forms\Concerns\HasTitlePlaceholder;
use Filament\Forms\Components\Field;

class Gutenberg extends Field
{
    use CanReceiveRegisteredCategories;
    use HasTitlePlaceholder;
    use HasBodyPlaceholder;
    use HasAutosaveInterval;
    use CanConfigureHeight;
    use CanAllowImageEditing;
    use CanDisableAllowWide;
    use CanDisableFileManager;
    use CanDisableWelcomeGuide;

    protected string $view = 'filament-gutenberg::forms.components.gutenberg';
}
