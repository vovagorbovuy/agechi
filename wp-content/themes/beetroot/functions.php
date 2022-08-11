<?php
/**
 * Beetroot functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Beetroot
 */

/* -- register scripts and styling -- */
add_action( 'wp_enqueue_scripts', 'beetroot_enqueue_scripts' );
function beetroot_enqueue_scripts() {
	wp_enqueue_style( 'fullpage', get_template_directory_uri() . '/dist//vendor/css/jquery.fullpage.min.css' );
	wp_enqueue_style( 'fullpage-map', get_template_directory_uri() . '/dist//vendor/css/jquery.fullpage.min.css.map' );
	wp_enqueue_style( 'theme-css', get_template_directory_uri() . '/dist/css/style.min.css' );

	wp_enqueue_script('jquery', false, false, true);
	wp_register_script( 'slick', get_template_directory_uri() . '/dist/vendor/js/slick.min.js', array('jquery'), '1.0.0', true );
	wp_register_script( 'fullpage', get_template_directory_uri() . '/dist/vendor/js/jquery.fullpage.min.js', array('slick'), '1.0.0', true );
	wp_register_script( 'theme-js', get_template_directory_uri() . '/dist/js/custom.min.js', array('fullpage'), '1.0.0', true );
	wp_enqueue_script( 'theme-js' );
}

/* -- register menus -- */
register_nav_menus( array(
	'main_menu' => 'Main Navigation',
) );

/* -- theme -- */
include_once('includes/theme/template-helpers.php');
include_once('includes/theme/acf-helpers.php'); //register acf block


/* -- translation template (polylang-pro) -- */
add_action('init', function() {
	pll_register_string('beetroot', 'Get in touch');
    pll_register_string('beetroot', 'Email:');
	pll_register_string('beetroot', 'Stay connected With Us');
    pll_register_string('beetroot', '©Copyright 2020. Made by moontheme');
	pll_register_string('beetroot', 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida risus commodos');
  });

// New allowed mime types.
add_filter( 'upload_mimes', 'my_custom_mime_types' );
function my_custom_mime_types( $mimes ) {
$mimes['svg'] = 'image/svg+xml';
$mimes['svgz'] = 'image/svg+xml';
$mimes['doc'] = 'application/msword';
unset( $mimes['exe'] );
return $mimes;
}

//ACF bug fix (blocks)
add_filter( 'block_editor_rest_api_preload_paths', 'acf_filter_rest_api_preload_paths', 10, 1 );
function acf_filter_rest_api_preload_paths( $preload_paths ) {
	global $post;
	$rest_path    = rest_get_route_for_post( $post );
	$remove_paths = array(
		add_query_arg( 'context', 'edit', $rest_path ),
		sprintf( '%s/autosaves?context=edit', $rest_path ),
	);

	return array_filter(
		$preload_paths,
		function( $url ) use ( $remove_paths ) {
			return ! in_array( $url, $remove_paths, true );
		}
	);
}

add_filter( 'nav_menu_link_attributes', 'add_data_atts_to_nav', 10, 4 );
    function add_data_atts_to_nav( $atts, $item, $args ) {
    $atts['data-menuanchor'] = strtolower(str_replace("#","",$item->url));
    return $atts;
}

// function beetroot_custom_post_type() {
//     register_post_type('beetroot_jobs',
//         array(
//             'labels'      => array(
//                 'name'          => __('jobs', 'textdomain'),
//                 'singular_name' => __('Job', 'textdomain'),
//             ),
//                 'public'      => true,
//                 'has_archive' => true,
// 				'menu_icon'           => 'dashicons-nametag',
//         )
//     );
// }
// add_action('init', 'beetroot_custom_post_type');


function beetroot_register_post_types() {
	/**
	 * Post Type: Jobs.
	 */

	$labels = [
		"name" => __( "Jobs", "beetroot" ),
		"singular_name" => __( "Vacancies", "beetroot" ),
	];

	$args = [
		"label" => __( "Jobs", "beetroot" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",

		"has_archive" => false,
		'menu_icon' => 'dashicons-nametag',
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "jobs", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "thumbnail" ],
	];

	register_post_type( "jobs", $args );
}

add_action( 'init', 'beetroot_register_post_types' );