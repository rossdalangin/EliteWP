<?php
/**
 * Template Name: About Page
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<section class="about-hero section" style="background-color: var(--color-white);">
		<div class="container text-center" style="max-width: 1000px;">
            <span class="step-number" data-reveal><?php esc_html_e( 'OUR MISSION', 'premium-b2b' ); ?></span>
			<h1 data-reveal><?php echo esc_html( get_theme_mod( 'about_mission_headline', 'Our Mission: Transforming B2B Growth Engines' ) ); ?></h1>
			<p class="text-light" style="font-size: var(--fs-md); margin-top: var(--sp-6); line-height: 1.8; max-width: 80ch; margin-inline: auto;" data-reveal>
				<?php echo esc_html( get_theme_mod( 'about_mission_text', 'We empower elite agencies to achieve predictable revenue through precision positioning and automated acquisition systems.' ) ); ?>
			</p>
		</div>
	</section>

    <section class="philosophy-section section bg-grid">
        <div class="container grid" style="grid-template-columns: 1fr 1fr; align-items: center;">
            <div class="philosophy-content" data-reveal>
                <span class="step-number" style="background: var(--color-primary); color: white;"><?php esc_html_e( 'THE PHILOSOPHY', 'premium-b2b' ); ?></span>
                <h2 style="margin-bottom: var(--sp-6);"><?php esc_html_e( 'Systems Engineering Meets Conversion Psychology', 'premium-b2b' ); ?></h2>
                <p class="text-light" style="margin-bottom: var(--sp-8);"><?php esc_html_e( 'We don’t believe in "tricks" or "growth hacks." We believe in architecting high-authority acquisition systems that respect the intelligence of your high-ticket prospects.', 'premium-b2b' ); ?></p>
                <div class="stats-grid grid" style="grid-template-columns: 1fr 1fr; gap: var(--sp-4);">
                    <div class="stat-item">
                        <div class="stat-value" style="font-size: var(--fs-xl); font-weight: 900; color: var(--color-accent);">$120M+</div>
                        <div class="stat-label text-light" style="font-size: var(--fs-xs); font-weight: 800; text-transform: uppercase;">Pipeline Generated</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value" style="font-size: var(--fs-xl); font-weight: 900; color: var(--color-accent);">150+</div>
                        <div class="stat-label text-light" style="font-size: var(--fs-xs); font-weight: 800; text-transform: uppercase;">Agencies Scaled</div>
                    </div>
                </div>
            </div>
            <div class="philosophy-graphic" style="position: relative; aspect-ratio: 1.2; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-xl); border: 1px solid var(--color-border);" data-reveal>
                <img src="https://images.unsplash.com/photo-1522071823991-b99c273c1533?q=80&w=2070&auto=format&fit=crop" alt="Agency Architects" style="width: 100%; height: 100%; object-fit: cover;">
                <div style="position: absolute; inset: 0; background: linear-gradient(to top, var(--color-primary), transparent); opacity: 0.6;"></div>
            </div>
        </div>
    </section>

	<section class="values-section section" style="background-color: var(--color-white);">
		<div class="container">
            <div class="section-header text-center" style="margin-bottom: var(--sp-16);" data-reveal>
                <span class="step-number"><?php esc_html_e( 'CORE VALUES', 'premium-b2b' ); ?></span>
                <h2><?php esc_html_e( 'The Pillars of Elite Acquisition', 'premium-b2b' ); ?></h2>
            </div>
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
				<div class="card" data-reveal>
					<span class="step-number" style="margin-bottom: var(--sp-4);"><?php echo $i; ?></span>
                    <h3 style="font-size: var(--fs-md); margin-bottom: var(--sp-4);"><?php echo esc_html( $title ); ?></h3>
					<p class="text-light" style="font-size: var(--fs-sm); line-height: 1.8;"><?php echo esc_html( $desc ); ?></p>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<section class="team-section section" style="background-color: var(--color-bg); border-top: 1px solid var(--color-border);">
		<div class="container">
            <div class="section-header text-center" style="margin-bottom: var(--sp-12);" data-reveal>
                <span class="step-number"><?php esc_html_e( 'THE STRATEGISTS', 'premium-b2b' ); ?></span>
			    <h2>Meet the Architects</h2>
            </div>
			<div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));">
				<?php
                $team_query = new WP_Query( array( 'post_type' => 'team_member', 'posts_per_page' => -1 ) );
                if ( $team_query->have_posts() ) :
                    while ( $team_query->have_posts() ) : $team_query->the_post();
                ?>
					<div class="team-card card text-center" data-reveal>
						<div class="team-photo" style="width: 140px; height: 140px; background: white; border-radius: 50%; margin: 0 auto var(--sp-6); overflow: hidden; border: 6px solid white; box-shadow: var(--shadow-md);">
                            <?php the_post_thumbnail( 'medium' ); ?>
                        </div>
						<h3 style="font-size: var(--fs-md); margin-bottom: var(--sp-1);"><?php the_title(); ?></h3>
						<p class="text-accent" style="font-weight: 800; font-size: var(--fs-xs); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: var(--sp-4);"><?php echo get_the_excerpt(); ?></p>
                        <p class="text-light" style="font-size: var(--fs-sm); line-height: 1.6;"><?php echo get_the_content(); ?></p>
					</div>
				<?php endwhile; wp_reset_postdata(); else: ?>
                    <p class="text-center">No team members found.</p>
                <?php endif; ?>
			</div>
		</div>
	</section>

    <section class="final-cta section bg-dots" style="background: var(--color-primary); color: white;">
        <div class="container text-center" data-reveal>
            <h2 style="color: white; margin-bottom: var(--sp-6);"><?php esc_html_e( 'Ready to Partner with Architects?', 'premium-b2b' ); ?></h2>
            <a href="<?php echo esc_url( home_url('/contact') ); ?>" class="btn btn-primary btn-large"><?php esc_html_e( 'Initiate Your Strategy', 'premium-b2b' ); ?></a>
        </div>
    </section>

</main>

<?php
get_footer();
