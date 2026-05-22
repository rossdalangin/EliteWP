<?php
/**
 * Template Name: Case Studies (Asset Library)
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<section class="case-studies-hero section bg-grid">
		<div class="container text-center" style="max-width: 1000px;" data-reveal>
            <span class="step-number" style="margin-bottom: var(--sp-4);"><?php esc_html_e( 'ASSET LIBRARY', 'premium-b2b' ); ?></span>
			<h1 style="margin-bottom: var(--sp-6);"><?php echo esc_html( get_theme_mod( 'case_studies_headline', 'Client Success Stories & ROI Proof' ) ); ?></h1>
			<p class="text-light" style="max-width: 80ch; margin: 0 auto; line-height: 1.8; font-size: var(--fs-md);"><?php echo esc_html__( 'Explore our library of empirical proof. We deconstruct how we have scaled agencies from stagnant revenue to high-ticket market leaders.', 'premium-b2b' ); ?></p>
		</div>
	</section>

	<section class="case-studies-grid section" style="background-color: var(--color-white);">
		<div class="container">
			<div class="grid agitation-grid" style="grid-template-columns: repeat(auto-fit, minmax(420px, 1fr));">
				<?php
                $case_query = new WP_Query( array( 'post_type' => 'case_study', 'posts_per_page' => -1 ) );
                if ( $case_query->have_posts() ) :
                    while ( $case_query->have_posts() ) : $case_query->the_post();
                        $kpi = get_post_meta( get_the_ID(), 'case_kpi', true );
                        if(!$kpi) $kpi = '+250% Growth';
                ?>
				<div class="case-card card" data-reveal style="display: flex; flex-direction: column; padding: 0; overflow: hidden;">
                    <div class="case-image" style="aspect-ratio: 16/9; background: var(--color-bg); overflow: hidden;">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%; height:100%; object-fit:cover;' ) ); ?>
                        <?php else : ?>
                            <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; color:var(--color-border); font-size: 3rem; font-weight: 900;">B2B</div>
                        <?php endif; ?>
                    </div>
                    <div class="case-content" style="padding: var(--sp-8); flex-grow: 1; display: flex; flex-direction: column;">
					    <span class="text-accent" style="font-weight: 900; font-size: var(--fs-lg); display: block; margin-bottom: var(--sp-2); letter-spacing: -0.05em;"><?php echo esc_html( $kpi ); ?></span>
					    <h3 style="margin-bottom: var(--sp-4); font-size: var(--fs-md); line-height: 1.2;"><?php the_title(); ?></h3>
					    <p class="text-light" style="margin-bottom: var(--sp-8); line-height: 1.8; font-size: var(--fs-sm); flex-grow: 1;"><?php echo get_the_excerpt(); ?></p>
					    <a href="<?php the_permalink(); ?>" class="btn" style="border: 1px solid var(--color-border); background: var(--color-bg); width: 100%; font-size: 10px; font-weight: 900; letter-spacing: 0.1em; color: var(--color-primary);"><?php echo esc_html__( 'DOWNLOAD FULL BREAKDOWN', 'premium-b2b' ); ?></a>
                    </div>
				</div>
				<?php endwhile; wp_reset_postdata(); else: ?>
                    <p class="text-center">No assets found in the library.</p>
                <?php endif; ?>
			</div>
		</div>
	</section>

	<section class="cta-section section bg-dots" style="background-color: var(--color-primary); color: var(--color-white);">
		<div class="container text-center" style="max-width: 900px;" data-reveal>
			<h2 style="color: var(--color-white); margin-bottom: var(--sp-6);"><?php echo esc_html__( 'Achieve Similar Results for Your Agency', 'premium-b2b' ); ?></h2>
            <p style="opacity: 0.8; margin-bottom: var(--sp-12); line-height: 1.8; font-size: var(--fs-base);"><?php esc_html_e( 'Our framework is designed for predictable high-ticket growth. Stop guessing and start engineering your pipeline.', 'premium-b2b' ); ?></p>
			<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large">
				<?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Your Strategy Audit' ) ); ?>
			</a>
		</div>
	</section>

</main>

<?php
get_footer();
