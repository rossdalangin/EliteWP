<?php
/**
 * Template part for displaying Pricing
 *
 * @package Premium_B2B
 */
?>
<section class="pricing-section section bg-grid" id="pricing">
    <div class="container">
        <div class="section-header text-center" data-reveal>
            <span class="step-number"><?php esc_html_e( 'INVESTMENT MODELS', 'premium-b2b' ); ?></span>
            <h2><?php echo esc_html( get_theme_mod( 'pricing_headline', 'Scalable Investment Frameworks' ) ); ?></h2>
            <p class="text-light" style="max-width: 70ch; margin-inline: auto; font-size: var(--fs-base); line-height: 1.8;"><?php esc_html_e( 'Transparent, performance-driven pricing models designed to scale alongside your agency growth and delivery capacity.', 'premium-b2b' ); ?></p>
        </div>
        <div class="grid post-grid">
            <?php
            $price_defaults = array(
                1 => array( 't' => 'Foundation Engine', 'p' => '$4,997', 'd' => 'Strategic audit and positioning realignment for growth. Perfect for boutique agencies doing $20k+ MRR.' ),
                2 => array( 't' => 'Scale Master', 'p' => '$8,997', 'd' => 'Full acquisition engine build and initial traffic injection for aggressive growth and 7-figure scaling.' ),
                3 => array( 't' => 'Elite Enterprise', 'p' => 'Custom', 'd' => 'Enterprise-level multi-channel scale and full CRM automation. White-glove service for market leaders.' ),
            );
            for ( $i = 1; $i <= 3; $i++ ) :
                $title = get_theme_mod( "price_{$i}_title", $price_defaults[$i]['t'] );
                $price = get_theme_mod( "price_{$i}_amt", $price_defaults[$i]['p'] );
                $desc = get_theme_mod( "price_{$i}_desc", $price_defaults[$i]['d'] );
                $is_featured = ($i === 2) ? 'featured' : '';
            ?>
            <div class="card price-card <?php echo esc_attr($is_featured); ?>" style="display: flex; flex-direction: column;" data-reveal>
                <div style="margin-bottom: var(--sp-12);">
                    <h3 style="font-size: var(--fs-md); margin-bottom: var(--sp-4); letter-spacing: -0.02em;"><?php echo esc_html( $title ); ?></h3>
                    <div class="amount" style="font-size: var(--fs-xl); font-weight: 900; color: var(--color-accent); letter-spacing: -0.05em;"><?php echo esc_html( $price ); ?><span style="font-size: var(--fs-xs); color: var(--color-text-light); font-weight: 800; margin-left: var(--sp-2); letter-spacing: 0.05em;"><?php echo esc_html( $i < 3 ? '/MO' : '' ); ?></span></div>
                </div>
                <p class="text-light" style="margin-bottom: var(--sp-12); flex-grow: 1; font-size: var(--fs-sm); line-height: 1.9; font-weight: 500;"><?php echo esc_html( $desc ); ?></p>
                <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn <?php echo ($i === 2) ? 'btn-primary' : ''; ?>" style="width: 100%; border: 1px solid var(--color-border); padding-block: 1.5rem; font-size: 11px; letter-spacing: 0.1em; margin: 0;">
                    <?php esc_html_e( 'SELECT PACKAGE', 'premium-b2b' ); ?>
                </a>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
