<!-- Related Posts Block --> 
<?php $categories = get_the_category();
$category_id = $categories[0]->cat_ID; ?>

<?php $args = array( 
    'posts_per_page' => 3, 
    'category' => $category_id,
    'post__not_in' => array( $post->ID )
);

$relatedposts = get_posts( $args );
$count = count($relatedposts); 
?>

<?php if ($count >= 1) { ?>

<section class="related-posts">
    <?php if( is_single() ) : ?>
        <h2 class="center-border">Related Readings</h2>
    <?php else : ?>
        <h2 class="center-border">News & Updates</h2>
    <?php endif; ?>

    
    
    <div class="columns">
        <div class="card-holder card-slider">
            <?php                 
            $relatedposts = get_posts( $args );
            foreach ( $relatedposts as $post ) : setup_postdata( $post ); 
            foreach (get_the_category() as $cat) { $category = $cat->name; }?>
                <div class="post-container card <?php if( !is_single() ) : ?> link-hunter <?php endif; ?>">
                    <p><?php echo the_date('F d, Y'); ?></p>
                    <p class="blog-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
                    <!-- elements for blog posts only -->
                    <?php if( is_single() ) : ?>
                        <p class="category"><strong>Category: </strong><?php echo $category; ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn" title="<?php the_title_attribute(); ?>">Read Article</a>
                    <?php endif; ?>
                </div>
            <?php endforeach; 
            wp_reset_postdata();?>
        </div>
    </div>
</section>

<?php } ?>