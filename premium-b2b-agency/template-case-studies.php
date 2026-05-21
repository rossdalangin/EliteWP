<?php
/**
 * Template Name: Case Studies
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<section class="case-studies-hero section" style="background: radial-gradient(circle at top right, #f1f5f9 0%, #fff 100%);">
		<div class="container text-center" style="max-width: 900px;">
            <span class="step-number" style="margin-bottom: 1.5rem;"><?php esc_html_e( 'EMPIRICAL PROOF', 'premium-b2b' ); ?></span>
			<h1><?php echo esc_html( get_theme_mod( 'case_studies_headline', 'Client Success Stories & ROI Proof' ) ); ?></h1>
			<p class="text-light" style="max-width: 70ch; margin: 2.5rem auto 0; line-height: 1.8; font-size: var(--fs-md);"><?php echo esc_html__( 'Explore how we have scaled agencies from stagnant revenue to high-ticket market leaders through scientific client acquisition.', 'premium-b2b' ); ?></p>
		</div>
	</section>

	<section class="case-studies-grid section" style="background-color: var(--color-white);">
		<div class="container">
			<div class="grid agitation-grid">
				<?php
                $case_query = new WP_Query( array( 'post_type' => 'case_study', 'posts_per_page' => -1 ) );
                if ( $case_query->have_posts() ) :
                    while ( $case_query->have_posts() ) : $case_query->the_post();
                        $kpi = get_post_meta( get_the_ID(), 'case_kpi', true );
                        if(!$kpi) $kpi = '+250% Growth';
                ?>
				<div class="case-card" style="padding: 4rem; background: var(--color-bg); border-radius: var(--radius); border: 1px solid var(--color-border);">
					<span class="text-accent" style="font-weight: 900; font-size: var(--fs-lg); display: block; margin-bottom: 1rem; letter-spacing: -0.05em;"><?php echo esc_html( $kpi ); ?></span>
					<h3 style="margin-bottom: 2rem; font-size: var(--fs-md);"><?php the_title(); ?></h3>
					<p class="text-light" style="margin-bottom: 3rem; line-height: 1.8; font-size: var(--fs-sm);"><?php echo get_the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="btn" style="border: 1px solid var(--color-border); background: white; width: 100%; font-size: var(--fs-xs); font-weight: 800; letter-spacing: 0.05em;"><?php echo esc_html__( 'VIEW FULL CASE STUDY', 'premium-b2b' ); ?></a>
				</div>
				<?php endwhile; wp_reset_postdata(); else: ?>
                    <p class="text-center">No case studies found.</p>
                <?php endif; ?>
			</div>
		</div>
	</section>

	<section class="cta-section section" style="background-color: var(--color-primary); color: var(--color-white);">
		<div class="container text-center" style="max-width: 800px;">
			<h2 style="color: var(--color-white); margin-bottom: 2rem;"><?php echo esc_html__( 'Achieve Similar Results for Your Agency', 'premium-b2b' ); ?></h2>
            <p style="opacity: 0.8; margin-bottom: 4rem; line-height: 1.8;"><?php esc_html_e( 'Our framework is designed for predictable high-ticket growth. Stop guessing and start engineering your pipeline.', 'premium-b2b' ); ?></p>
			<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large">
				<?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Your Strategy Audit' ) ); ?>
			</a>
		</div>
	</section>

</main>

<?php
get_footer();
