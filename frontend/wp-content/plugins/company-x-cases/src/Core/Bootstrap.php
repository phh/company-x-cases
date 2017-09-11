<?php
/**
 * Main plugin core class.
 *
 * Handles the initialization of the core part of the plugin.
 */

namespace Company_X\Cases\Core;

use Company_X\Cases\Admin\Main as Admin;
use Company_X\Cases\Core\Connections\Cases_To_Users;
use Company_X\Cases\Core\Types\Cases;
use Company_X\Cases\Frontend\Main as Frontend;

final class Bootstrap {

	/**
	 * Runs the plugin bootstrap.
	 */
	public function bootstrap() {
		if ( is_admin() ) {
			$admin = new Admin;
			$admin->bootstrap();
		} else {
			$frontend = new Frontend;
			$frontend->bootstrap();
		}

		$this->core_bootstrap();
	}

	/**
	 * Runs the plugins core hooks.
	 */
	public function core_bootstrap() {
		add_action( 'init', [ __CLASS__, 'register_post_type_case' ] );
		add_filter( 'post_updated_messages', [ __CLASS__, 'post_updated_messages_case' ] );
		add_action( 'p2p_init', [ __CLASS__, 'register_connection_posts_to_users' ] );
	}

	/**
	 * Registers post type case.
	 */
	public static function register_post_type_case() {
		$post_type = new Cases;
		$post_type->register_post_type();
	}

	/**
	 * Filters the messages displayed when a case is updated.
	 *
	 * @param  array $messages The messages to be displayed.
	 * @return array $messages.
	 */
	public static function post_updated_messages_case( $messages ) {
		$post_type = new Cases;

		return $post_type->post_updated_messages( $messages );
	}

	/**
	 * Registers P2P connection posts to users.
	 */
	public static function register_connection_posts_to_users() {
		$connection = new Cases_To_Users;
		$connection->register_connection();
	}

	/**
	 * Filters the messages displayed when a topic is updated.
	 *
	 * @param  array $messages The messages to be displayed.
	 * @return array $messages.
	 */
	public static function term_updated_messages_topic( $messages ) {
		$taxonomy = new Topic;

		return $taxonomy->term_updated_messages( $messages );
	}

	/**
	 * Registers a widgetarea for cases on the frontpage.
	 *
	 * @return void.
	 */
	public static function register_widgetarea_frontpage_cases() {
		register_sidebar( [
			'id'            => 'frontpage-cases',
			'name'          => __( 'Frontpage cases', Plugin::get_text_domain() ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		] );
	}

	/**
	 * Registers a widgetarea for cases on the topics.
	 *
	 * @return void.
	 */
	public static function register_widgetarea_topic_cases() {
		register_sidebar( [
			'id'            => 'topic-cases',
			'name'          => __( 'Topic cases', Plugin::get_text_domain() ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		] );
	}

	/**
	 * Registers featured articles widget.
	 */
	static public function register_widget_featured_articles() {
		self::register_widget( 'Featured_Articles' );
	}

	/**
	 * Registers featured life situations.
	 */
	static public function register_widget_navigation_band() {
		self::register_widget( 'Navigation_Band' );
	}

	/**
	 * Registers a widget from class name.
	 *
	 * @param string $widget_name Name of the class.
	 */
	static public function register_widget( $widget_name ) {
		return register_widget( __NAMESPACE__ . '\\Widgets\\' . $widget_name );
	}
}
