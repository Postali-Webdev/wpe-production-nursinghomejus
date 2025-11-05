<?php
/**
 * Template Name: Contact
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

// ACF Arrays
$form_cta_data = get_field('pre_footer', 'options');
$hero_background_image = get_field('hero_background_image');
$clean_phone = str_replace(" ", "", get_field('default_phone', 'options'));

?>
<div id="contact">
    <section class="hero" id="hero-has-bg" style="background-image: url('<?php echo checkWebpCompatibility( $hero_background_image['url'] ); ?>');">
        <?php if ( function_exists('yoast_breadcrumb') ) : ?>
            <div class="container wide">
                <?php yoast_breadcrumb('<p id="breadcrumbs">','</p>');  ?>
        <?php endif; ?>
            <div class="columns">
                <div class="column-50">
                    <h1><?php the_field('hero_title'); ?></h1>
                    <p class="sub-title"><?php the_field('hero_sub_title'); ?></p>
                    <?php the_field('hero_copy'); ?>
                    <div class="columns left cta-container">
                        <div class="column-50">
                            <p class="small-cta-text"><?php the_field('hero_cta_text'); ?></p>
                        </div>
                        <div class="column-50">
                            <a href="tel:<?php esc_html_e($clean_phone); ?>" title="call <?php the_field('default_phone', 'options'); ?> today" class="btn maroon"><?php the_field('default_phone', 'options'); ?></a>
                        </div>
                    </div>
                </div>
                <div class="column-50 right">
                    <div class="dog-ear-container blue">
                        <?php echo do_shortcode('[gravityform id="4" title="false" ajax="true"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if( have_rows('locations', 'options') ) : ?>
    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-full title">
                    <p class="sub-title">Our Office Locations</p>
                </div>
                <div class="column-full locations">
                    <?php while( have_rows('locations', 'options') ) : the_row(); ?>
                        <div class="location">
                            <div class="columns">
                                <div class="column-25">
                                    <div>
                                        <h3><?php the_sub_field('city_state'); ?></h3>
                                        <p class="address"><?php the_sub_field('address'); ?></p>
                                        <p class="sub-title"><a title="directions to <?php the_sub_field('city_state'); ?> office" href="<?php the_sub_field('gmb_page_link'); ?>" target="_blank">Directions</a></p>
                                        <?php if( get_sub_field('page_link') ) : $page_link = get_sub_field('page_link'); ?><a href="<?php echo $page_link['url']; ?>" class="btn yellow round" title="visit <?php the_sub_field('city_state'); ?> page">Visit Page</a> <?php endif; ?>
                                    </div>
                                </div>
                                <div class="column-75">
                                    <iframe src="<?php echo esc_url(get_sub_field('google_map_embed')); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

            

</div>
<?php get_footer();?>