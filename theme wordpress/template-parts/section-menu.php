<div class="navbar navbar-default" id="menu">
  <div class="container-fluid">
	<div class="navbar-header">
		<a href="<?php echo home_url(); ?>" class="navbar-brand"><?php
		$xpertos_options = load_options();
	?>
	  <?php echo (!empty($xpertos_options->xpertos_logo_menu_option)) ? wp_get_attachment_image( $xpertos_options->xpertos_logo_menu_option, 'image-logo' ) : ""; ?></a>
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main">
	    <span class="sr-only">Toggle navigation</span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	  </button>
	</div>
	<div class="navbar-collapse collapse" id="navbar-main">
	  <ul class="nav navbar-nav navbar-left">
	    <?php $menu = ( is_front_page() ) ? 'primary-menu' : 'second-menu'; echo xpertos_nav_menu($menu); ?>
	  </ul>
	  <!--<ul class="nav navbar-nav navbar-left nav-cart">
	  	<li><a href="<?= home_url('configura-tu-servicio') ?>"><i class="fa fa-shopping-cart"></i></a></li>
	  </ul>-->
	</div>
  </div>
</div>
