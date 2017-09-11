<?php
/**
 * Displays singular post types.
 *
 * @link http://codex.wordpress.org/Post_Type_Templates
 *
 * @package Company X
 */
?>

<?php get_header(); ?>

<div class="wrapper">
	<main role="main" class="column">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'partials/singular', get_post_type() ); ?>

		<?php endwhile; ?>

	</main>
</div>

<?php get_footer(); ?>
