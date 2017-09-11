<?php
/**
 * Displays the header HTML.
 *
 * @link http://codex.wordpress.org/Stepping_into_Templates#Basic_Template_Files
 *
 * @package Company X
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="container">

		<div id="jump-to-content">
