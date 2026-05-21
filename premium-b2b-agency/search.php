<?php
/**
 * The template for displaying search results pages
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">
	<header class="page-header section" style="background: radial-gradient(circle at top, #f1f5f9 0%, #fff 100%);">
		<div class="container text-center">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Results for: %s', 'premium-b2b' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</div>
	</header>

	<div class="container section">
		<?php if ( have_posts() ) : ?>
            <div class="blog-layout-with-sidebar">
                <div class="blog-archive-area">
                    <div class="post-grid grid" style="grid-template-columns: 1fr;">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-post' ); ?> style="padding: 3rem; background: var(--color-white); border: 1px solid var(--color-border); border-radius: var(--radius);">
                                <h2 style="font-size: var(--fs-lg); margin-bottom: 1rem;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="entry-excerpt text-light" style="margin-bottom: 2rem;">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="text-accent" style="font-weight: 800; font-size: var(--fs-xs); text-transform: uppercase; letter-spacing: 0.1em;"><?php esc_html_e( 'Read Strategy &rarr;', 'premium-b2b' ); ?></a>
                            </article>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
			<div class="pagination-wrapper section">
				<?php the_posts_pagination(); ?>
			</div>
		<?php else : ?>
			<div class="text-center" style="max-width: 600px; margin-inline: auto;">
                <p class="text-light" style="margin-bottom: 3rem;"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'premium-b2b' ); ?></p>
                <?php get_search_form(); ?>
            </div>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
