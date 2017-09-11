<?php
/**
 * Registers P2P connection recipes to recipes.
 */

namespace Company_X\Cases\Core\Connections;

use Company_X\Cases\Core\Plugin;
use Company_X\Cases\Core\Types\Cases;

class Cases_To_Users {

	public $connection = 'cases_to_users';

	public function register_connection() {
		$connection_args = [
			'name'            => $this->get_connection(),
			'from'            => Cases::get_post_type(),
			'to'              => 'user',
			'title'           => __( 'Linked user', Plugin::get_text_domain() ),
			'sortable'        => true,
			'can_create_post' => false,
		];

		p2p_register_connection_type( $connection_args );
	}

	public function get_connection() {
		return $this->connection;
	}
}
