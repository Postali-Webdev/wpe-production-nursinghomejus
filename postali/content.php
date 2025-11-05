<?php
/**
 * Default implementation of the WordPress loop.
 *
 * @package Postali Parent
 * @author Postali LLC
 */
$imageUrl = '';

if ( is_singular() ) : ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'primary' ); ?> role="main">
		<div class="featured-image">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			} else { ?>
				<img src="<?php bloginfo('template_directory'); ?>/assets/img/default-blog.jpg" alt="<?php the_title(); ?>" />
			<?php } ?>
		</div>

		<h1 class="post-title"><?php the_title(); ?></h1>
		<?php the_content(); ?>

	</article><!-- #post-<?php //the_ID(); ?> -->

<?php else : ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background-image: url('<?php echo $imageUrl; ?>')">
		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<h2 class="post-title"><?php the_title(); ?></h2>
			<?php //the_excerpt(); ?>
		</a>
	</article><!-- #post-<?php //the_ID(); ?> -->

<?php endif;
