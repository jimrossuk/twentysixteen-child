<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
//add_filter ('the_title', 'filter_example');


function filter_example($title) {
	return 'Hooked: '.$title;
}

//adding a custom post types ---CPT
function create_custom_post_type_retreat(){
	$labels = array(
        'name' => 'Retreats',
        'singular_name' => 'Retreats',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Retreat',
        'edit_item' => 'Edit Retreat',
        'new_item' => 'New Retreat',
        'view_item' => 'View Retreat',
        'search_items' => 'Search Retreats',
        'not_found' => 'No Retreats found in Trash',
        'parent_item_colon' => '', 
    );
	$args = array(
		'label' => __('Events'),
		'labels' => $labels, // from array above
		'public' => true,
		'can_export' => true,
		'show_ui' => true,
		'_builtin' => false,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-calendar', // from this list
		'hierarchical' => false,
		'rewrite' => array( "slug" => "events" ), // defines URL base
		'supports'=> array('title', 'thumbnail', 'editor', 'excerpt'),
		'show_in_nav_menus' => true,
		'taxonomies' => array( 'event_category', 'post_tag') // own categories
	);
	register_post_type('retreat', $args); // used as intern
}
add_action('init', 'create_custom_post_type_retreat' );
