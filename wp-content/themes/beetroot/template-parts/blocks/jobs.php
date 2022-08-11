<?php

/**
 * Jobs Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'jobs' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'jobs';

// Load values and assign defaults.
$title = get_field('jobs_title');
$vacancy = get_field('jobs_vacancy');

?>
<section id="<?php echo esc_attr($className); ?>-1" class="<?php echo esc_attr($className); ?> section">
    <blockquote class="jobs-blockquote">
        <div class="container">
            <div class="jobs-title">
                <h3><?php echo $title; ?></h3>
                <div class="control-panel">
                    <div class="arrow_prev"><svg xmlns="http://www.w3.org/2000/svg" width="21.003" height="10.01" viewBox="0 0 21.003 10.01"><path id="prev" d="M1773.567,209.686l-4.231-3.924a1.18,1.18,0,0,1-.136-.154,1.016,1.016,0,0,1-.205-.609v-.005a1.036,1.036,0,0,1,.341-.764l4.231-3.921a1.223,1.223,0,0,1,1.649,0,1.022,1.022,0,0,1,.341.76,1.036,1.036,0,0,1-.341.766l-2.239,2.077h15.857a1.086,1.086,0,1,1,0,2.166h-15.857l2.239,2.078a1.033,1.033,0,0,1,0,1.531,1.244,1.244,0,0,1-1.649,0Z" transform="translate(-1768.995 -199.988)" fill="#ccc"/></svg></div>
                    <div class="arrow_next"><svg xmlns="http://www.w3.org/2000/svg" width="21.004" height="10.01" viewBox="0 0 21.004 10.01"><path id="next_" data-name="next " d="M1833.784,209.686a1.031,1.031,0,0,1,0-1.531l2.239-2.078h-15.857a1.086,1.086,0,1,1,0-2.166h15.857l-2.239-2.077a1.037,1.037,0,0,1-.342-.766,1.023,1.023,0,0,1,.342-.76,1.223,1.223,0,0,1,1.649,0l4.23,3.921a1.033,1.033,0,0,1,.342.764V205a1.018,1.018,0,0,1-.223.632,1.192,1.192,0,0,1-.119.131l-4.23,3.924a1.244,1.244,0,0,1-1.649,0Z" transform="translate(-1819.001 -199.988)" fill="#f88341"/></svg></div>
                </div>
            </div>
            <div class="jobs-content multiple-jobs">
                <?php
                global $post;
                $args = array( 'post_type' => 'jobs', 'posts_per_page' => 10, 'order' => 'ASC' );
                $the_query = new WP_Query( $args );
                $count = 0;
                ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="jobs-item col-4 <?php if(!($count % 2)){echo 'central-item';} ?>">
                            <?php
                            $post_vacancy = get_field( 'jobs_post_vacancy', $post->ID );
                            $post_image = get_field( 'jobs_post_image', $post->ID );
                            $count++;
                            ?>
                            <?php echo '<img src="'.esc_url($post_image['url']).'" alt="'.esc_attr($post_image['alt']).'">'; ?>
                            <p><?php echo $post_vacancy; ?></p>
                            <h4><?php the_title(); ?></h4>
                            <?php if(!($count % 2)): ?>
                                <div class="jobs-item-plus"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50"><g id="button_view_project" data-name="button view project" transform="translate(-931 -769)"><rect id="bg" width="50" height="50" rx="20" transform="translate(931 769)" fill="#fff"/><path id="view" d="M955,802v-7h-7v-2h7v-7h2v7h7v2h-7v7Z"/></g></svg></div>
                            <?php endif ?>
                        </div>
                    <?php endwhile ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </blockquote>
</section>