<?php
/**
 * Template part for displaying the Global Lead Magnet
 *
 * @package Premium_B2B
 */
?>
<section class="lead-magnet-section section" style="background: var(--color-bg); border-top: 1px solid var(--color-border);">
    <div class="container text-center" style="max-width: 800px;">
        <h2 style="margin-bottom: 1rem;"><?php echo esc_html( get_theme_mod( 'magnet_headline', 'Get the B2B Acquisition Roadmap' ) ); ?></h2>
        <p class="text-light" style="margin-bottom: 3rem;"><?php echo esc_html( get_theme_mod( 'magnet_desc', 'Join 5,000+ agency owners receiving our weekly scaling insights.' ) ); ?></p>

        <div class="magnet-form-wrapper">
            <?php
            $magnet_embed = get_theme_mod( 'magnet_embed' );
            if ( ! empty( $magnet_embed ) ) :
                echo $magnet_embed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            else :
                ?>
                <div style="background: var(--color-white); padding: 2rem; border-radius: var(--radius); border: 1px dashed var(--color-border);">
                    <p class="text-light"><?php esc_html_e( '[Newsletter Form Embed Code from Customizer]', 'premium-b2b' ); ?></p>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>
