<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Parent
 * @author Postali LLC
 */

$args = array (
	'post_type' => 'post',
	'post_per_page' => '10',
	'post_status' => 'publish',
	'order' => 'DESC',
);
$the_query = new WP_Query($args);
get_header(); ?>

<section id="page-banner" >
   
</section>

<div class="container blog-posts">

	<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 

	<div class="content">
		<div class="main-content">
			<div class="blog-feed">
				<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<article>
						<?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
						<?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
							<div id="blog-feed-article-image-dynamic" class="blog-feed-article-image" style="background:url('<?php echo $featImg[0]; ?>') no-repeat; background-size:cover;">
						<?php } else { ?>
							<div id="blog-feed-article-image-default" class="blog-feed-article-image" style="background:url('') no-repeat; background-size:cover;" >
						<?php } ?>
							</div><!-- Close blog featured image -->
						<div class="blog-feed-article-content">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2><?php the_title(); ?></h2></a>
							<!-- <div class="post-meta"><span class="post-meta-date">Posted on <?php the_date(); ?> in </span><span class="post-meta-categories"><?php the_category( ', ' ); ?></span></div> -->
							<div class="blog-feed-article-excerpt"><?php the_excerpt(); ?></div>
							<a href="<?php the_permalink;?>" class="btn">Read More</a>
						</div>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
		<div class="main-sidebar">

			<?php get_sidebar( 'index' ); ?>

		</div>

		<?php the_posts_pagination(); ?>
		
	</div>


</div><!-- #content -->

<?php get_footer(); ?>
