<?php
/**
 * Widget Areas.
 * For registering custom widgets, it's best to use plugins.
 *
 * @link http://codex.wordpress.org/Widgets_API
 *
 * @package Company X
 */

/**
 * Registers widget areas
 */
function cpx_sidebars() {
	register_sidebar( array(
		'id' => 'sidebar',
		'name' => __( 'Sidebar', THEMEDOMAIN ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget__title">',
		'after_title' => '</h2>'
	) );
	register_sidebar( array(
		'id' => 'above-footer',
		'name' => __( 'Above Footer', THEMEDOMAIN ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget__title">',
		'after_title' => '</h2>'
	) );
	register_sidebar( array(
		'id' => 'footer',
		'name' => __( 'Footer', THEMEDOMAIN ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget__title">',
		'after_title' => '</h2>'
	) );
}
add_action( 'widgets_init', 'cpx_sidebars' );
