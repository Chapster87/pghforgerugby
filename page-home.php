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
                <!-- <h1 class="entry-title"> -->
                        <?php // the_title(); ?>
                <!-- </h1> -->
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
    <div class="row">
        <div class="col-12 post-card-row slider-core-css">
            <?php
                global $post;
                $args = array( 'numberposts' => 8, 'category_name' => 'club-news' );
                $posts = get_posts( $args );
                foreach( $posts as $post ): setup_postdata($post);
            ?>

                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        <?php if ( has_post_thumbnail() ): // check for the featured image ?>
                            <a href="<?php the_permalink() ?>" class="card-img-link" title="<?php the_title(); ?>">
                                <img src="<?php the_post_thumbnail_url( 'medium_large' ); ?>" class="card-img" alt="<?php the_title(); ?>">
                            </a>
                        <?php endif; ?>
                        <p class="card-text"><?php echo get_the_excerpt(); ?> <a class="excerpt-read-more" href="<?php the_permalink() ?>">Read More</a></p>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>

<video id="bg-video" className="home-video" playsinline autoplay muted loop>
    <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/ForgeJerseyRevealBG.mp4" type="video/mp4"/>
    <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/ForgeJerseyRevealBG.ogv" type="video/ogg"/>
    <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/ForgeJerseyRevealBG.webm" type="video/webm"/>
</video>
<?php
get_footer();
?>
