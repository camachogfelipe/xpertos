<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xpertos
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="Tw2ScsYL3oLDKw6hKfK_LsEoNBlnCgkj9HcG6fHnIXc" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<meta name="copyright" content="<?php bloginfo( 'name' ); ?> (<?php echo get_site_url(); ?>)" />
<meta name="date" content="<?= date("Y") ?>" />
<meta name="author" content="design: Adriana Romero (www.adrianromero.com); web programming: COgroup (www.cogroupsas.com)" />
<meta name="robots" content="All" />

<?php wp_head(); ?>
</head>
<?php
	$xpertos_options = load_options();
?>
<body <?php body_class(); ?>>
<div id="loader-wrapper">
	<div id="loader"></div>
	<?php echo (!empty($xpertos_options->xpertos_logo_menu_option)) ? wp_get_attachment_image( $xpertos_options->xpertos_logo_menu_option, 'image-logo', false, array('id' => 'loader-img') ) : ""; ?>
	<!--<img id="loader-img" src="<?= get_template_directory_uri(); ?>/assets/images/logo.png" />-->
	<div class="loader-section section-left"></div>
	<div class="loader-section section-right"></div>
</div>

<?php get_template_part( 'template-parts/section-sliders', 'none' ); ?>

<div id="page" class="hfeed site">
	<div id="content" class="site-content">
