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
function create_custom_post_type_casestudy(){
	$labels = array(
		'name' => 'Case Studies',
		'singular_name' => 'Case Study',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Case',
		'edit_item' => 'Edit Case',
		'new_item' => 'New Case',
		'view_item' => 'View Case',
		'search_items' => 'Search Case Studies',
		'not_found' => 'No events found',
		'not_found_in_trash' => 'No events found in Trash',
		'parent_item_colon' => '',
	);
	$args = array(
		'label' => __('Case Study'),
		'labels' => $labels, // from array above
		'public' => true,
		'can_export' => true,
		'show_ui' => true,
		'_builtin' => false,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-calendar', // from this list
		'hierarchical' => false,
		'rewrite' => array( "slug" => "case_study" ), // defines URL base
		'supports'=> array('title', 'thumbnail', 'editor', 'excerpt'),
		'show_in_nav_menus' => true,
		'taxonomies' => array( 'event_category', 'post_tag') // own categories
	);


	register_post_type('case_study', $args); // used as internal identifier
}

add_action('init','create_custom_post_type_casestudy'); // define event custom post type




