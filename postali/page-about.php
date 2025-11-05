<?php
/**
 * AboutTemplate
 * Template Name: About
 *
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<div class="page-content">

    <section id="page-banner">
        <?php get_template_part('block', 'banner');?>
    </section>

    <section>
        <div class="container"> 
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="content-container">
                <div class="content">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
                <div class="sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>