<?php 
/* Accordion Block */
$panel_2_attorney = $args['data']['attorney_awards'];
if( have_rows( 'awards_accreditations', $panel_2_attorney->ID ) ) : 
    while( have_rows( 'awards_accreditations', $panel_2_attorney->ID ) ) : the_row();?>    
    <div class="accordions">
        <div class="accordions_title">
            <h3><?php the_sub_field('title'); ?></h3><span class="icon"></span></div>
        <div class="accordions_content">
            <?php the_sub_field('description'); ?>
        </div>
    </div>
    <?php endwhile; 
endif; 
?>