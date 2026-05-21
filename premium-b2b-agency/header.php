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
		<div class="container flex" style="justify-content: space-between;">
			<div class="site-branding">
				<?php
				if ( has_custom_logo() ) :
					the_custom_logo();
				else :
					?>
					<h1 class="site-title" style="margin-bottom: 0;">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <span class="logo-icon">&lt;/&gt;</span>
                            <span class="brand-text"><?php bloginfo( 'name' ); ?></span>
                        </a>
					</h1>
					<?php
				endif;
				?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" style="display: none;">
					<span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'premium-b2b' ); ?></span>
                    <span class="hamburger"></span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'menu_class'     => 'main-menu-list',
						'fallback_cb'    => false,
					)
				);
				?>
			</nav><!-- #site-navigation -->

			<div class="header-cta hidden-mobile">
				<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary">
					<?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Strategy Session' ) ); ?>
				</a>
			</div>
		</div>
	</header><!-- #masthead -->

	<?php if ( get_theme_mod( 'enable_mobile_cta', true ) ) : ?>
		<div class="mobile-sticky-cta">
			<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary">
				<?php echo esc_html( get_theme_mod( 'hero_cta_text', __( 'Book Strategy Session', 'premium-b2b' ) ) ); ?>
			</a>
		</div>
	<?php endif; ?>
