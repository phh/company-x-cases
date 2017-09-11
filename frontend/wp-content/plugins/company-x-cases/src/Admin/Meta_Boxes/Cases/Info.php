<?php

namespace Company_X\Cases\Admin\Meta_Boxes\Cases;

use Company_X\Cases\Admin\Meta_Boxes\Base_Meta_Box;
use Company_X\Cases\Core\Plugin;
use Company_X\Cases\Core\Types\Cases;

class Info extends Base_Meta_Box {

	/**
	 * Registers sources metabox for posts.
	 *
	 * @return void.
	 */
	public function register_metabox() {
		$post_types = [
			Cases::get_post_type(),
		];

		$metabox = new_cmb2_box( [
			'title'        => __( 'Info', Plugin::get_text_domain() ),
			'id'           => $this->get_meta_name( 'info_metabox' ),
			'object_types' => $post_types,
		] );

		$metabox->add_field( [
			'name' => esc_html__( 'Project Link', Plugin::get_text_domain() ),
			'id'   => $this->get_meta_name( 'project_link' ),
			'type' => 'text_url',
		] );

		$metabox->add_field( [
			'name' => esc_html__( 'Client name', Plugin::get_text_domain() ),
			'id'   => $this->get_meta_name( 'client_name' ),
			'type' => 'text',
		] );

		$metabox->add_field( [
			'name' => esc_html__( 'Client Link', Plugin::get_text_domain() ),
			'id'   => $this->get_meta_name( 'client_link' ),
			'type' => 'text_url',
		] );
	}
}
