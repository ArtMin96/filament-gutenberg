<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div x-data="gutenbergFormComponent({
            state: $wire.{{ $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')') }},
            registeredCategories: @js($getRegisteredCategories()),
            welcomeGuide: @js($getWelcomeGuide()),
            sidebar: true,
            fixedToolbar: true,
            laravelFilemanager: @js($getLaravelFilemanager()),
            alignWide: @js($getAllowWide()),
            imageEditing: @js($getImageEditing()),
            supportsLayout: true,
            allowedBlockTypes: true,
            canLockBlocks: false,
            disableCustomColors: false,
            disableCustomGradients: true,
            disableCustomFontSizes: false,
            disablePostFormats: false,
            isRTL: false,
            enableCustomLineHeight: true,
            enableCustomUnits: true,
            enableCustomSpacing: true,
            codeEditingEnabled: true,
            height: @js($getHeight()),
            minHeight: @js($getMinHeight()),
            maxHeight: @js($getMaxHeight()),
            autosaveInterval: @js($getAutosaveInterval()),
            titlePlaceholder: @js($getTitlePlaceholder()),
            bodyPlaceholder: @js($getBodyPlaceholder()),
            hasPermissionsToManageWidgets: true,
            hasUploadPermissions: true,
            postLock: {
                isLocked: false
            },
            initializeDefaultColors: @js(config('filament-gutenberg.initialize_default_colors')),
            customColors: @js(config('filament-gutenberg.colors')),
            fontSizes: @js(config('filament-gutenberg.font-sizes')),
        })"
         wire:ignore
    >
        <textarea x-ref="gutenberg"
                  {{ $applyStateBindingModifiers('wire:model') }}="{{ $getStatePath() }}"
                  id="laraberg__editor"
                  class="laraberg__editor">

        </textarea>

    </div>
</x-dynamic-component>
