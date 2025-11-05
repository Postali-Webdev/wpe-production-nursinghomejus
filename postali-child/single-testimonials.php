<?php
/**
 * Default Template
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
                <div class="column-full center">
                    <div class="review-el"> 
                        <div class="review-el_inner">
                            <div class="wrapper">
                                <p><span class="star-rating">★ ★ ★ ★ ★</span> <?php the_field('author_name'); ?></p>
                                <p><?php the_field('full_description'); ?></p>
                            </div>
                        </div>
                        <img src="<?php echo ( get_field('review_source') === 'google' ? '/wp-content/uploads/2022/06/google-review-logo.png' : ''); ?>"alt="client review badge" title="client review badge"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php endwhile; endif; ?>

<?php get_footer();?>