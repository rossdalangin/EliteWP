<?php
/**
 * The template for displaying all single posts
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

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/BlogPosting">
			<header class="entry-header section">
				<div class="container">
					<div class="entry-meta">
						<?php the_category( ', ' ); ?>
					</div>
					<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
					<div class="post-metadata">
						<span itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?php echo esc_html__( 'By ', 'premium-b2b' ) . get_the_author(); ?></span></span> &bull;
						<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time> &bull;
						<span><?php echo premium_b2b_reading_time(); ?></span>
					</div>
				</div>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="container single-post-thumbnail">
					<?php the_post_thumbnail( 'full' ); ?>
				</div>
			<?php endif; ?>

			<div class="entry-content container" itemprop="articleBody">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'premium-b2b' ),
						'after'  => '</div>',
					)
				);
				?>
			</div>

			<footer class="entry-footer container">
				<!-- CTA Card Widget -->
				<div class="cta-card">
					<h3><?php echo esc_html( get_theme_mod( 'cta_card_title', __( 'Ready to Automate Your Pipeline?', 'premium-b2b' ) ) ); ?></h3>
					<p><?php echo esc_html( get_theme_mod( 'cta_card_desc', __( 'Book a discovery call today and see how we can help you scale.', 'premium-b2b' ) ) ); ?></p>
					<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary"><?php echo esc_html( get_theme_mod( 'hero_cta_text', __( 'Get a Free Strategy Session', 'premium-b2b' ) ) ); ?></a>
				</div>
			</footer>

		</article>

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

</main><!-- #primary -->

<?php
get_footer();
