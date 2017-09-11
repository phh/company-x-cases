<?php
/**
 * Main plugin admin class.
 *
 * Handles the initialization of the admin part of the plugin.
 */

namespace Company_X\Cases\Admin;

use Company_X\Cases\Admin\Meta_Boxes\Cases\Info;
use Company_X\Cases\Admin\Meta_Boxes\User\Twitter;

final class Main {

	/**
	 * Runs the plugins admin hooks.
	 */
	public function bootstrap() {
		add_action( 'cmb2_admin_init', [ __CLASS__, 'register_case_info' ] );
		add_action( 'cmb2_admin_init', [ __CLASS__, 'register_user_title' ] );
	}

	/**
	 * Registers metabox for case infobox.
	 */
	public static function register_case_info() {
		$metabox = new Info;
		$metabox->register_metabox();
	}

	/**
	 * Registers metabox for user title.
	 */
	public static function register_user_title() {
		$metabox = new Twitter;
		$metabox->register_metabox();
	}
}
