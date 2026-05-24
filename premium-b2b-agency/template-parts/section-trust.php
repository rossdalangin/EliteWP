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
                $logo_img  = get_theme_mod( "trust_logo_{$i}_img" );
                if ( ! $logo_text && ! $logo_img ) continue;
            ?>
                <div class="trust-logo" style="opacity: 0.5; filter: grayscale(100%); transition: all 0.3s ease;" onmouseover="this.style.opacity=1; this.style.filter='grayscale(0%)'" onmouseout="this.style.opacity=0.5; this.style.filter='grayscale(100%)'">
                    <?php if ( $logo_img ) : ?>
                        <img src="<?php echo esc_url( $logo_img ); ?>" alt="<?php echo esc_attr( $logo_text ); ?>" style="max-height: 2.5rem; width: auto;">
                    <?php else : ?>
                        <span style="font-weight: 900; font-size: 1.25rem; letter-spacing: -0.05em;"><?php echo esc_html( $logo_text ); ?></span>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
