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

<?php if ( is_active_sidebar( 'homepage-countdown' ) ) : ?>
    <div class="home-countdown-widget">
        <div class="home-countdown-inner">
            <div class="countdown-heading">
                <h3 class="headline">Upcoming Matches</h3>
            </div>
            <div class="home-countdown-main">
                <?php dynamic_sidebar( 'homepage-countdown' ); ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="post-cards-home">
    <div class="row">
        <div class="col-12">
            <div class="swiper-outer">
                <div class="post-card-row swiper slider-core-css">
                    <div class="swiper-wrapper">
                        <?php
                            query_posts( array('posts_per_page'=>7) );
                            while ( have_posts() ) : the_post();
                        ?>
                            <div class="swiper-slide">
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
                            </div>
                        <?php
                            endwhile;
                            wp_reset_query(); // resets main query
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-scrollbar"></div>
                </div>
                <div class="swiper-button-prev swiper-nav-prev-hp-card"></div>
                <div class="swiper-button-next swiper-nav-next-hp-card"></div>
            </div>
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
