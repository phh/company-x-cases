<?php
/**
 * Displays a author archive.
 *
 * @link http://codex.wordpress.org/Page_Templates
 *
 * @package Company X
 */
?>

<?php get_header(); ?>

<header class="author-header">
	<div class="wrapper">

		<ul class="author-list">
			<li class="author-list__single" itemprop="author" itemscope itemtype="http://schema.org/Person">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="author-list__link" itemprop="url">

					<div class="author-list__avatar">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), '150', '', sprintf( __( '%s\'s profile picture', THEMEDOMAIN ), get_the_author() ), [ 'extra_attr' => 'itemprop="image"' ] ); ?>
					</div>

					<div class="author-list__body">
						<span class="author-list__name"><?php esc_html_e( 'Articles by', THEMEDOMAIN ); ?> <span itemprop="name"><?php echo esc_html( get_the_author() ); ?></span></span>

						<?php do_action( 'cpx_after_author_body' ); ?>
					</div>

				</a>
			</li>
		</ul>

	</div>
</header>

<section class="list-view">
	<div class="wrapper">

		<?php if ( apply_filters( 'cpx_author_default_loop', true ) ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'partials/loop', 'author' ); ?>

			<?php endwhile; ?>

		<?php endif; ?>

		<?php do_action( 'cpx_author_loop' ); ?>

	</div>
</section>

<?php get_footer(); ?>
