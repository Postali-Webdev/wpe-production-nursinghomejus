<?php
/**
 * Template Name: Practice Area Interior
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
	'meta_value'	=> $category
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

?>
<div id="pa-interior">
    <section class="hero" id="hero-no-bg">
        <?php if ( function_exists('yoast_breadcrumb') ) : ?>
            <div class="container wide">
                <?php yoast_breadcrumb('<p id="breadcrumbs">','</p>');  ?>
            </div>
        <?php endif; ?>
        <div class="container">
            <div class="columns">
                <div class="column-66">
                    <h1><?php the_field('hero_title'); ?></h1>
                </div>
                <div class="column-33 single-col related-cat-nav">
                    <p class="thin-text">Category</p>
                    <p class="btn yellow round inactive"><?php esc_html_e($cat_title); ?></p>
                    <a href="#<?php echo $cat_anchor_link; ?>" class="sub-title"><?php esc_html_e($cat_anchor_title); ?></a>
                </div>
            </div>
        </div>
    </section>
    
    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-50 center">
                    <div>
                        <?php the_field('panel_1_copy'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if( $related_pages ) : ?>
    <section id="panel-2">
        <div class="container">
            <div class="columns">
                <div class="column-full single-col">
                    <p id="<?php echo $cat_anchor_link; ?>" class="sub-title anchor-category-offset">
                        <?php echo $cat_section_title; ?>
                    </p>
                    <ul>
                        <?php foreach( $related_pages as $page) : ?>
                            <?php if( $page->ID != $current_page_ID ) : ?>       
                                <li class="highlight">
                                    <a href="<?php echo get_the_permalink($page->ID); ?>"><?php echo get_the_title($page->ID); ?></a>
                                </li>
                            <?php endif; ?>
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