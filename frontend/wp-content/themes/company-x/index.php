<?php
/**
 * The main template file. Acts as a fallback if more specific templates don't exist.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Company X
 */
?>

<?php get_header(); ?>

<div class="wrap content-outer">

	<div class="content-inner">

		<main role="main">

		<?php if ( have_posts() ) : ?>

			<header class="archive-header">

				<h1 class="archive-title">
					<?php the_archive_title(); ?>
				</h1>

				<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>

			</header>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'partials/loop', 'index' ); ?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'partials/loop', 'notfound' ); ?>

		<?php endif; ?>

		</main>

	</div>

</div>

<?php get_footer(); ?>
