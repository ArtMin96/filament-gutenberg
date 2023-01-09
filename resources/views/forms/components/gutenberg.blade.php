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
        state: $wire.entangle('{{ $getStatePath() }}').defer,
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
    })">

        <textarea name="laraberg__editor" id="laraberg__editor" class="laraberg__editor" cols="30" rows="10"></textarea>

    </div>
</x-dynamic-component>
