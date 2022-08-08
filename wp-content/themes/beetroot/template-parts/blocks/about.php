<?php

/**
 * About Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'about' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'about';

// Load values and assign defaults.
$title = get_field('about_title');
$subtitle = get_field('about_subtitle');
$text = get_field('about_text');
$partners = get_field('about_partners');

?>
<section id="<?php echo esc_attr($className); ?>" class="<?php echo esc_attr($className); ?>">
    <blockquote class="about-blockquote">
        <div class="container">
            <div class="about-content">
                <div class="col-2">
                    <h4><?php echo $title; ?></h4>
                </div>
                <div class="col-4">
                    <h3><?php echo $subtitle; ?></h3>
                    <?php echo $text; ?>
                    <div class="partners">
                        <p><?php echo $partners; ?></p>
                    </div>
                </div>
                <div class="col-6">

                </div>
            </div>
        </div>
    </blockquote>
</section>