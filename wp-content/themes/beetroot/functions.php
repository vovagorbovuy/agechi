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
	wp_register_script( 'slick', get_template_directory_uri() . '/dist/vendor/js/slick.min.js', array('jquery'), '1.0.0', true );
	wp_register_script( 'theme-js', get_template_directory_uri() . '/dist/js/custom.min.js', array('slick'), '1.0.0', true );
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
