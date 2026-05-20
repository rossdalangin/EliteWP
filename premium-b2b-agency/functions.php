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

	// --- Agitation Section ---
	$wp_customize->add_section( 'premium_b2b_agitation', array(
		'title'    => __( 'Agitation Grid', 'premium-b2b' ),
		'priority' => 31,
	) );

	$wp_customize->add_setting( 'agitation_headline', array(
		'default'           => __( 'Stop Letting Inefficient Systems Drain Your Agency Profits', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'agitation_headline', array(
		'label'    => __( 'Section Headline', 'premium-b2b' ),
		'section'  => 'premium_b2b_agitation',
	) );

	for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "agitation_c{$i}_title", array( 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "agitation_c{$i}_title", array( 'label' => "Card $i Title", 'section' => 'premium_b2b_agitation' ) );
		$wp_customize->add_setting( "agitation_c{$i}_desc", array( 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "agitation_c{$i}_desc", array( 'label' => "Card $i Description", 'section' => 'premium_b2b_agitation', 'type' => 'textarea' ) );
	}

	// --- Mechanism Section ---
	$wp_customize->add_section( 'premium_b2b_mechanism', array(
		'title'    => __( 'Mechanism Z-Pattern', 'premium-b2b' ),
		'priority' => 32,
	) );

	$wp_customize->add_setting( 'mechanism_headline', array(
		'default'           => __( 'Our Premium 3-Step Framework', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'mechanism_headline', array(
		'label'    => __( 'Section Headline', 'premium-b2b' ),
		'section'  => 'premium_b2b_mechanism',
	) );

	for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "mechanism_s{$i}_title", array( 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "mechanism_s{$i}_title", array( 'label' => "Step $i Title", 'section' => 'premium_b2b_mechanism' ) );
		$wp_customize->add_setting( "mechanism_s{$i}_desc", array( 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "mechanism_s{$i}_desc", array( 'label' => "Step $i Description", 'section' => 'premium_b2b_mechanism', 'type' => 'textarea' ) );
	}

	// --- Capture Section ---
	$wp_customize->add_section( 'premium_b2b_capture', array(
		'title'    => __( 'Capture Block', 'premium-b2b' ),
		'priority' => 33,
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
		'default'           => __( 'Book your discovery call below to see if your agency is a fit for our acquisition framework.', 'premium-b2b' ),
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
		'priority' => 40,
	) );

	$wp_customize->add_setting( 'cta_card_title', array(
		'default'           => __( 'Ready to Automate Your Pipeline?', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'cta_card_title', array( 'label' => __( 'Title', 'premium-b2b' ), 'section' => 'premium_b2b_cta_card' ) );

	$wp_customize->add_setting( 'cta_card_desc', array(
		'default'           => __( 'Book a discovery call today and see how we can help you scale.', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'cta_card_desc', array( 'label' => __( 'Description', 'premium-b2b' ), 'section' => 'premium_b2b_cta_card', 'type' => 'textarea' ) );

	// --- About Page Settings ---
	$wp_customize->add_section( 'premium_b2b_about', array(
		'title'    => __( 'About Page', 'premium-b2b' ),
		'priority' => 100,
	) );

	$wp_customize->add_setting( 'about_mission_headline', array(
		'default'           => __( 'Our Mission: Transforming B2B Acquisition', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'about_mission_headline', array( 'label' => __( 'Mission Headline', 'premium-b2b' ), 'section' => 'premium_b2b_about' ) );

	$wp_customize->add_setting( 'about_mission_text', array(
		'default'           => __( 'We empower agencies to achieve predictable growth by bridging the gap between high-value prospects and sustainable conversion systems.', 'premium-b2b' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'about_mission_text', array( 'label' => __( 'Mission Text', 'premium-b2b' ), 'section' => 'premium_b2b_about', 'type' => 'textarea' ) );

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

	// --- Selective Refresh Partials ---
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'hero_headline', array(
			'selector'        => '.hero-content h1',
			'render_callback' => function() { return get_theme_mod( 'hero_headline' ); },
		) );
		$wp_customize->selective_refresh->add_partial( 'agitation_headline', array(
			'selector'        => '.agitation-section .section-header h2',
			'render_callback' => function() { return get_theme_mod( 'agitation_headline' ); },
		) );
		$wp_customize->selective_refresh->add_partial( 'mechanism_headline', array(
			'selector'        => '.mechanism-section .section-header h2',
			'render_callback' => function() { return get_theme_mod( 'mechanism_headline' ); },
		) );
		$wp_customize->selective_refresh->add_partial( 'capture_headline', array(
			'selector'        => '.capture-section h2',
			'render_callback' => function() { return get_theme_mod( 'capture_headline' ); },
		) );
	}

	// Enable Live Preview transport for specific settings
	$wp_customize->get_setting( 'hero_headline' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'hero_subheadline' )->transport = 'postMessage';
	$wp_customize->get_setting( 'primary_color' )->transport    = 'postMessage';
	$wp_customize->get_setting( 'accent_color' )->transport     = 'postMessage';

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
				'content' => 'High-converting landing page content...',
				'template' => 'front-page.php'
			),
			'About Us' => array(
				'content' => 'Premium B2B agency story...',
				'template' => 'template-about.php'
			),
			'Our Services' => array(
				'content' => 'Detailed acquisition frameworks...',
				'template' => 'template-services.php'
			),
			'Contact' => array(
				'content' => 'Lead capture application form...',
				'template' => 'template-contact.php'
			),
			'Insights' => array(
				'content' => '',
				'template' => 'index.php'
			)
		);

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

			if ( 'Home' === $title ) {
				update_option( 'show_on_front', 'page' );
				update_option( 'page_on_front', $page_id );
			}
			if ( 'Insights' === $title ) {
				update_option( 'page_for_posts', $page_id );
			}
		}

		// 3. Generate Sample Posts
		for ( $i = 1; $i <= 3; $i++ ) {
			wp_insert_post( array(
				'post_title'   => "Sample B2B Insight #$i",
				'post_content' => 'Deep dive into client acquisition strategies...',
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
	return $reading_time . ( ( 1 === (int)$reading_time ) ? __( ' min read', 'premium-b2b' ) : __( ' mins read', 'premium-b2b' ) );
}

/**
 * Custom Excerpt.
 */
add_filter( 'excerpt_length', function() { return 25; }, 999 );
add_filter( 'excerpt_more', function() { return '...'; } );
