<?php
/**
 * Template part for displaying the Agitation Grid
 *
 * @package Premium_B2B
 */
?>
<section class="agitation-section section">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html( get_theme_mod( 'agitation_headline', 'Stop Letting Operational Friction Drain Your Agency Growth' ) ); ?></h2>
            <p class="text-light"><?php echo esc_html__( 'Most agencies struggle with these three core operational pains.', 'premium-b2b' ); ?></p>
        </div>
        <div class="grid agitation-grid">
            <?php
            $agitation_defaults = array(
                1 => array( 't' => 'Stagnant Pipelines', 'd' => 'Living project-to-project without a predictable, automated system for high-ticket acquisition.' ),
                2 => array( 't' => 'Brand Degradation', 'd' => 'Inconsistent messaging and outdated design that signal low authority to premium prospects.' ),
                3 => array( 't' => 'Conversion Leakage', 'd' => 'Spending thousands on traffic that hits non-optimized pages, resulting in zero ROI.' ),
            );
            for ( $i = 1; $i <= 3; $i++ ) :
                $title = get_theme_mod( "agitation_c{$i}_title", $agitation_defaults[$i]['t'] );
                $desc = get_theme_mod( "agitation_c{$i}_desc", $agitation_defaults[$i]['d'] );
            ?>
                <div class="agitation-card">
                    <div class="icon"><?php echo $i == 1 ? '📉' : ($i == 2 ? '⚠️' : '🛑'); ?></div>
                    <h3><?php echo esc_html( $title ); ?></h3>
                    <p class="text-light"><?php echo esc_html( $desc ); ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
