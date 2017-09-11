<?php
/**
 * Main plugin frontend class.
 *
 * Handles the initialization of the frontend part of the plugin.
 */

namespace Company_X\Cases\Frontend;

use Company_X\Cases\Admin\Meta_Boxes\Cases\Info;
use Company_X\Cases\Admin\Meta_Boxes\User\Twitter;
use Company_X\Cases\Core\Connections\Cases_To_Users;
use Company_X\Cases\Core\Plugin;
use Company_X\Cases\Core\Types\Cases;

final class Main {

	/**
	 * Runs the plugins frontend hooks.
	 */
	public function bootstrap() {
		add_action( 'cpx_before_article_post_header', [ __CLASS__, 'case_client_info' ] );
		add_action( 'cpx_after_article_post_header', [ __CLASS__, 'case_project_link' ] );
		add_action( 'cpx_after_article', [ __CLASS__, 'case_linked_user' ] );
		add_action( 'company_x_cases_after_linked_user', [ __CLASS__, 'linked_user_twitter_handle' ] );
	}

	/**
	 * Output case project name.
	 */
	public static function case_client_info() {
		if ( is_singular( Cases::get_post_type() ) ) {
			$info = new Info;
			$client_name = $info->get_post_meta( 'client_name', get_the_ID() );
			$client_link = $info->get_post_meta( 'client_link', get_the_ID() );

			if ( $client_name && $client_link ) {
				include( Plugin::instance()->plugin_dir . 'views/frontend/singular-case/client-info.php' );
			}
		}
	}

	/**
	 * Output case project name.
	 */
	public static function case_project_link() {
		if ( is_singular( Cases::get_post_type() ) ) {
			$info = new Info;
			$project_link = $info->get_post_meta( 'project_link', get_the_ID() );

			if ( $project_link ) {
				include( Plugin::instance()->plugin_dir . 'views/frontend/singular-case/project-link.php' );
			}
		}
	}

	/**
	 * Output case project name.
	 */
	public static function case_linked_user() {
		if ( is_singular( Cases::get_post_type() ) ) {
			$cases_to_users = new Cases_To_Users;
			$linked_users_args = [
				'connected_type' => $cases_to_users->get_connection(),
				'connected_items' => get_the_ID(),
			];
			$linked_users = get_users( $linked_users_args );

			if ( ! empty( $linked_users ) ) {
				include( Plugin::instance()->plugin_dir . 'views/frontend/singular-case/linked-users.php' );
			}
		}
	}

	/**
	 * Output linked user Twitter handle
	 */
	 public static function linked_user_twitter_handle( $user_id ) {
		 $user_twitter = new Twitter;
		 $twitter_handle = $user_twitter->get_user_meta( 'twitter_handle', $user_id );

		 if ( $twitter_handle ) {
			 $twitter_handle_url = 'https://twitter.com/' . $twitter_handle;

			 include( Plugin::instance()->plugin_dir . 'views/frontend/singular-case/linked-user-twitter.php' );
		 }
	 }
}
