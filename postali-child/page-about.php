<?php
/**
 * Template Name: About
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

//ACF Array Elements
$hero_background_image = get_field('hero_background_image');
$panel_1_bg_img = get_field('panel_1_background_image');
$panel_1_testimonial = get_field('panel_1_testimonial');
$panel_2_attorney = get_field('panel_2_attorney');
$clean_phone = str_replace(" ", "", get_field('default_phone', 'options'));
?>

<div id="about">
    <section class="hero" id="hero-has-bg" style="background-image: url('<?php echo $hero_background_image['url'] . '.webp'; ?>');">
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

    <section id="panel-1">
        <?php get_template_part('blocks/block', 'featured-testimonial', ['data' => ['image' => $panel_1_bg_img, 'testimonial' => $panel_1_testimonial]]); ?>
    </section>
    
    <section id="panel-2">
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <h2 id="mac-hester">About Attorney <?php esc_html_e(get_the_title($panel_2_attorney->ID)); ?></h2>
                    <?php echo $panel_2_attorney->intro_copy; ?>
                    <?php echo $panel_2_attorney->copy; ?>
                </div>
                <div class="column-50">
                    <?php echo get_the_post_thumbnail( $panel_2_attorney->ID, 'full' );?>
                </div>
            </div>
            <div class="spacer-80"></div>
            <div class="columns">
                <div class="column-50 center">
                    <h2>Awards & Accreditations</h2>
                    <div class="spacer-30"></div>
                    <?php 
                    get_template_part('blocks/block', 'accordion', ['data' => ['attorney_awards' => $panel_2_attorney]]); ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer();?>