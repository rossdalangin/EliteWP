<?php
/**
 * Template part for displaying the Global Lead Magnet
 *
 * @package Premium_B2B
 */
?>
<section class="lead-magnet-section section">
    <div class="container text-center" style="max-width: 900px;">
        <div class="section-header">
            <span class="step-number"><?php esc_html_e( 'FREE RESOURCE', 'premium-b2b' ); ?></span>
            <h2 style="margin-bottom: 2rem;"><?php echo esc_html( get_theme_mod( 'magnet_headline', 'Get the B2B Acquisition Roadmap' ) ); ?></h2>
            <p class="text-light" style="max-width: 60ch; margin-inline: auto; font-size: var(--fs-base);"><?php echo esc_html( get_theme_mod( 'magnet_desc', 'Join 5,000+ agency owners receiving our weekly scaling insights and proprietary framework updates.' ) ); ?></p>
        </div>

        <div class="magnet-form-wrapper">
            <?php
            $magnet_embed = get_theme_mod( 'magnet_embed' );
            if ( ! empty( $magnet_embed ) ) :
                echo $magnet_embed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            else :
                ?>
                <div class="magnet-placeholder">
                    <p class="text-light" style="font-weight: 700;"><?php esc_html_e( '[Newsletter Form Embed Code from Customizer]', 'premium-b2b' ); ?></p>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>
