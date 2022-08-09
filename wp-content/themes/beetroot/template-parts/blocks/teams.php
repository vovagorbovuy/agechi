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
$teams = get_field('teams_rpt');

?>
<section id="<?php echo esc_attr($className); ?>" class="<?php echo esc_attr($className); ?>">
    <blockquote class="teams-blockquote">
        <div class="container">
            <div class="teams-title">
                <h3><?php echo $title; ?></h3>
                <div class="control-panel">
                    <div class="arrow_prev_t"><svg xmlns="http://www.w3.org/2000/svg" width="21.003" height="10.01" viewBox="0 0 21.003 10.01"><path id="prev" d="M1773.567,209.686l-4.231-3.924a1.18,1.18,0,0,1-.136-.154,1.016,1.016,0,0,1-.205-.609v-.005a1.036,1.036,0,0,1,.341-.764l4.231-3.921a1.223,1.223,0,0,1,1.649,0,1.022,1.022,0,0,1,.341.76,1.036,1.036,0,0,1-.341.766l-2.239,2.077h15.857a1.086,1.086,0,1,1,0,2.166h-15.857l2.239,2.078a1.033,1.033,0,0,1,0,1.531,1.244,1.244,0,0,1-1.649,0Z" transform="translate(-1768.995 -199.988)" fill="#ccc"/></svg></div>
                    <div class="arrow_next_t"><svg xmlns="http://www.w3.org/2000/svg" width="21.004" height="10.01" viewBox="0 0 21.004 10.01"><path id="next_" data-name="next " d="M1833.784,209.686a1.031,1.031,0,0,1,0-1.531l2.239-2.078h-15.857a1.086,1.086,0,1,1,0-2.166h15.857l-2.239-2.077a1.037,1.037,0,0,1-.342-.766,1.023,1.023,0,0,1,.342-.76,1.223,1.223,0,0,1,1.649,0l4.23,3.921a1.033,1.033,0,0,1,.342.764V205a1.018,1.018,0,0,1-.223.632,1.192,1.192,0,0,1-.119.131l-4.23,3.924a1.244,1.244,0,0,1-1.649,0Z" transform="translate(-1819.001 -199.988)" fill="#f88341"/></svg></div>
                </div>
            </div>
            <div class="teams-content multiple-teams">
                <?php 
                    $count = 0;
                    foreach( $teams as $item ):
                    $profession = $item['profession'];
                    $title = $item['title'];
                    $count++;
                ?>
                    <div class="teams-item col-4">
                        <?php echo '<img src="'.esc_url($item['img']['url']).'" alt="'.esc_attr($item['img']['alt']).'">'; ?>
                        <p><?php echo $profession; ?></p>
                        <h4><?php echo $title; ?></h4>
                        <?php if($count == 2 || $count == 4 || $count == 6): ?>
                            <p class="about-team"><?php pll_e('Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida risus commodos'); ?></p>
                        <?php endif ?>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </blockquote>
</section>