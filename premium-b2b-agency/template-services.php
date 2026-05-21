<?php
/**
 * Template Name: Services Page
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<section class="services-hero section" style="background: radial-gradient(circle at top, #eff6ff 0%, #fff 100%);">
		<div class="container text-center" style="max-width: 900px;">
            <span class="step-number" style="margin-bottom: 1.5rem;"><?php esc_html_e( 'OUR SERVICES', 'premium-b2b' ); ?></span>
			<h1><?php echo esc_html( get_theme_mod( 'services_headline', 'Precision-Engineered Acquisition Services' ) ); ?></h1>
			<p class="text-light" style="max-width: 70ch; margin: 2.5rem auto 0; line-height: 1.8; font-size: var(--fs-md);"><?php echo esc_html__( 'Comprehensive solutions for agencies that demand elite-level results. We replace guesswork with engineering at every stage of the pipeline.', 'premium-b2b' ); ?></p>
		</div>
	</section>

	<section class="services-grid section" style="background-color: var(--color-white);">
		<div class="container">
			<div class="grid agitation-grid">
				<?php
                $service_query = new WP_Query( array( 'post_type' => 'service', 'posts_per_page' => -1 ) );
                if ( $service_query->have_posts() ) :
                    $i = 1;
                    while ( $service_query->have_posts() ) : $service_query->the_post();
                ?>
				<div class="service-card" style="padding: 4rem; border: 1px solid var(--color-border); border-radius: var(--radius); background: var(--color-bg);">
					<span class="step-number" style="background: var(--color-primary); color: white; margin-bottom: 2.5rem;">0<?php echo $i; ?></span>
					<h3 style="margin-bottom: 2rem; font-size: var(--fs-md);"><?php the_title(); ?></h3>
					<div class="text-light" style="line-height: 1.8; font-size: var(--fs-sm); margin-bottom: 2.5rem;"><?php the_content(); ?></div>
                    <a href="<?php the_permalink(); ?>" class="text-accent" style="font-weight: 800; font-size: var(--fs-xs); text-transform: uppercase; letter-spacing: 0.1em;"><?php esc_html_e( 'Learn More &rarr;', 'premium-b2b' ); ?></a>
				</div>
				<?php $i++; endwhile; wp_reset_postdata(); else: ?>
                    <p class="text-center">No services listed yet.</p>
                <?php endif; ?>
			</div>
		</div>
	</section>

	<section class="cta-section section" style="background-color: var(--color-primary); color: var(--color-white);">
		<div class="container text-center" style="max-width: 800px;">
			<h2 style="color: var(--color-white); margin-bottom: 2rem;"><?php echo esc_html__( 'Ready to Implement Your Acquisition Engine?', 'premium-b2b' ); ?></h2>
            <p style="opacity: 0.8; margin-bottom: 4rem; line-height: 1.8;"><?php esc_html_e( 'Stop project-to-project survival. Deploy a scientific lead flow infrastructure and scale your high-ticket B2B agency.', 'premium-b2b' ); ?></p>
			<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large">
				<?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Your Strategy Audit' ) ); ?>
			</a>
		</div>
	</section>

</main>

<?php
get_footer();
