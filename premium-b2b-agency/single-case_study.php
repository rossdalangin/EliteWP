<?php
/**
 * The template for displaying all single case studies
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<?php premium_b2b_breadcrumbs(); ?>

	<?php
	while ( have_posts() ) :
		the_post();
		$kpi = get_post_meta( get_the_ID(), 'case_kpi', true );
	?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header section text-center bg-grid" style="background-color: var(--color-white); border-bottom: 1px solid var(--color-border);">
				<div class="container" style="max-width: 1000px;" data-reveal>
                    <span class="step-number" style="margin-bottom: var(--sp-4);"><?php esc_html_e( 'EMPIRICAL PROOF', 'premium-b2b' ); ?></span>
					<?php if ( $kpi ) : ?>
						<span class="text-accent" style="font-weight: 900; font-size: var(--fs-xl); display: block; margin-bottom: var(--sp-2); letter-spacing: -0.05em;"><?php echo esc_html( $kpi ); ?></span>
					<?php endif; ?>
					<h1 class="entry-title" style="line-height: 1;"><?php the_title(); ?></h1>
				</div>
			</header>

			<div class="entry-content container section" style="max-width: 900px; padding-block: var(--sp-16);" data-reveal>
				<?php the_content(); ?>
			</div>

			<footer class="entry-footer container section" style="max-width: 900px; border-top: 1px solid var(--color-border);" data-reveal>
                <div class="card cta-card-premium">
				    <h2 style="margin-bottom: var(--sp-4);"><?php esc_html_e( 'Want Similar Results?', 'premium-b2b' ); ?></h2>
				    <p><?php esc_html_e( 'Our framework is engineered for predictable high-ticket growth. Stop guessing and start scaling.', 'premium-b2b' ); ?></p>
				    <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large">
					    <?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Your Strategy Audit' ) ); ?>
				    </a>
                </div>
			</footer>

		</article>

	<?php endwhile; ?>

</main>

<?php
get_footer();
