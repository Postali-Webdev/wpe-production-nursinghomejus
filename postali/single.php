<?php
/**
 * Single template
 *
 * @package Postali Parent
 * @author Postali LLC
 */

$blogDefault = get_field('default_blog_image', 'options');

get_header();?>

<div class="page-content">

    <section>
        <div class="container">
            <!-- <a href="/blog" alt="Back to Blog">Back to Blog</a> -->
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            
            <div class="content">
                <div class="main-content" id="single-post">
                    <article>
                        <h1><?php the_title(); ?></h1>
                        <div class="post-meta"><span class="post-meta-date">Posted on <?php the_date(); ?> in </span><span class="post-meta-categories"><?php the_category( ', ' ); ?></span></div>
                        
                        <div class="article-single-featured-image">
                            <?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
                            <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                                <img src="<?php echo $featImg[0]; ?>" class="article-featured-image"  />
                            <?php } else { ?>
                                <img src="<?php echo $blogDefault; ?>" id="article-featured-image-default" class="article-featured-image" >
                            <?php } ?>
                        </div>
                        <?php the_content(); ?>
                    </article>				
                </div>

                <div class="main-sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>