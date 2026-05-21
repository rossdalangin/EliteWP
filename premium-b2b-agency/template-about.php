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
			<h1><?php echo esc_html( get_theme_mod( 'about_mission_headline', __( 'Our Mission: Transforming B2B Acquisition', 'premium-b2b' ) ) ); ?></h1>
			<p class="text-light" style="font-size: var(--fs-lg); margin-top: 1.5rem;">
				<?php echo esc_html( get_theme_mod( 'about_mission_text', __( 'We empower agencies to achieve predictable growth by bridging the gap between high-value prospects and sustainable conversion systems.', 'premium-b2b' ) ) ); ?>
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
				<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
					<div class="team-card text-center">
						<div class="team-photo" style="width: 150px; height: 150px; background: var(--color-bg); border-radius: 50%; margin: 0 auto 1.5rem;"></div>
						<h3>Strategist <?php echo $i; ?></h3>
						<p class="text-light">Partner & Acquisition Lead</p>
					</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
