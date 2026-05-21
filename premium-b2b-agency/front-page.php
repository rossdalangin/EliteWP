<?php
/**
 * The template for displaying the front page
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main" itemscope itemtype="https://schema.org/ProfessionalService">

	<?php
    if ( get_theme_mod( 'show_section_hero', true ) ) {
        get_template_part( 'template-parts/section', 'hero' );
    }

    if ( get_theme_mod( 'show_section_trust', true ) ) {
        get_template_part( 'template-parts/section', 'trust' );
    }

    if ( get_theme_mod( 'show_section_agitation', true ) ) {
        get_template_part( 'template-parts/section', 'agitation' );
    }

    if ( get_theme_mod( 'show_section_testimonials', true ) ) {
        get_template_part( 'template-parts/section', 'testimonials' );
    }

    if ( get_theme_mod( 'show_section_mechanism', true ) ) {
        get_template_part( 'template-parts/section', 'mechanism' );
    }

    if ( get_theme_mod( 'show_section_pricing', true ) ) {
        get_template_part( 'template-parts/section', 'pricing' );
    }

    if ( get_theme_mod( 'show_section_faq', true ) ) {
        get_template_part( 'template-parts/section', 'faq' );
    }

    if ( get_theme_mod( 'show_section_capture', true ) ) {
        get_template_part( 'template-parts/section', 'capture' );
    }
    ?>

</main>

<?php
get_footer();
