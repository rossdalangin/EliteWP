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
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
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

	// Register navigation menus.
	register_nav_menus(
		array(
			'menu-1'      => esc_html__( 'Primary Menu', 'premium-b2b' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'premium-b2b' ),
		)
	);

	// Add support for core custom logo.
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
	wp_enqueue_style( 'premium-b2b-style', get_stylesheet_uri(), array(), '1.0.0' );

	wp_enqueue_script( 'premium-b2b-main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
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
	// Hero Section
	$wp_customize->add_section( 'premium_b2b_hero', array(
		'title'    => __( 'Hero Section', 'premium-b2b' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'hero_headline', array(
		'default'           => __( 'Scale Your B2B Agency with Premium Client Acquisition', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'hero_headline', array(
		'label'    => __( 'Hero Headline', 'premium-b2b' ),
		'section'  => 'premium_b2b_hero',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'hero_subheadline', array(
		'default'           => __( 'We build high-converting systems that turn cold prospects into high-ticket partners.', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'hero_subheadline', array(
		'label'    => __( 'Hero Subheadline', 'premium-b2b' ),
		'section'  => 'premium_b2b_hero',
		'type'     => 'textarea',
	) );

	$wp_customize->add_setting( 'hero_cta_text', array(
		'default'           => __( 'Get a Free Strategy Session', 'premium-b2b' ),
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

	// Colors
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

	// Agitation Section
	$wp_customize->add_section( 'premium_b2b_agitation', array(
		'title'    => __( 'Agitation Section', 'premium-b2b' ),
		'priority' => 31,
	) );

	$wp_customize->add_setting( 'agitation_headline', array(
		'default'           => __( 'Stop Letting Inefficient Systems Drain Your Agency Profits', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'agitation_headline', array(
		'label'    => __( 'Headline', 'premium-b2b' ),
		'section'  => 'premium_b2b_agitation',
		'type'     => 'text',
	) );

	// Card 1
	$wp_customize->add_setting( 'agitation_c1_title', array(
		'default'           => __( 'Content Fatigue', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'agitation_c1_title', array(
		'label'    => __( 'Card 1 Title', 'premium-b2b' ),
		'section'  => 'premium_b2b_agitation',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'agitation_c1_desc', array(
		'default'           => __( 'Spending hours on content that fails to generate meaningful engagement or leads.', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'agitation_c1_desc', array(
		'label'    => __( 'Card 1 Description', 'premium-b2b' ),
		'section'  => 'premium_b2b_agitation',
		'type'     => 'textarea',
	) );

	// Card 2
	$wp_customize->add_setting( 'agitation_c2_title', array(
		'default'           => __( 'Brand Degradation', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'agitation_c2_title', array(
		'label'    => __( 'Card 2 Title', 'premium-b2b' ),
		'section'  => 'premium_b2b_agitation',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'agitation_c2_desc', array(
		'default'           => __( 'Inconsistent messaging and poor visual identity that turns away premium clients.', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'agitation_c2_desc', array(
		'label'    => __( 'Card 2 Description', 'premium-b2b' ),
		'section'  => 'premium_b2b_agitation',
		'type'     => 'textarea',
	) );

	// Card 3
	$wp_customize->add_setting( 'agitation_c3_title', array(
		'default'           => __( 'Empty Pipelines', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'agitation_c3_title', array(
		'label'    => __( 'Card 3 Title', 'premium-b2b' ),
		'section'  => 'premium_b2b_agitation',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'agitation_c3_desc', array(
		'default'           => __( 'Living month-to-month without a predictable system for high-ticket client acquisition.', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'agitation_c3_desc', array(
		'label'    => __( 'Card 3 Description', 'premium-b2b' ),
		'section'  => 'premium_b2b_agitation',
		'type'     => 'textarea',
	) );

	// Mechanism Section
	$wp_customize->add_section( 'premium_b2b_mechanism', array(
		'title'    => __( 'Mechanism Section', 'premium-b2b' ),
		'priority' => 32,
	) );

	$wp_customize->add_setting( 'mechanism_headline', array(
		'default'           => __( 'Our Premium 3-Step Framework', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'mechanism_headline', array(
		'label'    => __( 'Headline', 'premium-b2b' ),
		'section'  => 'premium_b2b_mechanism',
		'type'     => 'text',
	) );

	// Step 1
	$wp_customize->add_setting( 'mechanism_s1_title', array(
		'default'           => __( 'Strategic Audit & Positioning', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'mechanism_s1_title', array(
		'label'    => __( 'Step 1 Title', 'premium-b2b' ),
		'section'  => 'premium_b2b_mechanism',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'mechanism_s1_desc', array(
		'default'           => __( 'We deep-dive into your current operations to identify leakage and define your unique value proposition in the high-ticket market.', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'mechanism_s1_desc', array(
		'label'    => __( 'Step 1 Description', 'premium-b2b' ),
		'section'  => 'premium_b2b_mechanism',
		'type'     => 'textarea',
	) );

	// Step 2
	$wp_customize->add_setting( 'mechanism_s2_title', array(
		'default'           => __( 'Conversion-Led System Build', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'mechanism_s2_title', array(
		'label'    => __( 'Step 2 Title', 'premium-b2b' ),
		'section'  => 'premium_b2b_mechanism',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'mechanism_s2_desc', array(
		'default'           => __( 'We architect your bespoke acquisition engine, from high-converting landing pages to automated lead nurturing sequences.', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'mechanism_s2_desc', array(
		'label'    => __( 'Step 2 Description', 'premium-b2b' ),
		'section'  => 'premium_b2b_mechanism',
		'type'     => 'textarea',
	) );

	// Step 3
	$wp_customize->add_setting( 'mechanism_s3_title', array(
		'default'           => __( 'Scale & Optimization', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'mechanism_s3_title', array(
		'label'    => __( 'Step 3 Title', 'premium-b2b' ),
		'section'  => 'premium_b2b_mechanism',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'mechanism_s3_desc', array(
		'default'           => __( 'Once the foundation is solid, we scale your traffic and optimize every touchpoint for maximum ROI and long-term partnership growth.', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'mechanism_s3_desc', array(
		'label'    => __( 'Step 3 Description', 'premium-b2b' ),
		'section'  => 'premium_b2b_mechanism',
		'type'     => 'textarea',
	) );

	// Scripts Block
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

	// Global CTA Card (for Single Posts)
	$wp_customize->add_section( 'premium_b2b_cta_card', array(
		'title'    => __( 'Post CTA Card', 'premium-b2b' ),
		'priority' => 40,
	) );

	$wp_customize->add_setting( 'cta_card_title', array(
		'default'           => __( 'Ready to Automate Your Pipeline?', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'cta_card_title', array(
		'label'    => __( 'CTA Card Title', 'premium-b2b' ),
		'section'  => 'premium_b2b_cta_card',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'cta_card_desc', array(
		'default'           => __( 'Book a discovery call today and see how we can help you scale.', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'cta_card_desc', array(
		'label'    => __( 'CTA Card Description', 'premium-b2b' ),
		'section'  => 'premium_b2b_cta_card',
		'type'     => 'textarea',
	) );
}
add_action( 'customize_register', 'premium_b2b_customize_register' );

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
 * Output Custom Scripts in Header.
 */
function premium_b2b_output_header_scripts() {
	$scripts = get_theme_mod( 'header_scripts' );
	if ( $scripts ) {
		echo $scripts; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	$primary_color = get_theme_mod( 'primary_color', '#0F172A' );
	$accent_color = get_theme_mod( 'accent_color', '#2563EB' );

	echo '<style>:root { --color-primary: ' . esc_attr( $primary_color ) . '; --color-accent: ' . esc_attr( $accent_color ) . '; }</style>';
}
add_action( 'wp_head', 'premium_b2b_output_header_scripts' );

/**
 * Calculate Reading Time.
 */
function premium_b2b_reading_time() {
	$content = get_post_field( 'post_content', get_the_ID() );
	$word_count = str_word_count( strip_tags( $content ) );
	$reading_time = ceil( $word_count / 200 );

	if ( 1 === $reading_time ) {
		$timer = __( ' min read', 'premium-b2b' );
	} else {
		$timer = __( ' mins read', 'premium-b2b' );
	}

	return $reading_time . $timer;
}

/**
 * Custom Excerpt Length.
 */
function premium_b2b_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'premium_b2b_excerpt_length', 999 );

/**
 * Custom Excerpt More.
 */
function premium_b2b_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'premium_b2b_excerpt_more' );
