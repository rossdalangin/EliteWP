<?php
/**
 * Template part for displaying FAQ
 *
 * @package Premium_B2B
 */
?>
<section class="faq-section section" style="background: var(--color-bg);" id="faq">
    <div class="container">
        <div class="section-header text-center">
            <span class="step-number"><?php esc_html_e( 'STRATEGY FAQ', 'premium-b2b' ); ?></span>
            <h2><?php echo esc_html( get_theme_mod( 'faq_headline', 'Framework Inquiries & Strategy FAQ' ) ); ?></h2>
        </div>
        <div class="grid faq-grid" style="max-width: 900px; margin-inline: auto; gap: 2rem;">
            <?php
            $faq_defaults = array(
                1 => array( 'q' => 'How quickly will we see ROI?', 'a' => 'Most agencies see significant pipeline growth within the first 45-60 days of the engine going live.' ),
                2 => array( 'q' => 'Do you handle the implementation?', 'a' => 'Yes, we are a full-service technical partner. We build and manage the entire infrastructure for you.' ),
                3 => array( 'q' => 'What is the ideal client profile?', 'a' => 'We specialize in B2B agencies selling high-ticket services ($10k+ LTV) looking to hit 7-figures.' ),
                4 => array( 'q' => 'Is this a one-time build?', 'a' => 'We offer both initial build-outs and long-term scaling partnerships to ensure sustainable growth.' ),
            );
            for ( $i = 1; $i <= 4; $i++ ) :
                $q = get_theme_mod( "faq_{$i}_q", $faq_defaults[$i]['q'] );
                $a = get_theme_mod( "faq_{$i}_a", $faq_defaults[$i]['a'] );
            ?>
            <details class="faq-details">
                <summary class="faq-summary">
                    <?php echo esc_html( $q ); ?>
                </summary>
                <div class="faq-content text-light">
                    <p><?php echo esc_html( $a ); ?></p>
                </div>
            </details>
            <?php endfor; ?>
        </div>
    </div>
</section>
