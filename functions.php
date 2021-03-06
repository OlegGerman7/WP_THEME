<?php
    function true_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
}


add_action( 'wp_enqueue_scripts', 'true_enqueue_styles' );

function get_posts_count(){
    global $wpdb;
    return $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts 
                          WHERE post_type = 'post' and post_status = 'publish';" );
}

add_action('init', 'Dogs_Profile');
function Dogs_Profile(){
    register_post_type('Dogs_Profile', array(
        'labels'             => array(
            'name'               => 'Dogs',
            'singular_name'      => 'Dog',
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
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-art',
        'supports'           => array('title','custom-fields','page-attributes')
    ) );
}

add_action('init', 'Cats_Profile');
function Cats_Profile(){
    register_post_type('Cats_Profile', array(
        'labels'             => array(
            'name'               => 'Cats',
            'singular_name'      => 'Cat',
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

add_action('init', 'create_taxonomy');
function create_taxonomy(){
    register_taxonomy('taxonomy', array('dogs_profile'), array(
        'labels'                => array(
            'name'              => 'breed',
            'singular_name'     => 'breed',
            'search_items'      => 'Search breed',
            'all_items'         => 'All breeds',
            'view_item '        => 'View breed',
            'parent_item'       => 'Parent breed',
            'parent_item_colon' => 'Parent breed:',
            'edit_item'         => 'Edit breed',
            'update_item'       => 'Update breed',
            'add_new_item'      => 'Add New breed',
            'new_item_name'     => 'New breed Name',
            'menu_name'         => 'breed',
        ),
        'public'                => true,
        'hierarchical'          => false,
        'rewrite'               => true,
    ) );
}

register_sidebar( array(
    'name'          => __( 'Data Sidebar', 'twentyseventeen' ),
    'id'            => 'sidebar-4',
    'description'   => __( 'Add widgets here to appear in your sidebar on data pages.', 'twentyseventeen' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
) );

add_filter( 'excerpt_length', function(){
    return 29;
} );

add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ){
    global $post;
    return '<a href="'. get_permalink($post) . '"> ...</a>';
}
