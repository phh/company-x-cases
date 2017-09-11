<?php
/**
 * Main plugin class.
 *
 * Handles the initialization of the plugin.
 */

namespace Company_X\Cases\Core;

final class Plugin {

	/**
	 * Text domain for translators
	 */
	protected $text_domain = 'company-x-cases';

	/**
	 * @var object Instance of this class.
	 */
	private static $instance;

	/**
	 * @var string Filename of this class.
	 */
	public $file;

	/**
	 * @var string Basename of this class.
	 */
	public $basename;

	/**
	 * @var string Plugins directory for this plugin.
	 */
	public $plugin_dir;

	/**
	 * @var string Plugins url for this plugin.
	 */
	public $plugin_url;

	/**
	 * Do not load this more than once.
	 */
	private function __construct() {}

	/**
	 * Returns the instance of this class.
	 */
	public static function instance( $file = '' ) {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self;
			self::$instance->bootstrap( $file );

			/**
			 * Runs after the plugin bootstrap.
			 */
			do_action( 'company_x_cases_loaded' );
		}

		return self::$instance;
	}

	/**
	 * Plugin boostrap.
	 */
	private function bootstrap( $file ) {
		// Set plugin file variables
		$this->file       = $file;
		$this->basename   = plugin_basename( $this->file );
		$this->plugin_dir = plugin_dir_path( $this->file );
		$this->plugin_url = plugin_dir_url( $this->file );

		// Load textdomain
		load_plugin_textdomain( self::get_text_domain(), false, dirname( $this->basename ) . '/languages' );

		// Bootstrap
		$bootstrap = new Bootstrap;
		$bootstrap->bootstrap();
	}

	public function activate() {}

	public function deactivate() {}

	public static function get_text_domain() {
		return self::instance()->text_domain;
	}
}
