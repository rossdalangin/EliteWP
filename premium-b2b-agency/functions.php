<?php
/**
 * Premium B2B Client Acquisition Agency functions and definitions
 *
 * @package Premium_B2B
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function premium_b2b_setup() {
	load_theme_textdomain( 'premium-b2b', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'core-block-patterns' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	register_nav_menus(
		array(
			'menu-1'      => esc_html__( 'Primary Menu', 'premium-b2b' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'premium-b2b' ),
		)
	);

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'premium_b2b_setup' );

/**
 * Register Sidebar.
 */
function premium_b2b_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'premium-b2b' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your blog sidebar.', 'premium-b2b' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s" style="margin-bottom: 3rem;">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title" style="margin-bottom: 1.5rem; font-size: var(--fs-sm); text-transform: uppercase; letter-spacing: 0.05em;">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'premium_b2b_widgets_init' );

/**
 * Register Custom Post Types.
 */
function premium_b2b_register_cpts() {
	// Case Studies
	register_post_type( 'case_study', array(
		'labels' => array(
			'name' => __( 'Case Studies', 'premium-b2b' ),
			'singular_name' => __( 'Case Study', 'premium-b2b' ),
		),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-chart-area',
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest' => true,
	) );

	// Services
	register_post_type( 'service', array(
		'labels' => array(
			'name' => __( 'Services', 'premium-b2b' ),
			'singular_name' => __( 'Service', 'premium-b2b' ),
		),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-clipboard',
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest' => true,
	) );

	// Team Members
	register_post_type( 'team_member', array(
		'labels' => array(
			'name' => __( 'Team', 'premium-b2b' ),
			'singular_name' => __( 'Team Member', 'premium-b2b' ),
		),
		'public' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-groups',
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'premium_b2b_register_cpts' );

/**
 * Enqueue scripts and styles.
 */
function premium_b2b_scripts() {
	// Performance: Dequeue jQuery on frontend for non-admin users to ensure zero-dependency compliance
	if ( ! is_admin() && ! is_user_logged_in() ) {
		wp_deregister_script( 'jquery' );
	}

	wp_enqueue_style( 'premium-b2b-style', get_stylesheet_uri(), array(), '3.0.0' );
	wp_enqueue_script( 'premium-b2b-main', get_template_directory_uri() . '/js/main.js', array(), '3.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'premium_b2b_scripts' );

/**
 * Add defer attribute to the main theme script.
 */
function premium_b2b_defer_scripts( $tag, $handle, $src ) {
	if ( 'premium-b2b-main' !== $handle ) {
		return $tag;
	}
	return str_replace( ' src', ' defer src', $tag );
}
add_filter( 'script_loader_tag', 'premium_b2b_defer_scripts', 10, 3 );

/**
 * Register Customizer settings.
 */
function premium_b2b_customize_register( $wp_customize ) {

    // Panels
    $wp_customize->add_panel( 'premium_b2b_landing_page', array( 'title' => __( 'Landing Page Sections', 'premium-b2b' ), 'priority' => 30 ) );
    $wp_customize->add_panel( 'premium_b2b_templates', array( 'title' => __( 'Inner Page Templates', 'premium-b2b' ), 'priority' => 40 ) );

    // Section Visibility
    $wp_customize->add_section( 'premium_b2b_layout', array(
        'title'    => 'Section Visibility',
        'panel'    => 'premium_b2b_landing_page',
        'priority' => 5,
    ) );

    $sections = array( 'hero', 'trust', 'agitation', 'testimonials', 'mechanism', 'pricing', 'faq', 'capture' );
    foreach ( $sections as $s ) {
        $wp_customize->add_setting( "show_section_{$s}", array( 'default' => true, 'sanitize_callback' => 'premium_b2b_sanitize_checkbox' ) );
        $wp_customize->add_control( "show_section_{$s}", array(
            'label'   => 'Show ' . ucfirst( $s ) . ' Section',
            'section' => 'premium_b2b_layout',
            'type'    => 'checkbox',
        ) );
    }

	// Theme Setup Section
	$wp_customize->add_section( 'premium_b2b_setup', array( 'title' => __( 'Theme Setup', 'premium-b2b' ), 'priority' => 10 ) );
	$wp_customize->add_setting( 'regen_sample_content', array( 'default' => false, 'sanitize_callback' => 'premium_b2b_sanitize_checkbox' ) );
	$wp_customize->add_control( 'regen_sample_content', array( 'label' => __( 'Regenerate Elite Content', 'premium-b2b' ), 'section' => 'premium_b2b_setup', 'type' => 'checkbox' ) );
    $wp_customize->add_setting( 'enable_mobile_cta', array( 'default' => true, 'sanitize_callback' => 'premium_b2b_sanitize_checkbox' ) );
	$wp_customize->add_control( 'enable_mobile_cta', array( 'label' => 'Enable Sticky Mobile CTA', 'section' => 'premium_b2b_setup', 'type' => 'checkbox' ) );

    // Global Branding
	$wp_customize->add_section( 'premium_b2b_colors', array( 'title' => __( 'Global Branding', 'premium-b2b' ), 'priority' => 20 ) );
	$wp_customize->add_setting( 'primary_color', array( 'default' => '#0F172A', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array( 'label' => 'Primary Color', 'section' => 'premium_b2b_colors' ) ) );
	$wp_customize->add_setting( 'accent_color', array( 'default' => '#2563EB', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array( 'label' => 'Accent Color', 'section' => 'premium_b2b_colors' ) ) );
	$wp_customize->add_setting( 'enable_dark_mode', array( 'default' => false, 'sanitize_callback' => 'premium_b2b_sanitize_checkbox' ) );
	$wp_customize->add_control( 'enable_dark_mode', array( 'label' => 'Enable Dark Mode', 'section' => 'premium_b2b_colors', 'type' => 'checkbox' ) );

	// HERO SECTION
	$wp_customize->add_section( 'premium_b2b_hero', array( 'title' => 'Section 1: Hero Split', 'panel' => 'premium_b2b_landing_page' ) );
	$wp_customize->add_setting( 'hero_headline', array( 'default' => 'Scale Your B2B Agency with Precision Client Acquisition', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_hero' ) );
	$wp_customize->add_setting( 'hero_subheadline', array( 'default' => 'We engineer high-converting acquisition systems that turn cold prospects into high-ticket partners.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_subheadline', array( 'label' => 'Subheadline', 'section' => 'premium_b2b_hero', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'hero_cta_text', array( 'default' => 'Book Your Strategy Audit', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_text', array( 'label' => 'CTA Text', 'section' => 'premium_b2b_hero' ) );
    $wp_customize->add_setting( 'hero_cta_url', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'hero_cta_url', array( 'label' => 'CTA URL', 'section' => 'premium_b2b_hero', 'type' => 'url' ) );

    $wp_customize->add_setting( 'hero_cta_2_text', array( 'default' => 'Explore the Framework', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_2_text', array( 'label' => 'Secondary CTA Text', 'section' => 'premium_b2b_hero' ) );
    $wp_customize->add_setting( 'hero_cta_2_url', array( 'default' => '#agitation', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'hero_cta_2_url', array( 'label' => 'Secondary CTA URL', 'section' => 'premium_b2b_hero', 'type' => 'url' ) );

    $wp_customize->add_setting( 'hero_bg_image', array( 'default' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?q=80&w=2070&auto=format&fit=crop', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_bg_image', array( 'label' => 'Hero Graphic Image', 'section' => 'premium_b2b_hero' ) ) );

    $hl_defaults = array( '7-Figure Systems', 'Predictable ROI', 'Authority First' );
    $hl_icons = array('📈', '🛡️', '⚡');
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "highlight_{$i}_title", array( 'default' => $hl_defaults[$i-1], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "highlight_{$i}_title", array( 'label' => "Highlight $i Text", 'section' => 'premium_b2b_hero' ) );
        $wp_customize->add_setting( "highlight_{$i}_icon", array( 'default' => $hl_icons[$i-1], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "highlight_{$i}_icon", array( 'label' => "Highlight $i Icon", 'section' => 'premium_b2b_hero' ) );
    }

    // TRUST BAR
	$wp_customize->add_section( 'premium_b2b_trust', array( 'title' => 'Section 1.5: Trust Bar', 'panel' => 'premium_b2b_landing_page' ) );
	$wp_customize->add_setting( 'trust_headline', array( 'default' => 'TRUSTED BY INNOVATIVE B2B TEAMS AT:', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'trust_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_trust' ) );
    for ( $i = 1; $i <= 5; $i++ ) {
        $wp_customize->add_setting( "trust_logo_{$i}", array( 'default' => "LOGO $i", 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "trust_logo_{$i}", array( 'label' => "Logo $i Text", 'section' => 'premium_b2b_trust' ) );
    }

    // AGITATION GRID
	$wp_customize->add_section( 'premium_b2b_agitation', array( 'title' => 'Section 2: Agitation Grid', 'panel' => 'premium_b2b_landing_page' ) );
	$wp_customize->add_setting( 'agitation_headline', array( 'default' => 'Stop Letting Operational Friction Drain Your Agency Growth', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'agitation_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_agitation' ) );

    $agitation_defaults = array(
        1 => array( 't' => 'Content Fatigue', 'd' => 'The constant demand for volume has degraded your message, causing high-value partners to tune out.' ),
        2 => array( 't' => 'Brand Degradation', 'd' => 'Inconsistent authority signals and outdated positioning are actively repelling premium, high-ticket prospects.' ),
        3 => array( 't' => 'Empty Pipelines', 'd' => 'Relying on inconsistent referrals and word-of-mouth rather than a predictable, engineering-grade acquisition machine.' ),
    );
    for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "agitation_c{$i}_title", array( 'default' => $agitation_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "agitation_c{$i}_title", array( 'label' => "Pain $i Title", 'section' => 'premium_b2b_agitation' ) );
		$wp_customize->add_setting( "agitation_c{$i}_desc", array( 'default' => $agitation_defaults[$i]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "agitation_c{$i}_desc", array( 'label' => "Pain $i Description", 'section' => 'premium_b2b_agitation', 'type' => 'textarea' ) );
	}

    // TESTIMONIALS
    $wp_customize->add_section( 'premium_b2b_testimonials', array( 'title' => 'Section 2.5: Testimonials', 'panel' => 'premium_b2b_landing_page' ) );
    $test_defaults = array(
        1 => array( 't' => "The Alpha Framework completely transformed our pipeline. We went from zero outbound to $50k in new contracts in 60 days.", 'a' => 'James Wilson, CEO of NetScale' ),
        2 => array( 't' => "Elite design meets hard-core conversion. This is the only theme an agency owner needs to actually look like a 7-figure firm.", 'a' => 'Sarah Chen, Creative Director' ),
        3 => array( 't' => "Finally, a framework that understands B2B. No fluff, just pure systems engineering for client acquisition.", 'a' => 'Robert Fox, Lead Gen Expert' ),
    );
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "testimonial_{$i}_text", array( 'default' => $test_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "testimonial_{$i}_text", array( 'label' => "Testimonial $i Text", 'section' => 'premium_b2b_testimonials', 'type' => 'textarea' ) );
        $wp_customize->add_setting( "testimonial_{$i}_author", array( 'default' => $test_defaults[$i]['a'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "testimonial_{$i}_author", array( 'label' => "Testimonial $i Author", 'section' => 'premium_b2b_testimonials' ) );
    }

    // MECHANISM
	$wp_customize->add_section( 'premium_b2b_mechanism', array( 'title' => 'Section 3: Branded Mechanism', 'panel' => 'premium_b2b_landing_page' ) );
	$wp_customize->add_setting( 'mechanism_headline', array( 'default' => 'The Alpha Framework: Our 3-Step Scientific Approach', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'mechanism_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_mechanism' ) );

    $mechanism_defaults = array(
        1 => array( 't' => 'Authority Architecture Audit', 'd' => 'We deconstruct your current positioning and architect a high-authority brand identity that commands premium fees.' ),
        2 => array( 't' => 'The Alpha Engine Build', 'd' => 'We deploy our proprietary conversion ecosystem, transforming your brand into a scientific lead-capture machine.' ),
        3 => array( 't' => 'Precision Scale Injection', 'd' => 'With the infrastructure solidified, we inject surgical multi-channel traffic to scale your pipeline predictably.' ),
    );
    for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "mechanism_s{$i}_title", array( 'default' => $mechanism_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "mechanism_s{$i}_title", array( 'label' => "Step $i Title", 'section' => 'premium_b2b_mechanism' ) );
		$wp_customize->add_setting( "mechanism_s{$i}_desc", array( 'default' => $mechanism_defaults[$i]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "mechanism_s{$i}_desc", array( 'label' => "Step $i Description", 'section' => 'premium_b2b_mechanism', 'type' => 'textarea' ) );
	}

    // PRICING
	$wp_customize->add_section( 'premium_b2b_pricing', array( 'title' => 'Section 3.5: Pricing / Packages', 'panel' => 'premium_b2b_landing_page' ) );
	$wp_customize->add_setting( 'pricing_headline', array( 'default' => 'Scalable Investment Frameworks', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'pricing_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_pricing' ) );

	$price_defaults = array(
		1 => array('t' => 'Foundation Engine', 'a' => '$4,997/mo', 'd' => 'Perfect for boutique agencies looking to stabilize their pipeline with automated outbound LinkedIn and Email systems.'),
		2 => array('t' => 'Scale Master', 'a' => '$8,997/mo', 'd' => 'Advanced acquisition strategy including VSL development, authority positioning, and aggressive lead gen infrastructure.'),
		3 => array('t' => 'Elite Enterprise', 'a' => 'Custom', 'd' => 'Full-service white-glove client acquisition department. We build your in-house team and manage all conversion assets.'),
	);
	for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "price_{$i}_title", array( 'default' => $price_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "price_{$i}_title", array( 'label' => "Package $i Title", 'section' => 'premium_b2b_pricing' ) );
		$wp_customize->add_setting( "price_{$i}_amt", array( 'default' => $price_defaults[$i]['a'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "price_{$i}_amt", array( 'label' => "Package $i Price", 'section' => 'premium_b2b_pricing' ) );
		$wp_customize->add_setting( "price_{$i}_desc", array( 'default' => $price_defaults[$i]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "price_{$i}_desc", array( 'label' => "Package $i Desc", 'section' => 'premium_b2b_pricing', 'type' => 'textarea' ) );
	}

	// FAQ
	$wp_customize->add_section( 'premium_b2b_faq', array( 'title' => 'Section 3.8: FAQ', 'panel' => 'premium_b2b_landing_page' ) );
	$wp_customize->add_setting( 'faq_headline', array( 'default' => 'Framework Inquiries & Strategy FAQ', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'faq_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_faq' ) );

	$faq_defaults = array(
		1 => array('q' => 'How soon can we expect qualified calls?', 'a' => 'Typically, our systems go live within 14 days, and we see initial qualified call volume within the first 21-30 days of the campaign launch.'),
		2 => array('q' => 'Is this a lead generation service or a consultancy?', 'a' => 'It is a hybrid. We build the actual technical infrastructure (the engine) and also provide the strategic direction required to close high-ticket deals.'),
		3 => array('q' => 'Do you work with startups or only established agencies?', 'a' => 'We specialize in agencies doing $20k+ MRR who are looking to hit the $100k+ mark through predictable systems.'),
		4 => array('q' => 'Will we need to hire additional staff?', 'a' => 'Our Foundation and Scale tiers are designed to be managed by your current team. The Elite tier includes our assistance in hiring if needed.'),
	);
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting( "faq_{$i}_q", array( 'default' => $faq_defaults[$i]['q'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "faq_{$i}_q", array( 'label' => "Question $i", 'section' => 'premium_b2b_faq' ) );
		$wp_customize->add_setting( "faq_{$i}_a", array( 'default' => $faq_defaults[$i]['a'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "faq_{$i}_a", array( 'label' => "Answer $i", 'section' => 'premium_b2b_faq', 'type' => 'textarea' ) );
	}

    // CAPTURE
	$wp_customize->add_section( 'premium_b2b_capture', array( 'title' => 'Section 4: Frictionless Capture', 'panel' => 'premium_b2b_landing_page' ) );
	$wp_customize->add_setting( 'capture_headline', array( 'default' => 'Ready to Engineer Your Dominance?', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'capture_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_capture' ) );
	$wp_customize->add_setting( 'capture_subheadline', array( 'default' => 'Schedule your 15-minute Strategy Audit to identify the gaps in your current acquisition engine.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'capture_subheadline', array( 'label' => 'Subheadline', 'section' => 'premium_b2b_capture', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'capture_embed', array( 'default' => '', 'sanitize_callback' => 'premium_b2b_sanitize_scripts' ) );
	$wp_customize->add_control( 'capture_embed', array( 'label' => 'Embed Code (Calendly/Form)', 'section' => 'premium_b2b_capture', 'type' => 'textarea' ) );

    // MAGNET
	$wp_customize->add_section( 'premium_b2b_magnet', array( 'title' => 'Section 4.5: Lead Magnet Overlay', 'panel' => 'premium_b2b_landing_page' ) );
	$wp_customize->add_setting( 'magnet_headline', array( 'default' => 'Download the B2B Scaling Blueprint', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'magnet_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_magnet' ) );
	$wp_customize->add_setting( 'magnet_desc', array( 'default' => 'The exact 12-page framework we used to scale 50+ agencies to $1M+ ARR.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'magnet_desc', array( 'label' => 'Description', 'section' => 'premium_b2b_magnet', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'magnet_embed', array( 'default' => '', 'sanitize_callback' => 'premium_b2b_sanitize_scripts' ) );
	$wp_customize->add_control( 'magnet_embed', array( 'label' => 'Form Embed Code', 'section' => 'premium_b2b_magnet', 'type' => 'textarea' ) );

	// ABOUT TEMPLATE
    $wp_customize->add_section( 'premium_b2b_about', array( 'title' => 'Template: About', 'panel' => 'premium_b2b_templates' ) );
    $wp_customize->add_setting( 'about_mission_headline', array( 'default' => 'Our Mission: Transforming B2B Growth Engines', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'about_mission_headline', array( 'label' => 'Mission Headline', 'section' => 'premium_b2b_about' ) );
	$wp_customize->add_setting( 'about_mission_text', array( 'default' => 'We believe that B2B acquisition should be a science, not a mystery. Our team engineers the systems that allow agencies to focus on what they do best: delivering world-class results for their clients.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'about_mission_text', array( 'label' => 'Mission Text', 'section' => 'premium_b2b_about', 'type' => 'textarea' ) );

    $value_defaults = array(
        1 => array( 't' => 'Radical Transparency', 'd' => 'We provide raw data and empirical proof for every acquisition campaign we run.' ),
        2 => array( 't' => 'Systems Over Fluff', 'd' => 'We don\'t sell "magic pills." We build engineering-grade systems that produce results.' ),
        3 => array( 't' => 'B2B Specialization', 'd' => 'We only work in the B2B space. We understand the nuances of high-ticket persuasion.' ),
    );
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "value_{$i}_title", array( 'default' => $value_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "value_{$i}_title", array( 'label' => "Value $i Title", 'section' => 'premium_b2b_about' ) );
        $wp_customize->add_setting( "value_{$i}_desc", array( 'default' => $value_defaults[$i]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "value_{$i}_desc", array( 'label' => "Value $i Desc", 'section' => 'premium_b2b_about', 'type' => 'textarea' ) );
    }

    // OTHER TEMPLATES
	$wp_customize->add_section( 'premium_b2b_services', array( 'title' => 'Template: Services', 'panel' => 'premium_b2b_templates' ) );
	$wp_customize->add_setting( 'services_headline', array( 'default' => 'Precision-Engineered Acquisition Services', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'services_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_services' ) );

    $wp_customize->add_section( 'premium_b2b_cases', array( 'title' => 'Template: Case Studies', 'panel' => 'premium_b2b_templates' ) );
    $wp_customize->add_setting( 'case_studies_headline', array( 'default' => 'Client Success Stories & ROI Proof', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'case_studies_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_cases' ) );

    $wp_customize->add_section( 'premium_b2b_contact', array( 'title' => 'Template: Contact', 'panel' => 'premium_b2b_templates' ) );
	$wp_customize->add_setting( 'contact_email', array( 'default' => 'hello@agency.com', 'sanitize_callback' => 'sanitize_email' ) );
	$wp_customize->add_control( 'contact_email', array( 'label' => 'Contact Email', 'section' => 'premium_b2b_contact' ) );

    // FOOTER & SOCIAL
    $wp_customize->add_section( 'premium_b2b_footer', array( 'title' => 'Footer & Social', 'priority' => 130 ) );
	$wp_customize->add_setting( 'footer_copyright', array( 'default' => sprintf( '&copy; %s %s. Elite B2B Acquisition Framework.', date( 'Y' ), get_bloginfo( 'name' ) ), 'sanitize_callback' => 'wp_kses_post' ) );
	$wp_customize->add_control( 'footer_copyright', array( 'label' => 'Copyright Text', 'section' => 'premium_b2b_footer', 'type' => 'textarea' ) );
	$socials = array( 'linkedin', 'twitter', 'instagram' );
	foreach ( $socials as $social ) {
		$wp_customize->add_setting( "social_{$social}", array( 'default' => 'https://' . $social . '.com/agency', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "social_{$social}", array( 'label' => ucfirst( $social ) . ' URL', 'section' => 'premium_b2b_footer' ) );
	}

    // SINGLE POST CTA
    $wp_customize->add_section( 'premium_b2b_cta_card', array( 'title' => 'Single Post CTA', 'priority' => 140 ) );
	$wp_customize->add_setting( 'cta_card_title', array( 'default' => 'Struggling to Scale Your B2B Pipeline?', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'cta_card_title', array( 'label' => 'Title', 'section' => 'premium_b2b_cta_card' ) );
	$wp_customize->add_setting( 'cta_card_desc', array( 'default' => 'Download our High-Ticket Acquisition Blueprint and start securing enterprise clients on autopilot.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'cta_card_desc', array( 'label' => 'Description', 'section' => 'premium_b2b_cta_card', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'enable_social_sharing', array( 'default' => true, 'sanitize_callback' => 'premium_b2b_sanitize_checkbox' ) );
	$wp_customize->add_control( 'enable_social_sharing', array( 'label' => 'Enable Social Sharing', 'section' => 'premium_b2b_cta_card', 'type' => 'checkbox' ) );

    // DEVELOPER SCRIPTS
	$wp_customize->add_section( 'premium_b2b_scripts', array( 'title' => 'Developer: Custom Scripts', 'priority' => 160 ) );
	$wp_customize->add_setting( 'header_scripts', array( 'default' => '', 'sanitize_callback' => 'premium_b2b_sanitize_scripts' ) );
	$wp_customize->add_control( 'header_scripts', array( 'label' => 'Header Scripts (GTM/GA)', 'section' => 'premium_b2b_scripts', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'footer_scripts', array( 'default' => '', 'sanitize_callback' => 'premium_b2b_sanitize_scripts' ) );
	$wp_customize->add_control( 'footer_scripts', array( 'label' => 'Footer Scripts (Remarketing/Tracking)', 'section' => 'premium_b2b_scripts', 'type' => 'textarea' ) );

	// Selective Refresh
	if ( isset( $wp_customize->selective_refresh ) ) {
		$partials = array( 'hero_headline', 'services_headline', 'case_studies_headline', 'pricing_headline', 'faq_headline', 'agitation_headline', 'mechanism_headline', 'capture_headline' );
		foreach ( $partials as $partial ) {
			$wp_customize->selective_refresh->add_partial( $partial, array(
				'selector'        => '.site-main h1, .site-main h2',
				'render_callback' => function() use ( $partial ) { return get_theme_mod( $partial ); },
			) );
		}
	}

	// Live Preview Transport
	$all_settings = array(
        'hero_headline', 'hero_subheadline', 'hero_cta_text',
        'agitation_headline', 'mechanism_headline', 'capture_headline', 'trust_headline',
        'magnet_headline', 'magnet_desc', 'cta_card_title', 'cta_card_desc',
        'primary_color', 'accent_color', 'pricing_headline', 'faq_headline'
    );
    for($i=1;$i<=5;$i++) {
        if ($i <= 3) {
            $all_settings[] = "agitation_c{$i}_title";
            $all_settings[] = "agitation_c{$i}_desc";
            $all_settings[] = "mechanism_s{$i}_title";
            $all_settings[] = "mechanism_s{$i}_desc";
            $all_settings[] = "highlight_{$i}_title";
            $all_settings[] = "value_{$i}_title";
            $all_settings[] = "value_{$i}_desc";
            $all_settings[] = "price_{$i}_title";
            $all_settings[] = "price_{$i}_amt";
            $all_settings[] = "price_{$i}_desc";
            $all_settings[] = "testimonial_{$i}_text";
            $all_settings[] = "testimonial_{$i}_author";
        }
        $all_settings[] = "trust_logo_{$i}";
        if ($i <= 4) {
            $all_settings[] = "faq_{$i}_q";
            $all_settings[] = "faq_{$i}_a";
        }
    }
	foreach ( $all_settings as $setting ) {
        if ( $wp_customize->get_setting( $setting ) ) {
		    $wp_customize->get_setting( $setting )->transport = 'postMessage';
        }
	}
}
add_action( 'customize_register', 'premium_b2b_customize_register' );

/**
 * Checkbox Sanitization.
 */
function premium_b2b_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Script Sanitization.
 */
function premium_b2b_sanitize_scripts( $value ) {
	if ( current_user_can( 'unfiltered_html' ) ) {
		return $value;
	}
	return wp_kses_post( $value );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function premium_b2b_customize_preview_js() {
	wp_enqueue_script( 'premium-b2b-customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '3.0.0', true );
}
add_action( 'customize_preview_init', 'premium_b2b_customize_preview_js' );

/**
 * Handle Content Regeneration.
 */
function premium_b2b_handle_regeneration() {
	if ( get_theme_mod( 'regen_sample_content' ) ) {

		// 1. Purge Old Sample Data
		$old_samples = get_posts( array(
			'post_type'  => array( 'page', 'post', 'case_study', 'service', 'team_member' ),
			'meta_key'   => '_premium_b2b_sample',
			'numberposts' => -1,
			'post_status' => 'any'
		) );

		foreach ( $old_samples as $sample ) {
			wp_delete_post( $sample->ID, true );
		}

		// 2. Generate New Sample Pages
		$pages = array(
			'Home' => array(
                'content' => '<!-- wp:heading {"level":1} --><h1>The Alpha Framework: Precision Client Acquisition for Elite B2B Agencies</h1><!-- /wp:heading --><!-- wp:paragraph --><p>Stop relying on inconsistent referrals. We engineer high-authority acquisition systems that turn cold prospects into high-ticket partners using scientific persuasion and technical excellence.</p><!-- /wp:paragraph --><!-- wp:button {"className":"is-style-fill"} --><div class="wp-block-button is-style-fill"><a class="wp-block-button__link">Explore the Framework</a></div><!-- /wp:button -->',
                'template' => 'front-page.php'
            ),
			'About' => array(
                'content' => '<!-- wp:heading --><h2>Architecting the Future of B2B Growth</h2><!-- /wp:heading --><!-- wp:paragraph --><p>We aren\'t just marketers; we are systems engineers and conversion psychologists. Our mission is to eliminate the unpredictability of agency growth by deploying technical infrastructure that commands authority and secures enterprise-level contracts.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Our Radical Philosophy</h3><!-- /wp:heading --><!-- wp:paragraph --><p>We believe in empirical data over "magic pills," authority over volume, and technical precision over creative guesswork.</p><!-- /wp:paragraph -->',
                'template' => 'template-about.php'
            ),
			'Services' => array(
                'content' => '<!-- wp:paragraph --><p>Precision-engineered acquisition services designed for agencies that demand elite results. From authority positioning to automated lead engines, we build the infrastructure your growth requires.</p><!-- /wp:paragraph -->',
                'template' => 'template-services.php'
            ),
			'Case Studies' => array(
                'content' => '<!-- wp:paragraph --><p>Empirical proof of the Alpha Framework in action. These aren\'t just testimonials; they are technical case studies documenting the transformation of boutique agencies into market leaders.</p><!-- /wp:paragraph -->',
                'template' => 'template-case-studies.php'
            ),
			'Contact' => array(
                'content' => '<!-- wp:paragraph --><p>The first step toward a predictable, high-ticket pipeline is a technical audit of your current acquisition infrastructure. Schedule your strategy session below.</p><!-- /wp:paragraph -->',
                'template' => 'template-contact.php'
            ),
			'Insights' => array( 'content' => '<!-- wp:paragraph --><p>Deep dives into acquisition engineering, conversion psychology, and high-ticket B2B scaling strategies.</p><!-- /wp:paragraph -->', 'template' => 'index.php' ),
            'Privacy Policy' => array( 'content' => '<!-- wp:paragraph --><p>Your privacy is paramount. This policy outlines how we handle and protect your data within our acquisition ecosystem.</p><!-- /wp:paragraph -->', 'template' => 'page.php' ),
            'Terms of Service' => array( 'content' => '<!-- wp:paragraph --><p>The legal framework governing our partnership and the use of our proprietary acquisition systems.</p><!-- /wp:paragraph -->', 'template' => 'page.php' ),
            'FAQ' => array( 'content' => '<!-- wp:paragraph --><p>Frequently asked questions regarding our acquisition frameworks, investment models, and implementation timelines.</p><!-- /wp:paragraph -->', 'template' => 'page.php' )
		);

		$page_ids = array();
		foreach ( $pages as $title => $data ) {
			$page_id = wp_insert_post( array(
				'post_title'   => $title,
				'post_content' => $data['content'],
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'meta_input'   => array( '_premium_b2b_sample' => true, '_wp_page_template' => $data['template'] )
			) );
			$page_ids[$title] = $page_id;

			if ( 'Home' === $title ) {
				update_option( 'show_on_front', 'page' );
				update_option( 'page_on_front', $page_id );
			}
			if ( 'Insights' === $title ) {
				update_option( 'page_for_posts', $page_id );
			}
		}

		// 3. Generate Custom Post Type Content
		// Services
		$services = array(
            'Authority Positioning' => 'Strategic realignment of your agency brand to attract high-ticket B2B partners exclusively.',
            'Automated Lead Engines' => 'Deployment of custom LinkedIn and Cold Email systems that deliver qualified calls daily.',
            'Conversion Ecosystems' => 'High-performance landing pages and VSLs designed for radical B2B persuasion.'
        );
		foreach ( $services as $title => $excerpt ) {
			wp_insert_post( array( 'post_title' => $title, 'post_excerpt' => $excerpt, 'post_type' => 'service', 'post_status' => 'publish', 'meta_input' => array( '_premium_b2b_sample' => true ) ) );
		}
		// Case Studies
		$cases = array(
            'SaaS Expansion: 250% Growth' => 'Implementing an automated LinkedIn engine to secure enterprise-level cloud partnerships.',
            'Alpha Logic: $1.2M LTV Increase' => 'Strategic repositioning for a software house to target high-retention B2B clients.'
        );
		foreach ( $cases as $title => $excerpt ) {
			wp_insert_post( array( 'post_title' => $title, 'post_excerpt' => $excerpt, 'post_type' => 'case_study', 'post_status' => 'publish', 'meta_input' => array( '_premium_b2b_sample' => true, 'case_kpi' => '+250% ROI' ) ) );
		}
		// Team
		$team = array(
            'Marcus Thorne' => 'Managing Director & Systems Architect',
            'Elena Rodriguez' => 'Lead Conversion Strategist'
        );
		foreach ( $team as $title => $excerpt ) {
			wp_insert_post( array( 'post_title' => $title, 'post_excerpt' => $excerpt, 'post_type' => 'team_member', 'post_status' => 'publish', 'meta_input' => array( '_premium_b2b_sample' => true ) ) );
		}

		// 4. Automated Menu Setup
		$menu_name = 'Elite Primary Menu';
		$existing_menu = wp_get_nav_menu_object( $menu_name );
		if ( $existing_menu ) {
			wp_delete_nav_menu( $existing_menu->term_id );
		}
		$menu_id = wp_create_nav_menu( $menu_name );
		wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Home', 'menu-item-object' => 'page', 'menu-item-object-id' => $page_ids['Home'], 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
		wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'About', 'menu-item-object' => 'page', 'menu-item-object-id' => $page_ids['About'], 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
		wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Services', 'menu-item-object' => 'page', 'menu-item-object-id' => $page_ids['Services'], 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
		wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Cases', 'menu-item-object' => 'page', 'menu-item-object-id' => $page_ids['Case Studies'], 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
		wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Insights', 'menu-item-object' => 'page', 'menu-item-object-id' => $page_ids['Insights'], 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
		wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Contact', 'menu-item-object' => 'page', 'menu-item-object-id' => $page_ids['Contact'], 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );

		$locations = get_theme_mod( 'nav_menu_locations' );
		$locations['menu-1'] = $menu_id;
		$locations['footer-menu'] = $menu_id;
		set_theme_mod( 'nav_menu_locations', $locations );

		// 5. Generate Sample Posts
		$posts = array(
            'The High-Ticket B2B Acquisition Manifesto' => 'Why speed and authority are the only two metrics that matter in the current high-ticket B2B market environment.',
            'Engineering Predictable Sales Pipelines' => 'How to transition from a referral-based agency to an automated acquisition machine.',
            'The Psychology of B2B Conversion' => 'A deep dive into the persuasion triggers that move enterprise-level decision makers to action.'
        );
		foreach ( $posts as $title => $content ) {
			wp_insert_post( array(
				'post_title'   => $title,
				'post_content' => $content,
				'post_status'  => 'publish',
				'post_type'    => 'post',
				'meta_input'   => array( '_premium_b2b_sample' => true )
			) );
		}

		set_theme_mod( 'regen_sample_content', false );
	}
}
add_action( 'customize_save_after', 'premium_b2b_handle_regeneration' );

/**
 * Breadcrumbs
 */
function premium_b2b_breadcrumbs() {
	if ( is_front_page() ) return;
	echo '<nav class="breadcrumbs container" style="margin-block: 2rem; font-size: var(--fs-xs); opacity: 0.6;" aria-label="Breadcrumb">';
	echo '<ol itemscope itemtype="https://schema.org/BreadcrumbList" style="display: flex; gap: 0.5rem;">';
	echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( home_url( '/' ) ) . '"><span itemprop="name">Home</span></a><meta itemprop="position" content="1" /></li><li>&rarr;</li>';
	if ( is_singular() ) {
		echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name">' . get_the_title() . '</span><meta itemprop="position" content="2" /></li>';
	} elseif ( is_archive() || is_home() ) {
		echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name">' . get_the_archive_title() . '</span><meta itemprop="position" content="2" /></li>';
	}
	echo '</ol></nav>';
}

/**
 * Header Output
 */
function premium_b2b_output_header_scripts() {
	$scripts = get_theme_mod( 'header_scripts' );
	if ( $scripts ) echo $scripts;
	if ( is_front_page() ) {
		$schema = array(
			'@context' => 'https://schema.org',
			'@type' => 'ProfessionalService',
			'name' => get_bloginfo( 'name' ),
			'url' => home_url( '/' ),
			'description' => get_bloginfo( 'description' ),
			'potentialAction' => array(
				'@type' => 'ReserveAction',
				'target' => get_theme_mod( 'hero_cta_url', home_url('/contact') ),
				'name' => 'Book Strategy Session'
			),
			'serviceType' => array( 'Client Acquisition', 'B2B Marketing', 'Lead Generation' )
		);
		echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>';
	}
	$primary_color = get_theme_mod( 'primary_color', '#0F172A' );
	$accent_color = get_theme_mod( 'accent_color', '#2563EB' );
	$dark_mode = get_theme_mod( 'enable_dark_mode', false );

    // Dynamic contrast logic
    $bg_color = $dark_mode ? '#020617' : '#F8FAFC';
    $text_color = $dark_mode ? '#F8FAFC' : '#1E293B';
    $text_light = $dark_mode ? '#94A3B8' : '#64748B';
    $white_equivalent = $dark_mode ? '#0F172A' : '#FFFFFF';
    $border_color = $dark_mode ? 'rgba(255,255,255,0.1)' : '#E2E8F0';

	echo '<style>:root {
        --color-primary: ' . esc_attr( $primary_color ) . ';
        --color-accent: ' . esc_attr( $accent_color ) . ';
        --color-bg: ' . esc_attr( $bg_color ) . ';
        --color-text: ' . esc_attr( $text_color ) . ';
        --color-text-light: ' . esc_attr( $text_light ) . ';
        --color-white: ' . esc_attr( $white_equivalent ) . ';
        --color-border: ' . esc_attr( $border_color ) . ';
    }';
	if ( $dark_mode ) echo '.site-header.is-scrolled { background: rgba(15, 23, 42, 0.9); } .card { background: var(--color-white); } a, h1, h2, h3, h4, h5, h6 { color: var(--color-text); }';
	echo '</style>';
}
add_action( 'wp_head', 'premium_b2b_output_header_scripts' );

function premium_b2b_reading_time() {
	$content = get_post_field( 'post_content', get_the_ID() );
	$word_count = str_word_count( strip_tags( $content ) );
	$reading_time = ceil( $word_count / 200 );
	return $reading_time . ( ( 1 === (int)$reading_time ) ? ' min read' : ' mins read' );
}

/**
 * Inject Mid-Content CTA Card.
 */
function premium_b2b_inject_mid_cta( $content ) {
	if ( ! is_single() || ! in_the_loop() || ! is_main_query() ) {
		return $content;
	}

	$cta_title = get_theme_mod( 'cta_card_title', 'Ready to Automate Your Pipeline?' );
	$cta_desc = get_theme_mod( 'cta_card_desc', 'Book a discovery call today and see how we can help you scale.' );
	$cta_url = get_theme_mod( 'hero_cta_url', '#' );
	$cta_text = get_theme_mod( 'hero_cta_text', 'Book Strategy Session' );

	$cta_html = '
		<aside class="mid-content-cta" style="margin-block: 4rem; padding: 3rem; background: var(--color-primary); color: white; border-radius: var(--radius); text-align: center;">
			<h3 style="color: white; margin-bottom: 1rem;">' . esc_html( $cta_title ) . '</h3>
			<p style="margin-bottom: 2rem; opacity: 0.9; color: white;">' . esc_html( $cta_desc ) . '</p>
			<a href="' . esc_url( $cta_url ) . '" class="btn btn-primary">' . esc_html( $cta_text ) . '</a>
		</aside>
	';

	$paragraphs = explode( '</p>', $content );
	if ( count( $paragraphs ) > 3 ) {
		array_splice( $paragraphs, 2, 0, $cta_html );
		$content = implode( '</p>', $paragraphs );
	} else {
		$content .= $cta_html;
	}

	return $content;
}
add_filter( 'the_content', 'premium_b2b_inject_mid_cta' );

add_filter( 'excerpt_length', function() { return 25; }, 999 );
add_filter( 'excerpt_more', function() { return '...'; } );

/**
 * Custom Dashboard Widget for Agency Owner.
 */
function premium_b2b_dashboard_widget() {
	wp_add_dashboard_widget(
		'premium_b2b_agency_stats',
		'Agency Acquisition Dashboard',
		'premium_b2b_dashboard_widget_render'
	);
}
add_action( 'wp_dashboard_setup', 'premium_b2b_dashboard_widget' );

function premium_b2b_dashboard_widget_render() {
	echo '<div class="premium-b2b-stats" style="padding: 10px;">';
	echo '<p><strong>System Status:</strong> <span style="color: green;">Operational</span></p>';
	echo '<p>Ready to scale. Your acquisition engine is active. Manage your leads and conversion settings via the <a href="' . esc_url( admin_url( 'customize.php' ) ) . '">Customizer</a>.</p>';
	echo '</div>';
}

/**
 * Custom Login Branding.
 */
function premium_b2b_login_branding() {
	$primary_color = get_theme_mod( 'primary_color', '#0F172A' );
	$accent_color = get_theme_mod( 'accent_color', '#2563EB' );
	?>
	<style type="text/css">
		body.login { background-color: <?php echo esc_attr( $primary_color ); ?>; }
		#login h1 a, .login h1 a { background-image: none; display: none; }
		.login #loginform { border-radius: 12px; border: none; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3); }
		.login #wp-submit { background: <?php echo esc_attr( $accent_color ); ?>; border: none; text-shadow: none; box-shadow: none; }
	</style>
	<?php
}
add_action( 'login_enqueue_scripts', 'premium_b2b_login_branding' );
