<?php
/**
 * Company X Cases
 *
 * @package Company X Cases
 * @author  Patrick Hesselberg
 *
 * Plugin Name:       Company X Cases
 * Description:       Show your latest cases on your website!.
 * Version:           1.0.0
 * Author:            Patrick Hesselberg
 * Author URI:        https://www.linkedin.com/in/patrickhesselberg/
 */

namespace Company_X\Cases;

use Company_X\Cases\Core\Plugin;

// Do not access this file directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Register plugin specific hooks
register_activation_hook( __FILE__, __NAMESPACE__ . '\activation' );
register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivation' );

function activation() {
	return instance()->activate();
}

function deactivation() {
	return instance()->deactivate();
}

function instance() {
	return Plugin::instance( __FILE__ );
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\instance' );
