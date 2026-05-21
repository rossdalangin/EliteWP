<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Premium_B2B
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	// Fallback content if sidebar is empty
	?>
	<aside id="secondary" class="widget-area">
		<section class="widget widget_search" style="margin-bottom: 3rem;">
			<?php get_search_form(); ?>
		</section>

		<section class="widget widget_b2b_cta" style="margin-bottom: 3rem; background: var(--color-primary); color: var(--color-white); padding: 2rem; border-radius: var(--radius);">
			<h4 class="widget-title" style="color: var(--color-white); margin-bottom: 1rem;"><?php esc_html_e( 'Ready to Scale?', 'premium-b2b' ); ?></h4>
			<p style="font-size: var(--fs-xs); opacity: 0.8; margin-bottom: 1.5rem;"><?php esc_html_e( 'Join the elite agencies using our proven framework.', 'premium-b2b' ); ?></p>
			<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary" style="width: 100%; font-size: var(--fs-xs);"><?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Your Strategy Audit' ) ); ?></a>
		</section>

		<section class="widget widget_categories" style="margin-bottom: 3rem;">
			<h4 class="widget-title"><?php esc_html_e( 'Categories', 'premium-b2b' ); ?></h4>
			<ul>
				<?php wp_list_categories( array( 'title_li' => '' ) ); ?>
			</ul>
		</section>

		<section class="widget widget_recent_entries" style="margin-bottom: 3rem;">
			<h4 class="widget-title"><?php esc_html_e( 'Recent Insights', 'premium-b2b' ); ?></h4>
			<ul>
				<?php
				$recent_posts = wp_get_recent_posts( array( 'numberposts' => 5, 'post_status' => 'publish' ) );
				foreach ( $recent_posts as $post ) :
					?>
					<li style="margin-bottom: 1rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.5rem;">
						<a href="<?php echo get_permalink( $post['ID'] ); ?>" style="font-weight: 600; font-size: var(--fs-sm);"><?php echo esc_html( $post['post_title'] ); ?></a>
					</li>
				<?php endforeach; wp_reset_query(); ?>
			</ul>
		</section>
	</aside>
	<?php
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
