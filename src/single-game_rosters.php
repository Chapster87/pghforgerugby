<?php
/*
Template Name: Game Roster Graphic
Template Post Type: game_rosters
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<header class="article-header">

									<h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
									<p class="byline vcard"><?php
										printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) ), get_the_term_list( $post->ID, 'custom_cat', ' ', ', ', '' ) );
									?></p>

								</header>

								<section class="entry-content cf">

									<?php if ( get_field('bg_image') ) : ?>
										<?php
											$bg_image = get_field('bg_image');
											$url = $bg_image['url'];
										?>
									<?php endif; ?>

									<div class="match-graphic" style="background-image:url('<?php echo esc_url($url); ?>');">
										<div class="inner">
											<div class="mg-top">
												<h2 class="headline">Pittsburgh Forge <?php get_field('mens_womens') ? the_field('mens_womens') : '' ?> - <?php if ( get_field('game_tier') ) : the_field('game_tier'); endif; ?></h2>
												<h3 class="opponent">
													<span class="opp-city"><?php get_field('opponent_city') ? the_field('opponent_city') : '' ?></span>
													<span class="opponent-row">
														<?php if ( get_field('home_away') ) { ?>
															<?php if (get_field('home_away') == 'Home') { ?>
																<span class="home-away">VS</span>
															<?php } else { ?>
																<span class="home-away">@</span>
															<?php } ?>
														<?php } ?>
														<span class="opp-name"><?php get_field('opponent_name') ? the_field('opponent_name') : '' ?></span>
													</span>
												</h3>
											</div>
											<div class="mg-main">
												<div class="mg-main-left">
													<div class="roster-top">
														<div class="roster-col forwards">
															<div class="roster-head">
																<h4>Forwards</h4>
															</div>
															<?php $forwards = get_field('forwards');
																if( $forwards ): ?>
																<ul class="roster-list">
																	<li><span class="pos-num">1 </span><?php echo $forwards['pos_1'] ?></li>
																	<li><span class="pos-num">2 </span><?php echo $forwards['pos_2'] ?></li>
																	<li><span class="pos-num">3 </span><?php echo $forwards['pos_3'] ?></li>
																	<li><span class="pos-num">4 </span><?php echo $forwards['pos_4'] ?></li>
																	<li><span class="pos-num">5 </span><?php echo $forwards['pos_5'] ?></li>
																	<li><span class="pos-num">6 </span><?php echo $forwards['pos_6'] ?></li>
																	<li><span class="pos-num">7 </span><?php echo $forwards['pos_7'] ?></li>
																	<li><span class="pos-num">8 </span><?php echo $forwards['pos_8'] ?></li>
																</ul>
															<?php endif; ?>
														</div>
														<div class="roster-col backs">
															<div class="roster-head">
																<h4>Backs</h4>
															</div>
															<?php $backs = get_field('backs');
																if( $backs ): ?>
																<ul class="roster-list">
																	<li><span class="pos-num">9 </span><?php echo $backs['pos_9'] ?></li>
																	<li><span class="pos-num">10 </span><?php echo $backs['pos_10'] ?></li>
																	<li><span class="pos-num">11 </span><?php echo $backs['pos_11'] ?></li>
																	<li><span class="pos-num">12 </span><?php echo $backs['pos_12'] ?></li>
																	<li><span class="pos-num">13 </span><?php echo $backs['pos_13'] ?></li>
																	<li><span class="pos-num">14 </span><?php echo $backs['pos_14'] ?></li>
																	<li><span class="pos-num">15 </span><?php echo $backs['pos_15'] ?></li>
																</ul>
															<?php endif; ?>
														</div>
													</div>
													<div class="roster-bottom">
														<div class="roster-col reserves">
															<div class="roster-head">
																<h4>Reserves</h4>
															</div>
															<?php $reserves = get_field('reserves');
															if( $reserves ): ?>
																<ul class="roster-list">
																	<?php if ( $reserves['pos_16'] ) : ?> <li><span class="pos-num">16 </span><?php echo $reserves['pos_16'] ?></li> <?php endif; ?>
																	<?php if ( $reserves['pos_17'] ) : ?> <li><span class="pos-num">17 </span><?php echo $reserves['pos_17'] ?></li> <?php endif; ?>
																	<?php if ( $reserves['pos_18'] ) : ?> <li><span class="pos-num">18 </span><?php echo $reserves['pos_18'] ?></li> <?php endif; ?>
																	<?php if ( $reserves['pos_19'] ) : ?> <li><span class="pos-num">19 </span><?php echo $reserves['pos_19'] ?></li> <?php endif; ?>
																	<?php if ( $reserves['pos_20'] ) : ?> <li><span class="pos-num">20 </span><?php echo $reserves['pos_20'] ?></li> <?php endif; ?>
																	<?php if ( $reserves['pos_21'] ) : ?> <li><span class="pos-num">21 </span><?php echo $reserves['pos_21'] ?></li> <?php endif; ?>
																	<?php if ( $reserves['pos_22'] ) : ?> <li><span class="pos-num">22 </span><?php echo $reserves['pos_22'] ?></li> <?php endif; ?>
																	<?php if ( $reserves['pos_23'] ) : ?> <li><span class="pos-num">23 </span><?php echo $reserves['pos_23'] ?></li> <?php endif; ?>
																	<?php if ( $reserves['pos_24'] ) : ?> <li><span class="pos-num">24 </span><?php echo $reserves['pos_24'] ?></li> <?php endif; ?>
																	<?php if ( $reserves['pos_25'] ) : ?> <li><span class="pos-num">25 </span><?php echo $reserves['pos_25'] ?></li> <?php endif; ?>
																</ul>
															<?php endif; ?>
														</div>
													</div>
												</div>
												<div class="mg-main-right">
													<div class="match-date">
														<?php get_field('match_date') ? the_field('match_date') : '' ?>
													</div>
													<div class="match-address">
														<?php if ( get_field('bg_image') ) : ?>
															<span class="address1"><?php the_field('address') ?>,&nbsp;</span>
														<?php endif; ?>
														<span class="city-state"><?php get_field('city_state') ? the_field('city_state') : '' ?></span>
													</div>
												</div>
											</div>
										</div>
									</div>
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
								</section> <!-- end article section -->

								<footer class="article-footer">
									<p class="tags"><?php echo get_the_term_list( get_the_ID(), 'custom_tag', '<span class="tags-title">' . __( 'Custom Tags:', 'bonestheme' ) . '</span> ', ', ' ) ?></p>

								</footer>

								<?php comments_template(); ?>

							</article>

							<?php endwhile; ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

						<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
