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
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'customize-selective-refresh-widgets' );
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
	wp_enqueue_style( 'premium-b2b-style', get_stylesheet_uri(), array(), '1.2.0' );
	wp_enqueue_script( 'premium-b2b-main', get_template_directory_uri() . '/js/main.js', array(), '1.2.0', true );
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

	// --- Theme Setup & Regeneration ---
	$wp_customize->add_section( 'premium_b2b_setup', array(
		'title'    => __( 'Theme Setup', 'premium-b2b' ),
		'priority' => 20,
	) );

	$wp_customize->add_setting( 'regen_sample_content', array(
		'default'           => false,
		'sanitize_callback' => 'premium_b2b_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'regen_sample_content', array(
		'label'       => __( 'Regenerate Sample Content', 'premium-b2b' ),
		'description' => __( 'Check this and save to purge old sample data and generate fresh premium B2B content.', 'premium-b2b' ),
		'section'     => 'premium_b2b_setup',
		'type'        => 'checkbox',
	) );

	// --- Hero Section ---
	$wp_customize->add_section( 'premium_b2b_hero', array(
		'title'    => __( 'Hero Section', 'premium-b2b' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'hero_headline', array(
		'default'           => __( 'Scale Your B2B Agency with Precision Client Acquisition', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'hero_headline', array(
		'label'    => __( 'Hero Headline', 'premium-b2b' ),
		'section'  => 'premium_b2b_hero',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'hero_subheadline', array(
		'default'           => __( 'We engineer high-converting acquisition systems that turn cold prospects into your agency\'s highest-value partners. Predictable, scalable, and elite.', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'hero_subheadline', array(
		'label'    => __( 'Hero Subheadline', 'premium-b2b' ),
		'section'  => 'premium_b2b_hero',
		'type'     => 'textarea',
	) );

	$wp_customize->add_setting( 'hero_cta_text', array(
		'default'           => __( 'Book Your Strategy Audit', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'hero_cta_text', array(
		'label'    => __( 'Hero CTA Button Text', 'premium-b2b' ),
		'section'  => 'premium_b2b_hero',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'hero_cta_url', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'hero_cta_url', array(
		'label'    => __( 'Hero CTA URL', 'premium-b2b' ),
		'section'  => 'premium_b2b_hero',
		'type'     => 'url',
	) );

	// --- Colors ---
	$wp_customize->add_section( 'premium_b2b_colors', array(
		'title'    => __( 'Theme Colors', 'premium-b2b' ),
		'priority' => 35,
	) );

	$wp_customize->add_setting( 'primary_color', array(
		'default'           => '#0F172A',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
		'label'    => __( 'Primary Color (Obsidian)', 'premium-b2b' ),
		'section'  => 'premium_b2b_colors',
	) ) );

	$wp_customize->add_setting( 'accent_color', array(
		'default'           => '#2563EB',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
		'label'    => __( 'Accent Color (Indigo)', 'premium-b2b' ),
		'section'  => 'premium_b2b_colors',
	) ) );

	$wp_customize->add_setting( 'enable_dark_mode', array(
		'default'           => false,
		'sanitize_callback' => 'premium_b2b_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'enable_dark_mode', array(
		'label'   => __( 'Enable Dark Mode', 'premium-b2b' ),
		'section' => 'premium_b2b_colors',
		'type'    => 'checkbox',
	) );

	// --- Trust Bar (Social Proof) ---
	$wp_customize->add_section( 'premium_b2b_trust', array(
		'title'    => __( 'Trust Bar (Logos)', 'premium-b2b' ),
		'priority' => 31,
	) );

	$wp_customize->add_setting( 'trust_headline', array(
		'default'           => __( 'Trusted by Industry-Leading B2B Organizations', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'trust_headline', array( 'label' => __( 'Headline', 'premium-b2b' ), 'section' => 'premium_b2b_trust' ) );

	// --- Agitation Section ---
	$wp_customize->add_section( 'premium_b2b_agitation', array(
		'title'    => __( 'Agitation Grid', 'premium-b2b' ),
		'priority' => 32,
	) );

	$wp_customize->add_setting( 'agitation_headline', array(
		'default'           => __( 'Stop Letting Operational Friction Drain Your Agency Growth', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'agitation_headline', array(
		'label'    => __( 'Section Headline', 'premium-b2b' ),
		'section'  => 'premium_b2b_agitation',
	) );

	$agitation_defaults = array(
		1 => array( 't' => 'Stagnant Pipelines', 'd' => 'Living project-to-project without a predictable, automated system for high-ticket acquisition.' ),
		2 => array( 't' => 'Brand Degradation', 'd' => 'Inconsistent messaging and outdated design that signal low authority to premium prospects.' ),
		3 => array( 't' => 'Conversion Leakage', 'd' => 'Spending thousands on traffic that hits non-optimized pages, resulting in zero ROI.' ),
	);

	for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "agitation_c{$i}_title", array( 'default' => $agitation_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "agitation_c{$i}_title", array( 'label' => "Card $i Title", 'section' => 'premium_b2b_agitation' ) );
		$wp_customize->add_setting( "agitation_c{$i}_desc", array( 'default' => $agitation_defaults[$i]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "agitation_c{$i}_desc", array( 'label' => "Card $i Description", 'section' => 'premium_b2b_agitation', 'type' => 'textarea' ) );
	}

	// --- Testimonials ---
	$wp_customize->add_section( 'premium_b2b_testimonials', array(
		'title'    => __( 'Testimonials', 'premium-b2b' ),
		'priority' => 34,
	) );

	$test_defaults = array(
		1 => array( 't' => 'This framework transformed our lead flow. In 3 months, we secured more high-ticket partners than in the previous two years.', 'a' => 'David Chen, CEO of CloudScale' ),
		2 => array( 't' => 'The most technical and conversion-optimized theme we have ever deployed. It reflects the authority we need in the B2B space.', 'a' => 'Sarah Jenkins, Director of Operations' ),
	);

	for ( $i = 1; $i <= 2; $i++ ) {
		$wp_customize->add_setting( "testimonial_{$i}_text", array( 'default' => $test_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "testimonial_{$i}_text", array( 'label' => "Testimonial $i", 'section' => 'premium_b2b_testimonials', 'type' => 'textarea' ) );
		$wp_customize->add_setting( "testimonial_{$i}_author", array( 'default' => $test_defaults[$i]['a'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "testimonial_{$i}_author", array( 'label' => "Author $i", 'section' => 'premium_b2b_testimonials' ) );
	}

	// --- Mechanism Section ---
	$wp_customize->add_section( 'premium_b2b_mechanism', array(
		'title'    => __( 'Mechanism Z-Pattern', 'premium-b2b' ),
		'priority' => 33,
	) );

	$wp_customize->add_setting( 'mechanism_headline', array(
		'default'           => __( 'Our Elite 3-Step Acquisition Framework', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'mechanism_headline', array(
		'label'    => __( 'Section Headline', 'premium-b2b' ),
		'section'  => 'premium_b2b_mechanism',
	) );

	$mech_defaults = array(
		1 => array( 't' => 'Strategic Positioning Audit', 'd' => 'We identify leakage in your current brand positioning and realign your authority for the high-ticket market.' ),
		2 => array( 't' => 'Conversion Engine Build', 'd' => 'We architect your bespoke acquisition engine, ensuring every pixel is optimized for B2B conversion.' ),
		3 => array( 't' => 'Scalable Growth Injection', 'd' => 'Once the foundation is solid, we inject high-intent traffic to scale your ROI predictably.' ),
	);

	for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "mechanism_s{$i}_title", array( 'default' => $mech_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "mechanism_s{$i}_title", array( 'label' => "Step $i Title", 'section' => 'premium_b2b_mechanism' ) );
		$wp_customize->add_setting( "mechanism_s{$i}_desc", array( 'default' => $mech_defaults[$i]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "mechanism_s{$i}_desc", array( 'label' => "Step $i Description", 'section' => 'premium_b2b_mechanism', 'type' => 'textarea' ) );
	}

	// --- Capture Section ---
	$wp_customize->add_section( 'premium_b2b_capture', array(
		'title'    => __( 'Capture Block', 'premium-b2b' ),
		'priority' => 40,
	) );

	$wp_customize->add_setting( 'capture_headline', array(
		'default'           => __( 'Ready to Secure Your Next 5 High-Ticket Partners?', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'capture_headline', array(
		'label'    => __( 'Capture Headline', 'premium-b2b' ),
		'section'  => 'premium_b2b_capture',
	) );

	$wp_customize->add_setting( 'capture_subheadline', array(
		'default'           => __( 'Initiate your strategy session below. We only partner with agencies we are certain we can scale.', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'capture_subheadline', array(
		'label'    => __( 'Capture Subheadline', 'premium-b2b' ),
		'section'  => 'premium_b2b_capture',
		'type'     => 'textarea',
	) );

	$wp_customize->add_setting( 'capture_embed', array(
		'default'           => '',
		'sanitize_callback' => 'premium_b2b_sanitize_scripts',
	) );
	$wp_customize->add_control( 'capture_embed', array(
		'label'    => __( 'Embed Code (Form/Calendar)', 'premium-b2b' ),
		'section'  => 'premium_b2b_capture',
		'type'     => 'textarea',
	) );

	// --- Post CTA Card ---
	$wp_customize->add_section( 'premium_b2b_cta_card', array(
		'title'    => __( 'Single Post CTA', 'premium-b2b' ),
		'priority' => 50,
	) );

	$wp_customize->add_setting( 'cta_card_title', array(
		'default'           => __( 'Struggling to Scale Your B2B Pipeline?', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'cta_card_title', array( 'label' => __( 'Title', 'premium-b2b' ), 'section' => 'premium_b2b_cta_card' ) );

	$wp_customize->add_setting( 'cta_card_desc', array(
		'default'           => __( 'Download our proprietary Client Acquisition Roadmap or book a strategy call with our lead engineers today.', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'cta_card_desc', array( 'label' => __( 'Description', 'premium-b2b' ), 'section' => 'premium_b2b_cta_card', 'type' => 'textarea' ) );

	// --- About Page Settings ---
	$wp_customize->add_section( 'premium_b2b_about', array(
		'title'    => __( 'About Page', 'premium-b2b' ),
		'priority' => 100,
	) );

	$wp_customize->add_setting( 'about_mission_headline', array(
		'default'           => __( 'Our Mission: Transforming B2B Growth Engines', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'about_mission_headline', array( 'label' => __( 'Mission Headline', 'premium-b2b' ), 'section' => 'premium_b2b_about' ) );

	$wp_customize->add_setting( 'about_mission_text', array(
		'default'           => __( 'We empower elite agencies to achieve predictable revenue through precision positioning and automated acquisition systems. We don\'t just build sites; we deploy assets.', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'about_mission_text', array( 'label' => __( 'Mission Text', 'premium-b2b' ), 'section' => 'premium_b2b_about', 'type' => 'textarea' ) );

	$value_defaults = array(
		1 => array( 't' => '01. Absolute Precision', 'd' => 'Every variable in our framework is tested and optimized for high-ticket B2B conversion.' ),
		2 => array( 't' => '02. Radical Authority', 'd' => 'We position your agency as the only logical choice in your vertical.' ),
		3 => array( 't' => '03. Scalable Systems', 'd' => 'Our acquisition engines are built to handle high volume without operational breakdown.' ),
	);

	for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "value_{$i}_title", array( 'default' => $value_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "value_{$i}_title", array( 'label' => "Value $i Title", 'section' => 'premium_b2b_about' ) );
		$wp_customize->add_setting( "value_{$i}_desc", array( 'default' => $value_defaults[$i]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "value_{$i}_desc", array( 'label' => "Value $i Description", 'section' => 'premium_b2b_about', 'type' => 'textarea' ) );
	}

	// --- Services Page Settings ---
	$wp_customize->add_section( 'premium_b2b_services', array(
		'title'    => __( 'Services Page', 'premium-b2b' ),
		'priority' => 110,
	) );

	$wp_customize->add_setting( 'services_headline', array(
		'default'           => __( 'Precision-Engineered Acquisition Services', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'services_headline', array( 'label' => __( 'Services Headline', 'premium-b2b' ), 'section' => 'premium_b2b_services' ) );

	$service_defaults = array(
		1 => array( 't' => 'Authority Positioning', 'd' => 'Strategic realignment of your agency brand to attract $50k+ partners exclusively.' ),
		2 => array( 't' => 'Automated Lead Engines', 'd' => 'Deployment of custom LinkedIn and Cold Email systems that deliver qualified calls daily.' ),
		3 => array( 't' => 'Conversion Ecosystems', 'd' => 'High-performance landing pages and VSLs designed for radical B2B persuasion.' ),
	);

	for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "service_{$i}_title", array( 'default' => $service_defaults[$i]['t'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "service_{$i}_title", array( 'label' => "Service $i Title", 'section' => 'premium_b2b_services' ) );
		$wp_customize->add_setting( "service_{$i}_desc", array( 'default' => $service_defaults[$i]['d'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "service_{$i}_desc", array( 'label' => "Service $i Description", 'section' => 'premium_b2b_services', 'type' => 'textarea' ) );
	}

	// --- Contact Page Settings ---
	$wp_customize->add_section( 'premium_b2b_contact', array(
		'title'    => __( 'Contact Page', 'premium-b2b' ),
		'priority' => 120,
	) );

	$wp_customize->add_setting( 'contact_email', array(
		'default'           => 'partner@agency.com',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'contact_email', array( 'label' => __( 'Contact Email', 'premium-b2b' ), 'section' => 'premium_b2b_contact' ) );

	// --- Footer & Social ---
	$wp_customize->add_section( 'premium_b2b_footer', array(
		'title'    => __( 'Footer & Social', 'premium-b2b' ),
		'priority' => 130,
	) );

	$wp_customize->add_setting( 'footer_copyright', array(
		'default'           => sprintf( '&copy; %s %s. Elite B2B Acquisition Framework.', date( 'Y' ), get_bloginfo( 'name' ) ),
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'footer_copyright', array(
		'label'   => __( 'Copyright Text', 'premium-b2b' ),
		'section' => 'premium_b2b_footer',
		'type'    => 'textarea',
	) );

	$socials = array( 'linkedin', 'twitter', 'instagram' );
	foreach ( $socials as $social ) {
		$wp_customize->add_setting( "social_{$social}", array( 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "social_{$social}", array(
			'label'   => ucfirst( $social ) . ' URL',
			'section' => 'premium_b2b_footer',
		) );
	}

	// --- Selective Refresh Partials ---
	if ( isset( $wp_customize->selective_refresh ) ) {
		$partials = array( 'hero_headline', 'agitation_headline', 'mechanism_headline', 'capture_headline' );
		foreach ( $partials as $partial ) {
			$wp_customize->selective_refresh->add_partial( $partial, array(
				'selector'        => ( 'hero_headline' === $partial ) ? '.hero-content h1' : ( ( 'capture_headline' === $partial ) ? '.capture-section h2' : '.section-header h2' ),
				'render_callback' => function() use ( $partial ) { return get_theme_mod( $partial ); },
			) );
		}
	}

	// Enable Live Preview transport
	$postMessage_settings = array( 'hero_headline', 'hero_subheadline', 'primary_color', 'accent_color', 'trust_headline' );
	foreach ( $postMessage_settings as $setting ) {
		$wp_customize->get_setting( $setting )->transport = 'postMessage';
	}

	// --- Scripts Block ---
	$wp_customize->add_section( 'premium_b2b_scripts', array(
		'title'    => __( 'Custom Scripts', 'premium-b2b' ),
		'priority' => 160,
	) );

	$wp_customize->add_setting( 'header_scripts', array(
		'default'           => '',
		'sanitize_callback' => 'premium_b2b_sanitize_scripts',
	) );
	$wp_customize->add_control( 'header_scripts', array(
		'label'       => __( 'Header Scripts (GTM/GA)', 'premium-b2b' ),
		'description' => __( 'Paste scripts that belong in the <head> section.', 'premium-b2b' ),
		'section'     => 'premium_b2b_scripts',
		'type'        => 'textarea',
	) );
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
	wp_enqueue_script( 'premium-b2b-customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '1.2.0', true );
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
			'Home' => array(
				'content' => 'Premium landing page initialized...',
				'template' => 'front-page.php'
			),
			'About' => array(
				'content' => 'Agency mission and team showcase...',
				'template' => 'template-about.php'
			),
			'Services' => array(
				'content' => 'Detailed acquisition services and frameworks...',
				'template' => 'template-services.php'
			),
			'Contact' => array(
				'content' => 'Strategic application form and lead capture...',
				'template' => 'template-contact.php'
			),
			'Insights' => array(
				'content' => '',
				'template' => 'index.php'
			)
		);

		$page_ids = array();
		foreach ( $pages as $title => $data ) {
			$page_id = wp_insert_post( array(
				'post_title'   => $title,
				'post_content' => $data['content'],
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'meta_input'   => array(
					'_premium_b2b_sample' => true,
					'_wp_page_template'   => $data['template']
				)
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

			// Add items
			wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Home', 'menu-item-object' => 'page', 'menu-item-object-id' => $page_ids['Home'], 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
			wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'About', 'menu-item-object' => 'page', 'menu-item-object-id' => $page_ids['About'], 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
			wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Services', 'menu-item-object' => 'page', 'menu-item-object-id' => $page_ids['Services'], 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
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

		// Reset the trigger
		set_theme_mod( 'regen_sample_content', false );
	}
}
add_action( 'customize_save_after', 'premium_b2b_handle_regeneration' );

/**
 * Add an Elite B2B Dashboard Widget.
 */
function premium_b2b_add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'premium_b2b_dashboard_widget',
		__( 'Elite B2B Framework - Quick Start', 'premium-b2b' ),
		'premium_b2b_dashboard_widget_render'
	);
}
add_action( 'wp_dashboard_setup', 'premium_b2b_add_dashboard_widgets' );

/**
 * Render the Elite B2B Dashboard Widget.
 */
function premium_b2b_dashboard_widget_render() {
	?>
	<div class="elite-b2b-widget">
		<p>Welcome to the <strong>Premium B2B Client Acquisition Framework</strong>. Your site is currently running on the world's most optimized agency engine.</p>
		<hr>
		<h4>🚀 Quick Actions</h4>
		<ul>
			<li><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary">Customize Brand & Copy</a></li>
			<li><a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=premium_b2b_setup' ) ); ?>" class="button">Regenerate Sample Data</a></li>
		</ul>
		<hr>
		<h4>📚 Tutorials & Documentation</h4>
		<p>Need help scaling? Check the <code>README.md</code> in your theme folder for the full B2B Framework Manifesto.</p>
		<p><em>Elite Tip: Ensure your primary color has a high contrast ratio to maintain W3C accessibility compliance.</em></p>
	</div>
	<?php
}

/**
 * Output Custom Styles in Header.
 */
function premium_b2b_output_header_scripts() {
	$scripts = get_theme_mod( 'header_scripts' );
	if ( $scripts ) {
		echo $scripts; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	$primary_color = get_theme_mod( 'primary_color', '#0F172A' );
	$accent_color = get_theme_mod( 'accent_color', '#2563EB' );
	$dark_mode = get_theme_mod( 'enable_dark_mode', false );

	echo '<style>:root { --color-primary: ' . esc_attr( $primary_color ) . '; --color-accent: ' . esc_attr( $accent_color ) . '; }';
	if ( $dark_mode ) {
		echo 'body { --color-bg: #020617; --color-text: #F8FAFC; --color-white: #0F172A; --color-border: rgba(255,255,255,0.1); }';
		echo '.site-header.is-scrolled { background: rgba(15, 23, 42, 0.9); }';
	}
	echo '</style>';
}
add_action( 'wp_head', 'premium_b2b_output_header_scripts' );

/**
 * Calculate Reading Time.
 */
function premium_b2b_reading_time() {
	$content = get_post_field( 'post_content', get_the_ID() );
	$word_count = str_word_count( strip_tags( $content ) );
	$reading_time = ceil( $word_count / 200 );
	return $reading_time . ( ( 1 === (int)$reading_time ) ? __( ' min read', 'premium-b2b' ) : __( ' mins read', 'premium-b2b' ) );
}

/**
 * Custom Excerpt.
 */
add_filter( 'excerpt_length', function() { return 25; }, 999 );
add_filter( 'excerpt_more', function() { return '...'; } );
