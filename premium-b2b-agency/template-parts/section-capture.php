<?php
/**
 * Template part for displaying the Frictionless Capture Block
 *
 * @package Premium_B2B
 */
?>
<section class="capture-section section bg-grid" id="contact" style="background: var(--color-bg);">
    <div class="container" style="max-width: 1100px;">
        <div class="card capture-card-premium" data-reveal style="background: var(--color-white); padding: clamp(4rem, 10vw, 8rem); position: relative; overflow: hidden; border-radius: var(--radius); border: 1px solid var(--color-border); box-shadow: var(--shadow-xl); text-align: left;">
            <div style="position: absolute; top: 0; right: 0; width: 400px; height: 400px; background: radial-gradient(circle, rgba(37, 99, 235, 0.05) 0%, transparent 70%); z-index: 0;"></div>

            <div style="position: relative; z-index: 1;">
                <span class="step-number" style="margin-bottom: var(--sp-6); background: var(--color-primary); color: white;"><?php esc_html_e( 'GET STARTED', 'premium-b2b' ); ?></span>
                <h2 style="margin-bottom: var(--sp-6); font-size: var(--fs-xl); line-height: 1; color: var(--color-text);"><?php echo esc_html( get_theme_mod( 'capture_headline', 'Ready to Secure Your Next 5 High-Ticket Partners?' ) ); ?></h2>
                <p class="text-light" style="font-size: var(--fs-base); margin-bottom: var(--sp-12); max-width: 65ch; line-height: 1.8;"><?php echo esc_html( get_theme_mod( 'capture_subheadline', 'Initiate your strategy session below. We only partner with agencies we are certain we can scale.' ) ); ?></p>

                <div class="capture-form-area">
                    <?php
                    $cap_cta_type = get_theme_mod( 'capture_cta_type', 'html' );
                    $capture_embed = get_theme_mod( 'capture_embed' );

                    if ( 'url' === $cap_cta_type ) :
                    ?>
                        <div class="flex" style="gap: var(--sp-8); flex-wrap: wrap;">
                            <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large" style="margin: 0;">
                                <?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Your Strategy Audit' ) ); ?>
                            </a>
                            <div class="flex" style="gap: var(--sp-4);">
                                <div style="font-size: var(--fs-xs); opacity: 0.8;">
                                    <p style="font-weight: 900; color: var(--color-text); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.1em;"><?php esc_html_e( 'Direct Access:', 'premium-b2b' ); ?></p>
                                    <p style="font-weight: 700; color: var(--color-accent);"><?php echo esc_html( get_theme_mod('contact_email', 'partner@agency.com') ); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php elseif ( 'html' === $cap_cta_type && ! empty( $capture_embed ) ) : ?>
                        <div class="capture-html-embed">
                            <?php echo $capture_embed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </div>
                    <?php elseif ( 'shortcode' === $cap_cta_type && ! empty( $capture_embed ) ) : ?>
                        <div class="capture-shortcode">
                            <?php echo do_shortcode( $capture_embed ); ?>
                        </div>
                    <?php else : ?>
                        <p class="text-light"><?php esc_html_e( 'Direct Access:', 'premium-b2b' ); ?> <?php echo esc_html( get_theme_mod('contact_email', 'partner@agency.com') ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
