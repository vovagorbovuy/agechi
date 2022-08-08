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
	wp_enqueue_style( 'theme-css', get_template_directory_uri() . '/dist/css/style.min.css' );

	wp_enqueue_script('jquery', false, false, true);
	wp_register_script( 'theme-js', get_template_directory_uri() . '/dist/js/custom.min.js', array('jquery'), '1.0.0', true );
	// wp_localize_script( 'theme-js', 'snk_ajax_params', array(
	// 	'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
	// ) );
	wp_enqueue_script( 'theme-js' );
}

/* -- register acf block -- */
// add_action('acf/init', 'my_acf_init_block_types');
// function my_acf_init_block_types() {

//     if( function_exists('acf_register_block_type') ) {

//         acf_register_block_type(array(
//             'name'              => 'banner',
//             'title'             => __('Banner'),
//             'description'       => __('A custom banner block.'),
//             'render_template'   => 'template-parts/blocks/banner.php',
//             'category'          => 'design',
//             'icon'              => 'align-full-width',
//             'keywords'          => array( 'banner', 'quote' ),
//         ));
//     }
// }

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
    pll_register_string('beetroot', '©Copyright 2020. Made by moontheme');
  });


function my_custom_mime_types( $mimes ) {
 
// New allowed mime types.
$mimes['svg'] = 'image/svg+xml';
$mimes['svgz'] = 'image/svg+xml';
$mimes['doc'] = 'application/msword';
 
// Optional. Remove a mime type.
unset( $mimes['exe'] );
 
return $mimes;
}
add_filter( 'upload_mimes', 'my_custom_mime_types' );

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
add_filter( 'block_editor_rest_api_preload_paths', 'acf_filter_rest_api_preload_paths', 10, 1 );
