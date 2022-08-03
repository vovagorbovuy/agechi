<?php
/**
 * Template part for displaying post intro
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package snk
 */

$link = get_the_permalink();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php echo $link; ?>"><?php the_post_thumbnail(); ?></a>
	<h2><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h2>
	<p><?php echo get_excerpt('300','') ?></p>
	<p>Published: <em><?php echo get_the_date(); ?></em></p>
	<p>Author: <em><?php the_author_meta('display_name'); ?></em></p>
	<p>Category: <em><?php the_category(','); ?></em></p>
	<p><a href="<?php echo $link; ?>"><?php _e('Read more','snk'); ?></a></p>
</article>
<hr>