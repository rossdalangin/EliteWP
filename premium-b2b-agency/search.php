<?php
/**
 * The template for displaying search results pages
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">
	<header class="page-header section">
		<div class="container text-center">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'premium-b2b' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</div>
	</header>

	<div class="container section">
		<?php if ( have_posts() ) : ?>
			<div class="post-grid grid">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-post' ); ?>>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="entry-excerpt text-light">
							<?php the_excerpt(); ?>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
			<div class="pagination-wrapper section">
				<?php the_posts_pagination(); ?>
			</div>
		<?php else : ?>
			<p class="text-center"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'premium-b2b' ); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
