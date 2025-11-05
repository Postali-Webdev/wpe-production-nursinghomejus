<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Child
 * @author Postali LLC
 */

/* grab image url at random */
$images = get_field('images', 'options');
$count = 0;
function generateUrl($imgArr, &$num) {
    if( $num === count($imgArr) ) {
        $num = 0;
    }
    return $imgArr[$num]['featured_image']['url'];
}

get_header(); ?>

<div class="page-content">

    <section class="hero" id="hero-has-bg" style="background-image: url('<?php echo checkWebpCompatibility('/wp-content/uploads/2022/06/legal-blog-landing-header-img-1.jpg'); ?>');">
        <?php if ( function_exists('yoast_breadcrumb') ) : ?>
            <div class="container wide">
                <?php yoast_breadcrumb('<p id="breadcrumbs">','</p>');  ?>
            </div>
        <?php endif; ?>
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <h1><?php echo single_post_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <div id="blog-holder">
        <div class="container blog-posts">  
            <div class="card-holder">
                <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                <div class="post-container card dog-ear-container link-hunter">
                    <div class="card-top" style="background-image: url('<?php echo checkWebpCompatibility( generateUrl($images, $count) ); $count++; ?>');">
                        <p class="date"><?php echo get_the_date(); ?></p>
                        <p class="title"><a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></p>
                        <p class="author">Written by <?php echo get_the_author(); ?></p>
                    </div>
                    <div class="card-bottom">
                        <p>Read Article</p>
                    </div>
                </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
            <div id="pagination">
                <?php echo paginate_links( array(
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'current'      => max( 1, get_query_var( 'paged' ) ),
                    'format'       => '?paged=%#%',
                    'show_all'     => false,
                    'type'         => 'plain',
                    'end_size'     => 2,
                    'mid_size'     => 1,
                    'prev_next'    => true,
                    'prev_text'    => __( '<span></span>', 'textdomain' ),
                    'next_text'    => __( '<span></span>', 'textdomain' ),
                    'add_args'     => false,
                    'add_fragment' => '',
                ) ); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
