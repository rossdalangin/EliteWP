<?php
/**
 * The template for displaying all single posts
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<?php premium_b2b_breadcrumbs(); ?>

    <div class="container blog-layout-with-sidebar">
        <div class="blog-content-area">
            <?php
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', 'single' );

                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile;
            ?>
        </div>
        <?php get_sidebar(); ?>
    </div>

	<?php
    // Reset loop for related insights
	while ( have_posts() ) :
		the_post();

		// Related Insights (Full width section outside the content/sidebar grid)
		$categories = wp_get_post_categories( get_the_ID() );
		if ( $categories ) {
			$args = array(
				'category__in' => $categories,
				'post__not_in' => array( get_the_ID() ),
				'posts_per_page' => 3,
				'ignore_sticky_posts' => 1
			);
			$related_query = new WP_Query( $args );
			if ( $related_query->have_posts() ) :
				?>
				<section class="related-insights section" style="background: var(--color-bg); border-top: 1px solid var(--color-border);">
					<div class="container">
						<h2 style="margin-bottom: 3rem;"><?php esc_html_e( 'Related Insights', 'premium-b2b' ); ?></h2>
						<div class="grid agitation-grid">
							<?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
								<article class="grid-post" style="background: var(--color-white); padding: 2rem; border-radius: var(--radius);">
									<h3 style="font-size: var(--fs-md);"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<time style="font-size: var(--fs-xs); color: var(--color-text-light);"><?php echo get_the_date(); ?></time>
								</article>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>
				</section>
				<?php
			endif;
		}
	endwhile;
	?>

</main>

<?php
get_footer();
