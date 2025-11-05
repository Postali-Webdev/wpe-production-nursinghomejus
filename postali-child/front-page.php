<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

// ACF Array Elements
$hero_bg_img = get_field('hero_background_image');
$hero_mobile_bg_img = get_field('hero_mobile_background_image');
$panel_1_img = get_field('panel_1_image');
$panel_1_btn = get_field('panel_1_cta_button');
$panel_2_bg_img = get_field('panel_2_background_image');
$panel_2_testimonial = get_field('panel_2_testimonial');
$panel_6_bg_img = get_field('panel_6_background_image');
$panel_6_testimonial = get_field('panel_6_testimonial');
$clean_phone = str_replace(" ", "", get_field('default_phone', 'options'));

function createAnchorLink($title) {
    return strtolower(str_replace(" ", "-", $title));
}

$hero_image = $hero_bg_img['url'] ? $hero_bg_img['url'] : '/wp-content/uploads/2022/06/homepage-header-img.jpg';

?>

<div id="front-page">

    <section class="hero" id="home-hero" style="background-image:url('<?php echo $hero_image . '.webp'; ?>')">
        <div class="container full">
            <div class="columns right">
                <div class="column-50">
                    <div class="dog-ear-container">
                        <h1><?php the_field('hero_title'); ?></h1>
                        <p class="sub-title"><?php the_field('hero_sub_title'); ?></p>
                        <?php the_field('hero_copy'); ?>
                        <div class="columns left">
                        <div class="column-50">
                            <p class="small-cta-text"><?php the_field('hero_cta_text'); ?></p>
                        </div>
                        <div class="column-50">
                            <a class="btn maroon" href="tel:<?php esc_html_e($clean_phone); ?>">
                                <?php the_field('default_phone', 'options'); ?>
                            </a>
                        </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </section>

    <section id="panel-1">
        <div class="container wide">
            <div class="page-section-nav">
                <div class="current-section">
                    <p>Current Section</p>
                    <p><strong>01:</strong> <?php the_field('panel_1_section_anchor_title'); ?></p>
                </div>
                <div class="next-section">
                    <p>Up Next</p>
                    <a href="#<?php echo createAnchorLink( get_field('panel_3_section_anchor_title') ); ?>"><strong>02:</strong> <?php the_field('panel_3_section_anchor_title'); ?></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <h2><?php the_field('panel_1_title'); ?></h2>
                    <p class="sub-title"> <?php the_field('panel_1_sub_title'); ?> </p>
                    <?php the_field('panel_1_copy'); ?>
                </div>
                <div class="column-50">
                    <div class="dog-ear-container img blue">
                        <img src="<?php esc_html_e($panel_1_img['url']); ?>" alt="<?php esc_html_e($panel_1_img['alt']); ?>" title="<?php esc_html_e($panel_1_img['title']); ?>" />
                    </div>
                    <a class="btn yellow" href="<?php esc_html_e($panel_1_btn['url']); ?>" title="<?php esc_html_e($panel_1_btn['title']); ?>"><?php esc_html_e($panel_1_btn['title']); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-2">
        <?php get_template_part('blocks/block', 'featured-testimonial', ['data' => ['image' => $panel_2_bg_img, 'testimonial' => $panel_2_testimonial]]); ?>
    </section>

    <section id="panel-3">
        <div class="container wide">
            <div class="page-section-nav">
                <div class="current-section">
                    <p>Current Section</p>
                    <p><strong>02:</strong> <?php the_field('panel_3_section_anchor_title'); ?></p>
                </div>
                <div class="next-section">
                    <p>Up Next</p>
                    <a href="#<?php echo createAnchorLink( get_field('panel_5_section_anchor_title') ); ?>"><strong>03:</strong> <?php the_field('panel_5_section_anchor_title'); ?></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <h2 class="anchor-section-offset" id="<?php echo createAnchorLink( get_field('panel_3_section_anchor_title') ); ?>"><?php the_field('panel_3_title'); ?></h2>
                    <p class="sub-title"> <?php the_field('panel_3_sub_title'); ?> </p>
                    <?php the_field('panel_3_intro_copy'); ?>
                </div>
                <div class="column-50">
                    <div class="dog-ear-container">
                        <p class="sub-title uppercase"><?php the_field('panel_3_section_navigation_title') ?></p>
                        <?php if( have_rows('panel_3_section_navigation') ) : ?>
                            <ul class="inner-section-nav">
                                <?php while( have_rows('panel_3_section_navigation') ) : the_row(); ?>
                                    <li class="ignore-highlight"><a href="<?php the_sub_field('anchor_link'); ?>" title="<?php the_sub_field('anchor_title'); ?>"><?php the_sub_field('anchor_title'); ?></a></li>
                                <?php endwhile ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="spacer-80"></div>
            <div class="columns">
                <div class="column-66 center single-col">
                    <?php the_field('panel_3_body_copy'); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-4">
        <?php get_template_part('blocks/block', 'form-cta', ['data'=>['block-data' => get_field('panel_4_form_block')]]); ?>
        <?php get_template_part('blocks/block', 'award-banner', ['data'=>['text' => get_field('panel_4_awards_slider_text')]]); ?>
    </section>

    <section id="panel-5">
        <div class="container wide">
            <div class="page-section-nav">
                <div class="current-section">
                    <p>Current Section</p>
                    <p><strong>03:</strong> <?php the_field('panel_5_section_anchor_title'); ?></p>
                </div>
                <div class="next-section">
                    <p>Up Next</p>
                    <a href="#<?php echo createAnchorLink( get_field('panel_7_section_anchor_title') ); ?>"><strong>04:</strong> <?php the_field('panel_7_section_anchor_title'); ?></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <h2 class="anchor-section-offset" id="<?php echo createAnchorLink( get_field('panel_5_section_anchor_title') ); ?>"><?php the_field('panel_5_title'); ?></h2>
                    <p class="sub-title"> <?php the_field('panel_5_sub_title'); ?> </p>
                    <?php the_field('panel_5_intro_copy'); ?>
                </div>
                <div class="column-50">
                    <div class="dog-ear-container">
                        <p class="sub-title uppercase"><?php the_field('panel_5_section_navigation_title') ?></p>
                        <?php if( have_rows('panel_5_section_navigation') ) : ?>
                            <ul class="inner-section-nav">
                                <?php while( have_rows('panel_5_section_navigation') ) : the_row(); ?>
                                    <li class="ignore-highlight"><a href="<?php the_sub_field('anchor_link'); ?>" title="<?php the_sub_field('anchor_title'); ?>"><?php the_sub_field('anchor_title'); ?></a></li>
                                <?php endwhile ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="spacer-80"></div>
            <div class="columns">
                <div class="column-66 center single-col">
                    <?php the_field('panel_5_body_copy'); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-6">
        <?php get_template_part('blocks/block', 'featured-testimonial', ['data' => ['image' => $panel_6_bg_img, 'testimonial' => $panel_6_testimonial]]); ?>
    </section>

    <section id="panel-7">
        <div class="container wide">
            <div class="page-section-nav">
                <div class="current-section">
                    <p>Current Section</p>
                    <p><strong>04:</strong> <?php the_field('panel_7_section_anchor_title'); ?></p>
                </div>
                <div class="next-section">
                    <p>Up Next</p>
                    <a href="#<?php echo createAnchorLink( get_field('panel_8_section_anchor_title') ); ?>"><strong>05:</strong> <?php the_field('panel_8_section_anchor_title'); ?></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <h2 class="anchor-section-offset" id="<?php echo createAnchorLink( get_field('panel_7_section_anchor_title') ); ?>"><?php the_field('panel_7_title'); ?></h2>
                    <?php if( get_field('panel_7_sub_title') ) : ?><p class="sub-title"> <?php the_field('panel_7_sub_title'); ?></p><?php endif; ?>
                    <p><?php the_field('panel_7_intro_copy'); ?></p>
                </div>
                <div class="column-50">
                    <div class="dog-ear-container">
                        <p class="sub-title uppercase"><?php the_field('panel_7_section_navigation_title') ?></p>
                        <?php if( have_rows('panel_7_section_navigation') ) : ?>
                            <ul class="inner-section-nav">
                                <?php while( have_rows('panel_7_section_navigation') ) : the_row(); ?>
                                    <li class="ignore-highlight"><a href="<?php the_sub_field('anchor_link'); ?>" title="<?php the_sub_field('anchor_title'); ?>"><?php the_sub_field('anchor_title'); ?></a></li>
                                <?php endwhile ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="spacer-80"></div>
            <div class="columns">
                <div class="column-66 center single-col">
                    <?php the_field('panel_7_body_copy'); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-8">
        <div class="container wide">
            <div class="page-section-nav">
                <div class="current-section">
                    <p>Current Section</p>
                    <p><strong>05:</strong> <?php the_field('panel_8_section_anchor_title'); ?></p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <h2 class="anchor-section-offset" id="<?php echo createAnchorLink( get_field('panel_8_section_anchor_title') ); ?>"><?php the_field('panel_8_title'); ?></h2>
                    <?php if( get_field('panel_8_sub_title') ) : ?><p class="sub-title"> <?php the_field('panel_8_sub_title'); ?> </p><?php endif; ?>
                    <p><?php the_field('panel_8_intro_copy'); ?></p>
                </div>
                <div class="column-50">
                    <div class="dog-ear-container">
                        <p class="sub-title uppercase"><?php the_field('panel_8_section_navigation_title') ?></p>
                        <?php if( have_rows('panel_8_section_navigation') ) : ?>
                            <ul class="inner-section-nav">
                                <?php while( have_rows('panel_8_section_navigation') ) : the_row(); ?>
                                    <li class="ignore-highlight"><a href="<?php the_sub_field('anchor_link'); ?>" title="<?php the_sub_field('anchor_title'); ?>"><?php the_sub_field('anchor_title'); ?></a></li>
                                <?php endwhile ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="spacer-80"></div>
            <div class="columns">
                <div class="column-66 center single-col">
                    <?php the_field('panel_8_body_copy'); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-9">
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <h2><?php the_field('panel_9_title'); ?></h2>
                    <?php the_field('panel_9_copy'); ?>
                </div>
                <div class="column-50">
                    <div class="dog-ear-container">
                        <p class="sub-title"><?php the_field('panel_9_sub_title') ?></p>
                        <?php if( have_rows('other_areas_served', 'options') ) : $count = 0; $total = count(get_field('other_areas_served', 'options')); ?>
                            <ul class="areas-served">
                                <div class="columns">
                                    <?php while( have_rows('other_areas_served', 'options') ) : the_row(); ?>
                                        <?php if( $count === 0 ) : ?> <div class="column-50 single-col"> <?php endif; $count++;?>
                                        <li>
                                            <?php if( get_sub_field('page_link') ) : ?><a href="<?php the_sub_field('page_link'); ?>" title="<?php the_sub_field('location_title'); ?>"><?php endif; ?>
                                                <?php the_sub_field('location_title'); ?>
                                            <?php if( get_sub_field('page_link') ) : ?></a><?php endif; ?>
                                        </li>
                                        <?php if( $count == round($total / 2) ) : ?> </div><div class="column-50 single-col"> <?php endif; ?>
                                        <?php if( $count === $total ) : ?> </div> <?php endif; ?>    
                                    <?php endwhile; ?>
                                </div>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div><!-- #front-page -->

<?php get_footer();?>