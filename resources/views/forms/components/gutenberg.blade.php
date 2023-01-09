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
            postLock: {
                isLocked: false
            },
            initializeDefaultColors: @js(config('filament-gutenberg.initialize_default_colors')),
            customColors: @js(config('filament-gutenberg.colors'))
        }), {state: null}"
         x-on:input.change="console.log(state, 'sec', {{ $getStatePath() }})"
{{--         x-on:input.change="state = $event.target.value"--}}
         wire:ignore
    >
        <textarea x-data="console.log({{ $getStatePath() }})" x-ref="gutenberg"
                  x-on:change="state = $event.target.value"
                  {{ $applyStateBindingModifiers('wire:model') }}="laraberg__editor"
                  id="laraberg__editor"
                  class="laraberg__editor"
                  hidden>
            <!-- wp:heading -->
            <h2>Test Heading</h2>
            <!-- /wp:heading -->
        </textarea>

    </div>
</x-dynamic-component>
