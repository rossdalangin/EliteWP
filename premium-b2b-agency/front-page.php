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
				<!-- Card 1 -->
				<div class="agitation-card">
					<div class="icon">📉</div>
					<h3><?php echo esc_html( get_theme_mod( 'agitation_c1_title', __( 'Content Fatigue', 'premium-b2b' ) ) ); ?></h3>
					<p class="text-light"><?php echo esc_html( get_theme_mod( 'agitation_c1_desc', __( 'Spending hours on content that fails to generate meaningful engagement or leads.', 'premium-b2b' ) ) ); ?></p>
				</div>
				<!-- Card 2 -->
				<div class="agitation-card">
					<div class="icon">⚠️</div>
					<h3><?php echo esc_html( get_theme_mod( 'agitation_c2_title', __( 'Brand Degradation', 'premium-b2b' ) ) ); ?></h3>
					<p class="text-light"><?php echo esc_html( get_theme_mod( 'agitation_c2_desc', __( 'Inconsistent messaging and poor visual identity that turns away premium clients.', 'premium-b2b' ) ) ); ?></p>
				</div>
				<!-- Card 3 -->
				<div class="agitation-card">
					<div class="icon">🛑</div>
					<h3><?php echo esc_html( get_theme_mod( 'agitation_c3_title', __( 'Empty Pipelines', 'premium-b2b' ) ) ); ?></h3>
					<p class="text-light"><?php echo esc_html( get_theme_mod( 'agitation_c3_desc', __( 'Living month-to-month without a predictable system for high-ticket client acquisition.', 'premium-b2b' ) ) ); ?></p>
				</div>
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
				<!-- Step 1 -->
				<div class="step grid">
					<div class="step-content">
						<span class="step-number">STEP 01</span>
						<h3><?php echo esc_html( get_theme_mod( 'mechanism_s1_title', __( 'Strategic Audit & Positioning', 'premium-b2b' ) ) ); ?></h3>
						<p class="text-light"><?php echo esc_html( get_theme_mod( 'mechanism_s1_desc', __( 'We deep-dive into your current operations to identify leakage and define your unique value proposition in the high-ticket market.', 'premium-b2b' ) ) ); ?></p>
					</div>
					<div class="step-image"></div>
				</div>

				<!-- Step 2 -->
				<div class="step grid reverse">
					<div class="step-image"></div>
					<div class="step-content">
						<span class="step-number">STEP 02</span>
						<h3><?php echo esc_html( get_theme_mod( 'mechanism_s2_title', __( 'Conversion-Led System Build', 'premium-b2b' ) ) ); ?></h3>
						<p class="text-light"><?php echo esc_html( get_theme_mod( 'mechanism_s2_desc', __( 'We architect your bespoke acquisition engine, from high-converting landing pages to automated lead nurturing sequences.', 'premium-b2b' ) ) ); ?></p>
					</div>
				</div>

				<!-- Step 3 -->
				<div class="step grid">
					<div class="step-content">
						<span class="step-number">STEP 03</span>
						<h3><?php echo esc_html( get_theme_mod( 'mechanism_s3_title', __( 'Scale & Optimization', 'premium-b2b' ) ) ); ?></h3>
						<p class="text-light"><?php echo esc_html( get_theme_mod( 'mechanism_s3_desc', __( 'Once the foundation is solid, we scale your traffic and optimize every touchpoint for maximum ROI and long-term partnership growth.', 'premium-b2b' ) ) ); ?></p>
					</div>
					<div class="step-image"></div>
				</div>
			</div>
		</div>
	</section>

	<!-- Section 4: The Frictionless Capture Block -->
	<section class="capture-section section">
		<div class="container">
			<h2><?php echo esc_html( get_theme_mod( 'capture_headline', __( 'Ready to Secure Your Next 5 High-Ticket Partners?', 'premium-b2b' ) ) ); ?></h2>
			<p><?php echo esc_html( get_theme_mod( 'capture_subheadline', __( 'Book your discovery call below to see if your agency is a fit for our acquisition framework.', 'premium-b2b' ) ) ); ?></p>

			<div class="capture-widget">
				<?php
				$capture_embed = get_theme_mod( 'capture_embed' );
				if ( ! empty( $capture_embed ) ) :
					echo $capture_embed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				else :
					?>
					<!-- Default CTA if no embed code provided -->
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

</main><!-- #primary -->

<?php
get_footer();
