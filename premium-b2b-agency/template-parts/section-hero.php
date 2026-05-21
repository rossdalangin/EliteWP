<?php
/**
 * Template part for displaying the Hero Section
 *
 * @package Premium_B2B
 */
?>
<section class="hero-section section" fetchpriority="high">
    <div class="container grid" style="grid-template-columns: 1.3fr 0.7fr;">
        <div class="hero-content">
            <div class="hero-highlights flex" style="margin-bottom: 3rem; gap: 2.5rem;">
                <?php
                $hl_defaults = array('ROI Focused', 'Scale Ready', 'Zero Friction');
                for($i=1; $i<=3; $i++):
                    $h = get_theme_mod("highlight_{$i}_title", $hl_defaults[$i-1]);
                    if($h):
                ?>
                    <span class="text-accent" style="font-size: var(--fs-xs); font-weight: 900; text-transform: uppercase; letter-spacing: 0.15em; display: flex; align-items: center; gap: 0.75rem;">
                        <span style="width: 8px; height: 8px; background: var(--color-accent); border-radius: 50%; box-shadow: 0 0 10px var(--color-accent);"></span>
                        <?php echo esc_html($h); ?>
                    </span>
                <?php endif; endfor; ?>
            </div>
            <h1 itemprop="name" style="margin-bottom: 2.5rem; line-height: 0.95;">
                <?php echo esc_html( get_theme_mod( 'hero_headline', 'Scale Your B2B Agency with Precision Acquisition' ) ); ?>
            </h1>
            <p class="text-light" itemprop="description" style="font-size: var(--fs-md); max-width: 65ch; margin-bottom: 4rem; line-height: 1.8; font-weight: 500;">
                <?php echo esc_html( get_theme_mod( 'hero_subheadline', 'We engineer high-converting acquisition systems that turn cold prospects into high-ticket partners through scientific positioning and automated infrastructure.' ) ); ?>
            </p>
            <div class="hero-cta flex" style="gap: 2.5rem;">
                <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large">
                    <?php echo esc_html( get_theme_mod( 'hero_cta_text', 'Book Strategy Audit' ) ); ?>
                </a>
                <a href="#mechanism" class="btn" style="border-bottom: 2px solid var(--color-accent); border-radius: 0; padding-inline: 0; font-weight: 900; letter-spacing: 0.05em;">
                    <?php esc_html_e( 'EXPLORE THE FRAMEWORK', 'premium-b2b' ); ?>
                </a>
            </div>
        </div>
        <div class="hero-graphic hidden-mobile">
            <div class="hero-graphic-wrapper">
                <div class="hero-graphic-inner">
                    <div class="graphic-dot"></div>
                    <div class="graphic-bar graphic-bar-short"></div>
                    <div class="graphic-bar graphic-bar-full"></div>
                    <div class="graphic-bar graphic-bar-medium"></div>
                    <div class="graphic-bar graphic-bar-full" style="opacity: 0.3;"></div>
                    <div class="graphic-bar graphic-bar-short" style="align-self: flex-end; width: 30%; background: var(--color-accent);"></div>
                </div>
            </div>
        </div>
    </div>
</section>
