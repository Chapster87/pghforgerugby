<?php
/**
 * Template Name: Homepage
 * Description: Homepage Template
 *
 */

get_header();

the_post();
?>

<div class="homepage-hero">
    <div class="container">
		<div class="row">
            <div id="post-<?php the_ID(); ?>" <?php post_class( 'content col-12' ); ?>>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php
                    the_content();

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'forge' ),
                        'after'  => '</div>',
                    ) );
                    edit_post_link( __( 'Edit', 'forge' ), '<span class="edit-link">', '</span>' );
                ?>
            </div><!-- /#post-<?php the_ID(); ?> -->
        </div>
    </div>
</div>

<div class="post-cards-home">
    <div class="container">
        <div class="row post-card-row row-cols-1 row-cols-md-4">
        <?php
            query_posts( array('posts_per_page'=>5) );
            while ( have_posts() ) : the_post();
        ?>
            <div class="col">
                <div class="card post-card h-100 mb-3">
                    <?php if ( has_post_thumbnail() ): // check for the featured image ?>
                        <a href="<?php the_permalink() ?>" class="card-img-link" title="<?php the_title(); ?>">
                            <img src="<?php the_post_thumbnail_url( 'medium_large' ); ?>" class="card-img card-img-top" alt="<?php the_title(); ?>">
                        </a>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text"><?php echo get_the_excerpt(); ?></p>
                    </div>
                </div>
            </div>
        <?php
            endwhile;
            wp_reset_query(); // resets main query
        ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>
