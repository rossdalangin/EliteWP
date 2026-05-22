<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Performance Hints -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'premium-b2b' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container header-container">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo-link">
                    <span class="logo-icon">&lt;/&gt;</span>
                    <span class="brand-name"><?php bloginfo( 'name' ); ?></span>
                </a>
			</div>

			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'menu_class'     => 'nav-menu',
						'fallback_cb'    => false,
					)
				);
				?>
                <!-- Mobile specific menu footer -->
                <div class="mobile-menu-footer visible-mobile">
                    <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary">
                        <?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Strategy Session' ) ); ?>
                    </a>
                </div>
			</nav>

			<div class="header-actions">
                <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary hidden-mobile">
                    <?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Session' ) ); ?>
                </a>
                <button class="menu-toggle visible-mobile" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle Navigation">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
				</button>
			</div>
		</div>
	</header>

	<?php if ( get_theme_mod( 'enable_mobile_cta', true ) ) : ?>
		<div class="mobile-sticky-cta visible-mobile">
			<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary">
				<?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Strategy Session' ) ); ?>
			</a>
		</div>
	<?php endif; ?>
