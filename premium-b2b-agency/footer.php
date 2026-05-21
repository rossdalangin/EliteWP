<?php
/**
 * The template for displaying the footer
 *
 * @package Premium_B2B
 */

?>

	<footer id="colophon" class="site-footer section">
		<div class="container grid" style="grid-template-columns: 2fr 1fr 1fr 1.5fr;">
			<div class="footer-column brand">
				<div class="site-branding" style="margin-bottom: 2rem;">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: flex; align-items: center; gap: 0.75rem;">
                        <span class="logo-icon">&lt;/&gt;</span>
                        <h2 style="margin-bottom: 0; font-size: var(--fs-lg);"><?php bloginfo( 'name' ); ?></h2>
                    </a>
                </div>
				<p style="margin-bottom: 2.5rem; max-width: 35ch; line-height: 1.8;"><?php bloginfo( 'description' ); ?></p>

				<div class="social-links flex" style="gap: 1.5rem;">
					<?php
					$socials = array( 'linkedin', 'twitter', 'instagram' );
					foreach ( $socials as $social ) :
						$url = get_theme_mod( "social_{$social}" );
						if ( $url ) :
							printf(
                                '<a href="%1$s" target="_blank" rel="noopener noreferrer" aria-label="%2$s" class="social-icon-link" style="background: rgba(255,255,255,0.05); width: 2.5rem; height: 2.5rem; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem; font-weight: 800; font-size: 0.75rem;">%3$s</a>',
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
				<h4 style="margin-bottom: 2rem;"><?php esc_html_e( 'The Framework', 'premium-b2b' ); ?></h4>
				<ul class="footer-menu-list">
                    <li><a href="#"><?php esc_html_e( 'Systems Architecture', 'premium-b2b' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Conversion Ops', 'premium-b2b' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Precision Scaling', 'premium-b2b' ); ?></a></li>
                </ul>
			</div>

			<div class="footer-column resources">
				<h4 style="margin-bottom: 2rem;"><?php esc_html_e( 'Resources', 'premium-b2b' ); ?></h4>
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

			<div class="footer-column cta" style="background: rgba(255,255,255,0.03); padding: 3rem; border-radius: var(--radius); border: 1px solid rgba(255,255,255,0.05);">
				<h4 style="margin-bottom: 1.5rem;"><?php esc_html_e( 'Ready to Engineer Dominance?', 'premium-b2b' ); ?></h4>
                <p style="font-size: var(--fs-sm); margin-bottom: 2rem; opacity: 0.8;"><?php esc_html_e( 'Schedule your strategy session and get your custom acquisition roadmap.', 'premium-b2b' ); ?></p>
				<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary" style="width: 100%;">
					<?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Start Here' ) ); ?>
				</a>
			</div>
		</div><!-- .container -->

		<div class="container site-info" style="margin-top: 6rem; padding-top: 3rem; border-top: 1px solid rgba(255,255,255,0.05); text-align: center; font-size: var(--fs-xs);">
			<p style="opacity: 0.5;">
				<?php echo wp_kses_post( get_theme_mod( 'footer_copyright', sprintf( '&copy; %s %s. All Rights Reserved.', date( 'Y' ), get_bloginfo( 'name' ) ) ) ); ?>
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
