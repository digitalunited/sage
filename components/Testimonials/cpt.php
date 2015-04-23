<?php

add_action('init', function () {
    $args = [
            'labels' => [
                    'name' => __('post.type.testimonials.label', 'components'),
                    'singular_name' => __('post.type.testimonial.label.singular', 'components'),
            ],
            'public' => false,
            'show_ui' => true,
            'has_archive' => false,
            'show_in_menu' => true,
            'exclude_from_search' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => [
                    'slug' => 'testimonial',
                    'with_front' => true
            ],
            'query_var' => true,
            'supports' => [
                    'title', 'revisions'
            ],
            'menu_icon' => 'dashicons-id-alt'
    ];

    register_post_type('testimonial', $args);
});