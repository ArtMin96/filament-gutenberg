import colors from 'tailwindcss/colors'

document.addEventListener('alpine:init', () => {
    Alpine.data('gutenbergFormComponent', (config) => ({
        blockEditor: null,
        data: null,
        blocks: null,
        element: null,
        hooks: null,

        init() {
            this.$nextTick(() => {})

            const wordpress = window.Laraberg.wordpress;

            const { dispatch } = wordpress.data;
            const { parse } = wordpress.blocks;

            // Fix: Laraberg.setContent is not a function
            window.Laraberg.setContent = (input) => {
                dispatch('block-editor').setBlocks(parse(input));
            }

            window.wp = wordpress;

            const { blockEditor, blocks, data, element, hooks } = window.wp;

            this.blockEditor = blockEditor;
            this.data = data;
            this.blocks = blocks;
            this.element = element;
            this.hooks = hooks;

            this.initializeEditor();
        },

        initializeEditor() {
            let editor = this.$refs.gutenberg;

            if (editor !== null) {
                Laraberg.removeEditor(editor);
            }

            const { registeredCategories, state } = config

            if (registeredCategories.length) {
                registeredCategories.forEach((category) => {
                    this.registerCategory(category[0], category[1])
                })
            }

            const mediaUpload = ({filesList, onFileChange}) => {}

            Laraberg.init('laraberg__editor', {
                ...{mediaUpload},
                ...{
                    disabledCoreBlocks: [],
                    supportsLayout: true,
                },
                ...config,
                ...{colors: this.colorPalette()},
                ...{fontSizes: config.fontSizes},
                ...{
                    richEditingEnabled: true
                }
            });

            const { dispatch } = this.data;

            window.Laraberg.setContent('<!-- wp:paragraph --> <p>dada</p> <!-- /wp:paragraph -->');


            // console.log(Laraberg)
            //
            // console.log(state)

            // this.$watch('state', () => {
            //     console.log(this.$refs.gutenberg)
            //     if (document.activeElement === this.$refs.gutenberg) {
            //         return
            //     }
            //
            //     this.$refs.gutenberg?.editor?.setContent(state);
            // })

            // if (state) {
            //     Laraberg.setContent(state)
            // }
        },

        getContent() {
            const { data } = window.wp

            return data.select('core/editor')
                .getEditedPostContent();
        },

        colorPalette() {
            const { initializeDefaultColors, customColors } = config

            let colorPalette = {};

            if (customColors.length === 0) {
                colorPalette = this.initializeDefaultColors();
            } else {
                colorPalette = initializeDefaultColors ?
                    [...customColors, ...this.initializeDefaultColors()] :
                    customColors;
            }

            return colorPalette
        },

        initializeDefaultColors() {
            let colorPalette = [];

            for ([colorName, palette] of Object.entries(colors)) {
                if (
                    typeof palette === 'object' &&
                    !Array.isArray(palette) &&
                    palette !== null
                ) {
                    for ([paletteNum, colorHex] of Object.entries(palette)) {
                        colorPalette.push({
                            name: `${this.capitalizeFirstLetter(colorName)} ${paletteNum}`,
                            slug: `${colorName}-${paletteNum}`,
                            color: colorHex
                        })
                    }
                }
            }

            return colorPalette;
        },

        /**
         * Adds a category to the category list
         * @param {String} title - The title for the category (eg: My Category)
         * @param {String} slug - The slug for the category (eg: my-category)
         */
        registerCategory(title, slug) {
            const { dispatch, select } = this.data

            let category = {
                slug: slug,
                title: title
            }

            const currentCategories = select('core/blocks')
                .getCategories()
                .filter(item => item.slug !== category.slug)

            dispatch('core/blocks')
                .setCategories([
                    ...(currentCategories || []),
                    category
                ])
        },

        /**
         * Registers a custom block to the editor
         * @param {String} name The namespaced name of the block (eg: my-module/my-block)
         * @param {Object} block The Gutenberg block object
         */
        registerBlock(name, block) {
            const { registerBlockTypes } = this.blocks

            registerBlockTypes(name, block)
        },

        capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    }))
})
