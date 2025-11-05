<?php
/**
 * Template Name: Client Reviews
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
$clean_phone = str_replace(" ", "", get_field('default_phone', 'options'));
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = [
    'post_type'         => 'testimonials',
    'post_status'       => 'publish',
    'posts_per_page'    => 8,
    'paged' => $paged
];
$hero_background_image = get_field('hero_background_image');
$query = new WP_Query($args);
?>
<div id="client-reviews">
    <section class="hero" id="hero-has-bg" style="background-image: url('<?php echo checkWebpCompatibility( $hero_background_image['url'] ); ?>');">
        <?php if ( function_exists('yoast_breadcrumb') ) : ?>
            <div class="container wide">
                <?php yoast_breadcrumb('<p id="breadcrumbs">','</p>');  ?>
            </div>
        <?php endif; ?>
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <h1><?php the_field('hero_title'); ?></h1>
                </div>
                <div class="column-75">
                    <?php the_field('hero_copy'); ?>
                    <div class="columns left">
                        <div class="column-33">
                            <p class="small-cta-text"><?php the_field('hero_cta_text'); ?></p>
                        </div>
                        <div class="column-50">
                            <a href="tel:<?php esc_html_e($clean_phone); ?>" title="call <?php the_field('default_phone', 'options'); ?> today" class="btn maroon"><?php the_field('default_phone', 'options'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if( $query->have_posts() ) : ?>
    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-66 center single-col">
                    <?php while( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="review-el"> 
                            <div class="review-el_inner">
                                <div class="wrapper">
                                    <p><span class="star-rating">★ ★ ★ ★ ★</span> <?php the_field('author_name', $post->ID); ?></p>
                                    <p><?php the_field('full_description', $post->ID); ?></p>
                                    <img src="<?php echo ( get_field('review_source', $post->ID) === 'google' ? '/wp-content/uploads/2022/06/google-review-logo.png' : ''); ?>"alt="client review badge" title="client review badge"/>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <div id="pagination">
                        <?php echo paginate_links( array(
                            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                            'total'        => $query->max_num_pages,
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
    </section>
    <?php endif;  wp_reset_postdata(); ?>
</div>


<?php get_footer();?>