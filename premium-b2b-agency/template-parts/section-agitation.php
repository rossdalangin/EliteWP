<?php
/**
 * Template part for displaying the Agitation Grid
 *
 * @package Premium_B2B
 */
?>
<section class="agitation-section section" id="agitation">
    <div class="container">
        <div class="section-header text-center" style="margin-bottom: 6rem;">
            <span class="step-number" style="margin-bottom: 1rem;"><?php esc_html_e( 'THE PROBLEM', 'premium-b2b' ); ?></span>
            <h2 style="max-width: 800px; margin-inline: auto;"><?php echo esc_html( get_theme_mod( 'agitation_headline', 'Stop Letting Operational Friction Drain Your Agency Growth' ) ); ?></h2>
            <p class="text-light" style="max-width: 60ch; margin-inline: auto;"><?php echo esc_html__( 'Most agencies struggle with these core operational pains that keep them from hitting the 7-figure mark.', 'premium-b2b' ); ?></p>
        </div>
        <div class="grid agitation-grid">
            <?php
            $agitation_defaults = array(
                1 => array( 't' => 'Content Fatigue', 'd' => 'The constant demand for volume has degraded your message, causing high-value partners to tune out.' ),
                2 => array( 't' => 'Brand Degradation', 'd' => 'Inconsistent authority signals and outdated positioning are actively repelling premium, high-ticket prospects.' ),
                3 => array( 't' => 'Empty Pipelines', 'd' => 'Relying on inconsistent referrals and word-of-mouth rather than a predictable, engineering-grade acquisition machine.' ),
            );
            for ( $i = 1; $i <= 3; $i++ ) :
                $title = get_theme_mod( "agitation_c{$i}_title", $agitation_defaults[$i]['t'] );
                $desc = get_theme_mod( "agitation_c{$i}_desc", $agitation_defaults[$i]['d'] );
            ?>
                <div class="agitation-card">
                    <div class="icon"><?php echo $i == 1 ? '📉' : ($i == 2 ? '⚠️' : '🛑'); ?></div>
                    <h3><?php echo esc_html( $title ); ?></h3>
                    <p class="text-light" style="line-height: 1.8;"><?php echo esc_html( $desc ); ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
