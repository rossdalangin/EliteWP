<?php
/**
 * Template Name: Contact Page
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<section class="contact-hero section">
		<div class="container grid" style="grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); align-items: flex-start;">
			<div class="contact-info">
				<h1><?php echo esc_html__( 'Initiate Your Strategy', 'premium-b2b' ); ?></h1>
				<p class="text-light" style="margin: 2rem 0;"><?php echo esc_html__( 'Secure your discovery call with our team to explore high-ticket acquisition frameworks for your agency.', 'premium-b2b' ); ?></p>

				<div class="contact-details" style="display: flex; flex-direction: column; gap: 1.5rem;">
					<div>
						<h4 style="margin-bottom: 0.25rem;">Email</h4>
						<p class="text-accent"><?php echo esc_html( get_theme_mod( 'contact_email', 'partner@agency.com' ) ); ?></p>
					</div>
					<div>
						<h4 style="margin-bottom: 0.25rem;">Global HQ</h4>
						<p class="text-light">Obsidian Tower, Floor 82, NY.</p>
					</div>
				</div>
			</div>
			<div class="contact-form-area" style="background: var(--color-white); padding: 4rem; border-radius: var(--radius); box-shadow: var(--shadow-lg);">
				<?php
				$capture_embed = get_theme_mod( 'capture_embed' );
				if ( ! empty( $capture_embed ) ) :
					echo $capture_embed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				else :
					?>
					<div class="text-center">
						<h3 style="margin-bottom: 1rem;">Application for Strategy Session</h3>
						<p class="text-light" style="margin-bottom: 2rem;">[Lead Capture Form Integration Area]</p>
						<a href="#" class="btn btn-primary" style="width: 100%;"><?php echo esc_html__( 'Open Application Form', 'premium-b2b' ); ?></a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
