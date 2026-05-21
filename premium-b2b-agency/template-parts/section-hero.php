<?php
/**
 * Template part for displaying the Hero Section
 *
 * @package Premium_B2B
 */
?>
<section class="hero-section section">
    <div class="container grid">
        <div class="hero-content">
            <div class="hero-highlights flex" style="margin-bottom: 2rem;">
                <?php for($i=1; $i<=3; $i++):
                    $h = get_theme_mod("highlight_{$i}_title");
                    if($h):
                ?>
                    <span class="text-accent" style="font-size: var(--fs-xs); font-weight: 800; text-transform: uppercase;">&bull; <?php echo esc_html($h); ?></span>
                <?php endif; endfor; ?>
            </div>
            <h1 itemprop="name">
                <?php echo esc_html( get_theme_mod( 'hero_headline', 'Scale Your B2B Agency with Precision Client Acquisition' ) ); ?>
            </h1>
            <p class="text-light" itemprop="description">
                <?php echo esc_html( get_theme_mod( 'hero_subheadline', 'We engineer high-converting acquisition systems that turn cold prospects into high-ticket partners.' ) ); ?>
            </p>
            <div class="hero-cta">
                <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large">
                    <?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Your Strategy Audit' ) ); ?>
                </a>
            </div>
        </div>
        <div class="hero-graphic">
            <div class="hero-graphic-wrapper">
                <div class="hero-graphic-inner">
                    <div class="graphic-bar graphic-bar-short"></div>
                    <div class="graphic-bar graphic-bar-full"></div>
                    <div class="graphic-bar graphic-bar-medium"></div>
                    <div class="graphic-dot"></div>
                </div>
            </div>
        </div>
    </div>
</section>
