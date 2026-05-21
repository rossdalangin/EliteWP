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
			<header class="entry-header section text-center" style="background: var(--color-bg);">
				<div class="container" style="max-width: 900px;">
					<?php if ( $kpi ) : ?>
						<span class="text-accent" style="font-weight: 900; font-size: var(--fs-xl); display: block; margin-bottom: 1rem;"><?php echo esc_html( $kpi ); ?></span>
					<?php endif; ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<p class="text-light" style="margin-top: 1.5rem;"><?php echo get_the_excerpt(); ?></p>
				</div>
			</header>

			<div class="entry-content container section" style="max-width: 800px;">
				<?php the_content(); ?>
			</div>

			<footer class="entry-footer container section text-center" style="max-width: 800px; border-top: 1px solid var(--color-border);">
				<h2><?php esc_html_e( 'Want Similar Results?', 'premium-b2b' ); ?></h2>
				<p class="text-light" style="margin-bottom: 2.5rem;"><?php esc_html_e( 'Our framework is designed for predictable high-ticket growth.', 'premium-b2b' ); ?></p>
				<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large">
					<?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Your Strategy Audit' ) ); ?>
				</a>
			</footer>

		</article>

	<?php endwhile; ?>

</main>

<?php
get_footer();
