<?php
/**
 * Banner Block Element
 * @package Postali Parent
 * @author Postali LLC
 */
$defaultBanner = get_field('default_banner', 'options');
$smallText = get_field('banner_small_text');
$largeText = get_field('banner_large_text');
$ctaText = get_field('cta_text');
$ctaPhone = get_field('cta_phone', 'options');
?>

<?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
        <div class="banner" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size:cover;">
    <?php } else { ?>
        <div id="banner-default" class="banner" style="background: url('<?php echo $defaultBanner; ?>') no-repeat; background-size:cover;" >
    <?php } ?>
    
            <div id="banner-container" class="container">
                
                <h1><?php echo $smallText; ?></h1>
                <?php if( $largeText ): ?>
                    <span class="banner-large-text"><?php echo $largeText; ?></span>
                <?php endif; ?>

                <?php if( $ctaText ): ?>
                    <span class="cta-text"><?php echo $ctaText; ?></span>
                    <div class="banner-cta-block"><span class="ibp"><?php echo $ctaPhone; ?></span></div>
                <?php endif; ?>


            </div> 

        </div>