<div id="modalJob" class="modal modal-job">
        <div class="container">
			<div class="modal-header col-12">
				<div class="header-logo">
					<a href="<?php echo home_url(); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="101.172" height="43.255" viewBox="0 0 101.172 43.255"><g id="Group_40" data-name="Group 40" transform="translate(-80 -66)"><g id="logo"><circle id="Ellipse_1" data-name="Ellipse 1" cx="17" cy="17" r="17" transform="translate(80 66)" fill="#f88341"/><text id="Agechi" transform="matrix(1, 0, 0, 1, 80.172, 98.255)" font-size="30" font-family="Poppins-Bold, Poppins" font-weight="700" letter-spacing="-0.05em"><tspan x="0" y="0">Agechi</tspan></text></g></g></svg>
					</a>
				</div>
				<div class="close-job"><svg xmlns="http://www.w3.org/2000/svg" width="12.728" height="12.728" viewBox="0 0 12.728 12.728"><path id="close" d="M1812,89.414l-4.95,4.95-1.414-1.415,4.95-4.949-4.95-4.95,1.414-1.414,4.95,4.95,4.95-4.95,1.414,1.414-4.95,4.95,4.95,4.949-1.414,1.415Z" transform="translate(-1805.636 -81.636)"/></svg></div>
			</div>
			<div class="modal-content">
				<?php
				global $post;
				$args = array( 'post_type' => 'jobs', 'posts_per_page' => 10, 'order' => 'ASC' );
				$the_query = new WP_Query( $args );
				?>
				<div id="jobs-post" class="modal-contact-info slider-single">
					<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php
							$post_vacancy = get_field( 'jobs_post_vacancy', $post->ID );
							$post_start = get_field( 'jobs_post_start', $post->ID );
							$post_complate = get_field( 'jobs_post_complate', $post->ID );
							$post_location = get_field( 'jobs_post_location', $post->ID );
							$post_services = get_field( 'jobs_post_services', $post->ID );
							$post_description = get_field( 'jobs_post_description', $post->ID );
							$image_background = get_field( 'jobs_post_background_image', $post->ID );
							?>
							<div>
                                <?php if($image_background): ?>
                                    <div class="job-img">
                                        <?php echo '<img src="'.esc_url($image_background['url']).'" alt="'.esc_attr($image_background['alt']).'">'; ?>
                                    </div>
                                <?php endif; ?>
								<div class="job-item">
									<div class="job-content">
                                        <?php if($post_vacancy): ?>
										    <p class="job-vacancy"><?php echo $post_vacancy; ?></p>
                                        <?php endif; ?>
										<h2><?php the_title(); ?></h2>
										<div class="job-info">
                                            <div class="job-info-icon">
                                                <?php if($post_start): ?>
                                                    <p class="p-title"><?php pll_e('Start:'); ?></p>
                                                    <p><?php echo $post_start; ?></p>
                                                <?php endif; ?>
                                                <?php if($post_location): ?>
                                                    <p class="p-title"><?php pll_e('Location:'); ?></p>
                                                    <p><?php echo $post_location; ?></p>
                                                <?php endif; ?>
                                                <?php if($post_services): ?>
                                                    <p class="p-title"><?php pll_e('Services:'); ?></p>
                                                    <p><?php echo $post_services; ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <?php if($post_complate): ?>
                                                <div class="complate">
                                                    <p class="p-title"><?php pll_e('Complate:'); ?></p>
                                                    <p><?php echo $post_complate; ?></p>
                                                </div>
                                            <?php endif; ?>
										</div>
                                        <?php if($post_description): ?>
										    <p><?php echo $post_description; ?></p>
                                        <?php endif; ?>
									</div>
								</div>
							</div>
						<?php endwhile ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>
            </div>
			<div class="modal-footer">
				<p><?php pll_e('NEXT<br>PROJECT'); ?></p>
				<div class="control-panel">
					<div class="arrow_prev job_prev"><svg xmlns="http://www.w3.org/2000/svg" width="21.003" height="10.01" viewBox="0 0 21.003 10.01"><path id="prev" d="M1773.567,209.686l-4.231-3.924a1.18,1.18,0,0,1-.136-.154,1.016,1.016,0,0,1-.205-.609v-.005a1.036,1.036,0,0,1,.341-.764l4.231-3.921a1.223,1.223,0,0,1,1.649,0,1.022,1.022,0,0,1,.341.76,1.036,1.036,0,0,1-.341.766l-2.239,2.077h15.857a1.086,1.086,0,1,1,0,2.166h-15.857l2.239,2.078a1.033,1.033,0,0,1,0,1.531,1.244,1.244,0,0,1-1.649,0Z" transform="translate(-1768.995 -199.988)" fill="#ccc"/></svg></div>
					<div class="arrow_next job_next"><svg xmlns="http://www.w3.org/2000/svg" width="21.004" height="10.01" viewBox="0 0 21.004 10.01"><path id="next_" data-name="next " d="M1833.784,209.686a1.031,1.031,0,0,1,0-1.531l2.239-2.078h-15.857a1.086,1.086,0,1,1,0-2.166h15.857l-2.239-2.077a1.037,1.037,0,0,1-.342-.766,1.023,1.023,0,0,1,.342-.76,1.223,1.223,0,0,1,1.649,0l4.23,3.921a1.033,1.033,0,0,1,.342.764V205a1.018,1.018,0,0,1-.223.632,1.192,1.192,0,0,1-.119.131l-4.23,3.924a1.244,1.244,0,0,1-1.649,0Z" transform="translate(-1819.001 -199.988)" fill="#f88341"/></svg></div>
				</div>
			</div>
        </div>
    </div>