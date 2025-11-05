<?php
/**
 * Template Name: Practice Area Parent
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

// Category specific settings
$category = get_field('category');
// TODO: Figure out how to exclude current page from query
$current_page_ID = get_the_ID();
$related_pages = get_pages([
	'numberposts'	=> -1,
	'post_type'		=> 'page',
	'meta_key'		=> 'category',
	'meta_value'	=> $category,
    'exclude'       => [$current_page_ID]

]);

if( $category === "cause") {
    $cat_title = "cause of abuse";
    $cat_anchor_title = "Other Causes of Abuse";
    $cat_section_title = "Other Common Causes of Abuse & Neglect";
} else if ( $category === "where" ) {
    $cat_title = "location of abuse";
    $cat_anchor_title =  "Other Locations of Abuse";
    $cat_section_title = "Other Common Locations of Abuse";
} else if ( $category === "type" ) {
    $cat_title = "types of abuse";
    $cat_anchor_title =  "Other Types of Abuse";
    $cat_section_title = "Other Common Types of Abuse";
} else if ( $category === "result" ) {
    $cat_title = "result of abuse";
    $cat_anchor_title =  "Other Results of Abuse";
    $cat_section_title = "Other Common Results of Abuse";
} else {
    $cat_title = "nursing home abuse";
    $cat_anchor_title =  "Other Results of Nursing Home Abuse";
    $cat_section_title = "Other Common Results of Nursing Home Abuse";
}
$cat_anchor_link = strtolower( str_replace(" ", "-", $cat_title) );

// ACF Arrays
$hero_background_image = get_field('hero_background_image');
$form_block = get_field('panel_2_form_block'); // acf clone 
$panel_6_bg_img = get_field('panel_6_background_image');
$panel_6_testimonial = get_field('panel_6_testimonial');
$clean_phone = str_replace(" ", "", get_field('default_phone', 'options'));
?>

<div id="pa-parent">
    <section class="hero" id="hero-has-bg">
    <?php echo wp_get_attachment_image( $hero_background_image['id'], 'full', '', ['class' => 'banner-img'] ) ?>
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
                <div class="columns">
                    <div class="column-66">
                        <?php the_field('hero_copy'); ?>
                        <div class="columns left cta-container">
                            <div class="column-33">
                                <p class="small-cta-text"><?php the_field('hero_cta_text'); ?></p>
                            </div>
                            <div class="column-50">
                                <a href="tel:<?php esc_html_e($clean_phone); ?>" title="call <?php the_field('default_phone', 'options'); ?> today" class="btn maroon"><?php the_field('default_phone', 'options'); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="column-33 single-col related-cat-nav">
                        <p class="thin-text">Category</p>
                        <p class="btn yellow round inactive"><?php esc_html_e($cat_title); ?></p>
                        <a href="#<?php echo $cat_anchor_link; ?>" class="sub-title"><?php esc_html_e($cat_anchor_title); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if( have_rows('panel_1_content') ) : ?>
    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-66 center">
                    <?php while( have_rows('panel_1_content') ) : the_row(); ?>
                        <div class="fade-container">
                            <h2><?php the_sub_field('title'); ?></h2>
                            <?php the_sub_field('copy'); ?>
                        </div>
                    <?php endwhile; ?>
                    </div>
                </div>
            </div>
    </section>
    <?php endif; ?>

    <section id="panel-2">
        <?php get_template_part('blocks/block', 'form-cta', ['data'=>['block-data' => $form_block['panel_4_form_block']]]); //$form_block is a clone so we specify the source ['panel_4_form_block'] in the array ?>
        <?php get_template_part('blocks/block', 'award-banner', ['data'=>['text' => get_field('panel_2_awards_slider_text')]]); ?>
    </section>

    <?php if( have_rows('panel_3_content') ) : ?>
    <section id="panel-3">
        <div class="container">
            <div class="columns">
                <div class="column-66 center">
                    <?php while( have_rows('panel_3_content') ) : the_row(); ?>
                        <div class="fade-container">
                            <h2><?php the_sub_field('title'); ?></h2>
                            <?php the_sub_field('copy'); ?>
                        </div>
                    <?php endwhile; ?>
                    </div>
                </div>
            </div>
    </section>
    <?php endif; ?>

    <?php if ( have_rows('panel_4_related_readings') ) : ?>
    <section id="panel-4">
        <div class="container">
            <div class="columns">
                <div class="column-66 center single-col">
                    <p class="sub-title">Related Readings</p>
                    <?php get_template_part('blocks/block', 'manual-related-posts', ['data'=>['related-posts' => get_field('panel_4_related_readings')]]); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if( have_rows('panel_5_content') ) : ?>
    <section id="panel-5">
        <div class="container">
            <div class="columns">
                <div class="column-66 center">
                    <?php while( have_rows('panel_5_content') ) : the_row(); ?>
                        <div class="fade-container">
                            <h2><?php the_sub_field('title'); ?></h2>
                            <?php the_sub_field('copy'); ?>
                        </div>
                    <?php endwhile; ?>
                    </div>
                </div>
            </div>
    </section>
    <?php endif; ?>

    <section id="panel-6">
        <?php get_template_part('blocks/block', 'featured-testimonial', ['data' => ['image' => $panel_6_bg_img, 'testimonial' => $panel_6_testimonial]]); ?>
    </section>

    <?php if( have_rows('panel_7_content') ) : ?>
    <section id="panel-7">
        <div class="container">
            <div class="columns">
                <div class="column-66 center">
                    <?php while( have_rows('panel_7_content') ) : the_row(); ?>
                        <div class="fade-container">
                            <h2><?php the_sub_field('title'); ?></h2>
                            <?php the_sub_field('copy'); ?>
                        </div>
                    <?php endwhile; ?>
                    </div>
                </div>
            </div>
    </section>
    <?php endif; ?>

    <?php if( $related_pages ) :  ?>
    <section id="panel-8">
        <div class="container">
            <div class="columns">
                <div class="column-full single-col">
                    <p id="<?php echo $cat_anchor_link; ?>" class="sub-title anchor-category-offset">
                        <?php echo $cat_section_title; ?>
                    </p>
                    <ul>
                        <?php foreach( $related_pages as $page) : ?>     
                            <li class="highlight">
                                <a href="<?php echo get_the_permalink($page->ID); ?>"><?php echo get_the_title($page->ID); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</div>

<?php get_footer();?>