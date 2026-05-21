<?php
/**
 * Template Name: About Page
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<section class="about-hero section" style="background-color: var(--color-white);">
		<div class="container text-center" style="max-width: 800px;">
			<h1><?php echo esc_html( get_theme_mod( 'about_mission_headline', 'Our Mission: Transforming B2B Growth Engines' ) ); ?></h1>
			<p class="text-light" style="font-size: var(--fs-lg); margin-top: 1.5rem;">
				<?php echo esc_html( get_theme_mod( 'about_mission_text', 'We empower elite agencies to achieve predictable revenue through precision positioning and automated acquisition systems.' ) ); ?>
			</p>
		</div>
	</section>

	<section class="values-section section" style="background-color: var(--color-bg);">
		<div class="container">
			<div class="grid agitation-grid">
				<?php
				$value_defaults = array(
					1 => array( 't' => '01. Absolute Precision', 'd' => 'Every variable in our framework is tested and optimized for high-ticket B2B conversion.' ),
					2 => array( 't' => '02. Radical Authority', 'd' => 'We position your agency as the only logical choice in your vertical.' ),
					3 => array( 't' => '03. Scalable Systems', 'd' => 'Our acquisition engines are built to handle high volume without operational breakdown.' ),
				);
				for ( $i = 1; $i <= 3; $i++ ) :
					$title = get_theme_mod( "value_{$i}_title", $value_defaults[$i]['t'] );
					$desc = get_theme_mod( "value_{$i}_desc", $value_defaults[$i]['d'] );
				?>
				<div class="value-card" style="background: var(--color-white); padding: 3rem; border-radius: var(--radius); box-shadow: var(--shadow-sm);">
					<h3 class="text-accent"><?php echo esc_html( $title ); ?></h3>
					<p class="text-light"><?php echo esc_html( $desc ); ?></p>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<section class="team-section section" style="background-color: var(--color-white);">
		<div class="container">
			<h2 class="text-center" style="margin-bottom: 4rem;">Meet the Strategists</h2>
			<div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
				<?php
                $team_query = new WP_Query( array( 'post_type' => 'team_member', 'posts_per_page' => -1 ) );
                if ( $team_query->have_posts() ) :
                    while ( $team_query->have_posts() ) : $team_query->the_post();
                ?>
					<div class="team-card text-center">
						<div class="team-photo" style="width: 150px; height: 150px; background: var(--color-bg); border-radius: 50%; margin: 0 auto 1.5rem;">
                            <?php the_post_thumbnail( 'thumbnail', array( 'style' => 'border-radius: 50%;' ) ); ?>
                        </div>
						<h3><?php the_title(); ?></h3>
						<p class="text-light"><?php echo get_the_excerpt(); ?></p>
					</div>
				<?php endwhile; wp_reset_postdata(); else: ?>
                    <p class="text-center">No team members found.</p>
                <?php endif; ?>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
