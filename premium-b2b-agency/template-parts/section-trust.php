<?php
/**
 * Template part for displaying the Trust Bar
 *
 * @package Premium_B2B
 */
?>
<section class="trust-section" style="padding-block: 5rem; background: var(--color-white); border-top: 1px solid var(--color-border); border-bottom: 1px solid var(--color-border);">
    <div class="container flex" style="flex-direction: column; gap: 4rem;">
        <p class="text-center" style="font-size: var(--fs-xs); font-weight: 800; letter-spacing: 0.25em; text-transform: uppercase; color: var(--color-text-light); opacity: 0.8;">
            <?php echo esc_html( get_theme_mod( 'trust_headline', 'Trusted by Industry-Leading B2B Organizations' ) ); ?>
        </p>
        <div class="flex trust-logos">
            <?php for ( $i = 1; $i <= 5; $i++ ) :
                $logo_text = get_theme_mod( "trust_logo_{$i}", "LOGO $i" );
            ?>
                <div class="trust-logo"><?php echo esc_html( $logo_text ); ?></div>
            <?php endfor; ?>
        </div>
    </div>
</section>
