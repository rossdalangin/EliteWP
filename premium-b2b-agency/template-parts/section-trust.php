<?php
/**
 * Template part for displaying the Trust Bar
 *
 * @package Premium_B2B
 */
?>
<section class="trust-bar section" style="padding-block: 4rem; background: var(--color-white); border-bottom: 1px solid var(--color-border);">
    <div class="container">
        <p class="text-center text-light" style="font-size: var(--fs-xs); font-weight: 700; text-transform: uppercase; margin-bottom: 2.5rem; letter-spacing: 0.1em;">
            <?php echo esc_html( get_theme_mod( 'trust_headline', 'Trusted by Industry-Leading B2B Organizations' ) ); ?>
        </p>
        <div class="flex-center" style="flex-wrap: wrap; gap: 4rem; opacity: 0.5; filter: grayscale(1);">
            <?php for($i=1; $i<=5; $i++):
                $logo_text = get_theme_mod( "trust_logo_{$i}", "LOGO $i" );
            ?>
                <div style="font-weight: 900; font-size: var(--fs-md);"><?php echo esc_html( $logo_text ); ?></div>
            <?php endfor; ?>
        </div>
    </div>
</section>
