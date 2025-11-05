<?php 
/* Featured Testimonial Block */
$testimonial_bg = $args['data']['image'];
$testimonial_data = $args['data']['testimonial'];
$review_source = $testimonial_data->review_source;
if( $testimonial_data ) {
    $rating = $testimonial_data->rating;
    $excerpt = $testimonial_data->excerpt;
    $author = $testimonial_data->author_name;
} else {
    $rating = get_field('rating', 653);
    $excerpt = get_field('excerpt', 653);
    $author = get_field('author_name', 653);
}

$review_img = '/wp-content/uploads/2022/06/google-reviews-logo-white.png';
if( $review_source === 'google') {
    $review_img = '/wp-content/uploads/2022/06/google-reviews-logo-white.png';
}


$background_img = $testimonial_bg['url'] ? $testimonial_bg['url'] . '.webp' : '/wp-content/uploads/2022/06/homepage-testimonial-background-img1.jpg.webp';

?>
<div class="block-featured-testimonial" style="background-image: url('<?php echo ( $background_img ); ?>');">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <div class="rating-el">
                    <p class="rating"><?php esc_html_e($rating); ?></p>
                    <img alt="testimonial rating badge" src="<?php esc_html_e($review_img); ?>" width="122" height="49">
                </div>
            </div>
            <div class="column-66">
                <div class="testimonial-el">
                    <p class="quote">"<?php esc_html_e($excerpt); ?>"</p>
                    <p class="author"><?php esc_html_e($author); ?></p>
                    <a href="/reviews/" class="arrow">Read Our Testimonial</a>
                </div>
            </div>
        </div>
    </div>
</div>