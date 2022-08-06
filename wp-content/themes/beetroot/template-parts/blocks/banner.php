<?php

/**
 * Banner Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'banner' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'banner';

// Load values and assign defaults.
$title = get_field('banner-title') ?: 'Your banner here...';
$subtitle = get_field('banner-subtitle') ?: 'Your banner here...';

?>
<section id="<?php echo esc_attr($className); ?>" class="<?php echo esc_attr($className); ?>">
    <blockquote class="banner-blockquote">
        <div class="banner-content">
            <h1><?php echo $title; ?></h1>
            <p><?php echo $subtitle; ?></p>
        </div>
    </blockquote>
</section>