<?php
/**
 * Template Name: History Timeline
 * Description: Page for displaying an interactive timeline for Forge history events
 *
 */

get_header();

the_post();
?>

<div id="forge-history">
    <section class="story-hero">
        <div id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>
            <h1 class="entry-title">
                <?php the_title(); ?>
            </h1>
            <?php
                the_content();

                // edit_post_link( __( 'Edit', 'forge' ), '<span class="edit-link">', '</span>' );
            ?>
        </div><!-- /#post-<?php the_ID(); ?> -->
    </section>

    <div class="story-progress dynamic">
        <div class="progress-label">
        <?php
            global $post;
            $args = array( 'post_type' => 'history', 'post_status' => 'publish', 'numberposts' => -1 );
            $posts = get_posts( $args );
            foreach( $posts as $key => $post): setup_postdata($post);
            $i = $key + 1;
        ?>
            <div class="progress-title">Event #<?=$i?></div>
        <?php endforeach; ?>
        </div>
        <div class="progress">
            <div id="dynamic-progress" class="progress-bar progress-bar-striped progress-bar-animated bg-primary text-secondary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>

    <div class="story-progress full">
        <div class="progress-label">Timeline Progress</div>
        <div class="progress">
            <div id="full-progress" class="progress-bar progress-bar-striped progress-bar-animated bg-primary text-secondary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>

    <div class="story-progress scrolling">
        <div class="progress">
            <div id="scrolling-progress" class="progress-bar progress-bar-striped progress-bar-animated bg-primary text-secondary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>

    <section class="story">
        <?php
            global $post;
            $args = array( 'post_type' => 'history', 'post_status' => 'publish', 'numberposts' => -1, 'orderby' => 'post_date' , 'order' => 'ASC' );
            $posts = get_posts( $args );
            foreach( $posts as $key => $post): setup_postdata($post);
        ?>
            <div id="event-<?php the_ID() ?>" class="event-index-<?=$key?> story-event">
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
        <?php endforeach; ?>
    </section>
</div>

<?php
get_footer();
?>
