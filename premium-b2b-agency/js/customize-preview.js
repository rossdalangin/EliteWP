/**
 * File customize-preview.js.
 *
 * Real-time updating of Customizer settings.
 */

( function( $ ) {

	// Hero Headline
	wp.customize( 'hero_headline', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-content h1' ).text( newval );
		} );
	} );

	// Hero Subheadline
	wp.customize( 'hero_subheadline', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-content p' ).text( newval );
		} );
	} );

    // Agitation Headline
	wp.customize( 'agitation_headline', function( value ) {
		value.bind( function( newval ) {
			$( '.agitation-section .section-header h2' ).text( newval );
		} );
	} );

    // Mechanism Headline
	wp.customize( 'mechanism_headline', function( value ) {
		value.bind( function( newval ) {
			$( '.mechanism-section .section-header h2' ).text( newval );
		} );
	} );

    // Capture Headline
	wp.customize( 'capture_headline', function( value ) {
		value.bind( function( newval ) {
			$( '.capture-section h2' ).text( newval );
		} );
	} );

	// Primary Color
	wp.customize( 'primary_color', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--color-primary', newval );
		} );
	} );

	// Accent Color
	wp.customize( 'accent_color', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--color-accent', newval );
		} );
	} );

} ( jQuery ) );
