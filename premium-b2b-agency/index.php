<?php
/**
 * The main template file
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<header class="blog-hero section" style="background: radial-gradient(circle at top left, #eff6ff 0%, #fff 60%);">
		<div class="container" data-reveal>
            <span class="step-number" style="margin-bottom: var(--sp-4);"><?php esc_html_e( 'AGENCY INSIGHTS', 'premium-b2b' ); ?></span>
			<h1 class="page-title"><?php single_post_title(); ?></h1>
			<p class="text-light" style="max-width: 600px; font-size: var(--fs-md); line-height: 1.8;"><?php echo esc_html__( 'Advanced strategies and empirical proof for high-ticket B2B client acquisition.', 'premium-b2b' ); ?></p>
		</div>
	</header>

	<div class="container section">
		<?php if ( have_posts() ) : ?>
            <div class="blog-layout-with-sidebar">
                <div class="blog-archive-area">
			<?php
			$count = 0;
			$is_paged = is_paged();
			$show_featured = is_home() && ! $is_paged;

			while ( have_posts() ) :
				the_post();
				$count++;

				if ( 1 === $count && $show_featured ) :
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'featured-post' ); ?> itemscope itemtype="https://schema.org/BlogPosting" data-reveal>
						<meta itemprop="mainEntityOfPage" content="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-thumbnail" style="border-radius: var(--radius-sm); overflow: hidden; box-shadow: var(--shadow-lg);">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'large' ); ?>
								</a>
							</div>
						<?php endif; ?>
						<div class="post-content">
							<span class="text-accent" style="font-weight: 800; font-size: var(--fs-xs); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: var(--sp-4); display: block;"><?php echo esc_html__( 'Featured Strategy', 'premium-b2b' ); ?></span>
							<h2 itemprop="headline" style="font-size: var(--fs-xl); line-height: 1;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="entry-excerpt text-light" itemprop="description" style="margin-bottom: var(--sp-8); font-size: var(--fs-sm);">
								<?php the_excerpt(); ?>
							</div>
                            <div class="flex" style="gap: var(--sp-6); margin-bottom: var(--sp-8); font-size: var(--fs-xs); font-weight: 700; opacity: 0.8;">
                                <span><?php the_date(); ?></span>
                                <span><?php echo premium_b2b_reading_time(); ?></span>
                            </div>
							<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo esc_html__( 'Read Analysis', 'premium-b2b' ); ?></a>
						</div>
					</article>

					<div class="post-grid">
				<?php else : ?>
                    <?php if( 1 === $count && !$show_featured ) echo '<div class="post-grid">'; ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-post card' ); ?> itemscope itemtype="https://schema.org/BlogPosting" data-reveal>
						<meta itemprop="mainEntityOfPage" content="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-thumbnail" style="margin-bottom: var(--sp-6); border-radius: var(--radius-sm); overflow: hidden;">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium_large' ); ?>
								</a>
							</div>
						<?php endif; ?>
						<h3 itemprop="headline" style="font-size: var(--fs-md); margin-bottom: var(--sp-4);"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="entry-excerpt text-light" itemprop="description" style="font-size: var(--fs-sm); margin-bottom: var(--sp-6);">
							<?php the_excerpt(); ?>
						</div>
						<div class="post-meta flex" style="justify-content: space-between; font-size: var(--fs-xs); font-weight: 800; border-top: 1px solid var(--color-border); padding-top: var(--sp-4);">
							<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" style="color: var(--color-accent);"><?php echo get_the_date(); ?></time>
                            <span style="opacity: 0.6;"><?php echo premium_b2b_reading_time(); ?></span>
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

			<div class="pagination-wrapper section">
				<?php
				the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( 'Previous', 'premium-b2b' ),
					'next_text' => __( 'Next', 'premium-b2b' ),
				) );
				?>
			</div>

            <?php get_template_part( 'template-parts/section', 'magnet' ); ?>

		<?php else : ?>
			<p><?php esc_html_e( 'No posts found.', 'premium-b2b' ); ?></p>
		<?php endif; ?>
	</div>

</main>

<?php
get_footer();
