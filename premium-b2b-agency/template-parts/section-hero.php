<?php
/**
 * Template part for displaying the Hero Section
 *
 * @package Premium_B2B
 */
?>
<section class="hero-section section bg-grid" fetchpriority="high">
    <div class="container hero-grid" style="align-items: center; min-height: 70vh;">
        <div class="hero-content" data-reveal>
            <div class="hero-highlights" style="margin-bottom: var(--sp-8);">
                <?php
                $hl_defaults = array('ROI Focused', 'Scale Ready', 'Zero Friction');
                $hl_icons = array('📈', '🛡️', '⚡');
                for($i=1; $i<=3; $i++):
                    $h = get_theme_mod("highlight_{$i}_title", $hl_defaults[$i-1]);
                    $icon = get_theme_mod("highlight_{$i}_icon", $hl_icons[$i-1]);
                    if($h):
                ?>
                    <span class="highlight-item" style="background: var(--color-primary); color: white; padding: 0.4rem 1.25rem; border-radius: 99px; font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1em; margin-right: 0.5rem; display: inline-flex; align-items: center; gap: 0.6rem;">
                        <span class="icon" style="font-size: 1.25rem;"><?php echo esc_html($icon); ?></span>
                        <?php echo esc_html($h); ?>
                    </span>
                <?php endif; endfor; ?>
            </div>
            <?php if ( get_theme_mod( 'hero_headline' ) ) : ?>
            <h1 itemprop="name" style="line-height: 1.05; letter-spacing: -0.06em; margin-bottom: var(--sp-8);">
                <?php echo esc_html( get_theme_mod( 'hero_headline' ) ); ?>
            </h1>
            <?php endif; ?>
            <?php if ( get_theme_mod( 'hero_subheadline' ) ) : ?>
            <p class="hero-subheadline" itemprop="description" style="max-width: 55ch; font-size: var(--fs-md); margin-bottom: var(--sp-12); line-height: 1.7; font-weight: 500; color: var(--color-text-light);">
                <?php echo esc_html( get_theme_mod( 'hero_subheadline' ) ); ?>
            </p>
            <?php endif; ?>
            <div class="hero-cta flex" style="gap: var(--sp-8); flex-wrap: wrap;">
                <?php if ( get_theme_mod( 'hero_cta_text' ) ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_url', '#' ) ); ?>" class="btn btn-primary btn-large">
                    <?php echo esc_html( get_theme_mod( 'hero_cta_text' ) ); ?>
                </a>
                <?php endif; ?>
                <?php if ( get_theme_mod( 'hero_cta_2_text' ) ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'hero_cta_2_url', '#agitation' ) ); ?>" class="btn btn-outline btn-large hidden-mobile" style="color: var(--color-text); border-color: var(--color-text);">
                    <?php echo esc_html( get_theme_mod( 'hero_cta_2_text' ) ); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="hero-graphic hidden-mobile" data-reveal>
            <div class="hero-graphic-wrapper" style="position: relative; aspect-ratio: 1; background: var(--color-white); border-radius: var(--radius); border: 1px solid var(--color-border); box-shadow: var(--shadow-xl); overflow: hidden; transform: perspective(2000px) rotateY(-15deg) rotateX(5deg); transition: transform 0.1s ease-out;">
                <?php $hero_img = get_theme_mod( 'hero_bg_image', 'https://images.unsplash.com/photo-1551434678-e076c223a692?q=80&w=2070&auto=format&fit=crop' ); ?>
                <img src="<?php echo esc_url( $hero_img ); ?>" alt="Agency Engineering" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.15; filter: grayscale(100%);">
                <div class="mesh-gradient" style="position: absolute; inset: 0; background: radial-gradient(at 0% 0%, rgba(37, 99, 235, 0.2) 0%, transparent 50%), radial-gradient(at 100% 100%, rgba(15, 23, 42, 0.1) 0%, transparent 50%);"></div>
                <div class="graphic-elements" style="position: absolute; inset: var(--sp-12); border: 1px dashed var(--color-border); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; flex-direction: column; gap: var(--sp-8);">
                    <div class="chart-mockup" style="width: 85%; height: 45%; background: var(--color-bg); border-radius: 1.25rem; border: 1px solid var(--color-border); padding: var(--sp-6); box-shadow: var(--shadow-md);">
                        <div style="width: 100%; height: 100%; display: flex; align-items: flex-end; gap: 6px;">
                            <div style="height: 35%; flex: 1; background: var(--color-accent); border-radius: 6px 6px 0 0; opacity: 0.15;"></div>
                            <div style="height: 55%; flex: 1; background: var(--color-accent); border-radius: 6px 6px 0 0; opacity: 0.3;"></div>
                            <div style="height: 45%; flex: 1; background: var(--color-accent); border-radius: 6px 6px 0 0; opacity: 0.25;"></div>
                            <div style="height: 75%; flex: 1; background: var(--color-accent); border-radius: 6px 6px 0 0; opacity: 0.5;"></div>
                            <div style="height: 90%; flex: 1; background: var(--color-accent); border-radius: 6px 6px 0 0;"></div>
                        </div>
                    </div>
                    <div class="stats-mockup flex" style="width: 85%; gap: var(--sp-6);">
                        <div style="flex: 1; height: 5rem; background: var(--color-bg); border-radius: 1.25rem; border: 1px solid var(--color-border); box-shadow: var(--shadow-sm); display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">💎</div>
                        <div style="flex: 1; height: 5rem; background: var(--color-bg); border-radius: 1.25rem; border: 1px solid var(--color-border); box-shadow: var(--shadow-sm); display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">🔥</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
