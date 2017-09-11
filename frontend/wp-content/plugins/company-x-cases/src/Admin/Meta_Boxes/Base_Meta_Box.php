<?php

namespace Company_X\Cases\Admin\Meta_Boxes;

use Company_X\Cases\Core\Plugin;

abstract class Base_Meta_Box {

	public $prefix = 'cpx_cas';

	/**
	 * Returns the post meta.
	 *
	 * @param  string $key Name of the meta key.
	 * @param  int    $post_id ID of the post.
	 *
	 * @return mixed  Returned meta data from get_post_meta().
	 */
	public function get_post_meta( $key, $post_id = false, $single = true ) {
		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}

		$meta_key = $this->get_meta_name( $key );

		return get_post_meta( $post_id, $meta_key, $single );
	}

	/**
	 * Returns the user meta.
	 *
	 * @param  string $key Name of the meta key.
	 * @param  int    $user_id ID of the user.
	 *
	 * @return mixed  Returned meta data from get_user_meta().
	 */
	public function get_user_meta( $key, $user_id, $single = true ) {
		$meta_key = $this->get_meta_name( $key );

		return get_user_meta( $user_id, $meta_key, $single );
	}

	/**
	 * Returns the prefixed meta name.
	 *
	 * @param  string $key Name of the meta key.
	 *
	 * @return string      Prefixed meta name.
	 */
	public function get_meta_name( $key = '' ) {
		return sprintf( '%s_%s', $this->prefix, $key );
	}
}
