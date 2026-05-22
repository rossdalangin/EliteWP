<?php
/**
 * Template part for displaying the Agitation Grid
 *
 * @package Premium_B2B
 */
?>
<section class="agitation-section section bg-dots" id="agitation" style="background: var(--color-white);">
    <div class="container">
        <div class="section-header text-center" data-reveal>
            <span class="step-number"><?php esc_html_e( 'OPERATIONAL FRICTION', 'premium-b2b' ); ?></span>
            <h2 style="max-width: 900px; margin-inline: auto;"><?php echo esc_html( get_theme_mod( 'agitation_headline', 'Stop Letting Operational Friction Drain Your Agency Growth' ) ); ?></h2>
            <p class="text-light" style="max-width: 75ch; margin-inline: auto; font-size: var(--fs-base);"><?php echo esc_html__( 'Most agencies struggle with these three core operational pains that keep them trapped in a cycle of unpredictable revenue and low-authority positioning.', 'premium-b2b' ); ?></p>
        </div>
        <div class="grid agitation-grid">
            <?php
            $agitation_defaults = array(
                1 => array( 't' => 'Content Fatigue', 'i' => '📉', 'd' => 'The constant demand for volume has degraded your message, causing high-value partners to tune out and ignore your outreach.' ),
                2 => array( 't' => 'Brand Degradation', 'i' => '⚠️', 'd' => 'Inconsistent authority signals and outdated positioning are actively repelling premium, high-ticket prospects who demand excellence.' ),
                3 => array( 't' => 'Empty Pipelines', 'i' => '🛑', 'd' => 'Relying on inconsistent referrals and word-of-mouth rather than a predictable, engineering-grade acquisition machine that runs 24/7.' ),
            );
            for ( $i = 1; $i <= 3; $i++ ) :
                $title = get_theme_mod( "agitation_c{$i}_title", $agitation_defaults[$i]['t'] );
                $desc = get_theme_mod( "agitation_c{$i}_desc", $agitation_defaults[$i]['d'] );
            ?>
                <div class="card agitation-card" data-reveal style="display: flex; flex-direction: column;">
                    <div class="icon" style="background: var(--color-bg); width: 6rem; height: 6rem; display: flex; align-items: center; justify-content: center; border-radius: 1.5rem; font-size: 2.5rem; margin-bottom: var(--sp-8); border: 1px solid var(--color-border);"><?php echo $agitation_defaults[$i]['i']; ?></div>
                    <h3 style="font-size: var(--fs-md); margin-bottom: var(--sp-4); letter-spacing: -0.02em;"><?php echo esc_html( $title ); ?></h3>
                    <p class="text-light" style="font-size: var(--fs-sm); font-weight: 500; line-height: 1.8;"><?php echo esc_html( $desc ); ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
