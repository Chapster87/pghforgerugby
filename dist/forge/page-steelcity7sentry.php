<?php
/*
 Template Name: Steel City 7s Entry
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="wrap cf">

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

						<h2 class="paypal-entry-header">Submit Entry Via Paypal Here:</h2>
						
						<div class="entry-row">
							<div class="entry-row__btn">
								<h2>Senior Club</h2>
								<?php echo print_wp_cart_button_for_product('Senior Club Entry', 257.75); ?>
							</div>
							<div class="entry-row__btn">
								<h2>High School</h2>
								<?php echo print_wp_cart_button_for_product('High School Entry', 231.97); ?>
							</div>
							<div class="entry-row__btn">
								<h2>Middle School</h2>
								<?php echo print_wp_cart_button_for_product('Middle School Entry', 206.20); ?>
							</div>
						</div>
						<div class="entry-row-header"><h3>Addtional Entries</h3></div>
						<div class="entry-row">
							<div class="entry-row__btn">
								<h2>Additional Side - <br/>Senior Club</h2>
								<?php echo print_wp_cart_button_for_product('Additional Senior Club Entry', 231.97); ?>
							</div>
							<div class="entry-row__btn">
								<h2>Additional Side - <br/>High School</h2>
								<?php echo print_wp_cart_button_for_product('Additional High School Entry', 206.20); ?>
							</div>
							<div class="entry-row__btn">
								<h2>Additional Side - <br/>Middle School</h2>
								<?php echo print_wp_cart_button_for_product('Additional Middle School Entry', 180.42); ?>
							</div>
						</div>

						<?php echo print_wp_shopping_cart() ?>
					</section>

					<footer class="article-footer">

						<div class="share-block">
							<div class="facebook">
								<div class="fb-share-button" data-type="button"></div>
							</div>
							<div class="twitter">
								<a class="twitter-share-button" href="https://twitter.com/share" data-count="none">Tweet</a>
							</div>
						</div>

      					<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

					</footer>

					<?php comments_template(); ?>

				</article>

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

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>