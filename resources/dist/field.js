import resolveConfig from "tailwindcss/resolveConfig";

document.addEventListener('alpine:init', () => {
    Alpine.data('gutenbergFormComponent', (config) => ({
        blockEditor: null,
        data: null,
        blocks: null,
        element: null,
        hooks: null,

        init() {
            this.$nextTick(() => {})

            window.wp = window.Laraberg.wordpress;

            const { blockEditor, blocks, data, element, hooks } = window.wp;

            this.blockEditor = blockEditor;
            this.data = data;
            this.blocks = blocks;
            this.element = element;
            this.hooks = hooks;

            this.initializeEditor();
        },

        initializeEditor() {
            let editor = document.getElementById('laraberg__editor');

            if (editor !== null) {
                Laraberg.removeEditor(editor);
            }

            const { registeredCategories, state, colors } = config

            registeredCategories.forEach((category) => {
                this.registerCategory(category[0], category[1])
            })

            const mediaUpload = ({filesList, onFileChange}) => {}

            Laraberg.init('laraberg__editor', {
                ...{mediaUpload},
                ...config,
                ...{
                    colors: colors
                }
            })

            console.log(Laraberg)

            console.log(state)

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
                .setCategories([ category, ...currentCategories ])
        },

        /**
         * Registers a custom block to the editor
         * @param {String} name The namespaced name of the block (eg: my-module/my-block)
         * @param {Object} block The Gutenberg block object
         */
        registerBlock(name, block) {
            const { registerBlockTypes } = this.blocks

            registerBlockTypes(name, block)
        }
    }))
})
