<?php
/**
 * Template Name: Services Page
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<section class="services-hero section">
		<div class="container text-center">
			<h1><?php echo esc_html( get_theme_mod( 'services_headline', __( 'Precision-Engineered Acquisition Services', 'premium-b2b' ) ) ); ?></h1>
			<p class="text-light" style="max-width: 600px; margin: 1.5rem auto 0;"><?php echo esc_html__( 'Comprehensive solutions for agencies that demand elite-level results.', 'premium-b2b' ); ?></p>
		</div>
	</section>

	<section class="services-grid section" style="background-color: var(--color-white);">
		<div class="container">
			<div class="grid agitation-grid">
				<?php
				$service_defaults = array(
					1 => array( 't' => 'Strategic Positioning', 'd' => 'We redefine your market presence to attract high-ticket B2B partners exclusively.' ),
					2 => array( 't' => 'Lead Generation Systems', 'd' => 'Automated engines that deliver qualified prospects into your pipeline daily.' ),
					3 => array( 't' => 'Conversion Architecture', 'd' => 'Optimized landing pages and nurturing sequences that drive immediate action.' ),
				);
				for ( $i = 1; $i <= 3; $i++ ) :
					$title = get_theme_mod( "service_{$i}_title", $service_defaults[$i]['t'] );
					$desc = get_theme_mod( "service_{$i}_desc", $service_defaults[$i]['d'] );
				?>
				<div class="service-card" style="padding: 3rem; border: 1px solid var(--color-border); border-radius: var(--radius);">
					<span class="text-accent" style="font-weight: 800; font-size: var(--fs-lg);">0<?php echo $i; ?></span>
					<h3 style="margin: 1rem 0;"><?php echo esc_html( $title ); ?></h3>
					<p class="text-light"><?php echo esc_html( $desc ); ?></p>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<section class="cta-section section" style="background-color: var(--color-primary); color: var(--color-white);">
		<div class="container text-center">
			<h2 style="color: var(--color-white);"><?php echo esc_html__( 'Ready to Implement Your Acquisition Engine?', 'premium-b2b' ); ?></h2>
			<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large" style="margin-top: 2rem;">
				<?php echo esc_html( get_theme_mod( 'hero_cta_text', __( 'Get Started', 'premium-b2b' ) ) ); ?>
			</a>
		</div>
	</section>

</main>

<?php
get_footer();
