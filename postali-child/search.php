<?php
/**
 * Search Results
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
global $wp_query;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$total_pages = $wp_query->max_num_pages;
?>


<div id="default">
    <section class="hero" id="hero-no-bg">
        <?php if ( function_exists('yoast_breadcrumb') ) : ?>
            <div class="container wide">
                <?php yoast_breadcrumb('<p id="breadcrumbs">','</p>');  ?>
            </div>
        <?php endif; ?>
        <div class="container">
            <div class="columns border">
                <div class="column-full">
                    <h1>Search Results</h1>
                </div>
            </div>
            <div class="columns">
                <div class="column-full">
                <h4 >Page <?php echo $paged; ?> out of <?php echo $total_pages; ?> // <?php //echo $posts_per_page; ?> 8 Results Per Page</h4>
                </div>
            </div>
        </div>
    </section>
    
    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                <?php if( have_posts() ) :?> 
                    <?php while(  have_posts() ) : the_post(); ?>
                        <div class="search-result">
                            <h3><?php echo get_the_title(); ?></h3>
                            <p>
                                <?php //echo get_the_excerpt(); 
                                    if (has_excerpt() ){
                                        the_excerpt();
                                    } else {
                                        excerpt_function($post->ID, $_GET['s']);
                                    } 
                                ?>
                            </p>
                            <a class="sub-title" title="visit page" href="<?php echo get_the_permalink(); ?>">Visit Page</a>
                        </div>

                        
                    <?php endwhile; ?>
                <?php else : ?>
                    <p><?php printf( esc_html__( 'Our apologies but there\'s nothing that matches your search for "%s"', 'postali' ), get_search_query() ); ?></p>
                <?php endif; ?>    
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
    </section>
</div>


<?php get_footer();?>