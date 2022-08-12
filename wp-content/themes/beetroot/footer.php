<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beetroot
 */

?>

	<footer id="colophon" class="footer container">
		<div class="footer-info col-6">
			<div class="footer-contact">
				<div class="info-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="19" height="17" viewBox="0 0 19 17"><text id="_" data-name="" transform="translate(0 13)" fill="#36299a" font-size="16" font-family="LastResort, '\.LastResort'"><tspan x="0" y="0"></tspan></text></svg>
				</div>
				<div class="info-email"><p><?php pll_e('Email:'); ?></p><a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a></div>
			</div>
			<div class="info-copyright"><p><?php pll_e('©Copyright 2020. Made by moontheme'); ?></p></div>
		</div>
		<div class="navigation col-6">
			<div class="navigation-content">
				<div class="icon">
					<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
					<lottie-player src="https://assets9.lottiefiles.com/packages/lf20_dgajiyer.json"  background="transparent"  speed="1"  style="width: 24px; height: 24px;"  loop  autoplay></lottie-player>
				</div>
				<ul id="main_menu" class="menu">
					<li class="menu-item"><a href="#about" data-menuanchor="home" class="active"><h2>02</h2><p>About</p></a></li>
					<li class="menu-item"><a href="#jobs" data-menuanchor="about"><h2>03</h2><p>Jobs</p></a></li>
					<li class="menu-item"><a href="#teams" data-menuanchor="jobs" class=""><h2>04</h2><p>Teams</p></a></li>
					<li class="menu-item"><a href="#home" data-menuanchor="teams" class=""><h2>01</h2><p>Home</p></a></li>
				</ul>
			</div>
		</div>
		<!-- modalTouch -->
		<?php get_template_part('template-parts/popup/touch'); ?>
        <!-- modalJob -->
        <?php get_template_part('template-parts/popup/job'); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
