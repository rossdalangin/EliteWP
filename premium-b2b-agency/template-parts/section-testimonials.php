<?php
/**
 * Template part for displaying Testimonials
 *
 * @package Premium_B2B
 */
?>
<section class="testimonials-section section" style="overflow: hidden;">
    <div class="container">
        <div class="section-header text-center" style="margin-bottom: 6rem;">
            <span class="step-number" style="background: rgba(255,255,255,0.1); color: white; margin-bottom: 1rem;"><?php esc_html_e( 'SUCCESS STORIES', 'premium-b2b' ); ?></span>
            <h2 style="color: white;"><?php esc_html_e( 'Results-Driven Validation', 'premium-b2b' ); ?></h2>
        </div>
        <div class="grid agitation-grid">
            <?php
            $test_defaults = array(
                1 => array( 't' => 'This framework transformed our lead flow. In 3 months, we secured more high-ticket partners than in the previous two years.', 'a' => 'David Chen, CEO of CloudScale' ),
                2 => array( 't' => 'The most technical and conversion-optimized theme we have ever deployed. It reflects the authority we need in the B2B space.', 'a' => 'Sarah Jenkins, Director of Operations' ),
                3 => array( 't' => 'Since deploying the Alpha Framework, our cost per acquisition has dropped by 40% while lead quality has doubled.', 'a' => 'Marcus Thorne, Founder of GrowthMatrix' ),
            );
            for ( $i = 1; $i <= 3; $i++ ) :
                $text = get_theme_mod( "testimonial_{$i}_text", $test_defaults[$i]['t'] );
                $author = get_theme_mod( "testimonial_{$i}_author", $test_defaults[$i]['a'] );
                if ( $text ) :
            ?>
                <div class="testimonial-card">
                    <div class="quote-icon" style="font-size: 4rem; color: var(--color-accent); line-height: 1; margin-bottom: 2rem; opacity: 0.5;">&ldquo;</div>
                    <p style="margin-bottom: 2.5rem; position: relative; z-index: 1;">&ldquo;<?php echo esc_html( $text ); ?>&rdquo;</p>
                    <div class="testimonial-meta flex" style="gap: 1rem;">
                        <div class="avatar" style="width: 3rem; height: 3rem; background: var(--color-accent); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 900;"><?php echo substr($author, 0, 1); ?></div>
                        <cite style="font-weight: 700; font-style: normal; font-size: var(--fs-sm);"><?php echo esc_html( $author ); ?></cite>
                    </div>
                </div>
            <?php endif; endfor; ?>
        </div>
    </div>
</section>
