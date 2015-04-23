<?php

add_action('init', function () {
    $labels = [
            'name' => __('post.type.name.slider', 'components'),
            'singular_name' => __('post.type.name.slider.singular', 'components'),
    ];

    $args = [
            'labels' => $labels,
            'public' => false,
            'show_ui' => true,
            'has_archive' => false,
            'show_in_menu' => true,
            'exclude_from_search' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => ['slug' => 'slider', 'with_front' => true],
            'query_var' => true,
            'supports' => ['title', 'revisions', 'page-attributes'],
            'menu_icon' => 'dashicons-images-alt2'
    ];

    register_post_type('slider', $args);
});