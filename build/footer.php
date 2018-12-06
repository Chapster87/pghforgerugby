<div class="sponsors__bar">
	<div class="sponsors__bar-inner wrap cf">
		<a href="https://pghrugby.com/dugan-associates-supports-pittsburghs-rugby-club" class="sponsor dugan"><img src="<?php echo get_template_directory_uri(); ?>/library/images/sponsors/dugan.png" alt="Dugan & Associates" class="sponsor__logo"></a>
		<a href="https://pghrugby.com/pittsburgh-forge-partners-with-essmc" class="sponsor essmc"><img src="<?php echo get_template_directory_uri(); ?>/library/images/sponsors/essmc.png" alt="Eastern Suburbs Sports Medicine" class="sponsor__logo"></a>
		<a href="https://pghrugby.com/mhk-supports-the-pittsburgh-forge" class="sponsor mhk"><img src="<?php echo get_template_directory_uri(); ?>/library/images/sponsors/mhk.png" alt="Malec, Herring & Krause" class="sponsor__logo"></a>
		<a href="http://ruggerspub.com/" class="sponsor ruggers" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/sponsors/ruggers.png" alt="Ruggers Pub" class="sponsor__logo"></a>
	</div>
</div>

<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

	<div id="inner-footer" class="wrap cf">

		<div class="footer__row row-1">
			<div class="forge-blast">
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/forge_blast_drop.png" class="blast-logo" alt="<?php bloginfo('name'); ?>"/>
			</div>

			<div class="social">
				<h3>Join us on social Media:</h3>
				<ul class="social__links">
					<li><a href="https://www.facebook.com/pittsburghrugby" target="_blank"><span class="visually-hidden">Facebook</span><i class="fab fa-facebook"></i></a></li>
					<li><a href="https://www.instagram.com/pittsburghrugby/" target="_blank"><span class="visually-hidden">Instagram</span><i class="fab fa-instagram"></i></a></li>
					<li><a href="https://twitter.com/pittsburghrugby" target="_blank"><span class="visually-hidden">Twitter</span><i class="fab fa-twitter"></i></a></li>
				</ul>
			</div>

			<nav role="navigation">
				<?php wp_nav_menu(array(
					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
					'theme_location' => 'footer-links',             // where it's located in the theme
					'before' => '',                                 // before the menu
					'after' => '',                                  // after the menu
					'link_before' => '',                            // before each link
					'link_after' => '',                             // after each link
					'depth' => 0,                                   // limit the depth of the nav
					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
					)); ?>
			</nav>
		</div>

		<div class="footer__row row-2">

			<p class="source-org copyright">&copy;
				<?php echo date('Y'); ?>
				<?php bloginfo( 'name' ); ?>.</p>

		</div>

	</div>

</footer>

</div>

<?php // all js scripts are loaded in library/bones.php ?>
<?php wp_footer(); ?>

<div id="fb-root"></div>
<script>
	(function (d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s);
		js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<script>
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

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>

</html> <!-- end of site. what a ride! -->