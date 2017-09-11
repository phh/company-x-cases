<?php
/**
 * Registers custom post_type Case.
 */

namespace Company_X\Cases\Core\Types;

use Company_X\Cases\Core\Plugin;

class Cases {

	const POST_TYPE = 'case';

	public function register_post_type() {
		$args = [
			'labels' => [
				'name'                  => _x( 'Cases', 'post type general name', Plugin::get_text_domain() ),
				'singular_name'         => _x( 'Case', 'post type singular name', Plugin::get_text_domain() ),
				'name_admin_bar'        => _x( 'Case', 'add new admin bar', Plugin::get_text_domain() ),
				'add_new'               => _x( 'Add New', 'Case', Plugin::get_text_domain() ),
				'add_new_item'          => __( 'Add New Case', Plugin::get_text_domain() ),
				'edit_item'             => __( 'Edit Case', Plugin::get_text_domain() ),
				'new_item'              => __( 'New Case', Plugin::get_text_domain() ),
				'view_item'             => __( 'View Case', Plugin::get_text_domain() ),
				'view_items'            => __( 'View Cases', Plugin::get_text_domain() ),
				'search_items'          => __( 'Search Cases', Plugin::get_text_domain() ),
				'not_found'             => __( 'No Cases found.', Plugin::get_text_domain() ),
				'not_found_in_trash'    => __( 'No Cases found in Trash.', Plugin::get_text_domain() ),
				'parent_item_colon'     => __( 'Parent Case:', Plugin::get_text_domain() ),
				'all_items'             => __( 'All Cases', Plugin::get_text_domain() ),
				'archives'              => __( 'Case Archives', Plugin::get_text_domain() ),
				'attributes'            => __( 'Case Attributes', Plugin::get_text_domain() ),
				'insert_into_item'      => __( 'Insert into Case', Plugin::get_text_domain() ),
				'uploaded_to_this_item' => __( 'Uploaded to this Case', Plugin::get_text_domain() ),
				'featured_image'        => _x( 'Featured Image', 'Case', Plugin::get_text_domain() ),
				'set_featured_image'    => _x( 'Set featured image', 'Case', Plugin::get_text_domain() ),
				'remove_featured_image' => _x( 'Remove featured image', 'Case', Plugin::get_text_domain() ),
				'use_featured_image'    => _x( 'Use as featured image', 'Case', Plugin::get_text_domain() ),
				'menu_name'             => _x( 'Cases', 'Case menu name', Plugin::get_text_domain() ),
				'filter_items_list'     => __( 'Filter Cases list', Plugin::get_text_domain() ),
				'items_list_navigation' => __( 'Cases list navigation', Plugin::get_text_domain() ),
				'items_list'            => __( 'Cases list', Plugin::get_text_domain() ),
			],
			'public'            => true,
			'hierarchical'      => false,
			'menu_position'     => 10,
			'menu_icon'         => 'dashicons-analytics',
			'supports'          => [
				'title',
				'editor',
				'excerpt',
			],
			'has_archive'       => true,
			'rewrite'           => [
				'slug' => _x( 'cases', 'post type rewrite slug', Plugin::get_text_domain() ),
			],
		];

		register_post_type( self::get_post_type(), $args );
	}

	public function unregister_post_type() {
		unregister_post_type( self::get_post_type() );
	}

	public function post_updated_messages( $messages ) {
		global $post;

		$permalink = get_permalink( $post );
		$preview_url = get_preview_post_link( $post );

		$view_link_html = sprintf( ' <a href="%1$s">%2$s</a>', esc_url( $permalink ), __( 'View Case', Plugin::get_text_domain() ) );
		$preview_link_html = sprintf( ' <a target="_blank" href="%1$s">%2$s</a>', esc_url( $preview_url ), __( 'Preview Case', Plugin::get_text_domain() ) );
		$scheduled_date = date_i18n( _x( 'M j, Y @ H:i', 'Case publish box date format', Plugin::get_text_domain() ), strtotime( $post->post_date ) );
		$scheduled_post_link_html = sprintf( ' <a target="_blank" href="%1$s">%2$s</a>', esc_url( $permalink ), __( 'Preview post' ) );

		$post_type = self::get_post_type();
		$messages[ $post_type ] = [
			'',
			__( 'Case updated.', Plugin::get_text_domain() ) . $view_link_html,
			__( 'Custom field updated.', Plugin::get_text_domain() ),
			__( 'Custom field deleted.', Plugin::get_text_domain() ),
			__( 'Case updated.', Plugin::get_text_domain() ),
			isset( $_GET['revision'] ) ? sprintf( _x( 'Case restored to revision from %s.', '%s: date and time of the revision', Plugin::get_text_domain() ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			__( 'Case published.', Plugin::get_text_domain() ) . $view_link_html,
			__( 'Case saved.', Plugin::get_text_domain() ),
			__( 'Case submitted.', Plugin::get_text_domain() ) . $preview_link_html,
			sprintf( _x( 'Case scheduled for: %s.', '%s: date and time of the scheduled date', Plugin::get_text_domain() ), '<strong>' . $scheduled_date . '</strong>' ) . $scheduled_post_link_html,
			__( 'Case draft updated.', Plugin::get_text_domain() ) . $preview_link_html,
		];

		return $messages;
	}

	public static function get_post_type() {
		return self::POST_TYPE;
	}
}
