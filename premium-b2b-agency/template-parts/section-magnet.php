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
            $mag_cta_type = get_theme_mod( 'magnet_cta_type', 'html' );
            $magnet_embed = get_theme_mod( 'magnet_embed' );

            if ( 'url' === $mag_cta_type ) :
            ?>
                <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary">
                    <?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Get The Blueprint' ) ); ?>
                </a>
            <?php elseif ( 'html' === $mag_cta_type && ! empty( $magnet_embed ) ) : ?>
                <div class="magnet-html-embed">
                    <?php echo $magnet_embed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </div>
            <?php elseif ( 'shortcode' === $mag_cta_type && ! empty( $magnet_embed ) ) : ?>
                <div class="magnet-shortcode">
                    <?php echo do_shortcode( $magnet_embed ); ?>
                </div>
            <?php else : ?>
                <div class="magnet-placeholder">
                    <p class="text-light" style="font-weight: 700;"><?php esc_html_e( '[Configure Lead Magnet in Customizer]', 'premium-b2b' ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
