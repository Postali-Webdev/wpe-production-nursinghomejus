<?php
/**
 * Case Results Archive
 *
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<div class="page-content">

    <div class="container">

        <h1 class="post-title"><?php echo esc_html( $post_title ); ?></h1>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'content', 'archive' ); ?>

        <?php endwhile; ?>

        <?php the_posts_pagination(); ?>

        <?php get_sidebar( 'archive' ); ?>

    </div><!-- #content -->

</div>

<?php get_footer();
