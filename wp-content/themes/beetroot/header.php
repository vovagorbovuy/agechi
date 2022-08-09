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
		<div class="header-logo">
			<a href="<?php echo home_url(); ?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="101.172" height="43.255" viewBox="0 0 101.172 43.255"><g id="Group_40" data-name="Group 40" transform="translate(-80 -66)"><g id="logo"><circle id="Ellipse_1" data-name="Ellipse 1" cx="17" cy="17" r="17" transform="translate(80 66)" fill="#f88341"/><text id="Agechi" transform="matrix(1, 0, 0, 1, 80.172, 98.255)" font-size="30" font-family="Poppins-Bold, Poppins" font-weight="700" letter-spacing="-0.05em"><tspan x="0" y="0">Agechi</tspan></text></g></g></svg>
			</a>
		</div>
		<nav class="menu">
			<?php
				wp_nav_menu( array(
					'theme_location'	=> 'main_menu',
					'menu_id'			=> 'main_menu',
					'container'			=> '',
				) );
			?>
		</nav>
		<button id="touch" class="btn touch"><?php pll_e('Get in touch'); ?></button>
	</header><!-- #masthead -->

	<!-- The Modal -->
	<div id="myModal" class="modal">

	<!-- Modal content -->
	<div class="modal-content">
		<span class="close">&times;</span>
		<p>Some text in the Modal..</p>
	</div>

	</div>
