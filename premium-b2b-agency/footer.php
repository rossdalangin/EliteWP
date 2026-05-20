<?php
/**
 * The template for displaying the footer
 *
 * @package Premium_B2B
 */

?>

	<footer id="colophon" class="site-footer section" style="background-color: var(--color-primary); color: var(--color-white);">
		<div class="container grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
			<div class="footer-branding">
				<h2 style="color: var(--color-white); font-size: var(--fs-lg);"><?php bloginfo( 'name' ); ?></h2>
				<p style="opacity: 0.7; max-width: 30ch;"><?php bloginfo( 'description' ); ?></p>

				<div class="social-links flex" style="margin-top: 2rem;">
					<?php
					$socials = array( 'linkedin', 'twitter', 'instagram' );
					foreach ( $socials as $social ) :
						$url = get_theme_mod( "social_{$social}" );
						if ( $url ) :
							printf( '<a href="%s" target="_blank" rel="noopener noreferrer" style="text-transform: capitalize;">%s</a>', esc_url( $url ), esc_html( $social ) );
						endif;
					endforeach;
					?>
				</div>
			</div>
			<div class="footer-links">
				<h4 style="color: var(--color-white); margin-bottom: 1rem;"><?php esc_html_e( 'Quick Links', 'premium-b2b' ); ?></h4>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu',
						'container'      => false,
						'menu_class'     => 'footer-menu',
						'fallback_cb'    => false,
					)
				);
				?>
			</div>
			<div class="footer-cta">
				<h4 style="color: var(--color-white); margin-bottom: 1rem;"><?php esc_html_e( 'Start Scaling', 'premium-b2b' ); ?></h4>
				<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary">
					<?php echo esc_html( get_theme_mod( 'hero_cta_text', __( 'Get a Free Strategy Session', 'premium-b2b' ) ) ); ?>
				</a>
			</div>
		</div><!-- .container -->

		<div class="container site-info" style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.1); text-align: center; font-size: var(--fs-xs); opacity: 0.5;">
			<p>
				<?php echo wp_kses_post( get_theme_mod( 'footer_copyright', sprintf( '&copy; %s %s. All rights reserved.', date( 'Y' ), get_bloginfo( 'name' ) ) ) ); ?>
				<?php printf( esc_html__( 'Built with %s.', 'premium-b2b' ), '<a href="https://wordpress.org/" style="color: inherit; text-decoration: underline;">WordPress</a>' ); ?>
			</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
