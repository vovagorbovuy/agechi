<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beetroot
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header container">
		<div class="header-logo col-4">
			<a href="<?php echo home_url(); ?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="101.172" height="43.255" viewBox="0 0 101.172 43.255"><g id="Group_40" data-name="Group 40" transform="translate(-80 -66)"><g id="logo"><circle id="Ellipse_1" data-name="Ellipse 1" cx="17" cy="17" r="17" transform="translate(80 66)" fill="#f88341"/><text id="Agechi" transform="matrix(1, 0, 0, 1, 80.172, 98.255)" font-size="30" font-family="Poppins-Bold, Poppins" font-weight="700" letter-spacing="-0.05em"><tspan x="0" y="0">Agechi</tspan></text></g></g></svg>
			</a>
		</div>
		<?php if (!wp_is_mobile()): ?>
			<nav class="menu col-4">
				<?php
					wp_nav_menu( array(
						'theme_location'	=> 'main_menu',
						'menu_id'			=> 'main_menu',
						'container'			=> '',
					) );
				?>
			</nav>
			<!-- outputs a flags list (without languages names) -->
			<div class="header-lan col-4">
				<ul>
					<?php pll_the_languages( array( 'show_flags' => 1,'show_names' => 0, 'hide_current'=> 1 ) ); ?>
				</ul>
				<button id="touch" class="btn touch"><?php pll_e('Get in touch'); ?></button>
			</div>
		<?php else: ?>
			<div class="col-6 menu-mobile">
				<button class="menu-toggle menu-open" aria-controls="primary-menu" aria-expanded="false"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="60px" height="60px" viewBox="0 0 459 459" style="enable-background:new 0 0 459 459;" xml:space="preserve"> <g> <g id="menu"> <path d="M0,382.5h459v-51H0V382.5z M0,255h459v-51H0V255z M0,76.5v51h459v-51H0z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg></button>                                    
			</div>

			<div class="menu-mobile-wrap">
				<div class="mobile-container">
					<div class="close menu-remove"><svg xmlns="http://www.w3.org/2000/svg" width="12.728" height="12.728" viewBox="0 0 12.728 12.728"><path id="close" d="M1812,89.414l-4.95,4.95-1.414-1.415,4.95-4.949-4.95-4.95,1.414-1.414,4.95,4.95,4.95-4.95,1.414,1.414-4.95,4.95,4.95,4.949-1.414,1.415Z" transform="translate(-1805.636 -81.636)"/></svg></div>
					<nav class="menu">
						<?php
							wp_nav_menu( array(
								'theme_location'	=> 'main_menu',
								'menu_id'			=> 'main_menu',
								'container'			=> '',
							) );
						?>
					</nav>
						<!-- outputs a flags list (without languages names) -->
					<div class="header-lan">
						<ul>
							<?php pll_the_languages( array( 'show_flags' => 1,'show_names' => 0, 'hide_current'=> 1 ) ); ?>
						</ul>
						<button id="touch" class="btn touch"><?php pll_e('Get in touch'); ?></button>
						<div class="info-copyright"><p><?php pll_e('©Copyright 2020. Made by moontheme'); ?> 🧡</p></div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</header><!-- #masthead -->


