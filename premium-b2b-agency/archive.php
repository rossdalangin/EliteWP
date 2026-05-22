<?php
/**
 * The template for displaying archive pages
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<?php premium_b2b_breadcrumbs(); ?>
	<header class="page-header section bg-dots" style="background-color: var(--color-white); border-bottom: 1px solid var(--color-border);">
		<div class="container text-center" data-reveal>
			<?php
			the_archive_title( '<h1 class="page-title" style="margin-bottom: var(--sp-4);">', '</h1>' );
			the_archive_description( '<div class="archive-description text-light" style="max-width: 70ch; margin-inline: auto; font-size: var(--fs-md); line-height: 1.8;">', '</div>' );
			?>
		</div>
	</header>

	<div class="container section">
		<?php if ( have_posts() ) : ?>
            <div class="blog-layout-with-sidebar">
                <div class="blog-archive-area">
			        <div class="post-grid" style="grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-post card' ); ?> data-reveal style="display: flex; flex-direction: column;">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-thumbnail" style="margin-bottom: var(--sp-6); border-radius: var(--radius-sm); overflow: hidden; aspect-ratio: 16/10;">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium_large', array( 'style' => 'width:100%; height:100%; object-fit:cover;' ) ); ?>
								</a>
							</div>
						<?php endif; ?>
						<h3 style="font-size: var(--fs-md); line-height: 1.2; margin-bottom: var(--sp-4);"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="entry-excerpt text-light" style="font-size: var(--fs-sm); line-height: 1.7; margin-bottom: var(--sp-6); flex-grow: 1;">
							<?php the_excerpt(); ?>
						</div>
                        <div class="flex" style="justify-content: space-between; align-items: center; border-top: 1px solid var(--color-border); padding-top: var(--sp-6); margin-top: auto;">
                            <time style="font-size: var(--fs-xs); font-weight: 800; color: var(--color-accent); text-transform: uppercase;"><?php echo get_the_date(); ?></time>
                            <a href="<?php the_permalink(); ?>" style="font-size: var(--fs-xs); font-weight: 900; letter-spacing: 0.1em; text-transform: uppercase;"><?php esc_html_e( 'READ INSIGHT &rarr;', 'premium-b2b' ); ?></a>
                        </div>
					</article>
				<?php endwhile; ?>
			        </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
			<div class="pagination-wrapper section">
				<?php the_posts_pagination( array( 'prev_text' => 'PREVIOUS', 'next_text' => 'NEXT' ) ); ?>
			</div>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
