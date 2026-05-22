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
		<section class="widget widget_search">
			<?php get_search_form(); ?>
		</section>

		<section class="widget widget_b2b_cta" style="background: var(--color-primary); color: white; border: none; padding: var(--sp-8); border-radius: var(--radius-sm);">
			<h4 class="widget-title" style="color: white; border-color: rgba(255,255,255,0.1); margin-bottom: var(--sp-4);"><?php esc_html_e( 'Ready to Scale?', 'premium-b2b' ); ?></h4>
			<p style="font-size: var(--fs-xs); opacity: 0.8; margin-bottom: var(--sp-6); line-height: 1.6; font-weight: 500;"><?php esc_html_e( 'Join the elite agencies using our proven framework to dominate their high-ticket market.', 'premium-b2b' ); ?></p>
			<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary" style="width: 100%; margin: 0; padding: 1rem;"><?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Your Audit' ) ); ?></a>
		</section>

		<section class="widget widget_categories">
			<h4 class="widget-title"><?php esc_html_e( 'Categories', 'premium-b2b' ); ?></h4>
			<ul style="list-style: none; padding: 0;">
				<?php wp_list_categories( array( 'title_li' => '', 'show_count' => 1 ) ); ?>
			</ul>
		</section>

		<section class="widget widget_recent_entries">
			<h4 class="widget-title"><?php esc_html_e( 'Latest Analysis', 'premium-b2b' ); ?></h4>
			<ul style="list-style: none; padding: 0;">
				<?php
				$recent_posts = wp_get_recent_posts( array( 'numberposts' => 5, 'post_status' => 'publish' ) );
				foreach ( $recent_posts as $post ) :
					?>
					<li style="margin-bottom: var(--sp-4); border-bottom: 1px solid var(--color-border); padding-bottom: var(--sp-4);">
						<a href="<?php echo get_permalink( $post['ID'] ); ?>" style="line-height: 1.4; display: block; font-weight: 700; color: var(--color-primary);"><?php echo esc_html( $post['post_title'] ); ?></a>
                        <time style="font-size: 10px; font-weight: 800; color: var(--color-accent); text-transform: uppercase; margin-top: 0.5rem; display: block;"><?php echo get_the_date('', $post['ID']); ?></time>
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
