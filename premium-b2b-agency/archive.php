<?php
/**
 * The template for displaying archive pages
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">
	<header class="page-header section">
		<div class="container text-center">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description text-light">', '</div>' );
			?>
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
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-thumbnail" style="margin-bottom: 1.5rem;">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium_large' ); ?>
								</a>
							</div>
						<?php endif; ?>
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
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
