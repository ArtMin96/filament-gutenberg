document.addEventListener('alpine:init', () => {
    Alpine.data('gutenbergFormComponent', (config) => ({
        init() {
            window.wp = window.Laraberg.wordpress;

            this.initializeEditor();
            // window.wp = Laraberg.wordpress;

            // const mediaUploaded = ({
            //                            filesList,
            //                            onFileChange
            //                        }) => {}

            // console.log(config)
            // // const mediaUploaded = ({
            // //      filesList,
            // //      onFileChange
            // // }) => {
            // //     setTimeout(async () => {
            // //         console.log()
            // //     }, 100)
            // // }
            //
            // Laraberg.init('laraberg__editor', {
            //     ...{},
            //     // ...{mediaUpload: mediaUploaded},
            //     ...config
            // })
            //
            // // console.log(window.wp, window.wp.data.select('core/edit-post'))
            //
            // this.toggleWelcomeGuild(config.welcomeGuide)
        },

        initializeEditor() {
            let editor = document.getElementById("laraberg__editor");

            if (editor !== null) {
                this.removeEditor();
                editor.remove();
            }

            Laraberg.init('laraberg__editor', {
                ...{},
                // ...{mediaUpload: mediaUploaded},
                ...config
            })

            this.toggleWelcomeGuild()
        },

        removeEditor() {
            try {
                const blocks = window.wp
                    .data
                    .select('core/blocks')
                    .getBlockTypes()
                    .map(function (bt) {
                        return bt.name;
                    });

                const {removeBlockTypes} = window.wp
                    .data
                    .dispatch('core/blocks');

                const {__experimentalTearDownEditor, resetBlocks} = window.wp
                    .data
                    .dispatch('core/editor');

                removeBlockTypes(blocks);
                __experimentalTearDownEditor();
                resetBlocks(parse(config.state.initialValue))
            } catch (e) {
                console.log(e)
            }

            if (((window.Laraberg || {}).editor || false) !== false) {
                window.wp
                    .element
                    .unmountComponentAtNode(window.Laraberg.editor);
            }

            window.Laraberg.editor = undefined;
        },

        registerCategories() {
            window.Laraberg.registerCategories('Name', 'value');
        },

        toggleWelcomeGuild() {
            // const {toggleFeatures} = window.wp.data.dispatch('core/edit-post');
            // const {isFeatureActive} = window.wp.data.select('core/edit-post');
            //
            // config.welcomeGuide
            //     && isFeatureActive('welcomeGuild')
            //     && toggleFeatures('welcomeGuide')
        }

        // mediaUpload() {
        //     ret
        // }
    }))
})

// Laraberg.init('filament_gutenberg', {
//     alignWide: true,
//     imageEditing: true,
//     canLockBlocks: false,
//     disableCustomColors: false,
//     disableCustomGradients: true,
//     disableCustomFontSizes: false,
//     enableCustomLineHeight: true,
//     enableCustomUnits: true,
//     enableCustomSpacing: true,
//     codeEditingEnabled: true,
// });
