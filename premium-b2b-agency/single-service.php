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
			<header class="entry-header section text-center">
				<div class="container" style="max-width: 900px;">
					<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
					<p class="text-accent" style="font-weight: 800; text-transform: uppercase; margin-top: 1rem;"><?php esc_html_e( 'B2B Acquisition Service', 'premium-b2b' ); ?></p>
				</div>
			</header>

			<div class="entry-content container" itemprop="description" style="max-width: 800px;">
				<?php the_content(); ?>
			</div>

			<footer class="entry-footer container section" style="max-width: 800px; margin-top: 4rem; border-top: 1px solid var(--color-border);">
				<div class="cta-card">
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
