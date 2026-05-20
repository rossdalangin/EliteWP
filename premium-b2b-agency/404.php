<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">
	<section class="error-404 not-found section text-center">
		<div class="container">
			<h1 class="page-title"><?php esc_html_e( '404 - Framework Error', 'premium-b2b' ); ?></h1>
			<p class="text-light" style="margin-bottom: 2.5rem;"><?php esc_html_e( 'It seems the strategy you are looking for has shifted. Let us get you back on track to acquisition.', 'premium-b2b' ); ?></p>

			<div class="cta-actions">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Return to Home', 'premium-b2b' ); ?></a>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
