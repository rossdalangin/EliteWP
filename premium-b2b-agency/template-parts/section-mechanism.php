<?php
/**
 * Template part for displaying the Mechanism Z-Pattern
 *
 * @package Premium_B2B
 */
?>
<section class="mechanism-section section">
    <div class="container">
        <div class="section-header text-center">
            <h2 style="max-width: 800px; margin-inline: auto;"><?php echo esc_html( get_theme_mod( 'mechanism_headline', 'Our Elite 3-Step Acquisition Framework' ) ); ?></h2>
        </div>

        <div class="mechanism-steps grid">
            <?php
            $mechanism_defaults = array(
                1 => array( 't' => 'Strategic Positioning Audit', 'd' => 'We identify leakage in your current brand positioning and realign your authority for the high-ticket market.' ),
                2 => array( 't' => 'Conversion Engine Build', 'd' => 'We architect your bespoke acquisition engine, ensuring every pixel is optimized for B2B conversion.' ),
                3 => array( 't' => 'Scalable Growth Injection', 'd' => 'Once the foundation is solid, we inject high-intent traffic to scale your ROI predictably.' ),
            );
            for ( $i = 1; $i <= 3; $i++ ) :
                $title = get_theme_mod( "mechanism_s{$i}_title", $mechanism_defaults[$i]['t'] );
                $desc = get_theme_mod( "mechanism_s{$i}_desc", $mechanism_defaults[$i]['d'] );
                $reverse = ($i % 2 == 0) ? 'reverse' : '';
            ?>
                <div class="step grid <?php echo esc_attr($reverse); ?>">
                    <div class="step-content">
                        <span class="step-number">STEP 0<?php echo $i; ?></span>
                        <h3><?php echo esc_html( $title ); ?></h3>
                        <p class="text-light"><?php echo esc_html( $desc ); ?></p>
                    </div>
                    <div class="step-image"></div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
