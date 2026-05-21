<?php
/**
 * Template part for displaying Pricing
 *
 * @package Premium_B2B
 */
?>
<section class="pricing-section section" style="background: var(--color-white);" id="pricing">
    <div class="container">
        <div class="section-header text-center" style="margin-bottom: 6rem;">
            <span class="step-number" style="margin-bottom: 1rem;"><?php esc_html_e( 'INVESTMENT', 'premium-b2b' ); ?></span>
            <h2><?php echo esc_html( get_theme_mod( 'pricing_headline', 'Scalable Investment Frameworks' ) ); ?></h2>
            <p class="text-light" style="max-width: 60ch; margin-inline: auto;"><?php esc_html_e( 'Transparent, performance-driven pricing models designed to scale alongside your agency.', 'premium-b2b' ); ?></p>
        </div>
        <div class="grid post-grid">
            <?php
            $price_defaults = array(
                1 => array( 't' => 'Foundation Engine', 'p' => '$4,997/mo', 'd' => 'Strategic audit and positioning realignment for growth. Perfect for boutique agencies.' ),
                2 => array( 't' => 'Scale Master', 'p' => '$8,997/mo', 'd' => 'Full acquisition engine build and initial traffic injection for aggressive growth.' ),
                3 => array( 't' => 'Elite Enterprise', 'p' => 'Custom', 'd' => 'Enterprise-level multi-channel scale and full CRM automation. White-glove service.' ),
            );
            for ( $i = 1; $i <= 3; $i++ ) :
                $title = get_theme_mod( "price_{$i}_title", $price_defaults[$i]['t'] );
                $price = get_theme_mod( "price_{$i}_amt", $price_defaults[$i]['p'] );
                $desc = get_theme_mod( "price_{$i}_desc", $price_defaults[$i]['d'] );
                $is_featured = ($i === 2) ? 'featured' : '';
            ?>
            <div class="price-card <?php echo esc_attr($is_featured); ?> text-center">
                <h3 style="margin-bottom: 1rem; font-size: var(--fs-md);"><?php echo esc_html( $title ); ?></h3>
                <div class="amount" style="font-size: var(--fs-xl); font-weight: 900; color: var(--color-accent); margin-bottom: 2rem;"><?php echo esc_html( $price ); ?></div>
                <p class="text-light" style="margin-bottom: 3rem; flex-grow: 1;"><?php echo esc_html( $desc ); ?></p>
                <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn <?php echo ($i === 2) ? 'btn-primary' : ''; ?>" style="width: 100%; border: 1px solid var(--color-border);">
                    <?php esc_html_e( 'Select Package', 'premium-b2b' ); ?>
                </a>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
