<?php

/**
 * Home Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'home' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'home';

// Load values and assign defaults.
$title = get_field('home-title');
$subtitle = get_field('home-subtitle');

?>
<section id="<?php echo esc_attr($className); ?>-1" class="<?php echo esc_attr($className); ?> section">
    <blockquote class="home-blockquote">
        <div class="container">
            <div class="home-content">
                <img class="snake" src="<?= get_template_directory_uri(); ?>/assets/img/snake.png" alt="snake.png" />
                <img class="yellowball" src="<?= get_template_directory_uri(); ?>/assets/img/yellowball.png" alt="yellowball.png" />
                <h1><?php echo $title; ?></h1>
                <img class="blurball" src="<?= get_template_directory_uri(); ?>/assets/img/blurball.png" alt="blurball.png" />
                <p><?php echo $subtitle; ?></p>
                <img class="figures" src="<?= get_template_directory_uri(); ?>/assets/img/figures.png" alt="figures.png" />
            </div>
        </div>
    </blockquote>
</section>