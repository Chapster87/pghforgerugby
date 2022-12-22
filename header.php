<!DOCTYPE html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php // force Internet Explorer to use the latest rendering engine available ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title(''); ?></title>

	<?php // mobile meta ?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php // icons & favicons ?>
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">

	<?php // manifest files ?>
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-57x57.png" sizes="57x57">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-60x60.png" sizes="60x60">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-72x72.png" sizes="72x72">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-76x76.png" sizes="76x76">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-114x114.png" sizes="114x114">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-120x120.png" sizes="120x120">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-144x144.png" sizes="144x144">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-152x152.png" sizes="152x152">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-180x180.png" sizes="180x180">
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<![endif]-->
	<?php // or, set /favicon.ico for IE10 win ?>
	<meta name="msapplication-TileColor" content="#000">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
	<meta name="theme-color" content="#FFB81C">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<?php
	$navbar_scheme   = get_theme_mod( 'navbar_scheme', 'navbar-light bg-light' ); // Get custom meta-value.
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // Get custom meta-value.

	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>

<body <?php body_class('preload'); ?> itemscope itemtype="http://schema.org/WebPage">

<?php wp_body_open(); ?>

<a href="#main" class="visually-hidden-focusable"><?php esc_html_e( 'Skip to main content', 'forge' ); ?></a>

<div id="wrapper">
	<header id="header" class="<?php echo esc_attr( $navbar_scheme ); if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>" itemscope itemtype="http://schema.org/WPHeader">
		<div class="header-top d-none d-lg-block">
			<div class="header-top-inner">
				<div class="container">
					<div class="row">
						<div class="col-6 offset-6 d-flex justify-content-end">
							<?php get_template_part('templates/social/social-links'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="header-main">
			<div class="header-main-inner container">
				<div class="navbar-logo">
					<a class="navbar-logo-link" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" itemscope itemtype="http://schema.org/Organization">
						<?php
							$header_logo = get_theme_mod( 'header_logo' ); // Get custom meta-value.

							if ( ! empty( $header_logo ) ) :
						?>
							<img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
						<?php
							else :
								echo esc_attr( get_bloginfo( 'name', 'display' ) );
							endif;
						?>
						<span class="sr-only">Pittsburgh Forge Rugby Club</span>
					</a>
				</div>

				<button class="navbar-toggler d-lg-none hamburger hamburger--squeeze" type="button" aria-controls="navbar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'forge' ); ?>">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>

				<div id="navbar" class="row" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'main-menu',
								'menu_class'      => 'nav-wrapper',
								'container_class' => 'navbar-menu-container col-12',
								'items_wrap'      => '<ul id="primary-nav" class="%2$s">%3$s</ul>',
								'fallback_cb'     => false,
							)
						);

						// if ( '1' === $search_enabled ) :
					?>
							<!-- <form class="search-form my-2 my-lg-0" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<div class="input-group">
									<input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e( 'Search', 'forge' ); ?>" title="<?php esc_attr_e( 'Search', 'forge' ); ?>" />
									<button type="submit" name="submit" class="btn btn-outline-secondary"><?php esc_html_e( 'Search', 'forge' ); ?></button>
								</div>
							</form> -->
					<?php
						 // endif;
					?>
				</div><!-- /.navbar-collapse -->
				<a href="/contact" class="mm-contact d-block d-lg-none"><i class="fas fa-envelope"></i></a>
			</div><!-- /.container -->
		</nav><!-- /#header -->
	</header>

	<main id="main" class="container">
		<?php
			// If Single or Archive (Category, Tag, Author or a Date based page).
			if ( is_single() || is_archive() ) :
				if ( is_woocommerce() ) :
		?>
			<div class="row">
				<div class="col-12 col-lg-9 col-xl-10 mt-4">
			<?php else: ?>
			<div class="row">
				<div class="col-12 col-lg-9 col-xl-10 mt-4">
			<?php endif; ?>
		<?php else: ?>
			<div class="row">
				<div class="col-12 mt-4">
		<?php endif; ?>
