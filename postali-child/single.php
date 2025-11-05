<?php
/**
 * Default Template
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
$custom_author = get_field('author');
echo $custom_author['author_name'];
if( $custom_author['author_name'] ) {
    $author_name = $custom_author['author_name'];
    $bio_pic = $custom_author['author_headshot']['url'];
} else {
    $author_name = "Attorney Mac Hester";
    $bio_pic = '/wp-content/uploads/2022/06/blog-post-author-thumbnail-mac-hester.jpg';
}

?>
<?php if( have_posts() ) : while( have_posts() ) : 
    the_post(); 
    $categories = get_categories($post->ID);
?>
<div id="post">
    <section class="hero" id="hero-no-bg">
        <?php if ( function_exists('yoast_breadcrumb') ) : ?>
            <div class="container wide">
                <?php yoast_breadcrumb('<p id="breadcrumbs">','</p>');  ?>
            </div>
        <?php endif; ?>
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div>
                        <p class="thin-text">Nursing Home Justice Blog</p>
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-25 author">
                    <div class="columns">
                        <div class="column-25">
                            <div class="author_img" style="background-image: url('<?php echo checkWebpCompatibility( $bio_pic ); ?>');"></div>
                        </div>
                        <div class="column-75 single-col">
                            <div class="author_name-container">
                                <span>
                                    <p><strong>Written By:</strong></p>
                                    <p><?php echo $author_name; ?></p>
                                </span>
                            </div>
                            <div class="author_date-container">
                                <p><strong>Date Posted:</strong></p>
                                <p><?php echo the_date(); ?></p>
                            </div>
                            <div class="author_tag-container">
                                <p><strong>Tagged In:</strong></p>
                                <?php the_category( ', ' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column-75 single-col">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-2">
        <?php get_template_part('blocks/block', 'recent-posts'); ?>
    </section>

</div>
<?php endwhile; endif; ?>

<?php get_footer();?>