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

	<!-- Section 1.5: Trust Bar (Social Proof) -->
	<section class="trust-bar section" style="padding-block: 4rem; background: var(--color-white); border-bottom: 1px solid var(--color-border);">
		<div class="container">
			<p class="text-center text-light" style="font-size: var(--fs-xs); font-weight: 700; text-transform: uppercase; margin-bottom: 2.5rem; letter-spacing: 0.1em;">
				<?php echo esc_html( get_theme_mod( 'trust_headline', __( 'Trusted by Industry Leaders', 'premium-b2b' ) ) ); ?>
			</p>
			<div class="flex-center" style="flex-wrap: wrap; gap: 4rem; opacity: 0.5; filter: grayscale(1);">
				<!-- Placeholder Logos -->
				<?php for($i=1; $i<=5; $i++): ?>
					<div style="font-weight: 900; font-size: var(--fs-md);">LOGO <?php echo $i; ?></div>
				<?php endfor; ?>
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
					1 => array( 't' => 'Stagnant Pipelines', 'd' => 'Living project-to-project without a predictable, automated system for high-ticket acquisition.' ),
					2 => array( 't' => 'Brand Degradation', 'd' => 'Inconsistent messaging and outdated design that signal low authority to premium prospects.' ),
					3 => array( 't' => 'Conversion Leakage', 'd' => 'Spending thousands on traffic that hits non-optimized pages, resulting in zero ROI.' ),
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

	<!-- Section 2.5: Testimonials (Authority) -->
	<section class="testimonials-section section" style="background: var(--color-primary); color: var(--color-white);">
		<div class="container grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
			<?php
			$test_defaults = array(
				1 => array( 't' => 'This framework transformed our lead flow. In 3 months, we secured more high-ticket partners than in the previous two years.', 'a' => 'David Chen, CEO of CloudScale' ),
				2 => array( 't' => 'The most technical and conversion-optimized theme we have ever deployed. It reflects the authority we need in the B2B space.', 'a' => 'Sarah Jenkins, Director of Operations' ),
			);
			for ( $i = 1; $i <= 2; $i++ ) :
				$text = get_theme_mod( "testimonial_{$i}_text", $test_defaults[$i]['t'] );
				$author = get_theme_mod( "testimonial_{$i}_author", $test_defaults[$i]['a'] );
				if ( $text ) :
			?>
				<div class="testimonial-card">
					<p style="font-size: var(--fs-md); font-style: italic; margin-bottom: 2rem;">&ldquo;<?php echo esc_html( $text ); ?>&rdquo;</p>
					<cite style="font-weight: 700; font-style: normal;">&mdash; <?php echo esc_html( $author ); ?></cite>
				</div>
			<?php endif; endfor; ?>
		</div>
	</section>

	<!-- Section 3: The Branded Mechanism Layout (Z-pattern) -->
	<section class="mechanism-section section">
		<div class="container">
			<div class="section-header text-center">
				<h2 style="max-width: 800px; margin-inline: auto;"><?php echo esc_html( get_theme_mod( 'mechanism_headline', __( 'Our Elite 3-Step Acquisition Framework', 'premium-b2b' ) ) ); ?></h2>
			</div>

			<div class="mechanism-steps grid">
				<?php
				$mechanism_defaults = array(
					1 => array( 't' => 'Strategic Positioning Audit', 'd' => 'We identify leakage in your current brand positioning and realign your authority for the high-ticket market.' ),
					2 => array( 't' => 'Conversion Engine Build', 'd' => 'We architect your bespoke acquisition engine, ensuring every pixel is optimized for B2B conversion.' ),
					3 => array( 't' => 'Scalable Growth Injection', 'd' => 'Once the foundation is solid, we inject high-intent traffic to scale your ROI predictably.' ),
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
			<p><?php echo esc_html( get_theme_mod( 'capture_subheadline', __( 'Initiate your strategy session below. We only partner with agencies we are certain we can scale.', 'premium-b2b' ) ) ); ?></p>

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
