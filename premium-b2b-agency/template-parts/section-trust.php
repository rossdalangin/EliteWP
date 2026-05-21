<?php
/**
 * Template part for displaying the Trust Bar
 *
 * @package Premium_B2B
 */
?>
<section class="trust-section" style="padding-block: 4rem; background: var(--color-white); border-top: 1px solid var(--color-border); border-bottom: 1px solid var(--color-border);">
    <div class="container flex" style="flex-direction: column; gap: 3rem;">
        <p class="text-center" style="font-size: var(--fs-xs); font-weight: 800; letter-spacing: 0.2em; text-transform: uppercase; color: var(--color-text-light); opacity: 0.8;">
            <?php echo esc_html( get_theme_mod( 'trust_headline', 'Trusted by Industry-Leading B2B Organizations' ) ); ?>
        </p>
        <div class="flex" style="justify-content: space-between; width: 100%; gap: 4rem; flex-wrap: wrap; opacity: 0.4; filter: grayscale(1);">
            <?php for ( $i = 1; $i <= 5; $i++ ) :
                $logo_text = get_theme_mod( "trust_logo_{$i}", "LOGO $i" );
            ?>
                <div class="trust-logo" style="font-weight: 900; font-size: var(--fs-lg); letter-spacing: -0.05em;"><?php echo esc_html( $logo_text ); ?></div>
            <?php endfor; ?>
        </div>
    </div>
</section>
