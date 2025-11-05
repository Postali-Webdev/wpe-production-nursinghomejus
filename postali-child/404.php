<?php
/**
 * 404 Template
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
?>

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
                    <h1>Page Not Found</h1>
                </div>
            </div>
        </div>
    </section>
    
    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <div>
                        <p class="sub-title">We can't find the page you were looking for. Make sure you typed in the url correctly.</p>
                        <a class="btn yellow active" href="/" title="back to homepage">Back To Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer();?>