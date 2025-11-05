<?php
/**
  * Template Name: Sitemap
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
?>

<?php if( have_posts() ) : while(  have_posts() ) : the_post(); ?>
<div id="default">
    <section class="hero" id="hero-no-bg">
        <?php if ( function_exists('yoast_breadcrumb') ) : ?>
            <div class="container wide">
                <?php yoast_breadcrumb('<p id="breadcrumbs">','</p>');  ?>
            </div>
        <?php endif; ?>
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <h1><?php echo get_the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>
    
    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <ul class="root">
                        <h3>Pages</h3>
                        <?php 
                        $templates = array(
                            'page-ppc-landing.php',
                            'page-ppc-landing-pmax.php',
                            'page-ppc-landing-v2.php',
                        );

                        $ppc_ids = array();
                        foreach ( $templates as $template ) {
                            $args = [
                                'post_type'  => 'page',
                                'fields'     => 'ids',
                                'nopaging'   => true,
                                'meta_key'   => '_wp_page_template',
                                'meta_value' => $template
                            ];

                            $ppc_pages = get_posts( $args );
                            $ppc_ids = array_merge($ppc_ids, $ppc_pages);
                        }
                        $ppc_list = implode(', ', $ppc_ids);
                        $page_args = array(
                            'exclude' => $ppc_list,
                            'title_li' => null
                        );
                        wp_list_pages($page_args); 

                        ?>
                    </ul>
                </div>
                <div class="column-50">
                    <ul class="root">
                        <h3>Blogs</h3>
                        <?php echo wp_get_archives('type=postbypost'); ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<?php endwhile; endif; ?>

<?php get_footer();?>