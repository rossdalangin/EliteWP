<?php
/**
 * Template part for displaying Testimonials
 *
 * @package Premium_B2B
 */
?>
<section class="testimonials-section section" style="overflow: hidden; padding-bottom: 0;">
    <div class="container">
        <div class="section-header text-center" style="margin-bottom: var(--sp-16);" data-reveal>
            <span class="step-number" style="margin-bottom: var(--sp-4);"><?php esc_html_e( 'MARKET VALIDATION', 'premium-b2b' ); ?></span>
            <h2 style="line-height: 0.9;"><?php esc_html_e( 'Results-Driven Performance', 'premium-b2b' ); ?></h2>
        </div>
        <div class="grid agitation-grid">
            <?php
            $test_defaults = array(
                1 => array( 't' => 'This framework transformed our lead flow. In 3 months, we secured more high-ticket partners than in the previous two years.', 'a' => 'David Chen, CEO of CloudScale' ),
                2 => array( 't' => 'The most technical and conversion-optimized theme we have ever deployed. It reflects the authority we need in the B2B space.', 'a' => 'Sarah Jenkins, Director of Operations' ),
                3 => array( 't' => 'Since deploying the Alpha Framework, our cost per acquisition has dropped by 40% while lead quality has doubled.', 'a' => 'Marcus Thorne, Founder of GrowthMatrix' ),
            );
            for ( $i = 1; $i <= 3; $i++ ) :
                $text   = get_theme_mod( "testimonial_{$i}_text", $test_defaults[$i]['t'] );
                $author = get_theme_mod( "testimonial_{$i}_author", $test_defaults[$i]['a'] );
                $avatar = get_theme_mod( "testimonial_{$i}_img" );
                if ( $text ) :
            ?>
                <div class="card testimonial-card" data-reveal style="display: flex; flex-direction: column;">
                    <div class="stars" style="color: #FBBF24; font-size: 1.25rem; margin-bottom: var(--sp-6);">★★★★★</div>
                    <p style="margin-bottom: var(--sp-8); position: relative; z-index: 1; font-weight: 500; line-height: 1.8; color: var(--color-text); flex-grow: 1;">&ldquo;<?php echo esc_html( $text ); ?>&rdquo;</p>
                    <div class="testimonial-meta flex" style="gap: var(--sp-4); border-top: 1px solid var(--color-border); padding-top: var(--sp-6);">
                        <div class="avatar" style="width: 3.5rem; height: 3.5rem; background: var(--color-accent); border-radius: 1rem; display: flex; align-items: center; justify-content: center; font-weight: 900; color: white; flex-shrink: 0; overflow: hidden;">
                            <?php if ( $avatar ) : ?>
                                <img src="<?php echo esc_url( $avatar ); ?>" alt="<?php echo esc_attr( $author ); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            <?php else : ?>
                                <?php echo substr($author, 0, 1); ?>
                            <?php endif; ?>
                        </div>
                        <cite style="font-weight: 700; font-style: normal; font-size: var(--fs-xs); letter-spacing: 0.05em; color: var(--color-text-light); line-height: 1.4;"><?php echo esc_html( $author ); ?></cite>
                    </div>
                </div>
            <?php endif; endfor; ?>
        </div>
    </div>
    <div style="height: var(--sp-20);"></div>
</section>
