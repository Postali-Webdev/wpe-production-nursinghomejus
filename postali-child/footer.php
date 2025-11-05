<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
$pre_footer_data = get_field('pre_footer', 'options');
?>

<section id="pre-footer">
    <?php get_template_part('blocks/block', 'form-cta', ['data'=>['block-data' => $pre_footer_data]]); ?>        
</section>

<footer>
    <div class="container wide">
        <div class="columns">
            <div class="column-25">
                <?php the_custom_logo(); ?>
            </div>
            <div class="column-50">
                <p class="sub-title">Locations</p>
                <?php if( have_rows('locations', 'options') ) : ?>
                <div class="columns locations-container">
                    <?php while( have_rows('locations', 'options') ) : the_row(); 
                    $clean_phone = str_replace(" ", "", get_sub_field('phone'));?>
                        <div class="column-33 location-el">
                            <div>
                                <p><?php the_sub_field('address'); ?></p>
                                <a href="tel:<?php esc_html_e($clean_phone); ?>" title="call <?php the_sub_field('phone'); ?> today"><?php the_sub_field('phone'); ?></a>
                                <div class="spacer-15"></div>
                                <a href="<?php the_sub_field('gmb_page_link'); ?>" class="sub-title direction-link" title="map directions to office" target="_blank">Directions</a>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="column-25">
                <div class="copyright-links">
                    <p class="copyright-year">&copy; Nursing Home Justice <?php echo date('Y'); ?>. All rights reserved. </p>
                    <?php wp_nav_menu( [ 'container' => false, 'theme_location' => 'footer-nav' ] ); ?> 
                    <?php if(is_page_template('front-page.php')) { ?>
                    <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:30px 0;"></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- callrail -->
<script type="text/javascript" src="//cdn.callrail.com/companies/435791415/c794abdc3d1701f48e13/12/swap.js"></script> 
<!-- /callrail -->


<!--  Clickcease.com tracking-->
<script type='text/javascript'>var script = document.createElement('script');
script.defer = true; script.type = 'text/javascript';
var target = 'https://www.clickcease.com/monitor/stat.js';
script.src = target;var elem = document.head;elem.appendChild(script);
</script>
<noscript>
<a href='https://www.clickcease.com' rel='nofollow'><img src='https://monitor.clickcease.com/stats/stats.aspx' alt='ClickCease'/></a>
</noscript>
<!--  Clickcease.com tracking-->

<!-- Clarity tracking -->
<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.defer=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "dolvzfxzjt");
</script>
<!-- /Clarity tracking -->

<?php wp_footer(); ?>

</body>
</html>


