<div id="modalTouch" class="modal modal-touch">
		<img class="green-lines" src="<?= get_template_directory_uri(); ?>/assets/img/green-lines.png" alt="green-lines.png" />
		<img class="yellow-red-ball" src="<?= get_template_directory_uri(); ?>/assets/img/yellow-red-ball.png" alt="yellow-red-ball.png" />
		<img class="blurball" src="<?= get_template_directory_uri(); ?>/assets/img/blurball.png" alt="blurball.png" />
		<div class="container">
			<div class="modal-header col-12">
				<div class="header-logo">
					<a href="<?php echo home_url(); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="101.172" height="43.255" viewBox="0 0 101.172 43.255"><g id="Group_40" data-name="Group 40" transform="translate(-80 -66)"><g id="logo"><circle id="Ellipse_1" data-name="Ellipse 1" cx="17" cy="17" r="17" transform="translate(80 66)" fill="#f88341"/><text id="Agechi" transform="matrix(1, 0, 0, 1, 80.172, 98.255)" font-size="30" font-family="Poppins-Bold, Poppins" font-weight="700" letter-spacing="-0.05em"><tspan x="0" y="0">Agechi</tspan></text></g></g></svg>
					</a>
				</div>
				<div class="close-touch"><svg xmlns="http://www.w3.org/2000/svg" width="12.728" height="12.728" viewBox="0 0 12.728 12.728"><path id="close" d="M1812,89.414l-4.95,4.95-1.414-1.415,4.95-4.949-4.95-4.95,1.414-1.414,4.95,4.95,4.95-4.95,1.414,1.414-4.95,4.95,4.95,4.949-1.414,1.415Z" transform="translate(-1805.636 -81.636)"/></svg></div>
			</div>
			<div class="modal-content">
				<div class="modal-contact-info col-6">
					<div class="modal-contact-content">
						<h3><?php pll_e('Stay connected With Us'); ?></h3>
						<p><?php the_field('adress', 'option'); ?></p>
						<a class="modal-tel" href="tel:<?php the_field('phone', 'option'); ?>"><?php the_field('phone', 'option'); ?></a>
						<div class="modal-email"><a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a></div>
						<div class="modal-social-networks">
                            <?php 
							$social = get_field('social', 'option');
							foreach( $social as $item ):
								$link = $item['link'];
								$svg = file_get_contents($item['img']['url']);
                            ?>
                                <div class="social-item">
									<a href="<?= $link; ?>" target="_blank"><?= $svg; ?></a>
                                </div>
                            <?php endforeach ?>
                        </div>
					</div>
				</div>
				<div class="modal-contact-form col-6">
					<h3><?php pll_e('Get in touch'); ?></h3>
					<?php 
						if (get_locale() == 'en_US') {
							echo do_shortcode('[contact-form-7 id="194" title="Get in touch EN"]');
						}
						if (get_locale() == 'sv_SE') {
							echo do_shortcode('[contact-form-7 id="485" title="Get in touch SE"]');
						}
						if (get_locale() == 'uk') {
							echo do_shortcode('[contact-form-7 id="484" title="Get in touch UA"]');
						}
						if (get_locale() == 'he_IL') {
							echo do_shortcode('[contact-form-7 id="486" title="Get in touch IL"]');
						}
					?>
				</div>
			</div>
		</div>
	</div>