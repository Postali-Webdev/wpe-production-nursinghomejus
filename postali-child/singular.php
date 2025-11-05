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
                    <?php echo the_content(); ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php endwhile; endif; ?>

<?php get_footer();?>