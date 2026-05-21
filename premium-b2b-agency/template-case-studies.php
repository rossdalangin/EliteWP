<?php
/**
 * Template Name: Case Studies
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<section class="case-studies-hero section">
		<div class="container text-center">
			<h1><?php echo esc_html( get_theme_mod( 'case_studies_headline', 'Client Success Stories & ROI Proof' ) ); ?></h1>
			<p class="text-light" style="max-width: 600px; margin: 1.5rem auto 0;"><?php echo esc_html__( 'Explore how we have scaled agencies from stagnant revenue to high-ticket market leaders.', 'premium-b2b' ); ?></p>
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
				<div class="case-card" style="padding: 3rem; background: var(--color-bg); border-radius: var(--radius); transition: all 0.4s ease;">
					<span class="text-accent" style="font-weight: 800; font-size: var(--fs-md); display: block; margin-bottom: 0.5rem;"><?php echo esc_html( $kpi ); ?></span>
					<h3 style="margin-bottom: 1.5rem;"><?php the_title(); ?></h3>
					<p class="text-light" style="margin-bottom: 2rem;"><?php echo get_the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="text-accent" style="font-weight: 700; font-size: var(--fs-sm);"><?php echo esc_html__( 'View Full Case Study &rarr;', 'premium-b2b' ); ?></a>
				</div>
				<?php endwhile; wp_reset_postdata(); else: ?>
                    <p class="text-center">No case studies found.</p>
                <?php endif; ?>
			</div>
		</div>
	</section>

	<section class="cta-section section" style="background-color: var(--color-primary); color: var(--color-white);">
		<div class="container text-center">
			<h2 style="color: var(--color-white);"><?php echo esc_html__( 'Achieve Similar Results for Your Agency', 'premium-b2b' ); ?></h2>
			<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large" style="margin-top: 2rem;">
				<?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Your Strategy Audit' ) ); ?>
			</a>
		</div>
	</section>

</main>

<?php
get_footer();
