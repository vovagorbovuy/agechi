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
	// wp_enqueue_script( 'theme-js' );
}

/* -- register menus -- */
register_nav_menus( array(
	'main_menu' => 'Main Navigation',
) );
