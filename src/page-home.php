<?php
/*
 Template Name: Homepage
*/
?>

<?php get_header(); ?>

	<div class="hero">
		<div class="wrap cf">
			<main id="main" class="primary cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<header class="article-header">

							<?php if ( get_field(alt_page_title) ) : ?>

								<h1 class="page-title" itemprop="headline"><?php the_field(alt_page_title); ?></h1>

							<?php else : ?>

								<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

							<?php endif; ?>

							<?php /*<p class="byline vcard">
								<?php printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
							</p> */?>

						</header>

						<section class="entry-content cf" itemprop="articleBody">
							<?php
								// the content (pretty self explanatory huh)
								the_content();

								/*
								* Link Pages is used in case you have posts that are set to break into
								* multiple pages. You can remove this if you don't plan on doing that.
								*
								* Also, breaking content up into multiple pages is a horrible experience,
								* so don't do it. While there are SOME edge cases where this is useful, it's
								* mostly used for people to get more ad views. It's up to you but if you want
								* to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
								*
								* http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
								*
								*/
								wp_link_pages( array(
									'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
									'after'       => '</div>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
								) );
							?>
						</section>

						<footer class="article-footer">

							<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

						</footer>

						<?php comments_template(); ?>

					</article>

					<video id="bg-video" className="home-video" muted loop>
						<source src="<?php echo get_template_directory_uri(); ?>/library/videos/ForgeJerseyRevealBG.mp4" type="video/mp4"/>
						<source src="<?php echo get_template_directory_uri(); ?>/library/videos/ForgeJerseyRevealBG.ogv" type="video/ogg"/>
						<source src="<?php echo get_template_directory_uri(); ?>/library/videos/ForgeJerseyRevealBG.webm" type="video/webm"/>
					</video>

				<?php endwhile; else : ?>

					<article id="post-not-found" class="hentry cf">
							<header class="article-header">
								<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
						</header>
							<section class="entry-content">
								<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
						</section>
						<footer class="article-footer">
								<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
						</footer>
					</article>

				<?php endif; ?>

			</main>
		</div>
	</div>

	<div id="content">

		<div id="inner-content" class="wrap cf tile-slider">

			<ul class="home-posts">
				<?php
				    query_posts( array('posts_per_page'=>5) );
				    while ( have_posts() ) : the_post();
				?>
					<li class="post-tile">
					    <a href="<?php the_permalink() ?>" class="post-tile__link" title="<?php the_title(); ?>">
					    	<h2  class="post-tile__headline" ><?php the_title(); ?></h2>
						    <?php if ( has_post_thumbnail() ): // check for the featured image
					    		the_post_thumbnail( 'medium_large' ); // echo the featured image
							endif; ?>
						</a>
					    <p class="post-tile__text"><?php echo get_the_excerpt(); ?></p>
					</li>
				<?php
				    endwhile;
				    wp_reset_query(); // resets main query
				?>
			</ul>

			<?php /*get_sidebar('homepage');*/ ?>

		</div>

	</div>

<?php get_footer(); ?>
