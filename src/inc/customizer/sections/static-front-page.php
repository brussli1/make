<?php
/**
 * @package Make
 */

if ( ! function_exists( 'ttfmake_customizer_staticfrontpage' ) ) :
/**
 * Configure settings and controls for the Static Front Page section.
 *
 * @since  1.3.0.
 *
 * @return void
 */
function ttfmake_customizer_staticfrontpage() {
	global $wp_customize;
	$theme_prefix = 'ttfmake_';
	$section_id   = 'static_front_page';
	$section      = $wp_customize->get_section( $section_id );
	$priority     = new TTFMAKE_Prioritizer( 10, 5 );

	// Bail if the section isn't registered
	if ( ! is_object( $section ) || 'WP_Customize_Section' !== get_class( $section ) ) {
		return;
	}

	// Move Static Front Page section to General panel
	$section->panel = $theme_prefix . 'general';

	// Set Static Front Page section priority
	$social_priority = $wp_customize->get_section( $theme_prefix . 'rss' )->priority;
	$section->priority = $social_priority + 5;
}
endif;

add_action( 'customize_register', 'ttfmake_customizer_staticfrontpage', 99 );