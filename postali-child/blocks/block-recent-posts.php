<?php /* Recent Posts Block */

/* grab image url at random */
$images = get_field('images', 'options');
$img_count = 0;
function generateUrl($imgArr, &$num) {
    if( $num === count($imgArr) ) {
        $num = 0;
    }
    return $imgArr[$num]['featured_image']['url'];
}

 $args = array( 
    'posts_per_page'    => 4, 
    'category'          => 0,
    'orderby'           => 'date',
    'order'             => 'desc',
    'post_type'         => 'post',
    'post__not_in' => array( $post->ID )
);

$recent_posts = get_posts( $args );
$count = count($recent_posts); 
?>

<?php if( $count > 0 ) : ?>
<div class="container">
    <div class="columns">
        <div class="column-full single-col">
            <p class="sub-title">Recent Posts</p>
        </div>
    </div>
</div>
<section class="recent-posts container">    
    <div class="card-holder card-slider">
        <?php                 
        $recent_posts = get_posts( $args );
        foreach ( $recent_posts as $post ) :
        $custom_author = get_field('author', $post->ID);
        if( $custom_author['author_name'] ) {
            $author_name = $custom_author['author_name'];
        } else {
            $author_name = "Mac Hester";
        }
        ?>
            <div class="post-container card dog-ear-container link-hunter">
                <div class="card-top" style="background-image:url('<?php echo checkWebpCompatibility( generateUrl($images, $img_count) ); $img_count++; ?>');">
                    <p class="date"><?php echo $post->post_date; ?></p>
                    <p class="title"><a href="<?php echo get_the_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID); ?>"><?php echo $post->post_title; ?></a></p>
                    <p class="author">Written By <?php echo $author_name; ?></p>
                </div>
                <div class="card-bottom">
                    <p>Read Article</p>
                </div>
            </div>

        <?php endforeach; 
        wp_reset_postdata();?>
    </div>
</section>
<?php endif; ?>
