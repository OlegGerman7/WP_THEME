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

?>