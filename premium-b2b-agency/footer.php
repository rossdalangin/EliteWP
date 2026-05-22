<?php
/**
 * The template for displaying the footer
 *
 * @package Premium_B2B
 */

?>

	<footer id="colophon" class="site-footer section">
		<div class="container footer-grid">
			<div class="footer-column brand" data-reveal>
				<div class="site-branding" style="margin-bottom: var(--sp-6);">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: flex; align-items: center; gap: 1.25rem;">
                        <span class="logo-icon" style="background: white; color: var(--color-primary); box-shadow: 0 10px 20px rgba(255,255,255,0.1); width: 3rem; height: 3rem; border-radius: 1rem; display: flex; align-items: center; justify-content: center; font-weight: 900;">&lt;/&gt;</span>
                        <h2 style="margin-bottom: 0; font-size: var(--fs-md); color: white; letter-spacing: -0.05em; font-weight: 900;"><?php bloginfo( 'name' ); ?></h2>
                    </a>
                </div>
				<p style="margin-bottom: var(--sp-8); max-width: 40ch; line-height: 1.8; font-size: var(--fs-sm); font-weight: 500; color: rgba(255,255,255,0.5);"><?php bloginfo( 'description' ); ?></p>

				<div class="social-links flex" style="gap: 1rem;">
					<?php
					$socials = array( 'linkedin', 'twitter', 'instagram' );
					foreach ( $socials as $social ) :
						$url = get_theme_mod( "social_{$social}" );
						if ( $url ) :
							printf(
                                '<a href="%1$s" target="_blank" rel="noopener noreferrer" aria-label="%2$s" style="background: rgba(255,255,255,0.05); width: 2.5rem; height: 2.5rem; display: flex; align-items: center; justify-content: center; border-radius: 0.75rem; font-weight: 900; font-size: 0.75rem; color: white; border: 1px solid rgba(255,255,255,0.05);">%3$s</a>',
                                esc_url( $url ),
                                esc_attr( ucfirst( $social ) ),
                                esc_html( strtoupper( substr($social, 0, 2) ) )
                            );
						endif;
					endforeach;
					?>
				</div>
			</div>

			<div class="footer-column systems" data-reveal>
				<h4 style="margin-bottom: var(--sp-6); color: white; font-size: var(--fs-xs); letter-spacing: 0.2em; text-transform: uppercase; font-weight: 900;"><?php esc_html_e( 'Systems', 'premium-b2b' ); ?></h4>
				<ul class="footer-menu-list">
                    <li><a href="#"><?php esc_html_e( 'The Framework', 'premium-b2b' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Acquisition Ops', 'premium-b2b' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Scaling Audit', 'premium-b2b' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Asset Library', 'premium-b2b' ); ?></a></li>
                </ul>
			</div>

			<div class="footer-column resources" data-reveal>
				<h4 style="margin-bottom: var(--sp-6); color: white; font-size: var(--fs-xs); letter-spacing: 0.2em; text-transform: uppercase; font-weight: 900;"><?php esc_html_e( 'Company', 'premium-b2b' ); ?></h4>
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
                <ul class="footer-menu-list" style="margin-top: var(--sp-4);">
                    <li><a href="#"><?php esc_html_e( 'Privacy Policy', 'premium-b2b' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Terms of Service', 'premium-b2b' ); ?></a></li>
                </ul>
			</div>

			<div class="footer-column cta" style="background: rgba(255,255,255,0.02); padding: var(--sp-8); border-radius: var(--radius); border: 1px solid rgba(255,255,255,0.05);" data-reveal>
				<h4 style="margin-bottom: var(--sp-4); color: white; font-size: var(--fs-md); line-height: 1.1; letter-spacing: -0.04em;"><?php esc_html_e( 'Book Your Strategy Audit', 'premium-b2b' ); ?></h4>
                <p style="font-size: var(--fs-xs); margin-bottom: var(--sp-6); line-height: 1.8; opacity: 0.7; font-weight: 500;"><?php esc_html_e( 'Identify the technical and strategic gaps in your current client acquisition infrastructure.', 'premium-b2b' ); ?></p>
				<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary" style="width: 100%; border-radius: 0.75rem; padding-block: 1rem; font-size: 10px; letter-spacing: 0.1em; font-weight: 900;">
					<?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Start Here' ) ); ?>
				</a>
			</div>
		</div>

		<div class="container site-info" style="margin-top: var(--sp-20); padding-top: var(--sp-8); border-top: 1px solid rgba(255,255,255,0.05); text-align: center; font-size: var(--fs-xs);">
			<p style="opacity: 0.4; letter-spacing: 0.1em; font-weight: 800; text-transform: uppercase;">
				<?php echo wp_kses_post( get_theme_mod( 'footer_copyright', sprintf( '&copy; %s %s. Elite B2B Agency Framework.', date( 'Y' ), get_bloginfo( 'name' ) ) ) ); ?>
			</p>
		</div>
	</footer>

	<div id="scroll-to-top" aria-label="Scroll to top" role="button">
		&uarr;
	</div>
</div>

<?php
$f_scripts = get_theme_mod( 'footer_scripts' );
if ( $f_scripts ) {
    echo $f_scripts; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
wp_footer();
?>

</body>
</html>
