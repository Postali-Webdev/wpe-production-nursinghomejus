<?php
/**
 * 404 Page Not Found.
 *
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<div class="page-content">

    <div class="container">

        <h1 class="post-title"><?php esc_html_e( 'Page Not Found', 'postali' ) ?></h1>
        <p><?php esc_html_e( 'We apologize but the page you\'re looking for could not be found.', 'postali' ); ?></p>
        <a class="link-404" href="/">Let's Get You Back on Track!</a>
        <!-- TODO: Do we need this? Leaving it commented out for now -->
        <?php // get_search_form(); ?>

    </div><!-- #content -->

</div>

<?php get_footer();
