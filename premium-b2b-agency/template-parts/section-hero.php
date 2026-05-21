<?php
/**
 * Template part for displaying the Hero Section
 *
 * @package Premium_B2B
 */
?>
<section class="hero-section section" fetchpriority="high">
    <div class="container grid">
        <div class="hero-content">
            <div class="hero-highlights flex" style="margin-bottom: 2.5rem; gap: 2rem;">
                <?php
                $hl_defaults = array('ROI Focused', 'Scale Ready', 'Zero Friction');
                for($i=1; $i<=3; $i++):
                    $h = get_theme_mod("highlight_{$i}_title", $hl_defaults[$i-1]);
                    if($h):
                ?>
                    <span class="text-accent" style="font-size: var(--fs-xs); font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; display: flex; align-items: center; gap: 0.5rem;">
                        <span style="width: 6px; height: 6px; background: var(--color-accent); border-radius: 50%;"></span>
                        <?php echo esc_html($h); ?>
                    </span>
                <?php endif; endfor; ?>
            </div>
            <h1 itemprop="name" style="margin-bottom: 2rem;">
                <?php echo esc_html( get_theme_mod( 'hero_headline', 'Scale Your B2B Agency with Precision Client Acquisition' ) ); ?>
            </h1>
            <p class="text-light" itemprop="description" style="font-size: var(--fs-md); max-width: 60ch; margin-bottom: 3.5rem; line-height: 1.8;">
                <?php echo esc_html( get_theme_mod( 'hero_subheadline', 'We engineer high-converting acquisition systems that turn cold prospects into high-ticket partners through scientific positioning and automated infrastructure.' ) ); ?>
            </p>
            <div class="hero-cta flex" style="gap: 2rem;">
                <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large">
                    <?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Strategy Audit' ) ); ?>
                </a>
                <a href="#mechanism" class="btn" style="border: 1px solid var(--color-border); background: var(--color-white);">
                    <?php esc_html_e( 'View The Framework', 'premium-b2b' ); ?>
                </a>
            </div>
        </div>
        <div class="hero-graphic">
            <div class="hero-graphic-wrapper">
                <div class="hero-graphic-inner">
                    <div class="graphic-dot"></div>
                    <div class="graphic-bar graphic-bar-short"></div>
                    <div class="graphic-bar graphic-bar-full"></div>
                    <div class="graphic-bar graphic-bar-medium"></div>
                    <div class="graphic-bar graphic-bar-full" style="opacity: 0.3;"></div>
                    <div class="graphic-bar graphic-bar-short" style="align-self: flex-end;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
