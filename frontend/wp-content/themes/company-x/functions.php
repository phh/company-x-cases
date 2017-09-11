<?php
/**
 * The main functions file for WordPress Theme Features
 *
 * @link http://codex.wordpress.org/Theme_Features
 * @link http://codex.wordpress.org/Functions_File_Explained
 *
 * @package Company X
 */

/**
 * Theme setup
 */
function cpx_setup() {

	// Theme domain for translations
	define( 'THEMEDOMAIN', 'cpx' );
	load_theme_textdomain( THEMEDOMAIN, get_template_directory() . '/languages' );

	// Includes
	require_once( get_template_directory() . '/includes/functions-widget-areas.php' );

	// Theme support
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
	add_theme_support( 'automatic_feed_links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', [
		'search-form',
		'comment-list',
		'comment-form',
		'gallery',
		'caption'
	] );

	// Image sizes
	set_post_thumbnail_size( 125, 125, true );      // default thumb size
	add_image_size( 'cpx-small', 300, 169, true );  // 16/9 small
	add_image_size( 'cpx-medium', 640, 369, true ); // 16/9 medium
	add_image_size( 'cpx-large', 800, 450, true );  // 16/9 large
	add_image_size( 'cpx-hero', 1400, 550, true );  // Hero image

	// Navigation
	register_nav_menus(	[
		'main_nav' => __( 'Main Menu', THEMEDOMAIN ),
		'footer_nav' => __( 'Footer Menu', THEMEDOMAIN )
	] );
}
add_action( 'after_setup_theme', 'cpx_setup' );
