<?php

// acf options page
if( function_exists('acf_add_options_page') ) {
 	// add parent
	$parent = acf_add_options_page(array(
		'page_title'	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug'		=> 'theme-general-settings',
		'icon_url'		=> 'dashicons-info',
		'redirect'		=> true
	));

		// add sub page
	acf_add_options_sub_page(array(
		'page_title'	=> 'General settings',
		'menu_title'	=> 'General',
		'parent_slug'	=> $parent['menu_slug'],
	));

}


//  create new category for ACF blocks
add_filter( 'block_categories', 'beetroot_acf_block_categories', 10, 2 );
function beetroot_acf_block_categories( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'acf-blocks',
				'title' => __( 'ACF blocks', 'beetroot' ),
				'icon'  => 'vault',
			),
		)
	);
}


/* Register ACF blocks for gutenberg
* https://www.advancedcustomfields.com/resources/blocks/
* https://www.advancedcustomfields.com/resources/acf_register_block_type/
*/
if( function_exists('acf_register_block_type') ) {
	add_action('acf/init', 'beetroot_register_acf_block_types');
}

function beetroot_register_acf_block_types() {
	$theme_url = get_stylesheet_directory_uri();
	$thumb_url = $theme_url.'/assets/img/partials/';
	$assets_url = $theme_url.'/assets/public/partials/';

	$blocks = array(
		array(
			'name'						=> ($name = 'home'),
			'title'						=> __('Home', 'beetroot'),
			'description'			=> __('Home Block Template.','beetroot'),
			'category'				=> 'acf-blocks',
			'icon'						=> 'admin-home',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			'render_callback' => 'beetroot_render_block_thumbnail',
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'is_example' => true, 
						'thumb' => $thumb_url.$name.'.png'
					],
				]
			],
			// 'enqueue_assets' => function() use($name, $assets_url) {
			// 	wp_enqueue_style( $name, $assets_url.$name.'.css', array(),'', false);
			// 	wp_enqueue_script( $name, $assets_url.$name.'.js', array(),'',true);
			// },
			// 'post_types'			=> array('post', 'page'),
		),
		array(
			'name'						=> ($name = 'about'),
			'title'						=> __('About', 'beetroot'),
			'description'			=> __('About Block Template.','beetroot'),
			'category'				=> 'acf-blocks',
			'icon'						=> 'align-left',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			'render_callback' => 'beetroot_render_block_thumbnail',
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'is_example' => true, 
						'thumb' => $thumb_url.$name.'.png'
					],
				]
			],
			// 'enqueue_assets' => function() use($name, $assets_url) {
			// 	wp_enqueue_style( $name, $assets_url.$name.'.css', array(),'', false);
			// 	wp_enqueue_script( $name, $assets_url.$name.'.js', array(),'',true);
			// },
			// 'post_types'			=> array('post', 'page'),
		),
		array(
			'name'						=> ($name = 'jobs'),
			'title'						=> __('Jobs', 'beetroot'),
			'description'			=> __('Jeams Block Template.','beetroot'),
			'category'				=> 'acf-blocks',
			'icon'						=> 'nametag',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			'render_callback' => 'beetroot_render_block_thumbnail',
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'is_example' => true, 
						'thumb' => $thumb_url.$name.'.png'
					],
				]
			],
			// 'enqueue_assets' => function() use($name, $assets_url) {
			// 	wp_enqueue_style( $name, $assets_url.$name.'.css', array(),'', false);
			// 	wp_enqueue_script( $name, $assets_url.$name.'.js', array(),'',true);
			// },
			// 'post_types'			=> array('post', 'page'),
		),
		array(
			'name'						=> ($name = 'teams'),
			'title'						=> __('Teams', 'beetroot'),
			'description'			=> __('Teams Block Template.','beetroot'),
			'category'				=> 'acf-blocks',
			'icon'						=> 'groups',
			'mode'						=> 'preview',
			'supports'				=> array( 'align' => false ),
			'render_callback' => 'beetroot_render_block_thumbnail',
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'is_example' => true, 
						'thumb' => $thumb_url.$name.'.png'
					],
				]
			],
			// 'enqueue_assets' => function() use($name, $assets_url) {
			// 	wp_enqueue_style( $name, $assets_url.$name.'.css', array(),'', false);
			// 	wp_enqueue_script( $name, $assets_url.$name.'.js', array(),'',true);
			// },
			// 'post_types'			=> array('post', 'page'),
		),
	);

	foreach ($blocks as $block) {
		acf_register_block($block);
	}
}


function beetroot_render_block_thumbnail ($block, $content = '', $is_preview = false, $post_id = 0) {
	if ($is_preview && isset($block['data']['thumb'])) {
		$img = $block['data']['thumb'];
		echo '<img src="'.$img.'">';
	} else {
		$slug = str_replace('acf/', '', $block['name']);
		include( get_theme_file_path("template-parts/blocks/".$slug.".php") );
	}
}