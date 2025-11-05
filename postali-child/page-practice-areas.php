<?php
/**
 * Template Name: Practice Areas
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

// ACF Arrays
$hero_background_image = get_field('hero_background_image');
$clean_phone = str_replace(" ", "", get_field('default_phone', 'options'));

?>
<div id="practice-areas">
    <section class="hero" id="hero-has-bg" style="background-image: url('<?php echo checkWebpCompatibility($hero_background_image['url']); ?>');">
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
                <div class="column-66">
                <?php the_field('hero_copy'); ?>
                </div>
            </div>
            <div class="columns">
                <div class="column-50">
                    <div class="columns left">
                        <div class="column-50">
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
        <div class="container">
            <div class="columns">
                <div class="column-full single-col">
                    <!-- <div> -->
                        <p class="thin-text">Filter by the type of abuse you or a loved one has suffered from:</p>
                        <div class="columns category-btn-container">
                            <div class="btn category-btn toggle active" data-pa="abuse-and-neglect">
                                <span>Abuse & Neglect</span>
                            </div>
                            <div class="btn category-btn toggle" data-pa="result-of-abuse">
                                <span>Result of Abuse</span>
                            </div>
                        </div>
                    <!-- </div> -->

                    <div class="practice-areas">
                            <?php if( have_rows('abuse_and_neglect') ) : ?>
                                <div class="pa-sub-container active" id="abuse-and-neglect">
                                    <?php
                                    $abuse_group = get_field('abuse_and_neglect'); 
                                        foreach( $abuse_group as $key => $group ) {
                                            $sub_title = "";
                                            $group_el = "<div class='group-element'>";
                                            if( $key === "where") {
                                                $sub_title = "<span class='thin-text'>Where</span> were you or your loved one abused?";
                                            } elseif( $key === "cause") {
                                                $sub_title = "What was the <span class='thin-text'>cause</span> of abuse?";
                                            } else {
                                                $sub_title = "What was the <span class='thin-text'>type</span> of abuse?";
                                            }
                                            if( $group ) {
                                                $group_el .= "<p class='sub-title'>{$sub_title}</p>";
                                                foreach( $group as $pa ) {
                                                    $group_el .= "<div class='columns'><div><h2>{$pa['practice_area_title']}</h2></div>";
                                                    $group_el .= "<div>" . ($pa['page_link'] ? "<a class='btn yellow round' href='{$pa['page_link']}'>Visit Page</a>" : "<a class='fancy-link' href='/contact-us/'>Contact The Firm</a>") . "</div>";
                                                    if( $pa['sub_pages'] ) {
                                                        $group_el .= "<div class='columns sub-page-group'>";
                                                        foreach( $pa['sub_pages'] as $sub_page ) {
                                                            $group_el .= ($sub_page['sub_page_link'] ? "<span class='highlight'><a href='{$sub_page['sub_page_link']}'>{$sub_page['sub_page_title']}</a></span>" : "<p>{$sub_page['sub_page_title']}</p>");
                                                        }
                                                        $group_el .= "</div></div>";
                                                    } else {
                                                        $group_el .= "</div>";
                                                    }
                                                }
                                            }
                                            $group_el .= "</div>";
                                            echo $group_el;
                                        } ?>
                                </div>
                            <?php endif; ?>
                  

                            <?php if( have_rows('result_of_abuse') ) : ?>
                                <div class="pa-sub-container" id="result-of-abuse">
                                    <?php while( have_rows('result_of_abuse') ) : the_row();?>
                                        <div class='columns'>
                                            <div>
                                                <h2><?php the_sub_field('practice_area_title'); ?></h2>
                                            </div>
                                            <div>
                                                <?php $page_link = get_sub_field('page_link'); echo ( $page_link ? "<a class='btn yellow round' href='{$page_link}'>Visit Page</a>" : "<a class='fancy-link' href='/contact-us/'>Contact The Firm</a>" ); ?>
                                            </div>
                                            <?php if( have_rows('sub_pages') ) : ?>
                                                <div class='columns sub-page-group'>
                                                    <?php while( have_rows('sub_pages') ) :
                                                        the_row(); 
                                                        if( get_sub_field('sub_page_link') ) : ?>
                                                            <span class="highlight"><a href="<?php the_sub_field('sub_page_link'); ?>"><?php the_sub_field('sub_page_title'); ?></a></span>
                                                        <?php else : ?>
                                                            <p><?php the_sub_field('sub_page_title'); ?></p>
                                                        <?php endif; ?>
                                                        
                                                    <?php endwhile; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer();?>