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
	wp_enqueue_style( 'premium-b2b-style', get_stylesheet_uri(), array(), '1.4.0' );
	wp_enqueue_script( 'premium-b2b-main', get_template_directory_uri() . '/js/main.js', array(), '1.4.0', true );
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

	// Branding & Setup
	$wp_customize->add_section( 'premium_b2b_setup', array( 'title' => __( 'Theme Setup', 'premium-b2b' ), 'priority' => 10 ) );
	$wp_customize->add_setting( 'regen_sample_content', array( 'default' => false, 'sanitize_callback' => 'premium_b2b_sanitize_checkbox' ) );
	$wp_customize->add_control( 'regen_sample_content', array( 'label' => __( 'Regenerate Elite Content', 'premium-b2b' ), 'section' => 'premium_b2b_setup', 'type' => 'checkbox' ) );
    $wp_customize->add_setting( 'enable_mobile_cta', array( 'default' => true, 'sanitize_callback' => 'premium_b2b_sanitize_checkbox' ) );
	$wp_customize->add_control( 'enable_mobile_cta', array( 'label' => 'Enable Sticky Mobile CTA', 'section' => 'premium_b2b_setup', 'type' => 'checkbox' ) );

	$wp_customize->add_section( 'premium_b2b_colors', array( 'title' => __( 'Global Branding', 'premium-b2b' ), 'priority' => 20 ) );
	$wp_customize->add_setting( 'primary_color', array( 'default' => '#0F172A', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array( 'label' => 'Primary Color', 'section' => 'premium_b2b_colors' ) ) );
	$wp_customize->add_setting( 'accent_color', array( 'default' => '#2563EB', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array( 'label' => 'Accent Color', 'section' => 'premium_b2b_colors' ) ) );
	$wp_customize->add_setting( 'enable_dark_mode', array( 'default' => false, 'sanitize_callback' => 'premium_b2b_sanitize_checkbox' ) );
	$wp_customize->add_control( 'enable_dark_mode', array( 'label' => 'Enable Dark Mode', 'section' => 'premium_b2b_colors', 'type' => 'checkbox' ) );

    $primary_color = get_theme_mod( 'primary_color', '#0F172A' );
	$accent_color = get_theme_mod( 'accent_color', '#2563EB' );
	add_theme_support( 'editor-color-palette', array(
		array( 'name' => __( 'Primary', 'premium-b2b' ), 'slug' => 'primary', 'color' => $primary_color ),
		array( 'name' => __( 'Accent', 'premium-b2b' ), 'slug' => 'accent', 'color' => $accent_color ),
	) );

	// Sections
	$wp_customize->add_section( 'premium_b2b_hero', array( 'title' => 'Section 1: Hero Split', 'panel' => 'premium_b2b_landing_page' ) );
	$wp_customize->add_setting( 'hero_headline', array( 'default' => 'Scale Your B2B Agency with Precision Client Acquisition', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_hero' ) );
	$wp_customize->add_setting( 'hero_subheadline', array( 'default' => 'We engineer high-converting acquisition systems that turn cold prospects into high-ticket partners.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_subheadline', array( 'label' => 'Subheadline', 'section' => 'premium_b2b_hero', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'hero_cta_text', array( 'default' => 'Book Your Strategy Audit', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_text', array( 'label' => 'CTA Text', 'section' => 'premium_b2b_hero' ) );
    $wp_customize->add_setting( 'hero_cta_url', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'hero_cta_url', array( 'label' => 'CTA URL', 'section' => 'premium_b2b_hero', 'type' => 'url' ) );

	// Inner Templates
    $wp_customize->add_section( 'premium_b2b_about', array( 'title' => 'Template: About', 'panel' => 'premium_b2b_templates' ) );
    $wp_customize->add_setting( 'about_mission_headline', array( 'default' => 'Our Mission: Transforming B2B Growth Engines', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'about_mission_headline', array( 'label' => 'Mission Headline', 'section' => 'premium_b2b_about' ) );
	$wp_customize->add_section( 'premium_b2b_services', array( 'title' => 'Template: Services', 'panel' => 'premium_b2b_templates' ) );
	$wp_customize->add_setting( 'services_headline', array( 'default' => 'Precision-Engineered Acquisition Services', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'services_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_services' ) );
    $wp_customize->add_section( 'premium_b2b_cases', array( 'title' => 'Template: Case Studies', 'panel' => 'premium_b2b_templates' ) );
    $wp_customize->add_setting( 'case_studies_headline', array( 'default' => 'Client Success Stories & ROI Proof', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'case_studies_headline', array( 'label' => 'Headline', 'section' => 'premium_b2b_cases' ) );

    // Scripts & Global
    $wp_customize->add_section( 'premium_b2b_footer', array( 'title' => 'Footer & Social', 'priority' => 130 ) );
	$wp_customize->add_setting( 'footer_copyright', array( 'default' => sprintf( '&copy; %s %s. Elite B2B Acquisition Framework.', date( 'Y' ), get_bloginfo( 'name' ) ), 'sanitize_callback' => 'wp_kses_post' ) );
	$wp_customize->add_control( 'footer_copyright', array( 'label' => 'Copyright Text', 'section' => 'premium_b2b_footer', 'type' => 'textarea' ) );
	$socials = array( 'linkedin', 'twitter', 'instagram' );
	foreach ( $socials as $social ) {
		$wp_customize->add_setting( "social_{$social}", array( 'default' => 'https://' . $social . '.com/agency', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "social_{$social}", array( 'label' => ucfirst( $social ) . ' URL', 'section' => 'premium_b2b_footer' ) );
	}

    $wp_customize->add_section( 'premium_b2b_cta_card', array( 'title' => 'Single Post CTA', 'priority' => 140 ) );
	$wp_customize->add_setting( 'cta_card_title', array( 'default' => 'Struggling to Scale Your B2B Pipeline?', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'cta_card_title', array( 'label' => 'Title', 'section' => 'premium_b2b_cta_card' ) );
    $wp_customize->add_setting( 'enable_social_sharing', array( 'default' => true, 'sanitize_callback' => 'premium_b2b_sanitize_checkbox' ) );
	$wp_customize->add_control( 'enable_social_sharing', array( 'label' => 'Enable Social Sharing', 'section' => 'premium_b2b_cta_card', 'type' => 'checkbox' ) );

	$wp_customize->add_section( 'premium_b2b_scripts', array( 'title' => 'Developer: Custom Scripts', 'priority' => 160 ) );
	$wp_customize->add_setting( 'header_scripts', array( 'default' => '', 'sanitize_callback' => 'premium_b2b_sanitize_scripts' ) );
	$wp_customize->add_control( 'header_scripts', array( 'label' => 'Header Scripts (GTM/GA)', 'section' => 'premium_b2b_scripts', 'type' => 'textarea' ) );

	// Selective Refresh
	if ( isset( $wp_customize->selective_refresh ) ) {
		$partials = array( 'hero_headline', 'services_headline', 'case_studies_headline' );
		foreach ( $partials as $partial ) {
			$wp_customize->selective_refresh->add_partial( $partial, array(
				'selector'        => '.site-main h1',
				'render_callback' => function() use ( $partial ) { return get_theme_mod( $partial ); },
			) );
		}
	}

	$wp_customize->get_setting( 'hero_headline' )->transport = 'postMessage';
	$wp_customize->get_setting( 'primary_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'accent_color' )->transport = 'postMessage';
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
	wp_enqueue_script( 'premium-b2b-customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '1.4.0', true );
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
                'content' => '<!-- wp:paragraph --><p>Our landing page is architected for maximum psychological impact. We guide high-ticket prospects through a strategic journey from pain awareness to solution discovery.</p><!-- /wp:paragraph -->',
                'template' => 'front-page.php'
            ),
			'About' => array(
                'content' => '<!-- wp:heading --><h2>The Engineering Behind the Growth</h2><!-- /wp:heading --><!-- wp:paragraph --><p>We are a team of systems engineers and conversion psychologists dedicated to solving the B2B acquisition problem for elite agencies.</p><!-- /wp:paragraph -->',
                'template' => 'template-about.php'
            ),
			'Services' => array(
                'content' => '<!-- wp:paragraph --><p>Explore our precision-engineered services designed to build, optimize, and scale your client acquisition engine.</p><!-- /wp:paragraph -->',
                'template' => 'template-services.php'
            ),
			'Case Studies' => array(
                'content' => '<!-- wp:paragraph --><p>Empirical proof of our framework in action. We let the ROI data speak for itself.</p><!-- /wp:paragraph -->',
                'template' => 'template-case-studies.php'
            ),
			'Contact' => array(
                'content' => '<!-- wp:paragraph --><p>The first step toward a predictable pipeline is a strategic audit of your current acquisition infrastructure.</p><!-- /wp:paragraph -->',
                'template' => 'template-contact.php'
            ),
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

function premium_b2b_reading_time() {
	$content = get_post_field( 'post_content', get_the_ID() );
	$word_count = str_word_count( strip_tags( $content ) );
	$reading_time = ceil( $word_count / 200 );
	return $reading_time . ( ( 1 === (int)$reading_time ) ? ' min read' : ' mins read' );
}

add_filter( 'excerpt_length', function() { return 25; }, 999 );
add_filter( 'excerpt_more', function() { return '...'; } );
