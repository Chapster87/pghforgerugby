			<?php
				// If Single or Archive (Category, Tag, Author or a Date based page).
				if ( is_single() || is_archive() ) :
			?>
					</div><!-- /.col -->

					<?php
						get_sidebar();
					?>

				</div><!-- /.row -->
			<?php else: ?>
					</div><!-- /.col -->
				</div><!-- /.row -->
			<?php
				endif;
			?>
			<div id="social-feed">
				<div class="feed-inner">
					<button class="feed-trigger btn btn-primary">
						<span class="trigger-title">Social Media</span>
						<i class="fas fa-chevron-right"></i>
						<i class="fas fa-x"></i>
					</button>
					<div class="feed-main"></div>
					<div class="feed-ribbon">
						<?php get_template_part('templates/social/social-links'); ?>
					</div>
				</div>
			</div>
		</main><!-- /#main -->
		<footer id="footer" itemscope itemtype="http://schema.org/WPFooter">
			<div class="sponsors-bar">
				<div class="container">
					<div class="sponsors-bar-inner row">
						<div class="sponsor iron-city col-6 col-sm-4 col-xl">
							<a href="/forge-partner-with-iron-city-beer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/sponsors/ironcity.png" alt="Iron City Beer" class="sponsor__logo"></a>
						</div>
						<div class="sponsor ic-light col-6 col-sm-4 col-xl">
							<a href="/forge-partner-with-iron-city-beer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/sponsors/iclight.png" alt="IC Light Beer" class="sponsor__logo"></a>
						</div>
						<div class="sponsor ahn col-6 col-sm-4 col-xl">
							<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/sponsors/ahn.png" alt="Allegheny Health Network Sports Medicine" class="sponsor__logo"></a>
						</div>
						<div class="sponsor essmc col-6 col-sm-4 col-xl">
							<a href="/pittsburgh-forge-partners-with-essmc"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/sponsors/essmc.png" alt="Eastern Suburbs Sports Medicine" class="sponsor__logo"></a>
						</div>
						<div class="sponsor ruggers col-6 col-sm-4 col-xl">
							<a href="http://ruggerspub.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/sponsors/ruggers.png" alt="Ruggers Pub" class="sponsor__logo"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-main">
				<div class="container">
					<div class="row">
						<div class="join-forge col-12 col-lg-3">
							<a href="/contact" class="join-forge__link">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/forge_blast_drop.png" class="blast-logo" alt="<?php bloginfo('name'); ?>"/>
								<h3 class="join-forge__headline">Ready to get into the action?!<br/> Click here to contact us!</h3>
							</a>
						</div>
						<div class="col-12 col-lg-9">
							<div class="row">
								<div class="social col-12">
									<h3 class="social__header">Find us on Social Media:</h3>
									<ul class="social__links">
										<li><a href="https://www.facebook.com/pittsburghrugby" target="_blank"><span class="visually-hidden">Facebook</span><i class="fab fa-facebook"></i></a></li>
										<li><a href="https://www.instagram.com/pittsburghrugby/" target="_blank"><span class="visually-hidden">Instagram</span><i class="fab fa-instagram"></i></a></li>
										<li><a href="https://twitter.com/pittsburghrugby" target="_blank"><span class="visually-hidden">Twitter</span><i class="fab fa-twitter"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="row">
								<nav class="col-12" role="navigation">
								<?php
									if ( has_nav_menu( 'footer-links' ) ) : // See function register_nav_menus() in functions.php
										/*
											Loading WordPress Custom Menu (theme_location) ... remove <div> <ul> containers and show only <li> items!!!
											Menu name taken from functions.php!!! ... register_nav_menu( 'footer-menu', 'Footer Menu' );
											!!! IMPORTANT: After adding all pages to the menu, don't forget to assign this menu to the Footer menu of "Theme locations" /wp-admin/nav-menus.php (on left side) ... Otherwise the themes will not know, which menu to use!!!
										*/
										wp_nav_menu(
											array(
												'theme_location'  => 'footer-links',
												'container'       => 'div',
												'container_class' => 'footer-links',
												'fallback_cb'     => '',
												'items_wrap'      => '<ul id="menu-footer" class="nav footer-nav">%3$s</ul>',
												//'fallback_cb'    => 'WP_Bootstrap4_Navwalker_Footer::fallback',
												'walker'          => new WP_Bootstrap4_Navwalker_Footer(),
											)
										);
									endif;
								?>
								</nav>
							</div>
							<div class="row">
								<div class="col-12 col-lg-7 text-center">
									<p class="copyright mt-3"><?php printf( esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'forge' ), date_i18n( 'Y' ), get_bloginfo( 'name', 'display' ) ); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.container -->
			</div><!-- /.footer-main -->
		</footer><!-- /#footer -->
		<div class="edge-bottom"></div>
	</div><!-- /#wrapper -->
	<?php wp_footer(); ?>

	<div id="fb-root"></div>
	<script>
		// Facebook Share
		(function (d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

		// Twitter Share
		! function (d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (!d.getElementById(id)) {
				js = d.createElement(s);
				js.id = id;
				js.src = "https://platform.twitter.com/widgets.js";
				fjs.parentNode.insertBefore(js, fjs);
			}
		}(document, "script", "twitter-wjs");
	</script>
	<script>
		(function () {
			$.getJSON('http://search.twitter.com/search.json?q=pittsburghrugby&callback=?', function (data) {
				var user = data.results[0].from_user;
				tweet = data.results[0].text;
				$("#show_tweet").html('<span class="twitterUser">@' + user + ':</span> "' + tweet + '"');
			});
		})();
	</script>

</body>
</html>