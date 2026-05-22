<?php
/**
 * Template Name: Services Page
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<section class="services-hero section bg-grid">
		<div class="container text-center" style="max-width: 1000px;" data-reveal>
            <span class="step-number" style="margin-bottom: var(--sp-4);"><?php esc_html_e( 'OUR SERVICES', 'premium-b2b' ); ?></span>
			<h1><?php echo esc_html( get_theme_mod( 'services_headline', 'Precision-Engineered Acquisition Services' ) ); ?></h1>
			<p class="text-light" style="max-width: 80ch; margin: var(--sp-6) auto 0; line-height: 1.8; font-size: var(--fs-md);"><?php echo esc_html__( 'Comprehensive solutions for agencies that demand elite-level results. We replace guesswork with engineering at every stage of the pipeline.', 'premium-b2b' ); ?></p>
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
				<div class="card service-card" data-reveal style="display: flex; flex-direction: column; padding: var(--sp-10);">
					<span class="step-number" style="background: var(--color-primary); color: white; margin-bottom: var(--sp-8); font-size: 0.7rem;"><?php echo esc_html( $i < 10 ? '0' . $i : $i ); ?></span>
					<h3 style="margin-bottom: var(--sp-4); font-size: var(--fs-md); letter-spacing: -0.04em; font-weight: 900;"><?php the_title(); ?></h3>
					<div class="text-light" style="line-height: 1.8; font-size: var(--fs-sm); margin-bottom: var(--sp-8); flex-grow: 1; font-weight: 500;"><?php the_excerpt(); ?></div>
                    <div style="background: var(--color-bg); padding: var(--sp-6); border-radius: 1.5rem; margin-bottom: var(--sp-8); border: 1px solid var(--color-border);">
                        <p style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1em; color: var(--color-primary); margin-bottom: var(--sp-4);"><?php esc_html_e( 'Key Deliverables:', 'premium-b2b' ); ?></p>
                        <ul style="display: flex; flex-direction: column; gap: var(--sp-3); font-size: 0.75rem; font-weight: 700; color: var(--color-text);">
                            <li class="flex" style="gap: var(--sp-3);"><span style="color: var(--color-accent); font-weight: 900;">•</span> <?php esc_html_e( 'Technical Architecture', 'premium-b2b' ); ?></li>
                            <li class="flex" style="gap: var(--sp-3);"><span style="color: var(--color-accent); font-weight: 900;">•</span> <?php esc_html_e( 'Conversion Optimization', 'premium-b2b' ); ?></li>
                            <li class="flex" style="gap: var(--sp-3);"><span style="color: var(--color-accent); font-weight: 900;">•</span> <?php esc_html_e( 'Precision Analytics', 'premium-b2b' ); ?></li>
                        </ul>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="width: 100%; padding-block: 1rem;"><?php esc_html_e( 'View Details', 'premium-b2b' ); ?></a>
				</div>
				<?php $i++; endwhile; wp_reset_postdata(); else: ?>
                    <p class="text-center">No services listed yet.</p>
                <?php endif; ?>
			</div>
		</div>
	</section>

	<section class="cta-section section bg-dots" style="background-color: var(--color-primary); color: var(--color-white);">
		<div class="container text-center" style="max-width: 900px;" data-reveal>
            <span class="step-number" style="background: var(--color-accent); color: white; margin-bottom: var(--sp-4);"><?php esc_html_e( 'THE NEXT STEP', 'premium-b2b' ); ?></span>
			<h2 style="color: var(--color-white); margin-bottom: var(--sp-4);"><?php echo esc_html__( 'Ready to Implement Your Acquisition Engine?', 'premium-b2b' ); ?></h2>
            <p style="opacity: 0.8; margin-bottom: var(--sp-8); line-height: 1.8; font-size: var(--fs-base);"><?php esc_html_e( 'Stop project-to-project survival. Deploy a scientific lead flow infrastructure and scale your high-ticket B2B agency.', 'premium-b2b' ); ?></p>
			<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large">
				<?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Your Strategy Audit' ) ); ?>
			</a>
		</div>
	</section>

</main>

<?php
get_footer();
