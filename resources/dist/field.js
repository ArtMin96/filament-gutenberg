document.addEventListener('alpine:init', () => {
    Alpine.data('gutenbergFormComponent', (config) => ({
        data: null,
        blocks: null,
        element: null,
        hooks: null,

        init() {
            window.wp = window.Laraberg.wordpress;

            const { blocks, data, element, hooks } = window.wp;

            this.data = data;
            this.blocks = blocks;
            this.element = element;
            this.hooks = hooks;

            this.initializeEditor();
        },

        initializeEditor() {
            const { registeredCategories } = config;

            let editor = document.getElementById("laraberg__editor");

            // if (editor !== null) {
            //     this.removeEditor();
            //     editor.remove();
            // }

            registeredCategories.forEach((category) => {
                this.registerCategory(category[0], category[1])
            })

            const mediaUpload = ({filesList, onFileChange}) => {}

            Laraberg.init('laraberg__editor', {
                ...{},
                ...{mediaUpload},
                ...config,
                ...{
                    disabledCoreBlocks: [],
                    sidebar: true
                }
            })

            // this.toggleWelcomeGuild()
        },

        removeEditor() {
            try {
                const blocks = this.data
                    .select('core/blocks')
                    .getBlockTypes()
                    .map(function (bt) {
                        return bt.name;
                    });

                const {removeBlockTypes} = this.data.dispatch('core/blocks');

                const {__experimentalTearDownEditor, resetBlocks} = this.data.dispatch('core/editor');

                removeBlockTypes(blocks);
                __experimentalTearDownEditor();
                resetBlocks(parse(config.state.initialValue))
            } catch (e) {
                console.log(e)
            }

            if (((window.Laraberg || {}).editor || false) !== false) {
                this.element
                    .unmountComponentAtNode(window.Laraberg.editor);
            }

            window.Laraberg.editor = undefined;
        },

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

        toggleWelcomeGuild() {
            const {toggleFeatures} = this.data.dispatch('core/edit-post');
            const {isFeatureActive} = this.data.select('core/edit-post');

            config.welcomeGuide
                && isFeatureActive('welcomeGuild')
                && toggleFeatures('welcomeGuide')
        }
    }))

    // function registerCategories(categories) {
    //
    //     return categories;
    //
    //     // this.hooks.addFilter('block_categories_all', (categories) => {
    //     //     console.log(categories)
    //     //     // categories.push({'slug': 'name', 'title': 'name'})
    //     //     //
    //     //     // return categories;
    //     //     // return {
    //     //     //     ...categories,
    //     //     //     ...{
    //     //     //         'slug': 'Name 1',
    //     //     //         'title': 'name1'
    //     //     //     }
    //     //     // };
    //     // }, 10, 2)
    //     //
    //     // registeredCategories.forEach((category) => {
    //     //     window.wp.registerCategories(category[0], category[1]);
    //     // })
    // }
})
