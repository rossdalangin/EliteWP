<?php
/**
 * The template for displaying the footer
 *
 * @package Premium_B2B
 */

?>

	<footer id="colophon" class="site-footer section" style="background-color: var(--color-primary); color: var(--color-white);">
		<div class="container grid" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
			<div class="footer-column brand">
				<h2 style="color: var(--color-white); font-size: var(--fs-lg);"><?php bloginfo( 'name' ); ?></h2>
				<p style="opacity: 0.7; max-width: 30ch; font-size: var(--fs-sm);"><?php bloginfo( 'description' ); ?></p>

				<div class="social-links flex" style="margin-top: 2rem;">
					<?php
					$socials = array( 'linkedin', 'twitter', 'instagram' );
					foreach ( $socials as $social ) :
						$url = get_theme_mod( "social_{$social}" );
						if ( $url ) :
							printf( '<a href="%s" target="_blank" rel="noopener noreferrer" style="text-transform: capitalize; font-size: var(--fs-xs);">%s</a>', esc_url( $url ), esc_html( $social ) );
						endif;
					endforeach;
					?>
				</div>
			</div>

			<div class="footer-column systems">
				<h4 style="color: var(--color-white); margin-bottom: 1rem;"><?php esc_html_e( 'Systems', 'premium-b2b' ); ?></h4>
				<ul style="font-size: var(--fs-sm); opacity: 0.8; display: flex; flex-direction: column; gap: 0.5rem;">
                    <li><a href="#"><?php esc_html_e( 'Our Services', 'premium-b2b' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Case Studies', 'premium-b2b' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'The Framework', 'premium-b2b' ); ?></a></li>
                </ul>
			</div>

			<div class="footer-column resources">
				<h4 style="color: var(--color-white); margin-bottom: 1rem;"><?php esc_html_e( 'Resources', 'premium-b2b' ); ?></h4>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu',
						'container'      => false,
						'menu_class'     => 'footer-menu-list',
						'fallback_cb'    => false,
					)
				);
				?>
			</div>

			<div class="footer-column cta">
				<h4 style="color: var(--color-white); margin-bottom: 1rem;"><?php esc_html_e( 'Start Scaling', 'premium-b2b' ); ?></h4>
				<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary" style="padding: 0.75rem 1.5rem; font-size: var(--fs-xs);">
					<?php echo esc_html( get_theme_mod( 'hero_cta_text', __( 'Book Audit', 'premium-b2b' ) ) ); ?>
				</a>
			</div>
		</div><!-- .container -->

		<div class="container site-info" style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.1); text-align: center; font-size: var(--fs-xs); opacity: 0.5;">
			<p>
				<?php echo wp_kses_post( get_theme_mod( 'footer_copyright', sprintf( '&copy; %s %s. Elite B2B Acquisition Framework.', date( 'Y' ), get_bloginfo( 'name' ) ) ) ); ?>
				<?php printf( esc_html__( 'Built with %s.', 'premium-b2b' ), '<a href="https://wordpress.org/" style="color: inherit; text-decoration: underline;">WordPress</a>' ); ?>
			</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

	<div id="scroll-to-top" aria-label="Scroll to top" role="button">
		&uarr;
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
