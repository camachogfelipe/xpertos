<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xpertos
 */
$xpertos_options = load_options();
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 logo">
					<?php
					if(!empty($xpertos_options->xpertos_logo_footer_option)) :
						echo '<a href="' . home_url() . '" title="';
						echo bloginfo( 'name' );
						echo '">' . wp_get_attachment_image( $xpertos_options->xpertos_logo_footer_option, 'image-logo-footer' ) . '</a>';
					else :
						echo "";
					endif;
					?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 div-menu-footer">
					<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
					<div class="social-footer">
						<a href="<?php
						echo (!empty($xpertos_options->facebook_option)) ? $xpertos_options->facebook_option : "";
					?>"><i class="fa fa-facebook"></i></a>
						<a href="<?php
						echo (!empty($xpertos_options->twitter_option)) ? $xpertos_options->twitter_option : "";
					?>"><i class="fa fa-twitter"></i></a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 contacto">
					<h4>contacto</h4>
					<h5>teléfono</h5>
					<?php
						echo __('PBX number', 'xpertos')." ";
						echo (!empty($xpertos_options->phone1_option)) ? $xpertos_options->phone1_option : "";
					?><br>
					<?php
						echo __('Celphone number', 'xpertos')." ";
						echo (!empty($xpertos_options->phone2_option)) ? $xpertos_options->phone2_option : "";
					?>
					<h5>dirección</h5>
					<?php
						echo __('Address', 'xpertos')." ";
						echo (!empty($xpertos_options->addres_option)) ? $xpertos_options->addres_option : "";
					?>
					<h5>email</h5>
					<?php
						echo (!empty($xpertos_options->email1_option)) ? $xpertos_options->email1_option : "";
					?><br>
					<?php
						echo (!empty($xpertos_options->email2_option)) ? $xpertos_options->email2_option : "";
					?>
				</div>
			</div>
		</div>
		<div class="site-info container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<?php printf( esc_html__( '%1$s by %2$s.', 'xpertos' ), 'xpertos', '<a href="http://www.cogroupsas.com" rel="designer">Felipe Camacho</a>' ); ?>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php get_template_part( 'template-parts/modals' ); ?>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-M5L575"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M5L575');</script>
<!-- End Google Tag Manager -->

<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Organization",
  "name" : "Xpertos",
  "url" : "http://xpertos.com.co/",
  "sameAs" : [
    "https://twitter.com/soloxpertos",
    "https://plus.google.com/u/1/b/107507303009941792586/?pageId=107507303009941792586",
    "https://www.facebook.com/SoloXpertos/",
    
 ]
}
</script>

<?php wp_footer(); ?>
</body>
</html>
