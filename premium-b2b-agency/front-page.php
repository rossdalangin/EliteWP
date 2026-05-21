<?php
/**
 * The template for displaying the front page
 *
 * @package Premium_B2B
 */

get_header(); ?>

<main id="primary" class="site-main" itemscope itemtype="https://schema.org/ProfessionalService">

	<?php
    get_template_part( 'template-parts/section', 'hero' );
    get_template_part( 'template-parts/section', 'trust' );
    get_template_part( 'template-parts/section', 'agitation' );
    get_template_part( 'template-parts/section', 'testimonials' );
    get_template_part( 'template-parts/section', 'mechanism' );
    get_template_part( 'template-parts/section', 'capture' );
    ?>

</main>

<?php
get_footer();
