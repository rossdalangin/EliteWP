<?php
/**
 * Template part for displaying Testimonials
 *
 * @package Premium_B2B
 */
?>
<section class="testimonials-section section" style="background: var(--color-primary); color: var(--color-white);">
    <div class="container grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
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
                <p style="font-size: var(--fs-md); font-style: italic; margin-bottom: 2rem;">&ldquo;<?php echo esc_html( $text ); ?>&rdquo;</p>
                <cite style="font-weight: 700; font-style: normal;">&mdash; <?php echo esc_html( $author ); ?></cite>
            </div>
        <?php endif; endfor; ?>
    </div>
</section>
