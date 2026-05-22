<?php
/**
 * Template part for displaying the Mechanism Z-Pattern
 *
 * @package Premium_B2B
 */
?>
<section class="mechanism-section section" id="mechanism">
    <div class="container">
        <div class="section-header text-center" data-reveal>
            <span class="step-number"><?php esc_html_e( 'THE ARCHITECTURE', 'premium-b2b' ); ?></span>
            <h2 style="max-width: 800px; margin-inline: auto;"><?php echo esc_html( get_theme_mod( 'mechanism_headline', 'Our Elite 3-Step Acquisition Framework' ) ); ?></h2>
            <p class="text-light" style="max-width: 65ch; margin-inline: auto; font-size: var(--fs-base); line-height: 1.8;"><?php esc_html_e( 'We replace guesswork with engineering. Our 3-step process is architected for predictable, scalable, and high-authority agency growth.', 'premium-b2b' ); ?></p>
        </div>

        <div class="mechanism-steps">
            <?php
            $mechanism_defaults = array(
                1 => array( 't' => 'Authority Architecture Audit', 'd' => 'We deconstruct your current positioning and architect a high-authority brand identity that commands premium fees and attracts elite partners.' ),
                2 => array( 't' => 'The Alpha Engine Build', 'd' => 'We deploy our proprietary conversion ecosystem, transforming your agency brand into a scientific, automated lead-capture machine.' ),
                3 => array( 't' => 'Precision Scale Injection', 'd' => 'With the infrastructure solidified, we inject surgical multi-channel traffic to scale your pipeline and ROI predictably.' ),
            );
            $mechanism_images = array(
                1 => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=2026&auto=format&fit=crop',
                2 => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=2070&auto=format&fit=crop',
                3 => 'https://images.unsplash.com/photo-1551434678-e076c223a692?q=80&w=2070&auto=format&fit=crop'
            );
            for ( $i = 1; $i <= 3; $i++ ) :
                $title = get_theme_mod( "mechanism_s{$i}_title", $mechanism_defaults[$i]['t'] );
                $desc = get_theme_mod( "mechanism_s{$i}_desc", $mechanism_defaults[$i]['d'] );
                $reverse = ($i % 2 == 0) ? 'reverse' : '';
            ?>
                <div class="step <?php echo esc_attr($reverse); ?>">
                    <div class="step-content" data-reveal>
                        <span class="step-number" style="background: var(--color-primary); color: white;">PHASE 0<?php echo $i; ?></span>
                        <h3><?php echo esc_html( $title ); ?></h3>
                        <p class="text-light" style="font-size: var(--fs-base); line-height: 1.8; margin-bottom: var(--sp-8);"><?php echo esc_html( $desc ); ?></p>
                        <ul style="display: flex; flex-direction: column; gap: var(--sp-4); font-size: var(--fs-sm); font-weight: 800; list-style: none; padding: 0;">
                            <li class="flex" style="gap: var(--sp-4);"><span style="color: var(--color-accent); font-size: 1.25rem;">✔</span> <?php esc_html_e( 'Proprietary B2B Logic', 'premium-b2b' ); ?></li>
                            <li class="flex" style="gap: var(--sp-4);"><span style="color: var(--color-accent); font-size: 1.25rem;">✔</span> <?php esc_html_e( 'Engineering-Grade Implementation', 'premium-b2b' ); ?></li>
                        </ul>
                    </div>
                    <div class="step-image" data-reveal style="border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-xl); aspect-ratio: 4/3; background: var(--color-bg); border: 1px solid var(--color-border);">
                        <img src="<?php echo esc_url($mechanism_images[$i]); ?>" alt="<?php echo esc_attr($title); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
