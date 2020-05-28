<?php
/**
 * PACU Child theme functions
 *
 * Functions file for child theme, enqueues parent and child stylesheets by default.
 *
 * @since	1.0.0
 * @package aa
 */

// Exit if accessed directly.
//if ( ! defined( 'ABSPATH' ) ) {
//	exit;
//}

// check for theme updates
require(get_template_directory() .'/plugin-update-checker/plugin-update-checker.php');
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'http://cdn.stretchit.com.au/pacu/child/faststartninety/theme.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'pacu-faststartninety'
);
$theme_colour = '#e2356a';
if ( ! function_exists( 'pacu_imm_enqueue_styles' ) ) {
	// Add enqueue function to the desired action.
	add_action( 'wp_enqueue_scripts', 'pacu_imm_enqueue_styles' );

	/**
	 * Enqueue Styles.
	 *
	 * Enqueue parent style and child styles where parent are the dependency
	 * for child styles so that parent styles always get enqueued first.
	 *
	 * @since 1.0.0
	 */
	function pacu_imm_enqueue_styles() {
		// Parent style variable.
		$parent_style = 'pacu';
		
		// Enqueue Parent theme's stylesheet.
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', array('bootstrap-4') );

		// Enqueue Child theme's stylesheet.
		// Setting 'parent-style' as a dependency will ensure that the child theme stylesheet loads after it.
		wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );
	}
}