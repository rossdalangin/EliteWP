<?php
/**
 * The template for displaying the front page
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main" itemscope itemtype="https://schema.org/ProfessionalService">

	<!-- Section 1: Above-the-Fold Hero Split Layout -->
	<section class="hero-section section">
		<div class="container grid">
			<div class="hero-content">
				<h1 itemprop="name">
					<?php echo esc_html( get_theme_mod( 'hero_headline', __( 'Scale Your B2B Agency with Premium Client Acquisition', 'premium-b2b' ) ) ); ?>
				</h1>
				<p class="text-light" itemprop="description">
					<?php echo esc_html( get_theme_mod( 'hero_subheadline', __( 'We build high-converting systems that turn cold prospects into high-ticket partners.', 'premium-b2b' ) ) ); ?>
				</p>
				<div class="hero-cta">
					<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large">
						<?php echo esc_html( get_theme_mod( 'hero_cta_text', __( 'Get a Free Strategy Session', 'premium-b2b' ) ) ); ?>
					</a>
				</div>
			</div>
			<div class="hero-graphic">
				<div class="hero-graphic-wrapper">
					<div class="hero-graphic-inner">
						<div class="graphic-bar graphic-bar-short"></div>
						<div class="graphic-bar graphic-bar-full"></div>
						<div class="graphic-bar graphic-bar-medium"></div>
						<div class="graphic-dot"></div>
					</div>
					<div class="graphic-accent-box"></div>
				</div>
			</div>
		</div>
	</section>

	<!-- Section 2: The Agitation Grid -->
	<section class="agitation-section section">
		<div class="container">
			<div class="section-header">
				<h2><?php echo esc_html( get_theme_mod( 'agitation_headline', __( 'Stop Letting Inefficient Systems Drain Your Agency Profits', 'premium-b2b' ) ) ); ?></h2>
				<p class="text-light"><?php echo esc_html__( 'Most agencies struggle with these three core operational pains.', 'premium-b2b' ); ?></p>
			</div>
			<div class="grid agitation-grid">
				<?php
				$agitation_defaults = array(
					1 => array( 't' => 'Content Fatigue', 'd' => 'Spending hours on content that fails to generate meaningful engagement.' ),
					2 => array( 't' => 'Brand Degradation', 'd' => 'Inconsistent messaging that turns away premium clients.' ),
					3 => array( 't' => 'Empty Pipelines', 'd' => 'Living month-to-month without predictable acquisition.' ),
				);
				for ( $i = 1; $i <= 3; $i++ ) :
					$title = get_theme_mod( "agitation_c{$i}_title", $agitation_defaults[$i]['t'] );
					$desc = get_theme_mod( "agitation_c{$i}_desc", $agitation_defaults[$i]['d'] );
				?>
					<div class="agitation-card">
						<div class="icon"><?php echo $i == 1 ? '📉' : ($i == 2 ? '⚠️' : '🛑'); ?></div>
						<h3><?php echo esc_html( $title ); ?></h3>
						<p class="text-light"><?php echo esc_html( $desc ); ?></p>
					</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<!-- Section 3: The Branded Mechanism Layout (Z-pattern) -->
	<section class="mechanism-section section">
		<div class="container">
			<div class="section-header text-center">
				<h2 style="max-width: 800px; margin-inline: auto;"><?php echo esc_html( get_theme_mod( 'mechanism_headline', __( 'Our Premium 3-Step Framework', 'premium-b2b' ) ) ); ?></h2>
			</div>

			<div class="mechanism-steps grid">
				<?php
				$mechanism_defaults = array(
					1 => array( 't' => 'Strategic Audit', 'd' => 'We deep-dive into your operations to identify leakage.' ),
					2 => array( 't' => 'System Build', 'd' => 'We architect your bespoke acquisition engine.' ),
					3 => array( 't' => 'Scale & ROI', 'd' => 'We scale traffic and optimize for maximum partnership growth.' ),
				);
				for ( $i = 1; $i <= 3; $i++ ) :
					$title = get_theme_mod( "mechanism_s{$i}_title", $mechanism_defaults[$i]['t'] );
					$desc = get_theme_mod( "mechanism_s{$i}_desc", $mechanism_defaults[$i]['d'] );
					$reverse = ($i % 2 == 0) ? 'reverse' : '';
				?>
					<div class="step grid <?php echo esc_attr($reverse); ?>">
						<div class="step-content">
							<span class="step-number">STEP 0<?php echo $i; ?></span>
							<h3><?php echo esc_html( $title ); ?></h3>
							<p class="text-light"><?php echo esc_html( $desc ); ?></p>
						</div>
						<div class="step-image"></div>
					</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<!-- Section 4: The Frictionless Capture Block -->
	<section class="capture-section section">
		<div class="container">
			<h2><?php echo esc_html( get_theme_mod( 'capture_headline', __( 'Ready to Secure Your Next 5 High-Ticket Partners?', 'premium-b2b' ) ) ); ?></h2>
			<p><?php echo esc_html( get_theme_mod( 'capture_subheadline', __( 'Book your discovery call below to see if your agency is a fit.', 'premium-b2b' ) ) ); ?></p>

			<div class="capture-widget">
				<?php
				$capture_embed = get_theme_mod( 'capture_embed' );
				if ( ! empty( $capture_embed ) ) :
					echo $capture_embed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				else :
					?>
					<div class="text-center">
						<p class="text-light" style="margin-bottom: 1.5rem;"><?php echo esc_html__( '[Calendar Application / Lead Form Embed Area]', 'premium-b2b' ); ?></p>
						<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary">
							<?php echo esc_html( get_theme_mod( 'hero_cta_text', __( 'Get a Free Strategy Session', 'premium-b2b' ) ) ); ?>
						</a>
					</div>
					<?php
				endif;
				?>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
