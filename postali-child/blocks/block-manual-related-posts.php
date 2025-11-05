<?php 
/* Related Posts that are hand picked */ 
$related_posts = $args['data']['related-posts'];
/* grab image url at random */
$images = get_field('images', 'options');
$count = 0;
function generateUrl($imgArr, &$num) {
    if( $num === count($imgArr) ) {
        $num = 0;
    }
    return $imgArr[$num]['featured_image']['url'];
}
?>

<?php if( $related_posts ) : ?>
    <div class="related-posts">
        <div class="card-holder card-slider">
            <?php foreach( $related_posts as $post) : 
                $the_post = $post['blog_post']; 
                $custom_author = get_field('author', $the_post->ID);
                $date = get_the_date('M d, Y', $the_post->ID);
                if( $custom_author['author_name'] ) {
                    $author_name = $custom_author['author_name'];
                } else {
                    $author_name = "Mac Hester";
                }?>

            <div class="post-container card dog-ear-container link-hunter">
                <div class="card-top" style="background-image:url('<?php echo checkWebpCompatibility( generateUrl($images, $count) ); $count++; ?>');">
                    <p class="date"><?php echo $date; ?></p>
                    <p class="title"><a href="<?php echo get_the_permalink($the_post->ID); ?>" title="<?php echo get_the_title($the_post->ID); ?>"><?php echo $the_post->post_title; ?></a></p>
                    <p class="author">Written by <?php echo $author_name; ?></p>
                </div>
                <div class="card-bottom">
                    <p>Read Article</p>
                </div>
            </div>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>
    </div>
<?php endif; ?>