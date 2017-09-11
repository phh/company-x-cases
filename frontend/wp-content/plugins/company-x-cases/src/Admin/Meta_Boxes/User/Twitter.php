<?php

namespace Company_X\Cases\Admin\Meta_Boxes\User;

use Company_X\Cases\Admin\Meta_Boxes\Base_Meta_Box;
use Company_X\Cases\Core\Plugin;

class Twitter extends Base_Meta_Box {

	/**
	 * Registers title metabox for users.
	 *
	 * @return void.
	 */
	public function register_metabox() {
		$metabox = new_cmb2_box( [
			'title'        => __( 'Twitter', Plugin::get_text_domain() ),
			'id'           => $this->get_meta_name( 'twitter_metabox' ),
			'show_names'   => true,
			'object_types' => [
				'user',
			],
		] );

		$metabox->add_field( [
			'name' => __( 'Twitter handle', Plugin::get_text_domain() ),
			'id'   => $this->get_meta_name( 'twitter_handle' ),
			'type' => 'text',
			'desc' => __( 'The handle of the users twitter account.', Plugin::get_text_domain() ),
		] );
	}
}
