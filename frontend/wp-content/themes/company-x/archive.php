<?php
/**
 * Displays the search results page.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy#Search_Result_display
 *
 * @package Company X
 */
?>

<?php get_header(); ?>

<div class="wrapper">
	<main role="main" class="column">

		<header class="post__header">
			<h1 class="main-title" itemprop="name headline"><?php the_title(); ?></h1>
		</header>

		<section class="list-view">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'partials/loop' ); ?>

			<?php endwhile; ?>

		</section>

		<?php echo cpx_paginate_links(); ?>

	</main>
</div>

<?php get_footer(); ?>
