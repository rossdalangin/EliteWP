<?php
/**
 * The template for displaying archive pages
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<?php premium_b2b_breadcrumbs(); ?>
	<header class="page-header section" style="background: radial-gradient(circle at top right, #eff6ff 0%, #fff 100%);">
		<div class="container text-center">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description text-light" style="max-width: 60ch; margin-inline: auto;">', '</div>' );
			?>
		</div>
	</header>

	<div class="container section">
		<?php if ( have_posts() ) : ?>
            <div class="blog-layout-with-sidebar">
                <div class="blog-archive-area">
			        <div class="post-grid grid">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-post card' ); ?> style="padding: 3rem; background: var(--color-white); border: 1px solid var(--color-border); border-radius: var(--radius);">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-thumbnail" style="margin-bottom: 2rem; overflow: hidden; border-radius: var(--radius-sm);">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium_large' ); ?>
								</a>
							</div>
						<?php endif; ?>
						<h3 style="font-size: var(--fs-md);"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="entry-excerpt text-light" style="font-size: var(--fs-sm); margin-bottom: 2rem;">
							<?php the_excerpt(); ?>
						</div>
                        <div class="flex" style="justify-content: space-between; align-items: center; border-top: 1px solid var(--color-border); padding-top: 1.5rem;">
                            <time style="font-size: var(--fs-xs); font-weight: 700; color: var(--color-accent);"><?php echo get_the_date(); ?></time>
                            <a href="<?php the_permalink(); ?>" style="font-size: var(--fs-xs); font-weight: 800;"><?php esc_html_e( 'READ &rarr;', 'premium-b2b' ); ?></a>
                        </div>
					</article>
				<?php endwhile; ?>
			        </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
			<div class="pagination-wrapper section">
				<?php the_posts_pagination(); ?>
			</div>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
