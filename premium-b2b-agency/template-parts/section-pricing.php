<?php
/**
 * Template part for displaying Pricing
 *
 * @package Premium_B2B
 */
?>
<section class="pricing-section section" style="background: var(--color-white);">
    <div class="container">
        <div class="section-header text-center">
            <h2><?php echo esc_html( get_theme_mod( 'pricing_headline', 'Scalable Investment Frameworks' ) ); ?></h2>
        </div>
        <div class="grid agitation-grid">
            <?php
            $price_defaults = array(
                1 => array( 't' => 'Foundation', 'p' => '$5k', 'd' => 'Strategic audit and positioning realignment for growth.' ),
                2 => array( 't' => 'Accelerator', 'p' => '$15k', 'd' => 'Full acquisition engine build and initial traffic injection.' ),
                3 => array( 't' => 'Elite Scale', 'p' => '$25k+', 'd' => 'Enterprise-level multi-channel scale and full CRM automation.' ),
            );
            for ( $i = 1; $i <= 3; $i++ ) :
                $title = get_theme_mod( "price_{$i}_title", $price_defaults[$i]['t'] );
                $price = get_theme_mod( "price_{$i}_amt", $price_defaults[$i]['p'] );
                $desc = get_theme_mod( "price_{$i}_desc", $price_defaults[$i]['d'] );
            ?>
            <div class="price-card text-center" style="padding: 4rem 2rem; border: 1px solid var(--color-border); border-radius: var(--radius);">
                <h3 style="margin-bottom: 0.5rem;"><?php echo esc_html( $title ); ?></h3>
                <div class="amount" style="font-size: var(--fs-xxl); font-weight: 900; color: var(--color-accent); margin-bottom: 1.5rem;"><?php echo esc_html( $price ); ?></div>
                <p class="text-light" style="margin-bottom: 2rem;"><?php echo esc_html( $desc ); ?></p>
                <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary" style="width: 100%;">Select Package</a>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
