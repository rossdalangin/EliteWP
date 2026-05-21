<?php
/**
 * Template part for displaying FAQ
 *
 * @package Premium_B2B
 */
?>
<section class="faq-section section" style="background: var(--color-bg);">
    <div class="container">
        <div class="section-header text-center">
            <h2><?php echo esc_html( get_theme_mod( 'faq_headline', 'Framework Inquiries & Strategy FAQ' ) ); ?></h2>
        </div>
        <div class="grid" style="max-width: 800px; margin: 0 auto; gap: 1.5rem;">
            <?php
            $faq_defaults = array(
                1 => array( 'q' => 'How quickly will we see ROI?', 'a' => 'Most agencies see significant pipeline growth within the first 45-60 days.' ),
                2 => array( 'q' => 'Do you handle the implementation?', 'a' => 'Yes, we are a full-service technical partner. We build and manage the entire engine.' ),
                3 => array( 'q' => 'What is the ideal client profile?', 'a' => 'We specialize in B2B agencies selling high-ticket services ($10k+ LTV).' ),
                4 => array( 'q' => 'Is this a one-time build?', 'a' => 'We offer both initial build-outs and long-term scaling partnerships.' ),
            );
            for ( $i = 1; $i <= 4; $i++ ) :
                $q = get_theme_mod( "faq_{$i}_q", $faq_defaults[$i]['q'] );
                $a = get_theme_mod( "faq_{$i}_a", $faq_defaults[$i]['a'] );
            ?>
            <details style="background: var(--color-white); padding: 1.5rem 2rem; border-radius: var(--radius); border: 1px solid var(--color-border); cursor: pointer;">
                <summary style="font-weight: 700; font-size: var(--fs-base); list-style: none; display: flex; justify-content: space-between; align-items: center;">
                    <?php echo esc_html( $q ); ?>
                    <span style="color: var(--color-accent); font-size: 1.5rem;">+</span>
                </summary>
                <p class="text-light" style="margin-top: 1rem; cursor: default;"><?php echo esc_html( $a ); ?></p>
            </details>
            <?php endfor; ?>
        </div>
    </div>
</section>
