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
			<h1><?php echo esc_html( get_theme_mod( 'services_headline', 'Precision-Engineered Acquisition Services' ) ); ?></h1>
			<p class="text-light" style="max-width: 600px; margin: 1.5rem auto 0;"><?php echo esc_html__( 'Comprehensive solutions for agencies that demand elite-level results.', 'premium-b2b' ); ?></p>
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
				<div class="service-card" style="padding: 3rem; border: 1px solid var(--color-border); border-radius: var(--radius);">
					<span class="text-accent" style="font-weight: 800; font-size: var(--fs-lg);">0<?php echo $i; ?></span>
					<h3 style="margin: 1rem 0;"><?php the_title(); ?></h3>
					<p class="text-light"><?php echo get_the_excerpt(); ?></p>
				</div>
				<?php $i++; endwhile; wp_reset_postdata(); else: ?>
                    <p class="text-center">No services listed yet.</p>
                <?php endif; ?>
			</div>
		</div>
	</section>

	<section class="cta-section section" style="background-color: var(--color-primary); color: var(--color-white);">
		<div class="container text-center">
			<h2 style="color: var(--color-white);"><?php echo esc_html__( 'Ready to Implement Your Acquisition Engine?', 'premium-b2b' ); ?></h2>
			<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large" style="margin-top: 2rem;">
				<?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Your Strategy Audit' ) ); ?>
			</a>
		</div>
	</section>

</main>

<?php
get_footer();
