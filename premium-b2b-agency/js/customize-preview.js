/**
 * File customize-preview.js.
 *
 * Real-time updating of Customizer settings.
 */

( function( $ ) {

	// Headlines
    const headlines = [
        'hero_headline',
        'hero_subheadline',
        'agitation_headline',
        'mechanism_headline',
        'capture_headline',
        'trust_headline',
        'about_mission_headline',
        'services_headline',
        'case_studies_headline'
    ];

    headlines.forEach( id => {
        wp.customize( id, function( value ) {
            value.bind( function( newval ) {
                // Map ID to selector
                let selector = '';
                if ( id === 'hero_headline' ) selector = '.hero-content h1';
                else if ( id === 'hero_subheadline' ) selector = '.hero-content p';
                else if ( id === 'capture_headline' ) selector = '.capture-section h2';
                else if ( id === 'trust_headline' ) selector = '.trust-bar p';
                else if ( id.includes('_headline') ) selector = 'h1, .section-header h2';

                if ( selector ) $( selector ).text( newval );
            } );
        } );
    });

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

    // Dark Mode (Simplified toggle for preview)
    wp.customize( 'enable_dark_mode', function( value ) {
        value.bind( function( newval ) {
            if ( newval ) {
                $( 'body' ).css({ '--color-bg': '#020617', '--color-text': '#F8FAFC', '--color-white': '#0F172A' });
            } else {
                $( 'body' ).css({ '--color-bg': '#F8FAFC', '--color-text': '#1E293B', '--color-white': '#FFFFFF' });
            }
        } );
    } );

} ( jQuery ) );
