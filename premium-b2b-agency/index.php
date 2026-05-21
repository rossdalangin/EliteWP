<?php
/**
 * The main template file
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<header class="blog-hero section">
		<div class="container">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
			<p class="text-light"><?php echo esc_html__( 'Insights and strategies for premium client acquisition.', 'premium-b2b' ); ?></p>
		</div>
	</header>

	<div class="container pb-section">
		<?php if ( have_posts() ) : ?>
            <div class="blog-layout-with-sidebar">
                <div class="blog-archive-area">
			<?php
			/* Start the Loop */
			$count = 0;
			$is_paged = is_paged();
			$show_featured = is_home() && ! $is_paged;

			if ( ! $show_featured ) {
				echo '<div class="post-grid grid">';
			}

			while ( have_posts() ) :
				the_post();
				$count++;

				if ( 1 === $count && $show_featured ) :
					// Featured Post Layout
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'featured-post grid' ); ?> itemscope itemtype="https://schema.org/BlogPosting">
						<meta itemprop="mainEntityOfPage" content="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-thumbnail">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'large' ); ?>
								</a>
							</div>
						<?php endif; ?>
						<div class="post-content">
							<span class="featured-insight-label"><?php echo esc_html__( 'Featured Insight', 'premium-b2b' ); ?></span>
							<h2 itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="entry-excerpt" itemprop="description">
								<?php the_excerpt(); ?>
							</div>
							<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo esc_html__( 'Read Article', 'premium-b2b' ); ?></a>
						</div>
					</article>

					<div class="post-grid grid">
				<?php else : ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-post' ); ?> itemscope itemtype="https://schema.org/BlogPosting">
						<meta itemprop="mainEntityOfPage" content="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-thumbnail">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium_large' ); ?>
								</a>
							</div>
						<?php endif; ?>
						<h3 itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="entry-excerpt text-light" itemprop="description">
							<?php the_excerpt(); ?>
						</div>
						<div class="post-meta">
							<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time> &bull; <span><?php echo premium_b2b_reading_time(); ?></span>
						</div>
					</article>
				<?php
				endif;
			endwhile;
			?>

			</div><!-- .post-grid -->

                </div><!-- .blog-archive-area -->
                <?php get_sidebar(); ?>
            </div><!-- .blog-layout-with-sidebar -->

            <?php get_template_part( 'template-parts/section', 'magnet' ); ?>

			<div class="pagination-wrapper section">
				<?php
				the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( 'Previous', 'premium-b2b' ),
					'next_text' => __( 'Next', 'premium-b2b' ),
				) );
				?>
			</div>

		<?php else : ?>

			<p><?php esc_html_e( 'No posts found.', 'premium-b2b' ); ?></p>

		<?php endif; ?>
	</div>

</main><!-- #primary -->

<?php
get_footer();
