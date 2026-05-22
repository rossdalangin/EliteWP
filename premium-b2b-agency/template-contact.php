<?php
/**
 * Template Name: Contact Page
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<section class="contact-hero section bg-grid">
		<div class="container grid" style="grid-template-columns: 1fr 1.2fr; align-items: center;">
			<div class="contact-info" data-reveal>
                <span class="step-number" style="margin-bottom: var(--sp-4);"><?php esc_html_e( 'INITIATE CONTACT', 'premium-b2b' ); ?></span>
				<h1 style="margin-bottom: var(--sp-6);"><?php echo esc_html__( 'Secure Your Strategy Session', 'premium-b2b' ); ?></h1>
				<p class="text-light" style="margin-bottom: var(--sp-8); font-size: var(--fs-md);"><?php echo esc_html__( 'Explore high-ticket acquisition frameworks designed to scale your agency to the 7-figure mark and beyond.', 'premium-b2b' ); ?></p>

				<div class="contact-details" style="display: flex; flex-direction: column; gap: var(--sp-6);">
					<div class="card" style="padding: var(--sp-6); border-radius: var(--radius-sm); background: var(--color-bg);">
						<h4 style="margin-bottom: 0.5rem; font-size: var(--fs-xs); letter-spacing: 0.1em; text-transform: uppercase;">Direct Channel</h4>
						<p class="text-accent" style="font-weight: 800;"><?php echo esc_html( get_theme_mod( 'contact_email', 'partner@agency.com' ) ); ?></p>
					</div>
					<div class="card" style="padding: var(--sp-6); border-radius: var(--radius-sm); background: var(--color-bg);">
						<h4 style="margin-bottom: 0.5rem; font-size: var(--fs-xs); letter-spacing: 0.1em; text-transform: uppercase;">Operations HQ</h4>
						<p class="text-light" style="font-weight: 600;">Obsidian Tower, Floor 82, Manhattan, NY.</p>
					</div>
				</div>
			</div>
			<div class="contact-form-area" data-reveal>
				<div class="card" style="padding: var(--sp-12); background: var(--color-white);">
                    <?php
                    $capture_embed = get_theme_mod( 'capture_embed' );
                    if ( ! empty( $capture_embed ) ) :
                        echo $capture_embed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    else :
                        ?>
                        <div class="text-center">
                            <h3 style="margin-bottom: var(--sp-4);"><?php esc_html_e( 'Application for Strategy Session', 'premium-b2b' ); ?></h3>
                            <p class="text-light" style="margin-bottom: var(--sp-8); font-size: var(--fs-sm);"><?php esc_html_e( 'Complete the short assessment to identify if your agency is a candidate for the Alpha Framework.', 'premium-b2b' ); ?></p>
                            <a href="#" class="btn btn-primary" style="width: 100%; margin: 0;"><?php echo esc_html__( 'START ASSESSMENT', 'premium-b2b' ); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
