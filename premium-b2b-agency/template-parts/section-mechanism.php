<?php
/**
 * Template part for displaying the Mechanism Z-Pattern
 *
 * @package Premium_B2B
 */
?>
<section class="mechanism-section section" id="mechanism">
    <div class="container">
        <div class="section-header text-center" style="margin-bottom: 12rem;">
            <span class="step-number" style="margin-bottom: 1.5rem;"><?php esc_html_e( 'THE ARCHITECTURE', 'premium-b2b' ); ?></span>
            <h2 style="max-width: 800px; margin-inline: auto; margin-bottom: 2.5rem;"><?php echo esc_html( get_theme_mod( 'mechanism_headline', 'Our Elite 3-Step Acquisition Framework' ) ); ?></h2>
            <p class="text-light" style="max-width: 65ch; margin-inline: auto; font-size: var(--fs-base);"><?php esc_html_e( 'We replace guesswork with engineering. Our 3-step process is architected for predictable, scalable, and high-authority agency growth.', 'premium-b2b' ); ?></p>
        </div>

        <div class="mechanism-steps">
            <?php
            $mechanism_defaults = array(
                1 => array( 't' => 'Authority Architecture Audit', 'd' => 'We deconstruct your current positioning and architect a high-authority brand identity that commands premium fees and attracts elite partners.' ),
                2 => array( 't' => 'The Alpha Engine Build', 'd' => 'We deploy our proprietary conversion ecosystem, transforming your agency brand into a scientific, automated lead-capture machine.' ),
                3 => array( 't' => 'Precision Scale Injection', 'd' => 'With the infrastructure solidified, we inject surgical multi-channel traffic to scale your pipeline and ROI predictably.' ),
            );
            for ( $i = 1; $i <= 3; $i++ ) :
                $title = get_theme_mod( "mechanism_s{$i}_title", $mechanism_defaults[$i]['t'] );
                $desc = get_theme_mod( "mechanism_s{$i}_desc", $mechanism_defaults[$i]['d'] );
                $reverse = ($i % 2 == 0) ? 'reverse' : '';
            ?>
                <div class="step grid <?php echo esc_attr($reverse); ?>" style="align-items: center; gap: clamp(4rem, 10vw, 10rem); margin-bottom: 12rem;">
                    <div class="step-content">
                        <span class="step-number" style="background: var(--color-primary); color: white; margin-bottom: 2.5rem;">PHASE 0<?php echo $i; ?></span>
                        <h3 style="margin-bottom: 2.5rem; font-size: var(--fs-xl);"><?php echo esc_html( $title ); ?></h3>
                        <p class="text-light" style="font-size: var(--fs-base); line-height: 1.8; margin-bottom: 3.5rem;"><?php echo esc_html( $desc ); ?></p>
                        <ul style="display: flex; flex-direction: column; gap: 1.5rem; font-size: var(--fs-sm); font-weight: 800;">
                            <li class="flex" style="gap: 1.5rem;"><span style="color: var(--color-accent); font-size: 1.25rem;">✔</span> <?php esc_html_e( 'Proprietary B2B Logic', 'premium-b2b' ); ?></li>
                            <li class="flex" style="gap: 1.5rem;"><span style="color: var(--color-accent); font-size: 1.25rem;">✔</span> <?php esc_html_e( 'Engineering-Grade Implementation', 'premium-b2b' ); ?></li>
                        </ul>
                    </div>
                    <div class="step-image" style="background: linear-gradient(135deg, #f8fafc, #e2e8f0); aspect-ratio: 1.5; border-radius: var(--radius); border: 1px solid var(--color-border); box-shadow: var(--shadow-lg);"></div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
