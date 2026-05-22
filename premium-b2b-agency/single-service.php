<?php
/**
 * The template for displaying all single services
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<?php premium_b2b_breadcrumbs(); ?>

	<?php
	while ( have_posts() ) :
		the_post();
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Service">
			<header class="service-header section bg-grid">
				<div class="container text-center" style="max-width: 1000px;" data-reveal>
                    <span class="step-number" style="margin-bottom: var(--sp-4);"><?php esc_html_e( 'SERVICE DEPTH', 'premium-b2b' ); ?></span>
					<h1 class="entry-title" itemprop="name" style="margin-bottom: var(--sp-6);"><?php the_title(); ?></h1>
					<p class="text-accent" style="font-weight: 900; text-transform: uppercase; letter-spacing: 0.2em; font-size: var(--fs-xs);"><?php esc_html_e( 'B2B Acquisition Architecture', 'premium-b2b' ); ?></p>
				</div>
			</header>

			<div class="entry-content container" itemprop="description" style="max-width: 900px; padding-block: var(--sp-12);" data-reveal>
				<?php the_content(); ?>

                <div class="service-features grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); margin-top: var(--sp-12); gap: var(--sp-6);">
                    <div class="card" style="padding: var(--sp-6); border-radius: var(--radius-sm);">
                        <h4 style="font-size: var(--fs-sm); margin-bottom: var(--sp-2);"><?php esc_html_e( 'Technical Build', 'premium-b2b' ); ?></h4>
                        <p class="text-light" style="font-size: var(--fs-xs);"><?php esc_html_e( 'Full infrastructure deployment with 100% performance optimization.', 'premium-b2b' ); ?></p>
                    </div>
                    <div class="card" style="padding: var(--sp-6); border-radius: var(--radius-sm);">
                        <h4 style="font-size: var(--fs-sm); margin-bottom: var(--sp-2);"><?php esc_html_e( 'Strategy Lead', 'premium-b2b' ); ?></h4>
                        <p class="text-light" style="font-size: var(--fs-xs);"><?php esc_html_e( 'Dedicated acquisition strategist managing your conversion pipeline.', 'premium-b2b' ); ?></p>
                    </div>
                </div>
			</div>

			<footer class="entry-footer container section" style="max-width: 900px; border-top: 1px solid var(--color-border);" data-reveal>
				<div class="card cta-card-premium">
					<h3><?php echo esc_html( get_theme_mod( 'cta_card_title', 'Ready to Implement This System?' ) ); ?></h3>
					<p><?php echo esc_html( get_theme_mod( 'cta_card_desc', 'Book a discovery call today to see how this service can scale your agency.' ) ); ?></p>
					<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary"><?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Your Strategy Audit' ) ); ?></a>
				</div>
			</footer>

		</article>

	<?php endwhile; ?>

</main>

<?php
get_footer();
