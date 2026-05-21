<?php
/**
 * Template part for displaying the Frictionless Capture Block
 *
 * @package Premium_B2B
 */
?>
<section class="capture-section section" id="contact">
    <div class="container" style="max-width: 1000px;">
        <div class="capture-card" style="background: var(--color-white); border-radius: var(--radius); padding: clamp(3rem, 10vw, 6rem); box-shadow: var(--shadow-xl); border: 1px solid var(--color-border); position: relative; overflow: hidden;">
            <div style="position: absolute; top: 0; right: 0; width: 300px; height: 300px; background: radial-gradient(circle, rgba(37, 99, 235, 0.05) 0%, transparent 70%); z-index: 0;"></div>

            <div style="position: relative; z-index: 1;">
                <span class="step-number" style="margin-bottom: 1.5rem;"><?php esc_html_e( 'GET STARTED', 'premium-b2b' ); ?></span>
                <h2 style="margin-bottom: 2rem;"><?php echo esc_html( get_theme_mod( 'capture_headline', 'Ready to Secure Your Next 5 High-Ticket Partners?' ) ); ?></h2>
                <p class="text-light" style="font-size: var(--fs-base); margin-bottom: 4rem; max-width: 60ch;"><?php echo esc_html( get_theme_mod( 'capture_subheadline', 'Initiate your strategy session below. We only partner with agencies we are certain we can scale.' ) ); ?></p>

                <div class="capture-form-area">
                    <?php
                    $capture_embed = get_theme_mod( 'capture_embed' );
                    if ( ! empty( $capture_embed ) ) :
                        echo $capture_embed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    else :
                        ?>
                        <div class="flex" style="gap: 3rem; flex-wrap: wrap;">
                            <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large">
                                <?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Your Strategy Audit' ) ); ?>
                            </a>
                            <div class="flex" style="gap: 1.5rem;">
                                <div style="font-size: var(--fs-xs); opacity: 0.7;">
                                    <p style="font-weight: 800; color: var(--color-primary); margin-bottom: 0.25rem;"><?php esc_html_e( 'Direct Access:', 'premium-b2b' ); ?></p>
                                    <p><?php echo esc_html( get_theme_mod('contact_email', 'partner@agency.com') ); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
