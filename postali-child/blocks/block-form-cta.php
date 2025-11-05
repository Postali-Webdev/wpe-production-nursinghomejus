<?php 
/* Form CTA Block */
$form_cta_data = $args['data']['block-data'];
$clean_phone = str_replace(" ", "", get_field('default_phone', 'options'));

$background_image = $form_cta_data['background_image']['url'] ? $form_cta_data['background_image']['url'] : '/wp-content/uploads/2022/06/homepage-middle-page-cta-background-img.jpg';

?>
<div class="block-form-cta" style="background-image:url('<?php echo $background_image . '.webp'; ?>');">
    <div class="columns">
        <div class="column-50">
            <div class="container">
                <h2><?php esc_html_e($form_cta_data['title']); ?></h2>
                <p><?php esc_html_e($form_cta_data['copy']); ?></p>
                <div class="columns">
                    <div class="column-50">
                        <p class="small-cta-text"><?php esc_html_e($form_cta_data['cta_text']); ?></p>
                    </div>
                    <div class="column-50">
                        <a class="btn yellow" title="call <?php the_field('default_phone', 'options'); ?> today" href="tel:<?php esc_html_e($clean_phone); ?>"><?php the_field('default_phone', 'options'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column-50">
            <div class="dog-ear-container blue">
                <?php echo do_shortcode($form_cta_data['gravity_form_shortcode']); ?>
            </div>
        </div>
    </div>
</div>