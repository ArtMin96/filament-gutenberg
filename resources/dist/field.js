document.addEventListener('alpine:init', () => {
    Alpine.data('gutenbergFormComponent', (config) => ({
        blockEditor: null,
        data: null,
        blocks: null,
        element: null,
        hooks: null,

        init() {
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
            const { dispatch, select } = this.data
            const { registeredCategories } = config

            registeredCategories.forEach((category) => {
                this.registerCategory(category[0], category[1])
            })

            const mediaUpload = ({filesList, onFileChange}) => {}

            Laraberg.init('laraberg__editor', {
                ...{mediaUpload},
                ...config,
            })
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
