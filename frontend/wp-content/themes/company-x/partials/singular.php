<?php
/**
 * Template part for single pages.
 *
 * @package Company X
 */
?>

<div class="wrapper">
	<article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/Article">

		<header class="post__header">

			<?php do_action( 'cpx_before_article_post_header' ); ?>

			<h1 class="main-title" itemprop="name headline"><?php the_title(); ?></h1>

			<?php if ( has_post_thumbnail() ) : ?>

			<figure class="post__image">
				<?php the_post_thumbnail( 'cpx-large', [ 'itemprop' => 'thumbnail' ] ); ?>
			</figure>

			<?php endif; ?>

			<?php do_action( 'cpx_after_article_post_header' ); ?>

		</header>

		<div class="post__content" itemprop="articleBody">

			<?php the_content(); ?>

		</div>

		<?php do_action( 'cpx_after_article' ); ?>
	</article>
</div>
