<?php
/**
 * Template Name: Case Studies
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main">

	<section class="case-studies-hero section">
		<div class="container text-center">
			<h1><?php echo esc_html( get_theme_mod( 'case_studies_headline', __( 'Client Success Stories & ROI Proof', 'premium-b2b' ) ) ); ?></h1>
			<p class="text-light" style="max-width: 600px; margin: 1.5rem auto 0;"><?php echo esc_html__( 'Explore how we have scaled agencies from stagnant revenue to high-ticket market leaders.', 'premium-b2b' ); ?></p>
		</div>
	</section>

	<section class="case-studies-grid section" style="background-color: var(--color-white);">
		<div class="container">
			<div class="grid agitation-grid">
				<?php
				$case_defaults = array(
					1 => array( 't' => 'CloudScale SaaS Expansion', 'k' => '+250% SQL Growth', 'd' => 'Implementing an automated LinkedIn engine to secure enterprise-level cloud partnerships.' ),
					2 => array( 't' => 'Alpha Logic Retention', 'k' => '$1.2M LTV Increase', 'd' => 'Strategic repositioning for a software house to target high-retention B2B clients.' ),
					3 => array( 't' => 'NexGen Pipeline Build', 'k' => '15+ Demos / Week', 'd' => 'Architecting a conversion ecosystem for a boutique B2B consultancy.' ),
				);
				for ( $i = 1; $i <= 3; $i++ ) :
					$title = get_theme_mod( "case_{$i}_title", $case_defaults[$i]['t'] );
					$kpi = get_theme_mod( "case_{$i}_kpi", $case_defaults[$i]['k'] );
					$desc = get_theme_mod( "case_{$i}_desc", $case_defaults[$i]['d'] );
				?>
				<div class="case-card" style="padding: 3rem; background: var(--color-bg); border-radius: var(--radius); transition: all 0.4s ease;">
					<span class="text-accent" style="font-weight: 800; font-size: var(--fs-md); display: block; margin-bottom: 0.5rem;"><?php echo esc_html( $kpi ); ?></span>
					<h3 style="margin-bottom: 1.5rem;"><?php echo esc_html( $title ); ?></h3>
					<p class="text-light" style="margin-bottom: 2rem;"><?php echo esc_html( $desc ); ?></p>
					<a href="#" class="text-accent" style="font-weight: 700; font-size: var(--fs-sm);"><?php echo esc_html__( 'View Full Case Study &rarr;', 'premium-b2b' ); ?></a>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<section class="cta-section section" style="background-color: var(--color-primary); color: var(--color-white);">
		<div class="container text-center">
			<h2 style="color: var(--color-white);"><?php echo esc_html__( 'Achieve Similar Results for Your Agency', 'premium-b2b' ); ?></h2>
			<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large" style="margin-top: 2rem;">
				<?php echo esc_html( get_theme_mod( 'hero_cta_text', __( 'Get Started', 'premium-b2b' ) ) ); ?>
			</a>
		</div>
	</section>

</main>

<?php
get_footer();
