<?php 
 /* Award Banner Block */
 $text = $args['data']['text'];
?>
<div class="block-award-banner">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <p><?php esc_html_e($text); ?></p>
            </div>
            <div class="column-66">
                <?php if( have_rows('award', 'options') ) : ?>
                    <div class="awards-slider">
                        <?php while( have_rows('award', 'options') ) : the_row(); $award_img = get_sub_field('image');?>
                            <div class="award-item" style="background-image:url('<?php echo checkWebpCompatibility( $award_img['url'] ); ?>');"></div>
                        <?php endwhile; ?> 
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>