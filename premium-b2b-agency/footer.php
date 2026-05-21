<?php
/**
 * The template for displaying the footer
 *
 * @package Premium_B2B
 */

?>

	<footer id="colophon" class="site-footer section">
		<div class="container grid" style="grid-template-columns: 1.5fr 1fr 1fr 1.5fr; gap: 6rem;">
			<div class="footer-column brand">
				<div class="site-branding" style="margin-bottom: 2.5rem;">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: flex; align-items: center; gap: 1rem;">
                        <span class="logo-icon">&lt;/&gt;</span>
                        <h2 style="margin-bottom: 0; font-size: var(--fs-md); color: white;"><?php bloginfo( 'name' ); ?></h2>
                    </a>
                </div>
				<p style="margin-bottom: 3.5rem; max-width: 40ch; line-height: 1.8; font-size: var(--fs-sm);"><?php bloginfo( 'description' ); ?></p>

				<div class="social-links flex" style="gap: 1.5rem;">
					<?php
					$socials = array( 'linkedin', 'twitter', 'instagram' );
					foreach ( $socials as $social ) :
						$url = get_theme_mod( "social_{$social}" );
						if ( $url ) :
							printf(
                                '<a href="%1$s" target="_blank" rel="noopener noreferrer" aria-label="%2$s" style="background: rgba(255,255,255,0.05); width: 3rem; height: 3rem; display: flex; align-items: center; justify-content: center; border-radius: 0.75rem; font-weight: 900; font-size: 0.85rem; color: white;">%3$s</a>',
                                esc_url( $url ),
                                esc_attr( ucfirst( $social ) ),
                                esc_html( strtoupper( substr($social, 0, 2) ) )
                            );
						endif;
					endforeach;
					?>
				</div>
			</div>

			<div class="footer-column systems">
				<h4 style="margin-bottom: 2.5rem; color: white; font-size: var(--fs-sm); letter-spacing: 0.1em; text-transform: uppercase;"><?php esc_html_e( 'Systems', 'premium-b2b' ); ?></h4>
				<ul class="footer-menu-list">
                    <li><a href="#"><?php esc_html_e( 'The Framework', 'premium-b2b' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Acquisition Ops', 'premium-b2b' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Scaling Audit', 'premium-b2b' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Lead Flow', 'premium-b2b' ); ?></a></li>
                </ul>
			</div>

			<div class="footer-column resources">
				<h4 style="margin-bottom: 2.5rem; color: white; font-size: var(--fs-sm); letter-spacing: 0.1em; text-transform: uppercase;"><?php esc_html_e( 'Company', 'premium-b2b' ); ?></h4>
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

			<div class="footer-column cta" style="background: rgba(255,255,255,0.02); padding: 4rem; border-radius: var(--radius); border: 1px solid rgba(255,255,255,0.05);">
				<h4 style="margin-bottom: 1.5rem; color: white; font-size: var(--fs-md);"><?php esc_html_e( 'Book Your Audit', 'premium-b2b' ); ?></h4>
                <p style="font-size: var(--fs-xs); margin-bottom: 2.5rem; line-height: 1.8; opacity: 0.8;"><?php esc_html_e( 'Schedule your 15-min strategy session to identify the gaps in your current infrastructure.', 'premium-b2b' ); ?></p>
				<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary" style="width: 100%; border-radius: 0.5rem; padding-block: 1rem;">
					<?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Start Here' ) ); ?>
				</a>
			</div>
		</div><!-- .container -->

		<div class="container site-info" style="margin-top: 8rem; padding-top: 4rem; border-top: 1px solid rgba(255,255,255,0.05); text-align: center; font-size: var(--fs-xs);">
			<p style="opacity: 0.5; letter-spacing: 0.05em; font-weight: 600;">
				<?php echo wp_kses_post( get_theme_mod( 'footer_copyright', sprintf( '&copy; %s %s. Elite B2B Agency Framework.', date( 'Y' ), get_bloginfo( 'name' ) ) ) ); ?>
			</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

	<div id="scroll-to-top" aria-label="Scroll to top" role="button">
		&uarr;
	</div>
</div><!-- #page -->

<?php
$f_scripts = get_theme_mod( 'footer_scripts' );
if ( $f_scripts ) {
    echo $f_scripts; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
wp_footer();
?>

</body>
</html>
