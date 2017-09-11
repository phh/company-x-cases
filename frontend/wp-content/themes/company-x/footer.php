<?php
/**
 * Displays the footer.
 *
 * @link http://codex.wordpress.org/Stepping_into_Templates#Basic_Template_Files
 *
 * @package Company X
 */
?>

		</div> <!-- #jump-to-content -->

		<footer id="footer" class="footer" role="contentinfo">

		<?php if ( is_active_sidebar( 'footer' ) ): ?>

			<div class="footer__wrapper">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div>

		<?php endif; ?>

		</footer>

	</div>

	<?php wp_footer(); ?>

</body>

</html>
