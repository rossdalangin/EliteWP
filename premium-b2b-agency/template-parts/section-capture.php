<?php
/**
 * Template part for displaying the Capture Block
 *
 * @package Premium_B2B
 */
?>
<section class="capture-section section">
    <div class="container">
        <h2 class="text-center"><?php echo esc_html( get_theme_mod( 'capture_headline', 'Ready to Secure Your Next 5 High-Ticket Partners?' ) ); ?></h2>
        <p><?php echo esc_html( get_theme_mod( 'capture_subheadline', 'Initiate your strategy session below. We only partner with agencies we are certain we can scale.' ) ); ?></p>

        <div class="capture-widget">
            <?php
            $capture_embed = get_theme_mod( 'capture_embed' );
            if ( ! empty( $capture_embed ) ) :
                echo $capture_embed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            else :
                ?>
                <div class="text-center">
                    <p class="text-light" style="margin-bottom: 1.5rem;"><?php echo esc_html__( '[Calendar Application / Lead Form Embed Area]', 'premium-b2b' ); ?></p>
                    <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary">
                        <?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Your Strategy Audit' ) ); ?>
                    </a>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>
