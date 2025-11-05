<?php
/**
 * CTA Block Element
 * @package Postali Parent
 * @author Postali LLC
 */
$scb = get_field('show_contact_block');
$cb = get_field('contact_block');
$cbBg = get_field('contact_block_background');
$cbD = get_field('contact_block_default', 'options');
$cbDBg = get_field('contact_block_default_background', 'options');
?>

    <?php if( $scb == 'none' ): ?>

    <?php elseif( $scb == 'custom' ): ?>

        <div id="contact-block-custom" class="contact-block">
        
            <div class="contact-block-left">
                <div class="contact-block-content"><?php echo $cb; ?></div>   
            </div>

            <div class="contact-block-right" style="background: url('<?php echo $cbBg; ?>') no-repeat; background-size:cover;"></div>

        </div>
        
    <?php elseif ( $scb == 'default' ): ?>

        <div id="contact-block-default" class="contact-block">
        
            <div class="contact-block-left">
                <div class="contact-block-content"><?php echo $cbD; ?></div>   
            </div>

            <div class="contact-block-right" style="background: url('<?php echo $cbDBg; ?>') no-repeat; background-size:cover;"></div>

        </div>

    <?php endif; ?>
