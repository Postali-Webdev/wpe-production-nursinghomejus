<?php
/**
 * Media Mentions Page
 * Template Name: Media Mentions
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<div class="page-content">

    <!-- Add the asset request bar -->
    <div class="assets">
        <div class="assets_left">
            <span class="assets_left_cta">Need Our Brand Assets?</span>
            <span class="assets_left_content">Media Contact: 
                <a class="assets_left_content_link" href="mailto:<?php the_field('email'); ?>" title="Email Postali"><?php the_field('email'); ?></a>
            </span>
        </div>
        <div class="assets_right">
            <?php if ( have_rows('social_links') ): ?>
                <?php while ( have_rows('social_links') ): the_row(); 
                    $social         = get_sub_field('name');
                    $social_url     = get_sub_field('url');
                    $social_icon    = get_sub_field('icon');
                    $icon_alt       = $social_icon['alt'];
                    $icon_src       = $social_icon['url'];
                ?>  
                    <div class="social">
                        <a href="<?php echo $social_url; ?>" class="social_btn" title="<?php echo $social; ?>">
                            <img class="social_icon" src="<?php echo esc_url($icon_src); ?>" alt="<?php echo esc_attr($icon_alt); ?>" />
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
    </div>


    <!-- Add post list & pagination -->
    <div class="mentions-container">
    <h2 class="media-banner-title">Media Coverage</h2>
    <?php 
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $custom_query = new WP_Query(
        array(
            'post_type' => 'media_mentions',
            'offset'=> (($paged -1) * 10),  
                    'posts_per_page' => 10,
            'orderby'   => array(
                'date' =>'DESC',
                'menu_order'=>'ASC',
            ),
        )
    );

    if ( $custom_query -> have_posts() ):
    while($custom_query->have_posts()) : $custom_query->the_post(); 
            $image = get_field('image');
            $image_url = $image['url'];
            $image_alt = $image['alt'];
            $link = get_field('link');
            $cta_text = get_field('cta_text');
                    $no_follow = get_field('add_no_follow');
        ?>		
                <div class="media-mention">
                    <?php if ( !empty($image) ) { ?>
                        <div class="media-mention_image">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
                        </div>
                    <?php } ?>
                    <div class="media-mention_info">
                        <h2 class="title"><?php the_title(); ?></h2>
                        <div class="desc"><p><?php the_content(); ?></p></div>
                        <a class="mention-link" <?php echo ( $no_follow === true) ? "rel='nofollow'" : ''; ?> href="<?php echo $link; ?>" title="<?php the_title(); ?>" target="_blank"><?php echo $cta_text; ?> ></a>
                    </div>
                </div> 
                    <?php wp_reset_postdata(); ?>
        <?php endwhile; ?>
        </div>

    <div id="pagination">
        <?php function add_pagination($custom_query) {                    
            $total_pages = $custom_query->max_num_pages;
        
            if ($total_pages > 1){
                $current_page = max(1, get_query_var('paged'));
        
                echo paginate_links(array(
                    'base' => get_pagenum_link(1) . '%_%',
                    'format' => 'page/%#%',
                    'current' => $current_page,
                    'total' => $total_pages,
                ));
            }
        }
        
        add_pagination($custom_query); ?>
    </div>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    </div>

</div><!-- #content -->

<?php get_footer();
