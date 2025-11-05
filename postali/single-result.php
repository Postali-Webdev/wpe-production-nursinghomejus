<?php
/**
 * Single Case Result
 *
 * @package Postali Parent
 * @author Postali LLC
 */

get_header();?>

<div class="page-content">
    <section>
        <div class="container">
            <!-- <a href="/blog" alt="Back to Blog">Back to Blog</a> -->
            <div class="single-post">
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', 'index' ); ?>

                <?php endwhile; ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>