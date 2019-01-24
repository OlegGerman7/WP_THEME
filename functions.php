<?php
function true_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
}
 
add_action( 'wp_enqueue_scripts', 'true_enqueue_styles' );

function get_posts_count(){
global $wpdb;
return $post_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' and post_status = 'publish';" );
}

add_action('init', 'Dogs_Profile');
function Dogs_Profile(){
    register_post_type('Dogs_Profile', array(
        'labels'             => array(
            'name'               => 'Dogs', // Основное название типа записи
            'singular_name'      => 'Dog', // отдельное название записи типа Dog
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new dog',
            'edit_item'          => 'Edit dog',
            'new_item'           => 'New dog',
            'view_item'          => 'View dog',
            'search_items'       => 'Search dog',
            'not_found'          =>  'Dogs no found',
            'not_found_in_trash' => 'No found dogs in trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'Dogs'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'show_in_rest'       => true,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-art',
        'supports'           => array('title','custom-fields','page-attributes')
    ) );
}

add_action('init', 'Cats_Profile');
function Cats_Profile(){
    register_post_type('Cats_Profile', array(
        'labels'             => array(
            'name'               => 'Cats', // Основное название типа записи
            'singular_name'      => 'Cat', // отдельное название записи типа Cat
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new cat',
            'edit_item'          => 'Edit cat',
            'new_item'           => 'New cat',
            'view_item'          => 'View cat',
            'search_items'       => 'Search cat',
            'not_found'          =>  'Cats no found',
            'not_found_in_trash' => 'No found cats in trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'Cats'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-clipboard',
        'supports'           => array('title', 'custom-fields', 'page-attributes')
    ) );
}

?>