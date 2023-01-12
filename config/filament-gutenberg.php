<?php

// config for ArtMin96/FilamentGutenberg
return [
    'tailwind_config_path' => base_path('tailwind.config.js'),

    'initialize_default_colors' => true,

    'colors' => [
        [
            'name' => 'My custom color',
            'slug' => 'traffic-purple',
            'color' => '#A03472',
        ],

        //        [
        //            'name' => 'Traffic purple',
        //            'slug' => 'amber-50',
        //            'color' => '#fffbeb'
        //        ]
    ],

    'gradients' => [],

    'font-sizes' => [
        [
            'name' => 'Xs',
            'slug' => 'xs',
            'size' => 12,
        ],
        [
            'name' => 'Sm',
            'slug' => 'sm',
            'size' => 14,
        ],
        [
            'name' => 'Base',
            'slug' => 'base',
            'size' => 16,
        ],
        [
            'name' => 'Lg',
            'slug' => 'lg',
            'size' => 18,
        ],
        [
            'name' => 'Xl',
            'slug' => 'xl',
            'size' => 20,
        ],
        [
            'name' => '2 xl',
            'slug' => '2-xl',
            'size' => 24,
        ],
        [
            'name' => '3 xl',
            'slug' => '3-xl',
            'size' => 30,
        ],
    ],

    'categories' => [
        //        ['Category name', 'value']
    ],
];
