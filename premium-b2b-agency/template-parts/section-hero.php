<?php
/**
 * Template part for displaying the Hero Section
 *
 * @package Premium_B2B
 */
?>
<section class="hero-section section bg-grid" fetchpriority="high">
    <div class="container hero-grid">
        <div class="hero-content" data-reveal>
            <div class="hero-highlights">
                <?php
                $hl_defaults = array('ROI Focused', 'Scale Ready', 'Zero Friction');
                for($i=1; $i<=3; $i++):
                    $h = get_theme_mod("highlight_{$i}_title", $hl_defaults[$i-1]);
                    if($h):
                ?>
                    <span class="highlight-item">
                        <span class="dot"></span>
                        <?php echo esc_html($h); ?>
                    </span>
                <?php endif; endfor; ?>
            </div>
            <h1 itemprop="name">
                <?php echo esc_html( get_theme_mod( 'hero_headline', 'Scale Your B2B Agency with Precision Client Acquisition' ) ); ?>
            </h1>
            <p class="hero-subheadline" itemprop="description">
                <?php echo esc_html( get_theme_mod( 'hero_subheadline', 'We engineer high-converting acquisition systems that turn cold prospects into high-ticket partners through scientific positioning and automated infrastructure.' ) ); ?>
            </p>
            <div class="hero-cta">
                <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large">
                    <?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Strategy Audit' ) ); ?>
                </a>
                <a href="#mechanism" class="btn btn-text">
                    <?php esc_html_e( 'EXPLORE THE FRAMEWORK', 'premium-b2b' ); ?>
                </a>
            </div>
        </div>
        <div class="hero-graphic hidden-mobile" data-reveal>
            <div class="hero-graphic-wrapper">
                <div class="hero-graphic-inner">
                    <div class="graphic-dot"></div>
                    <div class="graphic-bar graphic-bar-short"></div>
                    <div class="graphic-bar graphic-bar-full"></div>
                    <div class="graphic-bar graphic-bar-medium"></div>
                    <div class="graphic-bar graphic-bar-full secondary"></div>
                    <div class="graphic-bar graphic-bar-short accent"></div>
                </div>
            </div>
        </div>
    </div>
</section>
