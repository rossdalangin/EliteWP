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
 * Enqueue scripts and styles.
 */
function premium_b2b_scripts() {
	wp_enqueue_style( 'premium-b2b-style', get_stylesheet_uri(), array(), '1.3.0' );
	wp_enqueue_script( 'premium-b2b-main', get_template_directory_uri() . '/js/main.js', array(), '1.3.0', true );
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

    // ---------------------------------------------------------
    // PANELS
    // ---------------------------------------------------------

    $wp_customize->add_panel( 'premium_b2b_landing_page', array(
        'title'       => __( 'Landing Page Sections', 'premium-b2b' ),
        'priority'    => 30,
        'description' => __( 'Manage all sections on the high-ticket acquisition front page.', 'premium-b2b' ),
    ) );

    $wp_customize->add_panel( 'premium_b2b_templates', array(
        'title'       => __( 'Inner Page Templates', 'premium-b2b' ),
        'priority'    => 40,
        'description' => __( 'Manage content for About, Services, Cases, and Contact templates.', 'premium-b2b' ),
    ) );

	// --- Theme Setup ---
	$wp_customize->add_section( 'premium_b2b_setup', array(
		'title'    => __( 'Theme Setup', 'premium-b2b' ),
		'priority' => 10,
	) );

	$wp_customize->add_setting( 'regen_sample_content', array(
		'default'           => false,
		'sanitize_callback' => 'premium_b2b_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'regen_sample_content', array(
		'label'       => __( 'Regenerate Elite Content', 'premium-b2b' ),
		'description' => __( 'Purges and recreates all B2B pages and menus with premium defaults.', 'premium-b2b' ),
		'section'     => 'premium_b2b_setup',
		'type'        => 'checkbox',
	) );

    $wp_customize->add_setting( 'enable_mobile_cta', array( 'default' => true, 'sanitize_callback' => 'premium_b2b_sanitize_checkbox' ) );
	$wp_customize->add_control( 'enable_mobile_cta', array( 'label' => 'Enable Sticky Mobile CTA', 'section' => 'premium_b2b_setup', 'type' => 'checkbox' ) );

	// --- Branding ---
	$wp_customize->add_section( 'premium_b2b_colors', array(
		'title'    => __( 'Global Branding', 'premium-b2b' ),
		'priority' => 20,
	) );

	$wp_customize->add_setting( 'primary_color', array( 'default' => '#0F172A', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array( 'label' => 'Primary Color', 'section' => 'premium_b2b_colors' ) ) );
	$wp_customize->add_setting( 'accent_color', array( 'default' => '#2563EB', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array( 'label' => 'Accent Color', 'section' => 'premium_b2b_colors' ) ) );
	$wp_customize->add_setting( 'enable_dark_mode', array( 'default' => false, 'sanitize_callback' => 'premium_b2b_sanitize_checkbox' ) );
	$wp_customize->add_control( 'enable_dark_mode', array( 'label' => 'Enable Dark Mode', 'section' => 'premium_b2b_colors', 'type' => 'checkbox' ) );

	// --- LANDING PAGE PANEL SECTIONS ---

	// Hero
	$wp_customize->add_section( 'premium_b2b_hero', array( 'title' => 'Section 1: Hero Split', 'panel' => 'premium_b2b_landing_page' ) );
	$wp_customize->add_setting( 'hero_headline', array( 'default' => 'Scale Your B2B Agency with Precision Client Acquisition', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_hero' ) );
	$wp_customize->add_setting( 'hero_subheadline', array( 'default' => 'We engineer high-converting acquisition systems that turn cold prospects into high-ticket partners.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_subheadline', array( 'label' => 'Subheadline', 'section' => 'premium_b2b_hero', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'hero_cta_text', array( 'default' => 'Book Your Strategy Audit', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_text', array( 'label' => 'CTA Text', 'section' => 'premium_b2b_hero' ) );
    $wp_customize->add_setting( 'hero_cta_url', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'hero_cta_url', array( 'label' => 'CTA URL', 'section' => 'premium_b2b_hero', 'type' => 'url' ) );

	$wp_customize->add_section( 'premium_b2b_highlights', array( 'title' => 'Section 1.1: Highlights', 'panel' => 'premium_b2b_landing_page' ) );
    $highlights = array('ROI Focused', 'Scale Ready', 'Zero Friction');
	for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "highlight_{$i}_title", array( 'default' => $highlights[$i-1], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "highlight_{$i}_title", array( 'label' => "Highlight $i", 'section' => 'premium_b2b_highlights' ) );
	}

    // Trust
	$wp_customize->add_section( 'premium_b2b_trust', array( 'title' => 'Section 1.5: Trust Bar', 'panel' => 'premium_b2b_landing_page' ) );
	for ( $i = 1; $i <= 5; $i++ ) {
		$wp_customize->add_setting( "trust_logo_{$i}", array( 'sanitize_callback' => 'sanitize_text_field', 'default' => "PARTNER 0{$i}" ) );
		$wp_customize->add_control( "trust_logo_{$i}", array( 'label' => "Logo $i Text", 'section' => 'premium_b2b_trust' ) );
	}
	$wp_customize->add_setting( 'trust_headline', array( 'default' => 'Trusted by Industry-Leading B2B Organizations', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'trust_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_trust' ) );

	// Agitation
	$wp_customize->add_section( 'premium_b2b_agitation', array( 'title' => 'Section 2: Agitation Grid', 'panel' => 'premium_b2b_landing_page' ) );
	$wp_customize->add_setting( 'agitation_headline', array( 'default' => 'Stop Letting Operational Friction Drain Your Agency Growth', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'agitation_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_agitation' ) );

    $agitation_defaults = array(
		1 => array( 't' => 'Stagnant Pipelines', 'd' => 'Living project-to-project without a predictable, automated system for high-ticket acquisition.' ),
		2 => array( 't' => 'Brand Degradation', 'd' => 'Inconsistent messaging and outdated design that signal low authority to premium prospects.' ),
		3 => array( 't' => 'Conversion Leakage', 'd' => 'Spending thousands on traffic that hits non-optimized pages, resulting in zero ROI.' ),
	);

    for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "agitation_c{$i}_title", array( 'default' => $agitation_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "agitation_c{$i}_title", array( 'label' => "Card $i Title", 'section' => 'premium_b2b_agitation' ) );
		$wp_customize->add_setting( "agitation_c{$i}_desc", array( 'default' => $agitation_defaults[$i]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "agitation_c{$i}_desc", array( 'label' => "Card $i Desc", 'section' => 'premium_b2b_agitation', 'type' => 'textarea' ) );
	}

	// Testimonials
	$wp_customize->add_section( 'premium_b2b_testimonials', array( 'title' => 'Section 2.5: Testimonials', 'panel' => 'premium_b2b_landing_page' ) );
	$test_defaults = array(
		1 => array( 't' => 'This framework transformed our lead flow. In 3 months, we secured more high-ticket partners than in the previous two years.', 'a' => 'David Chen, CEO of CloudScale' ),
		2 => array( 't' => 'The most technical and conversion-optimized theme we have ever deployed. It reflects the authority we need in the B2B space.', 'a' => 'Sarah Jenkins, Director of Operations' ),
	);
    for ( $i = 1; $i <= 2; $i++ ) {
		$wp_customize->add_setting( "testimonial_{$i}_text", array( 'default' => $test_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "testimonial_{$i}_text", array( 'label' => "Text $i", 'section' => 'premium_b2b_testimonials', 'type' => 'textarea' ) );
		$wp_customize->add_setting( "testimonial_{$i}_author", array( 'default' => $test_defaults[$i]['a'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "testimonial_{$i}_author", array( 'label' => "Author $i", 'section' => 'premium_b2b_testimonials' ) );
	}

	// Mechanism
	$wp_customize->add_section( 'premium_b2b_mechanism', array( 'title' => 'Section 3: Mechanism Z-Pattern', 'panel' => 'premium_b2b_landing_page' ) );
	$wp_customize->add_setting( 'mechanism_headline', array( 'default' => 'Our Elite 3-Step Acquisition Framework', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'mechanism_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_mechanism' ) );
    $mech_defaults = array(
		1 => array( 't' => 'Strategic Positioning Audit', 'd' => 'We identify leakage in your current brand positioning and realign your authority for the high-ticket market.' ),
		2 => array( 't' => 'Conversion Engine Build', 'd' => 'We architect your bespoke acquisition engine, ensuring every pixel is optimized for B2B conversion.' ),
		3 => array( 't' => 'Scalable Growth Injection', 'd' => 'Once the foundation is solid, we inject high-intent traffic to scale your ROI predictably.' ),
	);
    for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "mechanism_s{$i}_title", array( 'default' => $mech_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "mechanism_s{$i}_title", array( 'label' => "Step $i Title", 'section' => 'premium_b2b_mechanism' ) );
		$wp_customize->add_setting( "mechanism_s{$i}_desc", array( 'default' => $mech_defaults[$i]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "mechanism_s{$i}_desc", array( 'label' => "Step $i Desc", 'section' => 'premium_b2b_mechanism', 'type' => 'textarea' ) );
	}

	// Capture
	$wp_customize->add_section( 'premium_b2b_capture', array( 'title' => 'Section 4: Capture Block', 'panel' => 'premium_b2b_landing_page' ) );
	$wp_customize->add_setting( 'capture_headline', array( 'default' => 'Ready to Secure Your Next 5 High-Ticket Partners?', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'capture_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_capture' ) );
    $wp_customize->add_setting( 'capture_subheadline', array( 'default' => 'Initiate your strategy session below. We only partner with agencies we are certain we can scale.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'capture_subheadline', array( 'label' => 'Subheadline', 'section' => 'premium_b2b_capture', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'capture_embed', array( 'default' => '', 'sanitize_callback' => 'premium_b2b_sanitize_scripts' ) );
	$wp_customize->add_control( 'capture_embed', array( 'label' => 'Embed Code', 'section' => 'premium_b2b_capture', 'type' => 'textarea' ) );


    // --- TEMPLATE PANEL SECTIONS ---

    // About
    $wp_customize->add_section( 'premium_b2b_about', array( 'title' => 'Template: About', 'panel' => 'premium_b2b_templates' ) );
    $wp_customize->add_setting( 'about_mission_headline', array( 'default' => 'Our Mission: Transforming B2B Growth Engines', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'about_mission_headline', array( 'label' => 'Mission Headline', 'section' => 'premium_b2b_about' ) );
	$wp_customize->add_setting( 'about_mission_text', array( 'default' => 'We empower elite agencies to achieve predictable revenue through precision positioning and automated acquisition systems.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'about_mission_text', array( 'label' => 'Mission Text', 'section' => 'premium_b2b_about', 'type' => 'textarea' ) );

    $value_defaults = array(
		1 => array( 't' => '01. Absolute Precision', 'd' => 'Every variable in our framework is tested and optimized for high-ticket B2B conversion.' ),
		2 => array( 't' => '02. Radical Authority', 'd' => 'We position your agency as the only logical choice in your vertical.' ),
		3 => array( 't' => '03. Scalable Systems', 'd' => 'Our acquisition engines are built to handle high volume without operational breakdown.' ),
	);
    for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "value_{$i}_title", array( 'default' => $value_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "value_{$i}_title", array( 'label' => "Value $i Title", 'section' => 'premium_b2b_about' ) );
		$wp_customize->add_setting( "value_{$i}_desc", array( 'default' => $value_defaults[$i]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "value_{$i}_desc", array( 'label' => "Value $i Desc", 'section' => 'premium_b2b_about', 'type' => 'textarea' ) );
	}

    // Services
    $wp_customize->add_section( 'premium_b2b_services', array( 'title' => 'Template: Services', 'panel' => 'premium_b2b_templates' ) );
	$wp_customize->add_setting( 'services_headline', array( 'default' => 'Precision-Engineered Acquisition Services', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'services_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_services' ) );

    $service_defaults = array(
		1 => array( 't' => 'Authority Positioning', 'd' => 'Strategic realignment of your agency brand to attract $50k+ partners exclusively.' ),
		2 => array( 't' => 'Automated Lead Engines', 'd' => 'Deployment of custom LinkedIn and Cold Email systems that deliver qualified calls daily.' ),
		3 => array( 't' => 'Conversion Ecosystems', 'd' => 'High-performance landing pages and VSLs designed for radical B2B persuasion.' ),
	);
    for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "service_{$i}_title", array( 'default' => $service_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "service_{$i}_title", array( 'label' => "Service $i Title", 'section' => 'premium_b2b_services' ) );
		$wp_customize->add_setting( "service_{$i}_desc", array( 'default' => $service_defaults[$i]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "service_{$i}_desc", array( 'label' => "Service $i Desc", 'section' => 'premium_b2b_services', 'type' => 'textarea' ) );
	}

    // Case Studies
    $wp_customize->add_section( 'premium_b2b_cases', array( 'title' => 'Template: Case Studies', 'panel' => 'premium_b2b_templates' ) );
    $wp_customize->add_setting( 'case_studies_headline', array( 'default' => 'Client Success Stories & ROI Proof', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'case_studies_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_cases' ) );

    $case_defaults = array(
		1 => array( 't' => 'CloudScale SaaS Expansion', 'k' => '+250% SQL Growth', 'd' => 'Implementing an automated LinkedIn engine to secure enterprise-level cloud partnerships.' ),
		2 => array( 't' => 'Alpha Logic Retention', 'k' => '$1.2M LTV Increase', 'd' => 'Strategic repositioning for a software house to target high-retention B2B clients.' ),
		3 => array( 't' => 'NexGen Pipeline Build', 'k' => '15+ Demos / Week', 'd' => 'Architecting a conversion ecosystem for a boutique B2B consultancy.' ),
	);
    for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "case_{$i}_title", array( 'default' => $case_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "case_{$i}_title", array( 'label' => "Case $i Title", 'section' => 'premium_b2b_cases' ) );
		$wp_customize->add_setting( "case_{$i}_kpi", array( 'default' => $case_defaults[$i]['k'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "case_{$i}_kpi", array( 'label' => "Case $i KPI", 'section' => 'premium_b2b_cases' ) );
		$wp_customize->add_setting( "case_{$i}_desc", array( 'default' => $case_defaults[$i]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "case_{$i}_desc", array( 'label' => "Case $i Desc", 'section' => 'premium_b2b_cases', 'type' => 'textarea' ) );
	}

    // Contact
    $wp_customize->add_section( 'premium_b2b_contact', array( 'title' => 'Template: Contact', 'panel' => 'premium_b2b_templates' ) );
	$wp_customize->add_setting( 'contact_email', array( 'default' => 'partner@agency.com', 'sanitize_callback' => 'sanitize_email' ) );
	$wp_customize->add_control( 'contact_email', array( 'label' => 'Contact Email', 'section' => 'premium_b2b_contact' ) );


    // --- Global Components ---
    $wp_customize->add_section( 'premium_b2b_footer', array( 'title' => 'Footer & Social', 'priority' => 130 ) );
	$wp_customize->add_setting( 'footer_copyright', array( 'default' => sprintf( '&copy; %s %s. Elite B2B Acquisition Framework.', date( 'Y' ), get_bloginfo( 'name' ) ), 'sanitize_callback' => 'wp_kses_post' ) );
	$wp_customize->add_control( 'footer_copyright', array( 'label' => 'Copyright Text', 'section' => 'premium_b2b_footer', 'type' => 'textarea' ) );
	$socials = array( 'linkedin', 'twitter', 'instagram' );
	foreach ( $socials as $social ) {
		$wp_customize->add_setting( "social_{$social}", array( 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "social_{$social}", array( 'label' => ucfirst( $social ) . ' URL', 'section' => 'premium_b2b_footer' ) );
	}

    $wp_customize->add_section( 'premium_b2b_cta_card', array( 'title' => 'Single Post CTA', 'priority' => 140 ) );

	// Lead Magnet
	$wp_customize->add_section( 'premium_b2b_magnet', array( 'title' => 'Global Lead Magnet', 'priority' => 145 ) );
	$wp_customize->add_setting( 'magnet_headline', array( 'default' => 'Get the B2B Acquisition Roadmap', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'magnet_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_magnet' ) );
	$wp_customize->add_setting( 'magnet_desc', array( 'default' => 'Join 5,000+ agency owners receiving our weekly scaling insights.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'magnet_desc', array( 'label' => 'Description', 'section' => 'premium_b2b_magnet', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'magnet_embed', array( 'sanitize_callback' => 'premium_b2b_sanitize_scripts' ) );
	$wp_customize->add_control( 'magnet_embed', array( 'label' => 'Form Embed Code', 'section' => 'premium_b2b_magnet', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'cta_card_title', array( 'default' => 'Struggling to Scale Your B2B Pipeline?', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'cta_card_title', array( 'label' => 'Title', 'section' => 'premium_b2b_cta_card' ) );
	$wp_customize->add_setting( 'cta_card_desc', array( 'default' => 'Download our proprietary Client Acquisition Roadmap or book a strategy call today.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'cta_card_desc', array( 'label' => 'Description', 'section' => 'premium_b2b_cta_card', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'enable_social_sharing', array( 'default' => true, 'sanitize_callback' => 'premium_b2b_sanitize_checkbox' ) );
	$wp_customize->add_control( 'enable_social_sharing', array( 'label' => 'Enable Social Sharing', 'section' => 'premium_b2b_cta_card', 'type' => 'checkbox' ) );

	$wp_customize->add_section( 'premium_b2b_scripts', array( 'title' => 'Developer: Custom Scripts', 'priority' => 160 ) );
	$wp_customize->add_setting( 'header_scripts', array( 'default' => '', 'sanitize_callback' => 'premium_b2b_sanitize_scripts' ) );
	$wp_customize->add_control( 'header_scripts', array( 'label' => 'Header Scripts (GTM/GA)', 'section' => 'premium_b2b_scripts', 'type' => 'textarea' ) );

	// --- Selective Refresh Partials ---
	if ( isset( $wp_customize->selective_refresh ) ) {
		$partials = array( 'hero_headline', 'agitation_headline', 'mechanism_headline', 'capture_headline', 'trust_headline', 'about_mission_headline', 'services_headline', 'case_studies_headline' );
		foreach ( $partials as $partial ) {
			$wp_customize->selective_refresh->add_partial( $partial, array(
				'selector'        => ( 'hero_headline' === $partial ) ? '.hero-content h1' : ( ( 'capture_headline' === $partial ) ? '.capture-section h2' : '.section-header h2, h1' ),
				'render_callback' => function() use ( $partial ) { return get_theme_mod( $partial ); },
			) );
		}
	}

	// Enable Live Preview transport
	$postMessage_settings = array( 'hero_headline', 'hero_subheadline', 'primary_color', 'accent_color', 'trust_headline' );
	foreach ( $postMessage_settings as $setting ) {
		$wp_customize->get_setting( $setting )->transport = 'postMessage';
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
	wp_enqueue_script( 'premium-b2b-customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '1.3.0', true );
}
add_action( 'customize_preview_init', 'premium_b2b_customize_preview_js' );

/**
 * Handle Content Regeneration.
 */
function premium_b2b_handle_regeneration() {
	if ( get_theme_mod( 'regen_sample_content' ) ) {

		// 1. Purge Old Sample Data
		$old_samples = get_posts( array(
			'post_type'  => array( 'page', 'post' ),
			'meta_key'   => '_premium_b2b_sample',
			'numberposts' => -1,
			'post_status' => 'any'
		) );

		foreach ( $old_samples as $sample ) {
			wp_delete_post( $sample->ID, true );
		}

		// 2. Generate New Sample Pages
		$pages = array(
			'Home' => array( 'content' => 'Premium landing page initialized...', 'template' => 'front-page.php' ),
			'About' => array( 'content' => 'Agency mission and team showcase...', 'template' => 'template-about.php' ),
			'Services' => array( 'content' => 'Detailed acquisition services and frameworks...', 'template' => 'template-services.php' ),
			'Case Studies' => array( 'content' => 'Client success ROI data...', 'template' => 'template-case-studies.php' ),
			'Contact' => array( 'content' => 'Strategic application form and lead capture...', 'template' => 'template-contact.php' ),
			'Insights' => array( 'content' => '', 'template' => 'index.php' )
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

		// 3. Automated Menu Setup
		$menu_name = 'Elite Primary Menu';
		$menu_exists = wp_get_nav_menu_object( $menu_name );
		if ( ! $menu_exists ) {
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
		}

		// 4. Generate Sample Posts
		for ( $i = 1; $i <= 3; $i++ ) {
			wp_insert_post( array(
				'post_title'   => "The B2B Acquisition Manifesto - Part $i",
				'post_content' => 'Why speed and authority are the only two metrics that matter in the high-ticket B2B market...',
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
 * Dashboard Widget
 */
function premium_b2b_add_dashboard_widgets() {
	wp_add_dashboard_widget( 'premium_b2b_dashboard_widget', 'Elite B2B Framework - Quick Start', 'premium_b2b_dashboard_widget_render' );
}
add_action( 'wp_dashboard_setup', 'premium_b2b_add_dashboard_widgets' );

function premium_b2b_dashboard_widget_render() {
	?>
	<div class="elite-b2b-widget">
		<p>Welcome to the <strong>Premium B2B Client Acquisition Framework</strong>.</p>
		<ul>
			<li><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary">Customize Brand</a></li>
			<li><a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=premium_b2b_setup' ) ); ?>" class="button">Setup Data</a></li>
		</ul>
	</div>
	<?php
}

/**
 * Header Output
 */
function premium_b2b_output_header_scripts() {
	$scripts = get_theme_mod( 'header_scripts' );
	if ( $scripts ) echo $scripts;
	if ( is_front_page() ) {
		$schema = array( '@context' => 'https://schema.org', '@type' => 'ProfessionalService', 'name' => get_bloginfo( 'name' ), 'url' => home_url( '/' ) );
		echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>';
	}
	$primary_color = get_theme_mod( 'primary_color', '#0F172A' );
	$accent_color = get_theme_mod( 'accent_color', '#2563EB' );
	$dark_mode = get_theme_mod( 'enable_dark_mode', false );
	echo '<style>:root { --color-primary: ' . esc_attr( $primary_color ) . '; --color-accent: ' . esc_attr( $accent_color ) . '; }';
	if ( $dark_mode ) echo 'body { --color-bg: #020617; --color-text: #F8FAFC; --color-white: #0F172A; --color-border: rgba(255,255,255,0.1); } .site-header.is-scrolled { background: rgba(15, 23, 42, 0.9); }';
	echo '</style>';
}
add_action( 'wp_head', 'premium_b2b_output_header_scripts' );

/**
 * SEO & Social Meta Tags
 */
function premium_b2b_seo_meta_tags() {
	$description = get_bloginfo( 'description' );
	if ( is_singular() ) {
		$post = get_post();
		if ( ! empty( $post->post_excerpt ) ) {
			$description = $post->post_excerpt;
		} else {
			$description = wp_trim_words( $post->post_content, 25 );
		}
	}

	echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( wp_get_document_title() ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta property="og:type" content="' . ( is_singular() ? 'article' : 'website' ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( get_permalink() ) . '">' . "\n";
	echo '<meta property="og:site_name" content="' . esc_attr( get_bloginfo( 'name' ) ) . '">' . "\n";
	if ( has_post_thumbnail() ) {
		$img_url = get_the_post_thumbnail_url( null, 'large' );
		echo '<meta property="og:image" content="' . esc_url( $img_url ) . '">' . "\n";
	}
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
}
add_action( 'wp_head', 'premium_b2b_seo_meta_tags', 1 );

function premium_b2b_reading_time() {
	$content = get_post_field( 'post_content', get_the_ID() );
	$word_count = str_word_count( strip_tags( $content ) );
	$reading_time = ceil( $word_count / 200 );
	return $reading_time . ( ( 1 === (int)$reading_time ) ? ' min read' : ' mins read' );
}

add_filter( 'excerpt_length', function() { return 25; }, 999 );
add_filter( 'excerpt_more', function() { return '...'; } );
