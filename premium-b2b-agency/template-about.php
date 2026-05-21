<?php
/**
 * Template Name: About Page
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<section class="about-hero section" style="background-color: var(--color-white);">
		<div class="container text-center" style="max-width: 900px;">
			<h1><?php echo esc_html( get_theme_mod( 'about_mission_headline', 'Our Mission: Transforming B2B Growth Engines' ) ); ?></h1>
			<p class="text-light" style="font-size: var(--fs-md); margin-top: 2.5rem; line-height: 1.8; max-width: 70ch; margin-inline: auto;">
				<?php echo esc_html( get_theme_mod( 'about_mission_text', 'We empower elite agencies to achieve predictable revenue through precision positioning and automated acquisition systems.' ) ); ?>
			</p>
		</div>
	</section>

	<section class="values-section section" style="background-color: var(--color-bg);">
		<div class="container">
			<div class="grid agitation-grid">
				<?php
				$value_defaults = array(
					1 => array( 't' => 'Absolute Precision', 'd' => 'Every variable in our framework is tested and optimized for high-ticket B2B conversion.' ),
					2 => array( 't' => 'Radical Authority', 'd' => 'We position your agency as the only logical choice in your vertical through engineered messaging.' ),
					3 => array( 't' => 'Scalable Systems', 'd' => 'Our acquisition engines are built to handle high volume without operational breakdown or lead decay.' ),
				);
				for ( $i = 1; $i <= 3; $i++ ) :
					$title = get_theme_mod( "value_{$i}_title", $value_defaults[$i]['t'] );
					$desc = get_theme_mod( "value_{$i}_desc", $value_defaults[$i]['d'] );
				?>
				<div class="value-card card" style="background: var(--color-white); padding: 4rem; border-radius: var(--radius); border: 1px solid var(--color-border);">
					<span class="step-number" style="margin-bottom: 2rem;">VALUE 0<?php echo $i; ?></span>
                    <h3 style="font-size: var(--fs-md); margin-bottom: 1.5rem;"><?php echo esc_html( $title ); ?></h3>
					<p class="text-light" style="font-size: var(--fs-sm); line-height: 1.8;"><?php echo esc_html( $desc ); ?></p>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<section class="team-section section" style="background-color: var(--color-white);">
		<div class="container">
            <div class="section-header text-center">
                <span class="step-number"><?php esc_html_e( 'THE TEAM', 'premium-b2b' ); ?></span>
			    <h2>Meet the Strategists</h2>
            </div>
			<div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
				<?php
                $team_query = new WP_Query( array( 'post_type' => 'team_member', 'posts_per_page' => -1 ) );
                if ( $team_query->have_posts() ) :
                    while ( $team_query->have_posts() ) : $team_query->the_post();
                ?>
					<div class="team-card text-center" style="padding: 4rem; background: var(--color-bg); border-radius: var(--radius);">
						<div class="team-photo" style="width: 120px; height: 120px; background: white; border-radius: 50%; margin: 0 auto 2.5rem; overflow: hidden; border: 4px solid white; box-shadow: var(--shadow-md);">
                            <?php the_post_thumbnail( 'thumbnail' ); ?>
                        </div>
						<h3 style="font-size: var(--fs-md); margin-bottom: 0.5rem;"><?php the_title(); ?></h3>
						<p class="text-accent" style="font-weight: 800; font-size: var(--fs-xs); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 1.5rem;"><?php echo get_the_excerpt(); ?></p>
                        <p class="text-light" style="font-size: var(--fs-xs); line-height: 1.6;"><?php echo get_the_content(); ?></p>
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
