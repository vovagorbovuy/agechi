<?php

/**
 * Teams Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'teams' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'teams';

// Load values and assign defaults.
$title = get_field('teams_title');

?>
<section id="<?php echo esc_attr($className); ?>-1" class="<?php echo esc_attr($className); ?> section">
    <blockquote class="teams-blockquote">
        <div class="container">
            <div class="teams-title">
                <?php if($title): ?>
                    <h3><?php echo $title; ?></h3>
                <?php endif ?>
                <div class="control-panel">
                    <div class="arrow_prev_t"><svg xmlns="http://www.w3.org/2000/svg" width="21.003" height="10.01" viewBox="0 0 21.003 10.01"><path id="prev" d="M1773.567,209.686l-4.231-3.924a1.18,1.18,0,0,1-.136-.154,1.016,1.016,0,0,1-.205-.609v-.005a1.036,1.036,0,0,1,.341-.764l4.231-3.921a1.223,1.223,0,0,1,1.649,0,1.022,1.022,0,0,1,.341.76,1.036,1.036,0,0,1-.341.766l-2.239,2.077h15.857a1.086,1.086,0,1,1,0,2.166h-15.857l2.239,2.078a1.033,1.033,0,0,1,0,1.531,1.244,1.244,0,0,1-1.649,0Z" transform="translate(-1768.995 -199.988)" fill="#ccc"/></svg></div>
                    <div class="arrow_next_t"><svg xmlns="http://www.w3.org/2000/svg" width="21.004" height="10.01" viewBox="0 0 21.004 10.01"><path id="next_" data-name="next " d="M1833.784,209.686a1.031,1.031,0,0,1,0-1.531l2.239-2.078h-15.857a1.086,1.086,0,1,1,0-2.166h15.857l-2.239-2.077a1.037,1.037,0,0,1-.342-.766,1.023,1.023,0,0,1,.342-.76,1.223,1.223,0,0,1,1.649,0l4.23,3.921a1.033,1.033,0,0,1,.342.764V205a1.018,1.018,0,0,1-.223.632,1.192,1.192,0,0,1-.119.131l-4.23,3.924a1.244,1.244,0,0,1-1.649,0Z" transform="translate(-1819.001 -199.988)" fill="#f88341"/></svg></div>
                </div>
            </div>
            <div class="teams-content multiple-teams">
                <?php 
                global $post;
                $args = array( 'post_type' => 'teams', 'posts_per_page' => 10, 'order' => 'ASC' );
                $the_query = new WP_Query( $args );
                ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="teams-item col-4">
                            <?php
                            $post_vacancy = get_field( 'teams_post_vacancy', $post->ID );
                            $post_image = get_field( 'teams_post_image', $post->ID );
                            $post_text = get_field( 'teams_post_text', $post->ID );
                            $post_social_links = get_field( 'teams_post_social_links', $post->ID );
                            ?>
                            <?php if($post_image): ?>
                                <?php echo '<img src="'.esc_url($post_image['url']).'" alt="'.esc_attr($post_image['alt']).'">'; ?>
                            <?php endif; ?>
                            <?php if($post_vacancy): ?>
                                <p><?php echo $post_vacancy; ?></p>
                            <?php endif; ?>
                            <h4><?php the_title(); ?></h4>
                            <?php if($post_text): ?>
                                <p class="item-about"><?php echo $post_text; ?></p>
                            <?php endif ?>
                            <?php if($post_social_links): ?>
                                <div class="item-social-links">
                                    <?php foreach ($post_social_links as $item): ?>
                                        <?php
                                        $link = $item['link'];
                                        $svg = file_get_contents($item['img']['url']);
                                        ?>
                                        <a href="<?= $link; ?>" target="_blank"><?= $svg; ?></a>
                                    <?php endforeach ?>
                                </div>
                            <?php endif ?>
                        </div>
                    <?php endwhile ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </blockquote>
</section>