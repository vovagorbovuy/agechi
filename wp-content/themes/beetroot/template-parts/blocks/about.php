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
$partners_rpt = get_field('about_partners_rpt');
$solutions_title = get_field('about_solutions_title');
$solutions_items = get_field('about_solutions_items');

?>
<section id="<?php echo esc_attr($className); ?>" class="<?php echo esc_attr($className); ?>">
    <blockquote class="about-blockquote">
        <img class="blurball" src="<?= get_template_directory_uri(); ?>/assets/img/blurball.png" alt="blurball.png" />
        <img class="green-line" src="<?= get_template_directory_uri(); ?>/assets/img/green-line.png" alt="green-line.png" />
        <img class="line-green-ball" src="<?= get_template_directory_uri(); ?>/assets/img/line-green-ball.png" alt="line-green-ball.png" />
        <div class="container">
            <div class="about-content">
                <div class="col-2">
                    <h4><?php echo $title; ?></h4>
                </div>
                <div class="col-5 description">
                    <h2><?php echo $subtitle; ?></h2>
                    <?php echo $text; ?>
                    <div class="partners">
                        <p><?php echo $partners; ?></p>
                        <div class="partners-items">
                            <?php 
                                foreach( $partners_rpt as $item ):
                            ?>
                                <div class="partners-item">
                                    <?php echo '<img src="'.esc_url($item['img']['url']).'" alt="'.esc_attr($item['img']['alt']).'">'; ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class="solutions col-5">
                    <h4><?php echo $solutions_title; ?></h4>
                    <div class="solutions-items">
                        <?php 
                            foreach( $solutions_items as $item ):
                            $text = $item['img'];
                            $title = $item['title'];
                        ?>
                            <div class="solutions-item">
                                <?php echo '<img src="'.esc_url($item['img']['url']).'" alt="'.esc_attr($item['img']['alt']).'">'; ?>
                                <p><?php echo $title; ?></p>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </blockquote>
</section>